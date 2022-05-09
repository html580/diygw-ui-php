<?php
declare (strict_types = 1);

namespace app\Common\service;

use diygw\db\DiygwQuery;

class DiygwService extends \think\Service
{
    /**
     * 注册服务
     *
     * @return mixed
     */
    public function register()
    {
        $this->registerQuery();
    }

    /**
     * 执行服务
     *
     * @return mixed
     */
    public function boot()
    {
        //
    }


    /**
     * register query
     *
     * @time 2020年02月20日
     * @return void
     */
    protected function registerQuery(): void
    {
        $connections = $this->app->config->get('database.connections');

        // 支持多数据库配置注入 Query
        foreach ($connections as &$connection) {
            $connection['query'] = DiygwQuery::class;
        }

        $this->app->config->set([
            'connections' => $connections
        ], 'database');
    }

}
