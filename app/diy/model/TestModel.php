<?php
// +----------------------------------------------------------------------
// | Diygw PHP
// +----------------------------------------------------------------------
// | Copyright (c) 2022~2022 https://www.diygw.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: diygw <diygwcom@diygw.com>
// +----------------------------------------------------------------------
declare (strict_types = 1);

namespace app\diy\model;

use diygw\model\DiygwModel;

/**
 * @mixin \diygw\model\DiygwModel
 * @package app\diy\model
 */
class TestModel extends DiygwModel
{
    // 表名
    public $name = 'diy_test';

    // 相似查询字段
    protected $likeField=[];
}