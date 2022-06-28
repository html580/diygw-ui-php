<?php
// +----------------------------------------------------------------------
// | Diygw PHP
// +----------------------------------------------------------------------
// | Copyright (c) 2022~2022 https://www.diygw.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: diygw <diygwcom@diygw.com>
// +----------------------------------------------------------------------
declare (strict_types = 1);

namespace app\sys\controller;

use app\BaseController;
use app\sys\model\StorageModel;
use diygw\DiygwUpload;

/**
 * @mixin \diygw\model\DiygwModel
 * @package app\sys\controller
 */
class StorageController extends BaseController
{
    //是否初始化模型
    public $isAll = true;
    //是否初始化模型
    public $isModel = true;
    //判断是否全部不需要登录
    public $notNeedLoginAll = false;
    //判断不需要登录的方法
    public $notNeedLogin = [];

    public function upload(){
        $upload = new DiygwUpload();
        $files = $this->request->file();
        $type = $this->request->param('type');
        if($type=='image'){
            $datas = $upload->checkImages($files)->multiUpload($files['file']);
        }else{
            $datas = $upload->checkFiles($files)->multiUpload($files['file']);
        }
        $results = [];
        foreach ($datas as $data){
            $storageModel = new StorageModel();
            $results[] = $storageModel->add($data);
        }
        return $this->successData($results[0]);
    }
}
