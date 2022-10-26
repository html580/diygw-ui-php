<?php
// +----------------------------------------------------------------------
// | Diygw PHP
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2022 https://www.diygw.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: diygw <diygwcom@diygw.com>
// +----------------------------------------------------------------------

declare (strict_types = 1);

namespace app\command;


use think\console\Input;
use think\console\Output;
use think\facade\Db;
use think\helper\Str;

class DiygwApiCommand extends DiygwMakeCommand
{
    protected $type = "Controller";

    private $table = '';

    protected $columns = [];

    protected $notUpdateColumn = ['create_time', 'update_time', 'create_by', 'update_by', 'delete_time', 'id'];

    protected function configure()
    {
        parent::configure();
        // 指令配置
        $this->setName('diygw:api')
            ->setDescription('创建表相关Api等类');
    }


    protected function getStub(): string
    {
        return __DIR__ . DIRECTORY_SEPARATOR . 'stubs' . DIRECTORY_SEPARATOR . 'api_controller.stub';
    }

    protected function getNamespace(string $app): string
    {
        return parent::getNamespace($app) . '\\'.strtolower($this->type);
    }

    protected function getClassName(string $name): string
    {
        if (strpos($name, '\\') !== false) {
            return $name;
        }

        if (strpos($name, '@')) {
            [$app, $name] = explode('@', $name);
            if($this->type=='Model'){
                $name = ucfirst($app).ucfirst($name);
                $app = "common";
                $this->module = $app."_";
            }
        }

        $app = '';
        if (strpos($name, '/') !== false) {
            $name = str_replace('/', '\\', $name);
        }

        return $this->getNamespace($app) . '\\' . $name;
    }

    protected function getPathName(string $name): string
    {
        $name = substr($name, 4);

        return $this->app->getBasePath() . ltrim(str_replace('\\', '/', $name), '/') .ucfirst($this->type). '.php';

    }

    protected function getTable($name)
    {
        $table = '';

        if (strpos($name, '@')) {
            [$table, $c] = explode('@', $name);
        }
        return $table;
    }

    protected function getColumn($table)
    {
        $sth = Db::connect()->getPDOStatement(sprintf('select * from `%s` limit 1', $table));
        if ($sth === false) {
            return [];
        }
        $columns = [];
        for($i=0; $i < $sth->columnCount(); $i++) {
            $meta = $sth->getColumnMeta($i);
            $name = $meta['name'] ?? '';
            if (empty($name)) {
                throw new \Exception('获取数据库字段失败');
            }
            $native_type = $meta['native_type'] ?? '';
            $columns[$name] = array(
                'name' => $name,
                'native_type' => $native_type,
                'type' => in_array($native_type, ['VAR_STRING', 'BLOB', 'DATETIME']) ? 'STR' : 'INT',
            );
        }
        return $columns;

    }

    protected function buildClass(string $name)
    {
        $stub = file_get_contents($this->getStub());

        $namespace = trim(implode('\\', array_slice(explode('\\', $name), 0, -1)), '\\');

        $class = str_replace($namespace . '\\', '', $name);

        $postParamStr = '';
        $insertStr = '';
        foreach ($this->columns as $val) {
            if (in_array($val['name'], $this->notUpdateColumn)) {
                continue;
            }
            if ($val['type'] == 'INT') {
                $parse = 'd';
                $default = '0';
            } else {
                $parse = 's';
                $default = '\'\'';
            }
            $postParamStr .= sprintf('$%s = $this->request->post(\'%s/%s\', %s);%s', $val['name'], $val['name'], $parse, $default, "\n");
            $insertStr .= sprintf('\'%s\' => $post[\'%s\'] ?? %s,%s', $val['name'], $val['name'], $default, "\n\t\t\t");
        }
        $insertStr = rtrim($insertStr);


        return str_replace(['{%className%}','{%classNameLower%}','{%year%}','{%module%}', '{%actionSuffix%}', '{%namespace%}', '{%app_namespace%}', '{%tableName%}', '{%postParamStr%}', '{%insertStr%}'], [
            $class,
            Str::snake($class,"_"),
            date('Y'),
            $this->module,
            $this->app->config->get('route.action_suffix'),
            $namespace,
            $this->app->getNamespace(),
            $this->table,
            $postParamStr,
            $insertStr,
        ], $stub);
    }

    protected function execute(Input $input, Output $output)
    {
        $this->type = 'Controller';

        $name = trim($input->getArgument('name'));

        $this->table = $this->getTable($name);

        $this->columns = $this->getColumn($this->table);

        $classname = $this->getClassName($name);

        $pathname = $this->getPathName($classname);

        if (is_file($pathname)) {
            $output->writeln('<error>' . $this->type . ':' . $classname.ucfirst($this->type) . ' already exists!</error>');
            return false;
        }

        if (!is_dir(dirname($pathname))) {
            mkdir(dirname($pathname), 0755, true);
        }

        file_put_contents($pathname, $this->buildClass($classname));

        $output->writeln('<info>' . $this->type . ':' . $classname.ucfirst($this->type) . ' created successfully.</info>');
        return true;
    }
}
