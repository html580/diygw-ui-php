<?php
namespace app\admin\controller;
use app\BaseController;
use app\common\model\UserModel;
use app\sys\model\RoleModel;
use thans\jwt\facade\JWTAuth;
use think\facade\Db;


class LoginController extends BaseController
{
    //判断是否全部不需要登录
    public $notNeedLoginAll = true;
    public $isModel = false;


    public function login(){
        $username = $this->request->post('username',"diygw");
        $password = $this->request->post('password','1');
        //获取用户模型
        $model = new UserModel();
        //查询用户
        $user = $model::getByUsername($username);
        if(empty($user)|| ($user && md5($password.$user->salt) != $user->password)){
            $params['username'] = $username;
            $params['status'] = '0';
            event('LoginLog', $params);
            return $this->error("用户名或密码错误");
        }else{
            //创建登录用户TOKEN$user->toArray()
            $token = "bearer".JWTAuth::builder(['uid' => $user->userId]);
            $data = $user->toArray();
            $data['token'] = $token;
            $roles=[];
            $auths=[];
            //获取用户角色
            if(!empty($user['roleIds'])){
                $roleList = RoleModel::whereIn('role_id',explode(",",$data['roleIds']))->select()->toArray();
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
            return $this->successData($data);
        }
    }
}
