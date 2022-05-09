<?php
// +----------------------------------------------------------------------
// | Diygw PHP
// +----------------------------------------------------------------------
// | Copyright (c) 2022~2022 https://www.diygw.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: diygw <diygwcom@diygw.com>
// +----------------------------------------------------------------------
declare (strict_types = 1);

namespace app\sys\model;

use diygw\model\DiygwModel;
use think\helper\Str;

/**
 * @mixin \diygw\model\DiygwModel
 * @package app\sys\model
 */
class UserModel extends DiygwModel
{
    // 表名
    public $name = 'sys_user';

    protected $likeField=['username','phone'];

    public function beforeAdd(&$data){
        $salt =  Str::random(6);
        $data['salt'] = $salt;
        $data['password'] = md5($data['password'].$salt);
        return true;
    }

}
