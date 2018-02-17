<?php

return [
    'hookList'=>[
    ],
    'hookInject'=>[
        's_manage_menu'=>[
            [
                'hook_name' => 's_manage_menu',
                'alias' => 'captcha',
                'files' => 'Huasituo\Ftp\Hook',
                'class' => 'FtpConfigHook',
                'fun' => 'getManageMenu',
                'description' => ''
            ]
        ],
        's_common_role_uri'=>[
            [
                'hook_name' => 's_common_role_uri',
                'alias' => 'captcha',
                'files' => 'Huasituo\Ftp\Hook',
                'class' => 'FtpConfigHook',
                'fun' => 'getCommonRoleUri',
                'description' => ''
            ]
        ]
    ]
];