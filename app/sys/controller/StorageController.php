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
use diygw\storage\Driver as StorageDriver;
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
    public $notNeedLoginAll = true;
    //判断不需要登录的方法
    public $notNeedLogin = [];


    public function upload(){
        $storage = new StorageDriver();
        $type = $this->request->param('type');
        if(empty($type)){
            $type = "image";
        }
        // 设置上传文件的信息
        $storage->setUploadFile('file')
            ->setRootDirName($type)
            ->setValidationScene($type);
        $data = $storage->getSaveFileInfo();
        $tmpdata = null;
        if ($data['md5']) {
            $storageModel = new StorageModel();
            $tmpdata = $storageModel->withoutGlobalScope()->where('type', $type)->where('md5', $data['md5'])->limit(1)->find();
            if ($tmpdata) {
                $tmpdata = $tmpdata->toArray();
                unset($tmpdata['storageId']);
                unset($tmpdata['parentId']);
                $tmpdata['name'] = $data['name'];
                $tmpdata['parentId'] = isset($data['parentId'])?$data['parentId']:0;
                $data = $tmpdata;
            }
        }
        // 执行文件上传
        if (empty($tmpdata)) {
            if (!$storage->upload()) {
                return $this->error('文件上传失败：' . $storage->getError());
            }
        }
        $storageModel = new StorageModel();
        $data['userid'] = $this->userId;
        $data = $storageModel->add($data);
        return $this->successData($data);
    }
}
