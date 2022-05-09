<?php
declare (strict_types = 1);

namespace app\common\middleware;

use thans\jwt\exception\TokenBlacklistException;
use thans\jwt\exception\TokenExpiredException;
use thans\jwt\exception\TokenInvalidException;
use thans\jwt\facade\JWTAuth;


class AuthTokenMiddleware
{

    /**
     * 处理请求
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
        $root = $request->rootUrl();
        $root = str_replace("/","",$root);
        //获取指向的类
        $controller = str_replace('.', '\\', $request->controller());
        if(empty($root)){
            $controller = '\\app\\controller\\' . $controller . 'Controller';
        }else{
            $controller = '\\app\\'.$root.'\\controller\\' . $controller . 'Controller';
        }

        $controllerClass = invoke($controller);
        //不登录访问，无需权限验证
        if ($controllerClass->isNotNeedLogin()) {
            return $next($request);
        }
        $request->userId=1;
//        try {
//
//            $payload = JWTAuth::auth(); //可验证token, 并获取token中的payload部分
//            $request->userId = $payload['uid']->getValue();
//        } catch (\Exception $e) {
//            $msg = '登录过期';
//            if ($e instanceof TokenExpiredException) {
//                $msg = '登录过期';
//            }
//            if ($e instanceof TokenBlacklistException) {
//                $msg = '登录被加入黑名单';
//            }
//            if ($e instanceof TokenInvalidException) {
//                $msg = '登录不合法';
//            }
//            return json(['code' => 401, 'msg' => $msg]);
//        }

        return $next($request);
    }
}
