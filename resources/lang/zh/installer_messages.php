<?php 

return [
    'title' => 'Laravel安装程序',
    'next' => '下一步',
    'finish' => '安装',
    'welcome' => [
        'title' => '欢迎来到Laravel安装程序',
        'message' => '欢迎来到安装向导.',
        'templateTitle' => '欢迎',
        'next' => '检查要求',
    ],
    'requirements' => [
        'title' => '环境要求',
        'templateTitle' => '第1步|服务器要求',
        'next' => '检查权限',
    ],
    'permissions' => [
        'title' => '权限',
        'templateTitle' => '第2步|权限',
        'next' => '配置环境',
    ],
    'environment' => [
        'title' => '环境设置',
        'save' => '保存 .env',
        'success' => '.env 文件保存成功.',
        'errors' => '无法保存 .env 文件, 请手动创建它.',
        'menu' => [
            'templateTitle' => '第3步|环境设置',
            'title' => '环境设置',
            'desc' => '请选择您要如何配置应用<code> .env </ code>文件的方式。',
            'wizard-button' => '表单向导设置',
            'classic-button' => '经典文本编辑器',
        ],
        'wizard' => [
            'templateTitle' => '第3步|环境设置|引导巫师',
            'title' => '引导<code> .env </ code>向导',
            'tabs' => [
                'environment' => '环境',
                'database' => '数据库',
                'application' => '应用',
            ],
            'form' => [
                'name_required' => '需要环境名称。',
                'app_name_label' => '应用名称',
                'app_name_placeholder' => '应用名称',
                'app_environment_label' => '应用环境',
                'app_environment_label_local' => '本地',
                'app_environment_label_developement' => '发展',
                'app_environment_label_qa' => 'QA',
                'app_environment_label_production' => '生产',
                'app_environment_label_other' => '其他',
                'app_environment_placeholder_other' => '进入你的环境......',
                'app_debug_label' => '应用调试',
                'app_debug_label_true' => '真正',
                'app_debug_label_false' => '假',
                'app_log_level_label' => '应用日志级别',
                'app_log_level_label_debug' => '调试',
                'app_log_level_label_info' => '信息',
                'app_log_level_label_notice' => '注意',
                'app_log_level_label_warning' => '警告',
                'app_log_level_label_error' => '错误',
                'app_log_level_label_critical' => '危急',
                'app_log_level_label_alert' => '警报',
                'app_log_level_label_emergency' => '急',
                'app_url_label' => 'App Url',
                'app_url_placeholder' => 'App Url',
                'db_connection_label' => '数据库连接',
                'db_connection_label_mysql' => 'MySQL的',
                'db_connection_label_sqlite' => '源码',
                'db_connection_label_pgsql' => 'pgSQL的',
                'db_connection_label_sqlsrv' => 'SQLSRV',
                'db_host_label' => '数据库主机',
                'db_host_placeholder' => '数据库主机',
                'db_port_label' => '数据库端口',
                'db_port_placeholder' => '数据库端口',
                'db_name_label' => '数据库名称',
                'db_name_placeholder' => '数据库名称',
                'db_username_label' => '数据库用户名',
                'db_username_placeholder' => '数据库用户名',
                'db_password_label' => '数据库密码',
                'db_password_placeholder' => '数据库密码',
                'app_tabs' => [
                    'more_info' => '更多信息',
                    'broadcasting_title' => '广播，缓存，会话和＆amp;队列',
                    'broadcasting_label' => '广播司机',
                    'broadcasting_placeholder' => '广播司机',
                    'cache_label' => '缓存驱动程序',
                    'cache_placeholder' => '缓存驱动程序',
                    'session_label' => '会话驱动程序',
                    'session_placeholder' => '会话驱动程序',
                    'queue_label' => '队列驱动程序',
                    'queue_placeholder' => '队列驱动程序',
                    'redis_label' => 'Redis驱动程序',
                    'redis_host' => 'Redis主持人',
                    'redis_password' => 'Redis密码',
                    'redis_port' => '雷迪斯港',
                    'mail_label' => '邮件',
                    'mail_driver_label' => '邮件驱动程序',
                    'mail_driver_placeholder' => '邮件驱动程序',
                    'mail_host_label' => '邮件主机',
                    'mail_host_placeholder' => '邮件主机',
                    'mail_port_label' => '邮件端口',
                    'mail_port_placeholder' => '邮件端口',
                    'mail_username_label' => '邮件用户名',
                    'mail_username_placeholder' => '邮件用户名',
                    'mail_password_label' => '邮件密码',
                    'mail_password_placeholder' => '邮件密码',
                    'mail_encryption_label' => '邮件加密',
                    'mail_encryption_placeholder' => '邮件加密',
                    'pusher_label' => '推',
                    'pusher_app_id_label' => 'Pusher App Id',
                    'pusher_app_id_palceholder' => 'Pusher App Id',
                    'pusher_app_key_label' => '推送应用程序密钥',
                    'pusher_app_key_palceholder' => '推送应用程序密钥',
                    'pusher_app_secret_label' => 'Pusher App Secret',
                    'pusher_app_secret_palceholder' => 'Pusher App Secret',
                ],
                'buttons' => [
                    'setup_database' => '设置数据库',
                    'setup_application' => '设置应用程序',
                    'install' => '安装',
                ],
            ],
        ],
        'classic' => [
            'templateTitle' => '第3步|环境设置|经典编辑',
            'title' => '经典环境编辑器',
            'save' => '保存.env',
            'back' => '使用表单向导',
            'install' => '安装',
        ],
    ],
    'final' => [
        'title' => '完成',
        'finished' => '应用已成功安装.',
        'exit' => '点击退出',
        'templateTitle' => '安装完成',
        'migration' => '迁移和种子控制台输出：',
        'console' => '应用控制台输出：',
        'log' => '安装日志条目：',
        'env' => '最终.env文件：',
    ],
    'back' => '以前',
    'forms' => [
        'errorTitle' => '发生以下错误：',
    ],
    'install' => '安装',
    'installed' => [
        'success_log_message' => 'Laravel Installer成功安装',
    ],
    'updater' => [
        'title' => 'Laravel更新程序',
        'welcome' => [
            'title' => '欢迎来到更新程序',
            'message' => '欢迎使用更新向导。',
        ],
        'overview' => [
            'title' => '概观',
            'message' => '有1个更新。|有：数字更新。',
            'install_updates' => '安装更新',
        ],
        'final' => [
            'title' => '成品',
            'finished' => '应用程序的数据库已成功更新。',
            'exit' => '点击这里退出',
        ],
        'log' => [
            'success_message' => 'Laravel Installer成功更新',
        ],
    ],
];