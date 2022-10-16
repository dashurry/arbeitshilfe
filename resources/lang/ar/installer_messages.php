<?php 

return [
    'title' => 'لارافيل المثبت',
    'next' => 'الخطوة التالية',
    'back' => 'سابق',
    'finish' => 'التثبت',
    'forms' => [
        'errorTitle' => 'وقعت الأخطاء التالية:',
    ],
    'welcome' => [
        'templateTitle' => 'أهلا بك',
        'title' => 'لارافيل المثبت',
        'message' => 'سهل التثبيت والإعداد معالج.',
        'next' => 'تحقق المتطلبات',
    ],
    'requirements' => [
        'templateTitle' => 'الخطوة 1 | متطلبات الخادم',
        'title' => 'متطلبات الخادم',
        'next' => 'تحقق أذونات',
    ],
    'permissions' => [
        'templateTitle' => 'الخطوة 2 | أذونات',
        'title' => 'أذونات',
        'next' => 'تكوين البيئة',
    ],
    'environment' => [
        'menu' => [
            'templateTitle' => 'الخطوة 3 | إعدادات البيئة',
            'title' => 'إعدادات البيئة',
            'desc' => 'يرجى تحديد الطريقة التي تريد تكوين ملف التطبيقات <code> .env </code> بها.',
            'wizard-button' => 'إعداد معالج النماذج',
            'classic-button' => 'محرر النص الكلاسيكي',
        ],
        'wizard' => [
            'templateTitle' => 'الخطوة 3 | إعدادات البيئة | معالج الموجهة',
            'title' => 'دليل <code> .env </code>',
            'tabs' => [
                'environment' => 'بيئة',
                'database' => 'قاعدة البيانات',
                'application' => 'الوضعية',
            ],
            'form' => [
                'name_required' => 'اسم بيئة مطلوب.',
                'app_name_label' => 'اسم التطبيق',
                'app_name_placeholder' => 'اسم التطبيق',
                'app_environment_label' => 'بيئة التطبيق',
                'app_environment_label_local' => 'محلي',
                'app_environment_label_developement' => 'تطوير',
                'app_environment_label_qa' => 'سؤال وجواب',
                'app_environment_label_production' => 'إنتاج',
                'app_environment_label_other' => 'آخر',
                'app_environment_placeholder_other' => 'أدخل بيئتك ...',
                'app_debug_label' => 'تصحيح التطبيق',
                'app_debug_label_true' => 'صحيح',
                'app_debug_label_false' => 'خاطئة',
                'app_log_level_label' => 'مستوى سجل التطبيق',
                'app_log_level_label_debug' => 'التصحيح',
                'app_log_level_label_info' => 'معلومات',
                'app_log_level_label_notice' => 'تنويه',
                'app_log_level_label_warning' => 'تحذير',
                'app_log_level_label_error' => 'خطأ',
                'app_log_level_label_critical' => 'حرج',
                'app_log_level_label_alert' => 'محزر',
                'app_log_level_label_emergency' => 'حالة طوارئ',
                'app_url_label' => 'التطبيق Url',
                'app_url_placeholder' => 'التطبيق Url',
                'db_connection_label' => 'اتصال قاعدة البيانات',
                'db_connection_label_mysql' => 'ك',
                'db_connection_label_sqlite' => 'سكليتي',
                'db_connection_label_pgsql' => 'pgsql',
                'db_connection_label_sqlsrv' => 'sqlsrv',
                'db_host_label' => 'قاعدة بيانات المضيف',
                'db_host_placeholder' => 'قاعدة بيانات المضيف',
                'db_port_label' => 'ميناء قاعدة البيانات',
                'db_port_placeholder' => 'ميناء قاعدة البيانات',
                'db_name_label' => 'اسم قاعدة البيانات',
                'db_name_placeholder' => 'اسم قاعدة البيانات',
                'db_username_label' => 'اسم مستخدم قاعدة البيانات',
                'db_username_placeholder' => 'اسم مستخدم قاعدة البيانات',
                'db_password_label' => 'كلمة مرور قاعدة البيانات',
                'db_password_placeholder' => 'كلمة مرور قاعدة البيانات',
                'app_tabs' => [
                    'more_info' => 'مزيد من المعلومات',
                    'broadcasting_title' => 'البث ، التخزين المؤقت ، الجلسة ، & amp؛ طابور',
                    'broadcasting_label' => 'سائق البث',
                    'broadcasting_placeholder' => 'سائق البث',
                    'cache_label' => 'سائق الكاش',
                    'cache_placeholder' => 'سائق الكاش',
                    'session_label' => 'سائق الدورة',
                    'session_placeholder' => 'سائق الدورة',
                    'queue_label' => 'سائق قائمة الانتظار',
                    'queue_placeholder' => 'سائق قائمة الانتظار',
                    'redis_label' => 'سائق Redis',
                    'redis_host' => 'Redis Host',
                    'redis_password' => 'كلمة المرور Redis',
                    'redis_port' => 'ميناء Redis',
                    'mail_label' => 'بريد',
                    'mail_driver_label' => 'سائق البريد',
                    'mail_driver_placeholder' => 'سائق البريد',
                    'mail_host_label' => 'مضيف البريد',
                    'mail_host_placeholder' => 'مضيف البريد',
                    'mail_port_label' => 'ميناء البريد',
                    'mail_port_placeholder' => 'ميناء البريد',
                    'mail_username_label' => 'البريد اسم المستخدم',
                    'mail_username_placeholder' => 'البريد اسم المستخدم',
                    'mail_password_label' => 'بريد كلمة المرور',
                    'mail_password_placeholder' => 'بريد كلمة المرور',
                    'mail_encryption_label' => 'تشفير البريد',
                    'mail_encryption_placeholder' => 'تشفير البريد',
                    'pusher_label' => 'انتهازي',
                    'pusher_app_id_label' => 'معرف التطبيق انتهازي',
                    'pusher_app_id_palceholder' => 'معرف التطبيق انتهازي',
                    'pusher_app_key_label' => 'تاجر مخدرات مفتاح التطبيق',
                    'pusher_app_key_palceholder' => 'تاجر مخدرات مفتاح التطبيق',
                    'pusher_app_secret_label' => 'انتهازي سر التطبيق',
                    'pusher_app_secret_palceholder' => 'انتهازي سر التطبيق',
                ],
                'buttons' => [
                    'setup_database' => 'إعداد قاعدة البيانات',
                    'setup_application' => 'تطبيق الإعداد',
                    'install' => 'التثبت',
                ],
            ],
        ],
        'classic' => [
            'templateTitle' => 'الخطوة 3 | إعدادات البيئة | محرر كلاسيكي',
            'title' => 'محرر البيئة الكلاسيكية',
            'save' => 'حفظ .env',
            'back' => 'استخدم معالج النماذج',
            'install' => 'التثبت',
        ],
        'success' => 'تم حفظ إعدادات ملف .env الخاص بك.',
        'errors' => 'غير قادر على حفظ ملف .env ، يرجى إنشائه يدويًا.',
    ],
    'install' => 'التثبت',
    'installed' => [
        'success_log_message' => 'تم تثبيت Laravel Installer بنجاح على',
    ],
    'final' => [
        'title' => 'الانتهاء من التثبيت',
        'templateTitle' => 'الانتهاء من التثبيت',
        'finished' => 'تم تثبيت التطبيق بنجاح.',
        'migration' => 'إخراج وحدة التحكم في الترحيل والبذور:',
        'console' => 'إخراج وحدة التحكم في التطبيق:',
        'log' => 'إدخال سجل التثبيت:',
        'env' => 'ملف .env النهائي:',
        'exit' => 'انقر هنا للخروج',
    ],
    'updater' => [
        'title' => 'محدث لارافيل',
        'welcome' => [
            'title' => 'مرحبا بكم في المحدث',
            'message' => 'مرحبًا بك في معالج التحديث.',
        ],
        'overview' => [
            'title' => 'نظرة عامة',
            'message' => 'يوجد تحديث 1. هناك: تحديثات الأرقام.',
            'install_updates' => 'تثبيت التحديثات',
        ],
        'final' => [
            'title' => 'تم الانتهاء من',
            'finished' => 'تم تحديث قاعدة بيانات التطبيق بنجاح.',
            'exit' => 'انقر هنا للخروج',
        ],
        'log' => [
            'success_message' => 'تم تحديث برنامج Laravel Installer بنجاح',
        ],
    ],
];