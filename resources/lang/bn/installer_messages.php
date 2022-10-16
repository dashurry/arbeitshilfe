<?php 

return [
    'title' => 'Laravel ইনস্টলার',
    'next' => 'পরবর্তী পর্ব',
    'back' => 'আগে',
    'finish' => 'ইনস্টল করুন',
    'forms' => [
        'errorTitle' => 'নিম্নলিখিত ত্রুটি ঘটেছে:',
    ],
    'welcome' => [
        'templateTitle' => 'স্বাগত',
        'title' => 'Laravel ইনস্টলার',
        'message' => 'সহজ ইনস্টলেশন এবং সেটআপ উইজার্ড।',
        'next' => 'প্রয়োজনীয়তা পরীক্ষা করুন',
    ],
    'requirements' => [
        'templateTitle' => 'ধাপ 1 | সার্ভার আবশ্যকতা',
        'title' => 'সার্ভার আবশ্যকতা',
        'next' => 'অনুমতি পরীক্ষা করুন',
    ],
    'permissions' => [
        'templateTitle' => 'ধাপ 2 | অনুমতিসমূহ',
        'title' => 'অনুমতিসমূহ',
        'next' => 'পরিবেশ কনফিগার করুন',
    ],
    'environment' => [
        'menu' => [
            'templateTitle' => 'ধাপ 3 | পরিবেশ সেটিংস',
            'title' => 'পরিবেশ সেটিংস',
            'desc' => 'আপনি <code> .env </ code> ফাইলটি কীভাবে কনফিগার করতে চান তা নির্বাচন করুন।',
            'wizard-button' => 'ফরম উইজার্ড সেটআপ',
            'classic-button' => 'ক্লাসিক টেক্সট সম্পাদক',
        ],
        'wizard' => [
            'templateTitle' => 'ধাপ 3 | পরিবেশ সেটিংস | নির্দেশিত উইজার্ড',
            'title' => 'নির্দেশিত <কোড> .env </ code> উইজার্ড',
            'tabs' => [
                'environment' => 'পরিবেশ',
                'database' => 'ডেটাবেস',
                'application' => 'আবেদন',
            ],
            'form' => [
                'name_required' => 'একটি পরিবেশ নাম প্রয়োজন।',
                'app_name_label' => 'অ্যাপ্লিকেশন নাম',
                'app_name_placeholder' => 'অ্যাপ্লিকেশন নাম',
                'app_environment_label' => 'অ্যাপ্লিকেশন পরিবেশ',
                'app_environment_label_local' => 'স্থানীয়',
                'app_environment_label_developement' => 'উন্নয়ন',
                'app_environment_label_qa' => 'QA',
                'app_environment_label_production' => 'উত্পাদনের',
                'app_environment_label_other' => 'অন্যান্য',
                'app_environment_placeholder_other' => 'আপনার পরিবেশ লিখুন ...',
                'app_debug_label' => 'অ্যাপ ডিবাগ',
                'app_debug_label_true' => 'সত্য',
                'app_debug_label_false' => 'মিথ্যা',
                'app_log_level_label' => 'অ্যাপ্লিকেশন লগ স্তর',
                'app_log_level_label_debug' => 'ডেবাগ্ করা',
                'app_log_level_label_info' => 'তথ্য',
                'app_log_level_label_notice' => 'বিজ্ঞপ্তি',
                'app_log_level_label_warning' => 'সাবধানবাণী',
                'app_log_level_label_error' => 'এরর',
                'app_log_level_label_critical' => 'সংকটপূর্ণ',
                'app_log_level_label_alert' => 'সতর্ক',
                'app_log_level_label_emergency' => 'জরুরি অবস্থা',
                'app_url_label' => 'অ্যাপ ইউআরএল',
                'app_url_placeholder' => 'অ্যাপ ইউআরএল',
                'db_connection_label' => 'ডাটাবেস সংযোগ',
                'db_connection_label_mysql' => 'মাইএসকিউএল',
                'db_connection_label_sqlite' => 'SQLite',
                'db_connection_label_pgsql' => 'pgsql',
                'db_connection_label_sqlsrv' => 'sqlsrv',
                'db_host_label' => 'ডাটাবেস হোস্ট',
                'db_host_placeholder' => 'ডাটাবেস হোস্ট',
                'db_port_label' => 'ডাটাবেস পোর্ট',
                'db_port_placeholder' => 'ডাটাবেস পোর্ট',
                'db_name_label' => 'ডাটাবেস নাম',
                'db_name_placeholder' => 'ডাটাবেস নাম',
                'db_username_label' => 'ডাটাবেস ব্যবহারকারী নাম',
                'db_username_placeholder' => 'ডাটাবেস ব্যবহারকারী নাম',
                'db_password_label' => 'ডাটাবেস পাসওয়ার্ড',
                'db_password_placeholder' => 'ডাটাবেস পাসওয়ার্ড',
                'app_tabs' => [
                    'more_info' => 'অধিক তথ্য',
                    'broadcasting_title' => 'সম্প্রচার, ক্যাচিং, সেশন, & amp; কিউ',
                    'broadcasting_label' => 'ব্রডকাস্ট ড্রাইভার',
                    'broadcasting_placeholder' => 'ব্রডকাস্ট ড্রাইভার',
                    'cache_label' => 'ক্যাশ ড্রাইভার',
                    'cache_placeholder' => 'ক্যাশ ড্রাইভার',
                    'session_label' => 'সেশন ড্রাইভার',
                    'session_placeholder' => 'সেশন ড্রাইভার',
                    'queue_label' => 'সারি ড্রাইভার',
                    'queue_placeholder' => 'সারি ড্রাইভার',
                    'redis_label' => 'Redis ড্রাইভার',
                    'redis_host' => 'Redis হোস্ট',
                    'redis_password' => 'Redis পাসওয়ার্ড',
                    'redis_port' => 'Redis পোর্ট',
                    'mail_label' => 'মেল',
                    'mail_driver_label' => 'মেইল ড্রাইভার',
                    'mail_driver_placeholder' => 'মেইল ড্রাইভার',
                    'mail_host_label' => 'মেইল হোস্ট',
                    'mail_host_placeholder' => 'মেইল হোস্ট',
                    'mail_port_label' => 'মেইল পোর্ট',
                    'mail_port_placeholder' => 'মেইল পোর্ট',
                    'mail_username_label' => 'মেইল ব্যবহারকারী নাম',
                    'mail_username_placeholder' => 'মেইল ব্যবহারকারী নাম',
                    'mail_password_label' => 'মেইল পাসওয়ার্ড',
                    'mail_password_placeholder' => 'মেইল পাসওয়ার্ড',
                    'mail_encryption_label' => 'মেইল এনক্রিপশন',
                    'mail_encryption_placeholder' => 'মেইল এনক্রিপশন',
                    'pusher_label' => 'বিমানপোত',
                    'pusher_app_id_label' => 'পেষের অ্যাপ্লিকেশন আইডি',
                    'pusher_app_id_palceholder' => 'পেষের অ্যাপ্লিকেশন আইডি',
                    'pusher_app_key_label' => 'পেষণকারী অ্যাপ্লিকেশন কী',
                    'pusher_app_key_palceholder' => 'পেষণকারী অ্যাপ্লিকেশন কী',
                    'pusher_app_secret_label' => 'পেষের অ্যাপ্লিকেশন গোপন',
                    'pusher_app_secret_palceholder' => 'পেষের অ্যাপ্লিকেশন গোপন',
                ],
                'buttons' => [
                    'setup_database' => 'সেটআপ ডাটাবেস',
                    'setup_application' => 'সেটআপ অ্যাপ্লিকেশন',
                    'install' => 'ইনস্টল করুন',
                ],
            ],
        ],
        'classic' => [
            'templateTitle' => 'ধাপ 3 | পরিবেশ সেটিংস | ক্লাসিক সম্পাদক',
            'title' => 'ক্লাসিক পরিবেশ সম্পাদক',
            'save' => '.Env সংরক্ষণ করুন',
            'back' => 'ফর্ম উইজার্ড ব্যবহার করুন',
            'install' => 'ইনস্টল করুন',
        ],
        'success' => 'আপনার .env ফাইল সেটিংস সংরক্ষণ করা হয়েছে।',
        'errors' => '.Env ফাইল সংরক্ষণ করতে অক্ষম, দয়া করে এটি নিজে তৈরি করুন।',
    ],
    'install' => 'ইনস্টল করুন',
    'installed' => [
        'success_log_message' => 'Laravel ইনস্টলার সফলভাবে ইনস্টল করা',
    ],
    'final' => [
        'title' => 'ইনস্টলেশন সমাপ্ত',
        'templateTitle' => 'ইনস্টলেশন সমাপ্ত',
        'finished' => 'অ্যাপ্লিকেশন সফলভাবে ইনস্টল করা হয়েছে।',
        'migration' => 'মাইগ্রেশন এবং বীজ কনসোল আউটপুট:',
        'console' => 'অ্যাপ্লিকেশন কনসোল আউটপুট:',
        'log' => 'ইনস্টলেশন লগ এন্ট্রি:',
        'env' => 'ফাইনাল .env ফাইল:',
        'exit' => 'প্রস্থান করার জন্য এখানে ক্লিক করুন',
    ],
    'updater' => [
        'title' => 'Laravel Updater',
        'welcome' => [
            'title' => 'আপডেটার স্বাগতম',
            'message' => 'আপডেট উইজার্ড স্বাগতম।',
        ],
        'overview' => [
            'title' => 'সংক্ষিপ্ত বিবরণ',
            'message' => '1 আপডেট আছে। | আছে: সংখ্যা আপডেট।',
            'install_updates' => 'হালনাগাদ সংস্থাপন করুন',
        ],
        'final' => [
            'title' => 'শেষ',
            'finished' => 'অ্যাপ্লিকেশন এর ডাটাবেস সফলভাবে আপডেট করা হয়েছে।',
            'exit' => 'প্রস্থান করার জন্য এখানে ক্লিক করুন',
        ],
        'log' => [
            'success_message' => 'Laravel ইনস্টলার সফলভাবে আপডেট করা হয়েছে',
        ],
    ],
];