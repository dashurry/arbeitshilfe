<?php 

return [
    'title' => 'Laravel انسٹالر',
    'next' => 'اگلا قدم',
    'back' => 'پچھلا',
    'finish' => 'انسٹال کریں',
    'forms' => [
        'errorTitle' => 'مندرجہ ذیل غلطیاں پیش کی گئیں:',
    ],
    'welcome' => [
        'templateTitle' => 'خوش آمدید',
        'title' => 'Laravel انسٹالر',
        'message' => 'آسان تنصیب اور سیٹ اپ مددگار.',
        'next' => 'ضروریات کی جانچ پڑتال کریں',
    ],
    'requirements' => [
        'templateTitle' => 'مرحلہ 1 | سرور کی ضروریات',
        'title' => 'سرور کی ضروریات',
        'next' => 'اجازتیں چیک کریں',
    ],
    'permissions' => [
        'templateTitle' => 'مرحلہ 2 | اجازت',
        'title' => 'اجازت',
        'next' => 'ماحول کو ترتیب دیں',
    ],
    'environment' => [
        'menu' => [
            'templateTitle' => 'مرحلہ 3 | ماحولیاتی ترتیبات',
            'title' => 'ماحولیاتی ترتیبات',
            'desc' => 'براہ کرم منتخب کریں کہ آپ ایپس <code> .env </ code> فائل کو کس طرح ترتیب دینا چاہتے ہیں.',
            'wizard-button' => 'فارم مددگار سیٹ اپ',
            'classic-button' => 'کلاسک ٹیکسٹ ایڈیٹر',
        ],
        'wizard' => [
            'templateTitle' => 'مرحلہ 3 | ماحولیات کی ترتیبات | گائیڈ مددگار',
            'title' => 'رہائی <کوڈ> .env </ code> مددگار',
            'tabs' => [
                'environment' => 'ماحولیات',
                'database' => 'ڈیٹا بیس',
                'application' => 'درخواست',
            ],
            'form' => [
                'name_required' => 'ماحول کا نام ضروری ہے.',
                'app_name_label' => 'اپلی کیشن نام',
                'app_name_placeholder' => 'اپلی کیشن نام',
                'app_environment_label' => 'اے پی پی ماحولیات',
                'app_environment_label_local' => 'مقامی',
                'app_environment_label_developement' => 'ترقی',
                'app_environment_label_qa' => 'ق',
                'app_environment_label_production' => 'پیداوار',
                'app_environment_label_other' => 'دیگر',
                'app_environment_placeholder_other' => 'اپنا ماحول درج کریں ...',
                'app_debug_label' => 'اپلی کیشن ڈیبگ',
                'app_debug_label_true' => 'سچ ہے',
                'app_debug_label_false' => 'غلط',
                'app_log_level_label' => 'ایپ لاگ لاگ سطح',
                'app_log_level_label_debug' => 'ڈیبگ',
                'app_log_level_label_info' => 'معلومات',
                'app_log_level_label_notice' => 'نوٹس',
                'app_log_level_label_warning' => 'انتباہ',
                'app_log_level_label_error' => 'غلطی',
                'app_log_level_label_critical' => 'اہم',
                'app_log_level_label_alert' => 'انتباہ',
                'app_log_level_label_emergency' => 'ایمرجنسی',
                'app_url_label' => 'اپلی کیشن Url',
                'app_url_placeholder' => 'اپلی کیشن Url',
                'db_connection_label' => 'ڈیٹا بیس کنکشن',
                'db_connection_label_mysql' => 'ایس ایس ایل',
                'db_connection_label_sqlite' => 'sqlite',
                'db_connection_label_pgsql' => 'pgsql',
                'db_connection_label_sqlsrv' => 'sqlsrv',
                'db_host_label' => 'ڈیٹا بیس میزبان',
                'db_host_placeholder' => 'ڈیٹا بیس میزبان',
                'db_port_label' => 'ڈیٹا بیس پورٹ',
                'db_port_placeholder' => 'ڈیٹا بیس پورٹ',
                'db_name_label' => 'ڈیٹا بیس کا نام',
                'db_name_placeholder' => 'ڈیٹا بیس کا نام',
                'db_username_label' => 'ڈیٹا بیس صارف کا نام',
                'db_username_placeholder' => 'ڈیٹا بیس صارف کا نام',
                'db_password_label' => 'ڈیٹا بیس پاس ورڈ',
                'db_password_placeholder' => 'ڈیٹا بیس پاس ورڈ',
                'app_tabs' => [
                    'more_info' => 'مزید معلومات',
                    'broadcasting_title' => 'نشریات، کیشنگ، اجلاس، اور AMP؛ قطار',
                    'broadcasting_label' => 'ڈرائیور نشر کریں',
                    'broadcasting_placeholder' => 'ڈرائیور نشر کریں',
                    'cache_label' => 'کیش ڈرائیور',
                    'cache_placeholder' => 'کیش ڈرائیور',
                    'session_label' => 'سیشن ڈرائیور',
                    'session_placeholder' => 'سیشن ڈرائیور',
                    'queue_label' => 'قطار ڈرائیور',
                    'queue_placeholder' => 'قطار ڈرائیور',
                    'redis_label' => 'ریڈس ڈرائیور',
                    'redis_host' => 'ریڈس میزبان',
                    'redis_password' => 'Redis پاس ورڈ',
                    'redis_port' => 'ریڈس پور',
                    'mail_label' => 'میل',
                    'mail_driver_label' => 'میل ڈرائیور',
                    'mail_driver_placeholder' => 'میل ڈرائیور',
                    'mail_host_label' => 'میل میزبان',
                    'mail_host_placeholder' => 'میل میزبان',
                    'mail_port_label' => 'میل پورٹ',
                    'mail_port_placeholder' => 'میل پورٹ',
                    'mail_username_label' => 'صارف کا نام',
                    'mail_username_placeholder' => 'صارف کا نام',
                    'mail_password_label' => 'ای میل پاس ورڈ',
                    'mail_password_placeholder' => 'ای میل پاس ورڈ',
                    'mail_encryption_label' => 'میل خفیہ کاری',
                    'mail_encryption_placeholder' => 'میل خفیہ کاری',
                    'pusher_label' => 'پاؤڈر',
                    'pusher_app_id_label' => 'Pusher ایپ کی شناخت',
                    'pusher_app_id_palceholder' => 'Pusher ایپ کی شناخت',
                    'pusher_app_key_label' => 'Pusher اپلی کیشن کلید',
                    'pusher_app_key_palceholder' => 'Pusher اپلی کیشن کلید',
                    'pusher_app_secret_label' => 'Pusher اپلی کیشن خفیہ',
                    'pusher_app_secret_palceholder' => 'Pusher اپلی کیشن خفیہ',
                ],
                'buttons' => [
                    'setup_database' => 'سیٹ اپ ڈیٹا بیس',
                    'setup_application' => 'سیٹ اپ اپلی کیشن',
                    'install' => 'انسٹال کریں',
                ],
            ],
        ],
        'classic' => [
            'templateTitle' => 'مرحلہ 3 | ماحولیات کی ترتیبات | کلاسک ایڈیٹر',
            'title' => 'کلاسیکی ماحولیاتی ایڈیٹر',
            'save' => 'محفوظ کریں .env',
            'back' => 'فارم مددگار استعمال کریں',
            'install' => 'انسٹال کریں',
        ],
        'success' => 'آپ .env فائل کی ترتیبات محفوظ کردیے گئے ہیں.',
        'errors' => '.nv فائل کو بچانے کے قابل نہیں، براہ کرم اسے دستی طور پر تشکیل دیں.',
    ],
    'install' => 'انسٹال کریں',
    'installed' => [
        'success_log_message' => 'لیورییل انسٹالر نے کامیابی سے انسٹال کیا',
    ],
    'final' => [
        'title' => 'تنصیب ختم ہوگئی',
        'templateTitle' => 'تنصیب ختم ہوگئی',
        'finished' => 'ایپلی کیشنز کو کامیابی سے انسٹال کیا گیا ہے.',
        'migration' => 'منتقلی اور بیج کنسول پیداوار:',
        'console' => 'درخواست کنسول آؤٹ پٹ:',
        'log' => 'تنصیب لاگ ان اندراج:',
        'env' => 'حتمی .nv فائل:',
        'exit' => 'باہر نکلنے کے لئے یہاں کلک کریں',
    ],
    'updater' => [
        'title' => 'Laravel Updater',
        'welcome' => [
            'title' => 'Updater میں خوش آمدید',
            'message' => 'اپ ڈیٹ جادوگر میں خوش آمدید.',
        ],
        'overview' => [
            'title' => 'جائزہ',
            'message' => 'وہاں 1 اپ ڈیٹ ہے. | وہاں ہیں: نمبر اپ ڈیٹس.',
            'install_updates' => 'اپ ڈیٹس انسٹال کریں',
        ],
        'final' => [
            'title' => 'ختم',
            'finished' => 'درخواست کے ڈیٹا بیس کو کامیابی سے اپ ڈیٹ کیا گیا ہے.',
            'exit' => 'باہر نکلنے کے لئے یہاں کلک کریں',
        ],
        'log' => [
            'success_message' => 'Laravel انسٹالر نے کامیابی سے اپ ڈیٹ کیا',
        ],
    ],
];