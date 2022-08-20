<?php
namespace app\admin\controller;
use app\BaseController;

use EasyWeChat\Factory;

class WechatController extends BaseController
{
    //判断是否全部不需要登录
    public $notNeedLoginAll = true;
    public $isModel = false;


    public function login(){
        $redirectUrl = url('admin/wechat/userinfo')
            ->suffix('html')
            ->domain('https://chat.diygw.com')->build();
        $minConfig = config('wechat.official_account');
        $app = Factory::officialAccount($minConfig);
        $response = $app->oauth->scopes(['snsapi_userinfo'])
            ->redirect($redirectUrl);
        return redirect($response->getTargetUrl());
    }

    public function  userinfo(){

    }
}
