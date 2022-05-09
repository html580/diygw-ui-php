<?php
declare (strict_types = 1);

namespace app;

use diygw\db\DiygwQuery;
use think\Service;

/**
 * 应用服务类
 */
class AppService extends Service
{
    public function register()
    {
        // 服务注册
        $this->registerQuery();
    }

    public function boot()
    {
        // 服务启动
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
