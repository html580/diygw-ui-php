<?php

return [
    // 默认磁盘
    'default' => env('filesystem.driver', 'local'),
    // 磁盘列表
    'disks'   => [
        'local'  => [
            'type' => 'local',
            'root' => app()->getRootPath() . 'public/storage',
            'domain' => ''
        ],
        'public' => [
            // 磁盘类型
            'type'       => 'local',
            // 磁盘路径
            'root'       => app()->getRootPath() . 'public/storage',
            // 磁盘路径对应的外部URL路径
            'url'        => '/storage',
            // 可见性
            'visibility' => 'public',
        ],
        /**
         * 上传设置
         */
        'upload' => [
            'image' => 'fileSize:' . 1024 * 1024 * 5 . '|fileExt:jpg,png,gif,jpeg',
            'video' => 'fileSize:' . 1024 * 1024 * 500 . '|fileExt:rm,rmvb,wmv,avi,mpg,mpeg,mp4',
            'mp3' => 'fileSize:' . 1024 * 1024 * 500 . '|fileExt:mp3,wma,wav,amr',
            'file' => 'fileSize:' . 1024 * 1024 * 500 . '|fileExt:doc,docx,xls,xlsx,ppt,pptx,txt,pdf,zip,rar'
        ],
        // 更多的磁盘配置信息
        'qiniu' => [
            'type'       => 'qiniu',
            'access_key' => '',
            'secret_key' => '',
            'bucket'     => '',
            'protocol'   => '',
            'domain'     => '',
        ],
        'oss' => [
            'type'   => 'oss',
            'prefix' => '',
            'access_key' => '',
            'secret_key' => '',
            'end_point'  => '', // ssl：https://iidestiny.com
            'bucket'     => '',
            'is_cname'   =>  false
        ],
        // 腾讯云配置
        'qcloud' => [
            'type'        => 'qcloud',
            'region'      => '',
            'credentials' => [
                'appId'      => '', // 域名中数字部分
                'secretId'   => '',
                'secretKey'  => '',
            ],
            'bucket'          => '',
            'timeout'         => 60,
            'connect_timeout' => 60,
            'cdn'             => '',
            'scheme'          => 'https',
            'read_from_cdn'   => false,
        ]
    ],
];
