<?php
// +----------------------------------------------------------------------
// | Diygw PHP
// +----------------------------------------------------------------------
// | Copyright (c) 2022~2022 https://www.diygw.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: diygw <diygwcom@diygw.com>
// +----------------------------------------------------------------------
declare (strict_types = 1);

namespace app\diy\controller;

use app\BaseController;

/**
 * @mixin \diygw\model\DiygwModel
 * @package app\diy\controller
 */
class NoticeController extends BaseController
{
    //是否初始化模型
    public $isModel = true;
    //判断是否全部不需要登录
    public $notNeedLoginAll = true;
    //判断不需要登录的方法
    public $notNeedLogin = [];

}