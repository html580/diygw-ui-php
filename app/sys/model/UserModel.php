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

    /**
     *
     * @param $data
     * @param string $field
     * @return bool
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\db\exception\DataNotFoundException
     */
    public function edit(&$data)
    {
        try {
            $this->startTrans();
            $pk = $this->pk;
            $id = $data[Str::camel($pk)];

            if(!empty($data['password'])){
                if(isset($data['newpassword'])){
                    if(empty($data['newpassword'])){
                        $this->error ="新密码不能为空";
                        return false;
                    }
                    $model = new UserModel();
                    $user = $model->withoutGlobalScope()->where('user_id',$id)->find();
                    if(empty($user)|| ($user && md5($data['password'].$user->salt) != $user->password)){
                        $this->error ="旧密码输入有误";
                        return false;
                    }
                    $salt =  Str::random(6);
                    $data['salt'] = $salt;
                    $data['password'] = md5($data['newpassword'].$salt);

                }else{
                    $salt =  Str::random(6);
                    $data['salt'] = $salt;
                    $data['password'] = md5($data['password'].$salt);
                }
            }else{
                unset($data['password']);
            }

            if ($this->beforeEdit($data) && static::update($this->filterData($data), [$pk => $id])) {
                $this->updateChildren($id, $data);
                $this->afterEdit($data);
                $this->commit();
                return $data;
            }
        }catch (\Exception $e) {
            $this->error = $e->getMessage();
            $this->rollback();
            return false;
        }
        return false;
    }
}
