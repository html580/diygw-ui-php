<?php
namespace app\api\controller;
use app\BaseController;

use app\common\model\DiyUserModel;
use EasyWeChat\Factory;
use Overtrue\Socialite\AuthorizeFailedException;
use thans\jwt\facade\JWTAuth;
use think\App;

/*
 * 微信小程序
 */
class WexcxController extends BaseController
{
    //判断是否全部不需要登录
    public $notNeedLoginAll = true;
    public $isModel = false;
    //判断不需要登录的方法
    public $notNeedLogin = [];
    public $wexcxApp = null;

    /**
     * 构造方法
     * @access public
     * @param  App  $app  应用对象
     */
    public function __construct(App $app)
    {
        parent::__construct($app);
        $minConfig = config('wechat.mini_program');
        $this->wexcxApp = Factory::miniProgram($minConfig);
    }


    /**
     * 获取用户登录信息
     * @return \think\response\Json
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function  login(){

        $userInfo = json_decode($this->request->post('userInfo'),true);
        $code = $this->request->post('code');
        $auth = $this->wexcxApp->auth;
        $opendata = $auth->session($code);
        if(isset($opendata['openid'])){
            $openid = $opendata['openid'];
            $type = 'weixcx';
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
            $token = "bearer".JWTAuth::builder(['uid' => $userId]);
            $opendata['token'] = $token;
            $data = array_merge($data,$opendata);
            return $this->successData($data);
        }else{
            return $this->errorData($opendata,'登录失败');
        }
    }

    /**
     * 服务端签名，获取操作权限
     */
    public function  getSignPackage(){
        $url = $this->request->param('url');
        try {
            return $this->successData($this->wexcxApp->jssdk->buildConfig([
                'checkJsApi',
                'onMenuShareTimeline',
                'onMenuShareAppMessage',
                'onMenuShareQQ',
                'onMenuShareWeibo',
                'hideMenuItems',
                'showMenuItems',
                'hideAllNonBaseMenuItem',
                'showAllNonBaseMenuItem',
                'translateVoice',
                'startRecord',
                'stopRecord',
                'onRecordEnd',
                'playVoice',
                'pauseVoice',
                'stopVoice',
                'uploadVoice',
                'downloadVoice',
                'chooseImage',
                'previewImage',
                'uploadImage',
                'downloadImage',
                'getNetworkType',
                'openLocation',
                'getLocation',
                'hideOptionMenu',
                'showOptionMenu',
                'closeWindow',
                'scanQRCode',
                'chooseWXPay',
                'openProductSpecificView',
                'addCard',
                'chooseCard',
                'openCard'
            ],false,false,false,['wx-open-launch-weapp'],'https://php.diygw.com/pay/index.html'));
        }catch (Throwable | Exception $e){
            return $this->error("获取用户失败，请重试");
        }
    }

}
