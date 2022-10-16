<?php 

return [
    'title' => 'Laravel Installer',
    'next' => 'Следующий шаг',
    'back' => 'предыдущий',
    'finish' => 'устанавливать',
    'forms' => [
        'errorTitle' => 'Произошли следующие ошибки:',
    ],
    'welcome' => [
        'templateTitle' => 'желанный',
        'title' => 'Laravel Installer',
        'message' => 'Мастер простой установки и настройки.',
        'next' => 'Проверьте требования',
    ],
    'requirements' => [
        'templateTitle' => 'Шаг 1 | Требования к серверу',
        'title' => 'Требования к серверу',
        'next' => 'Проверьте разрешения',
    ],
    'permissions' => [
        'templateTitle' => 'Шаг 2 | права доступа',
        'title' => 'права доступа',
        'next' => 'Настроить среду',
    ],
    'environment' => [
        'menu' => [
            'templateTitle' => 'Шаг 3 | Настройки среды',
            'title' => 'Настройки среды',
            'desc' => 'Пожалуйста, выберите, как вы хотите настроить файл <code> .env </ code>.',
            'wizard-button' => 'Настройка мастера форм',
            'classic-button' => 'Классический текстовый редактор',
        ],
        'wizard' => [
            'templateTitle' => 'Шаг 3 | Настройки среды | Управляемый Мастер',
            'title' => 'Управляемый мастер <code> .env </ code>',
            'tabs' => [
                'environment' => 'Среда',
                'database' => 'База данных',
                'application' => 'заявка',
            ],
            'form' => [
                'name_required' => 'Требуется имя среды.',
                'app_name_label' => 'Имя приложения',
                'app_name_placeholder' => 'Имя приложения',
                'app_environment_label' => 'Окружение приложения',
                'app_environment_label_local' => 'Местный',
                'app_environment_label_developement' => 'развитие',
                'app_environment_label_qa' => 'контроль качества',
                'app_environment_label_production' => 'производство',
                'app_environment_label_other' => 'Другой',
                'app_environment_placeholder_other' => 'Введите вашу среду ...',
                'app_debug_label' => 'Отладка приложения',
                'app_debug_label_true' => 'Правда',
                'app_debug_label_false' => 'Ложь',
                'app_log_level_label' => 'Уровень журнала приложений',
                'app_log_level_label_debug' => 'отлаживать',
                'app_log_level_label_info' => 'Информация',
                'app_log_level_label_notice' => 'уведомление',
                'app_log_level_label_warning' => 'предупреждение',
                'app_log_level_label_error' => 'ошибка',
                'app_log_level_label_critical' => 'критический',
                'app_log_level_label_alert' => 'бдительный',
                'app_log_level_label_emergency' => 'чрезвычайная ситуация',
                'app_url_label' => 'URL приложения',
                'app_url_placeholder' => 'URL приложения',
                'db_connection_label' => 'Подключение к базе данных',
                'db_connection_label_mysql' => 'MySQL',
                'db_connection_label_sqlite' => 'SQLite',
                'db_connection_label_pgsql' => 'PgSQL',
                'db_connection_label_sqlsrv' => 'SQLSRV',
                'db_host_label' => 'Хост базы данных',
                'db_host_placeholder' => 'Хост базы данных',
                'db_port_label' => 'Порт базы данных',
                'db_port_placeholder' => 'Порт базы данных',
                'db_name_label' => 'Имя базы данных',
                'db_name_placeholder' => 'Имя базы данных',
                'db_username_label' => 'Имя пользователя базы данных',
                'db_username_placeholder' => 'Имя пользователя базы данных',
                'db_password_label' => 'Пароль базы данных',
                'db_password_placeholder' => 'Пароль базы данных',
                'app_tabs' => [
                    'more_info' => 'Больше информации',
                    'broadcasting_title' => 'Вещание, Кэширование, Сеанс & amp; Очередь',
                    'broadcasting_label' => 'Драйвер трансляции',
                    'broadcasting_placeholder' => 'Драйвер трансляции',
                    'cache_label' => 'Драйвер кеша',
                    'cache_placeholder' => 'Драйвер кеша',
                    'session_label' => 'Драйвер сеанса',
                    'session_placeholder' => 'Драйвер сеанса',
                    'queue_label' => 'Водитель очереди',
                    'queue_placeholder' => 'Водитель очереди',
                    'redis_label' => 'Redis Driver',
                    'redis_host' => 'Redis Host',
                    'redis_password' => 'Redis Password',
                    'redis_port' => 'Редис Порт',
                    'mail_label' => 'почта',
                    'mail_driver_label' => 'Почтовый драйвер',
                    'mail_driver_placeholder' => 'Почтовый драйвер',
                    'mail_host_label' => 'Почтовый Хост',
                    'mail_host_placeholder' => 'Почтовый Хост',
                    'mail_port_label' => 'Почтовый порт',
                    'mail_port_placeholder' => 'Почтовый порт',
                    'mail_username_label' => 'Имя пользователя почты',
                    'mail_username_placeholder' => 'Имя пользователя почты',
                    'mail_password_label' => 'Почтовый пароль',
                    'mail_password_placeholder' => 'Почтовый пароль',
                    'mail_encryption_label' => 'Шифрование почты',
                    'mail_encryption_placeholder' => 'Шифрование почты',
                    'pusher_label' => 'толкатель',
                    'pusher_app_id_label' => 'Идентификатор приложения Pusher',
                    'pusher_app_id_palceholder' => 'Идентификатор приложения Pusher',
                    'pusher_app_key_label' => 'Ключ приложения Pusher',
                    'pusher_app_key_palceholder' => 'Ключ приложения Pusher',
                    'pusher_app_secret_label' => 'Pusher App Secret',
                    'pusher_app_secret_palceholder' => 'Pusher App Secret',
                ],
                'buttons' => [
                    'setup_database' => 'Настройка базы данных',
                    'setup_application' => 'Настройка приложения',
                    'install' => 'устанавливать',
                ],
            ],
        ],
        'classic' => [
            'templateTitle' => 'Шаг 3 | Настройки среды | Классический редактор',
            'title' => 'Редактор классической среды',
            'save' => 'Сохранить .env',
            'back' => 'Мастер форм',
            'install' => 'устанавливать',
        ],
        'success' => 'Ваши настройки файла .env были сохранены.',
        'errors' => 'Не удалось сохранить файл .env. Пожалуйста, создайте его вручную.',
    ],
    'install' => 'устанавливать',
    'installed' => [
        'success_log_message' => 'Установщик Laravel успешно установлен на',
    ],
    'final' => [
        'title' => 'Установка завершена',
        'templateTitle' => 'Установка завершена',
        'finished' => 'Приложение успешно установлено.',
        'migration' => 'Вывод консоли миграции и семян:',
        'console' => 'Вывод на консоль приложения:',
        'log' => 'Запись журнала установки:',
        'env' => 'Финальный файл .env:',
        'exit' => 'Нажмите здесь, чтобы выйти',
    ],
    'updater' => [
        'title' => 'Laravel Updater',
        'welcome' => [
            'title' => 'Добро пожаловать в обновлении',
            'message' => 'Добро пожаловать в мастер обновления.',
        ],
        'overview' => [
            'title' => 'обзор',
            'message' => 'Есть 1 обновление. | Есть: номер обновления.',
            'install_updates' => 'Установить обновления',
        ],
        'final' => [
            'title' => 'Законченный',
            'finished' => 'База данных приложения была успешно обновлена.',
            'exit' => 'Нажмите здесь, чтобы выйти',
        ],
        'log' => [
            'success_message' => 'Установщик Laravel успешно ОБНОВЛЕН на',
        ],
    ],
];