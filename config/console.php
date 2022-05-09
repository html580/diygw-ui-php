<?php
// +----------------------------------------------------------------------
// | 控制台配置
// +----------------------------------------------------------------------
return [
    // 指令定义
    'commands' => [
        'diygw:table ' => 'app\command\DiygwTableCommand',
        'diygw:controller' => 'app\command\DiygwControllerCommand',
        'diygw:command ' => 'app\command\DiygwCommand',
        'diygw:model' => 'app\command\DiygwModelCommand',
        'diygw:validate' => 'app\command\DiygwValidateCommand',
    ],
];