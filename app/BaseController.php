<?php
declare (strict_types = 1);

namespace app;

use app\log\model\LoginsModel;
use thans\jwt\facade\JWTAuth;
use think\App;
use think\exception\HttpResponseException;
use think\exception\ValidateException;
use think\facade\View;
use think\Response;
use think\response\Json;
use thans\jwt\exception\TokenBlacklistException;
use thans\jwt\exception\TokenExpiredException;
use thans\jwt\exception\TokenInvalidException;

use diygw\AjaxResult;
use diygw\HttpStatus;
use think\Validate;

/**
 * 控制器基础类
 */
abstract class BaseController
{
    //是否初始化模型
    public $isAll = false;
    //是否初始化模型
    public $isModel = false;
    //判断是否全部不需要登录
    public $notNeedLoginAll = false;
    //判断不需要登录的方法
    public $notNeedLogin = [];

    public $userid;
    public $model;
    /**
     * Request实例
     * @var \think\Request
     */
    protected $request;

    /**
     * 应用实例
     * @var \think\App
     */
    protected $app;

    /**
     * 是否批量验证
     * @var bool
     */
    protected $batchValidate = false;

    /**
     * 控制器中间件
     * @var array
     */
    protected $middleware = [];

    public function getUserId(){

    }
    /**
     * 构造方法
     * @access public
     * @param  App  $app  应用对象
     */
    public function __construct(App $app)
    {
        $this->app     = $app;
        $this->request = $this->app->request;
        // 控制器初始化
        $this->initialize();
    }

    // 初始化
    protected function initialize()
    {
        //判断是否要获取用户MODEL
        if($this->isModel){
            $root = $this->request->rootUrl();
            $root = str_replace("/","",$root);
            $controller = str_replace('.', '\\',$this->request->controller());
            $modelClass = '\\app\\'.$root.'\\model\\' . $controller . 'Model';
            if(class_exists($modelClass)){
                $this->model = new $modelClass();
            }else{
                $modelClass = '\\app\\common\\model\\' . $controller . 'Model';
                $this->model = new $modelClass();
            }
        }
    }

    /**
     * 验证数据
     * @access protected
     * @param  array        $data     数据
     * @param  string|array $validate 验证器名或者验证规则数组
     * @param  array        $message  提示信息
     * @param  bool         $batch    是否批量验证
     * @return array|string|true
     * @throws ValidateException
     */
    protected function validate(array $data, $validate, array $message = [], bool $batch = false)
    {
        if (is_array($validate)) {
            $v = new Validate();
            $v->rule($validate);
        } else {
            if (strpos($validate, '.')) {
                // 支持场景
                [$validate, $scene] = explode('.', $validate);
            }
            $class = false !== strpos($validate, '\\') ? $validate : $this->app->parseClass('validate', $validate);
            $v     = new $class();
            if (!empty($scene)) {
                $v->scene($scene);
            }
        }

        $v->message($message);

        // 是否批量验证
        if ($batch || $this->batchValidate) {
            $v->batch(true);
        }

        return $v->failException(true)->check($data);
    }

    public function success( string $msg = 'success'): Json{
        return $this->result([],200,$msg);
    }

    /**
     * @notes 接口操作成功，返回信息
     * @param int $code
     * @param string $msg
     * @param array $data
     * @return Json
     */
    public function successData(array $data = [], string $msg = 'success'): Json
    {
        return self::result($data,200, $msg);
    }

    public function error( string $msg = 'fail'): Json{
        return $this->result([],500,$msg);
    }


    /**
     * @notes 接口操作失败，返回信息
     * @param string $msg
     * @param array $data
     * @param int $code
     */
    public function errorData(array $data = [], string $msg = 'fail'): Json
    {
        return self::result($data,500,  $msg);
    }

    /**
     * @notes 接口返回信息
     * @param int $code
     * @param string $msg
     * @param array $data
     * @param int $httpStatus
     * @return Json
     */
    public  function errorMsg( int $code, string $msg = 'OK'): Json
    {
        return self::result([],$code,  $msg);
    }

