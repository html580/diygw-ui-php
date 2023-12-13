<?php
namespace app\admin\controller;
use app\BaseController;

use app\common\model\DiyUserModel;
use app\sys\model\RoleModel;

use app\sys\model\UserModel;
use app\sys\validate\UserValidate;
use EasyWeChat\Factory;
use thans\jwt\facade\JWTAuth;
use think\facade\Db;


class LoginController extends BaseController
{
    //判断是否全部不需要登录
    public $notNeedLoginAll = true;
    public $isModel = false;

    /**
     * 注册用户
     */
    public function register()
    {
        $userValidate = new UserValidate();
        $data = $this->request->param();
        $this->model = new UserModel();
        if($userValidate->checkData()){
            if($this->model->add($data)){
                return $this->success('注册成功');
            }else{
                return $this->error('注册失败');
            }
        }
    }


    /**
     * 登录用户
     */
    public function login(){
        $username = $this->request->post('username');
        $password = $this->request->post('password');
        //获取用户模型
        $model = new UserModel();
        //查询用户
        $user = $model->where('username',$username)->find();
        if(empty($user)|| ($user && md5($password.$user->salt) != $user->password)){
            $params['username'] = $username;
            $params['status'] = '0';
            event('LoginLog', $params);
            return $this->error("用户名或密码错误");
        }else{
            //创建登录用户TOKEN$user->toArray()
            $token = "bearer".JWTAuth::builder([$this->tokenKey => $user->userId]);
            $data = $user->toArray();
            $data['token'] = $token;
            $roles=[];
            $auths=[];
            //获取用户角色
            if(!empty($user['roleIds'])){
                $roleModel = new RoleModel();
                $roleList = $roleModel->whereIn('role_id',explode(",",$data['roleIds']))->select()->toArray();
                foreach ($roleList as $role){
                    $roles[]=$role['roleKey'];
                }
                $permission  = Db::table('sys_menu')
                    ->alias('m')
                    ->join('sys_role_menu r','m.menu_id = r.menu_id ')
                    ->where("m.permission IS NOT NULL AND m.permission != ''")
                    ->whereIn('r.role_id',explode(",",$data['roleIds']))
                    ->fieldRaw('GROUP_CONCAT( m.permission) permission')->find();
                $auths=explode(",",$permission['permission']);
            }
            $data['roles'] = $roles;
            $data['auths'] = $auths;
            unset($data['password']);
            unset($data['salt']);
            $params['username'] = $username;
            $params['status'] = '1';
            event('LoginLog', $params);
            return $this->successData($data,"登录成功");
        }
    }

    public function auth(){
        $type = $this->request->post('type');
        if(method_exists($this,$type)){
            return $this->$type();
        }else{
            return $this->error('请实现'.$type.'相关登录方法');
        }
    }


    public function weixin(){
        $userInfo = json_decode($this->request->post('userInfo'),true);
        $code = $this->request->post('code');
        $minConfig = config('wechat.mini_program');
        $app = Factory::miniProgram($minConfig);
        $auth = $app->auth;
        $opendata = $auth->session($code);
        if(isset($opendata['openid'])){
            $openid = $opendata['openid'];
            $type = 'weixin';
            $model = new DiyUserModel();
            //查找获取微信小程序用户
            $user = $model->where('openid',$openid)->where('type',$type)->find();
            $data['openid'] = $openid;
            $data['type'] = $type;
            $data['nickname'] = $userInfo['nickName'];
            $data['avatar'] = $userInfo['avatarUrl'];
            $data['country'] = $userInfo['country'];
            $data['province'] = $userInfo['province'];
            $data['gender'] = $userInfo['gender'];
            if($user){
                $userId =  $user->toArray()['id'];
                $data['id'] = $userId;
                $user->edit($data);
            }else{
                $model = new DiyUserModel();
                $model->add($data);
                $userId = $data['id'];
            }
            $token = "bearer".JWTAuth::builder([$this->tokenKey => $userId]);
            $opendata['token'] = $token;
            $data = array_merge($data,$opendata);
            return $this->successData($data);
        }else{
            return $this->errorData($opendata,'登录失败');
        }
    }
}
