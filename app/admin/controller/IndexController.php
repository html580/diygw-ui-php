<?php
declare (strict_types = 1);

namespace app\admin\controller;

use app\BaseController;
use app\sys\model\UserModel;
use think\facade\Db;
use think\helper\Str;

class IndexController  extends BaseController
{
    public function index(){
        return $this->fetch();
    }

    public function getMenuAdmin(){
        $user = UserModel::where('user_id',$this->request->userId)->find()->toArray();
        $menus  = Db::table('sys_menu')
            ->alias('m')
            ->join('sys_role_menu r','m.menu_id = r.menu_id ')
            ->join('sys_role r1','r1.role_id = r.role_id ')
            ->whereIn('r.role_id',explode(",",$user['roleIds']))
            ->whereIn('m.menu_type',['M','C'])
            ->order("m.sort","asc")->select()->toArray();

        $datas = [];
        foreach ($menus as $item){
            foreach ($item as $key => $val) {
                $name = Str::camel($key);
                if ($name !== $key) {
                    $item[$name] = $val;
                    unset($item[$key]);
                }
            }
            $datas[] = $item;
        }
        return $this->successData($datas);
    }
}