    /**
     * @notes 接口返回数据
     * @param $data
     * @return Json
     */
    public function data($data): Json
    {
        return json($data, 200);
    }



    /**
     * @notes 接口返回信息
     * @param int $code
     * @param string $msg
     * @param array $data
     * @param int $httpStatus
     * @return Json
     */
    public  function result( array $data = [], int $code, string $msg = 'OK',int $httpStatus = 200): Json
    {
        if(count($data)==0){
            $result = compact('code', 'msg');
        }else{
            $result = compact('code', 'msg', 'data');
        }
        return json($result, $httpStatus);
    }



    /**
     * @notes 抛出异常json
     * @param string $msg
     * @param array $data
     * @param int $code
     * @return Json
     */
    public function throw(int $code = 0,string $msg = 'fail', array $data = []): Json
    {
        $data = compact('code', 'msg', 'data');
        $response = Response::create($data, 'json', 200);
        throw new HttpResponseException($response);
    }


    /**
     * @notes 是否免登录验证
     * @return bool
     */
    public function isNotNeedLogin() : bool
    {
        //如果为真表示该类下面的所有方法都不需要登录
        if($this->notNeedLoginAll){
            return  true;
        }
        $notNeedLogin = $this->notNeedLogin;
        if (empty($notNeedLogin)) {
            return false;
        }
        $action = $this->request->action();

        if (!in_array(trim($action), $notNeedLogin)) {
            return false;
        }
        return true;
    }


    /**
     * 获取分页查询数据结果
     */
    public function list()
    {
        $pageData = $this->model->getList();
        return $this->successData($pageData);
    }


    /**
     * 提交验证数据
     */
    public function checkData(){
        $root = $this->request->rootUrl();
        $root = str_replace("/","",$root);
        $controller = str_replace('.', '\\',$this->request->controller());
        $validateClass = '\\app\\'.$root.'\\validate\\' . $controller . 'Validate';
        if(class_exists($validateClass)){
            $validate = new $validateClass();
            return $validate->checkData();
        }
        return true;
    }
    /**
     * 新增记录
     */
    public function add()
    {
        if($this->checkData()){
            $data = $this->request->param();
            if($this->model->add($data)){
                return $this->success('新增成功');
            }else{
                return $this->error('新增失败');
            }
        }
    }

    /**
     * 更新记录
     */
    public function update()
    {
        if($this->checkData()) {
            $data = $this->request->param();
            if ($this->model->edit($data)) {
                return $this->success('修改成功');
            } else {
                return $this->error('修改失败');
            }
        }
    }

    public function del(){
        $data = $this->request->param();
        $pageData = $this->model->del($data,false);
        if($pageData){
            return $this->success("删除成功");
        }else{
            return $this->error("删除失败");
        }
    }

    /**
     * 新增记录
     */
    public function get()
    {
        $data = $this->request->param();
        $data = $this->model->get($data);
        if($data){
            return $this->successData($data);
        }else{
            return $this->error('新增失败');
        }
    }

    /**
     * 获取所有数据结果 为了数据安全性  一般情况不给返回所有数据，如果需要返回，请设置isAll=true
     * @return Json
     */
    public function all(){
        if($this->isAll){
            $pageData = $this->model->getAllList();
            return $this->successData($pageData);
        }else{
            return $this->error('不允许返回所有数据');
        }
    }


    public function clear(){
        $this->error("为了安全，请重写清空方法");
    }

    /**
     * 输出模板
     * @param string $template
     * @param array $vars
     */
    public function fetch(string $template = '', array $vars = []){
        if(empty($template)){
            return View::fetch();
        }else{
            return View::fetch($template,$vars);
        }
    }


    /**
     * 输出值
     * @param $name
     * @param mixed|null $value
     */
    public function assign($name, $value)
    {
        View::assign($name,$value);
    }

}
