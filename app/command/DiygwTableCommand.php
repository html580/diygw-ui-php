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

class DiygwTableCommand extends DiygwMakeCommand
{
    protected $type = "Model";

    protected function configure()
    {
        parent::configure();
        // 指令配置
        $this->setName('diygw:table')
            ->setDescription('创建表相关Model、Controller等类');
    }


    protected function getStub(): string
    {
        return __DIR__ . DIRECTORY_SEPARATOR . 'stubs' . DIRECTORY_SEPARATOR . strtolower($this->type).'.stub';
    }

    protected function getNamespace(string $app): string
    {
        return parent::getNamespace($app) . '\\'.strtolower($this->type);
    }


    protected function execute(Input $input, Output $output)
    {
        $types = ['Controller','Model'];
        foreach ($types as $type){
            $this->type = $type;

            $name = trim($input->getArgument('name'));

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
        }

    }
}
