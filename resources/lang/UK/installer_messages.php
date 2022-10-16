<?php 

return [
    'title' => 'Інсталятор Laravel',
    'next' => 'Наступний крок',
    'back' => 'Попередній',
    'finish' => 'Встановіть',
    'forms' => [
        'errorTitle' => 'Сталися такі помилки:',
    ],
    'welcome' => [
        'templateTitle' => 'Ласкаво просимо',
        'title' => 'Інсталятор Laravel',
        'message' => 'Майстер інсталяції та налаштування.',
        'next' => 'Вимоги до перевірки',
    ],
    'requirements' => [
        'templateTitle' => 'Крок 1 | Вимоги до сервера',
        'title' => 'Вимоги до сервера',
        'next' => 'Перевірити дозволи',
    ],
    'permissions' => [
        'templateTitle' => 'Крок 2 | Дозволи',
        'title' => 'Дозволи',
        'next' => 'Налаштувати середовище',
    ],
    'environment' => [
        'menu' => [
            'templateTitle' => 'Крок 3 | Налаштування середовища',
            'title' => 'Налаштування середовища',
            'desc' => 'Виберіть, як ви хочете налаштувати файл <code> .env </code>.',
            'wizard-button' => 'Налаштування майстра форм',
            'classic-button' => 'Класичний текстовий редактор',
        ],
        'wizard' => [
            'templateTitle' => 'Крок 3 | Налаштування середовища | Керуючись майстром',
            'title' => 'За допомогою майстра <code> .env </code>',
            'tabs' => [
                'environment' => 'Навколишнє середовище',
                'database' => 'База даних',
                'application' => 'Застосування',
            ],
            'form' => [
                'name_required' => 'Потрібно вказати назву середовища.',
                'app_name_label' => 'Назва програми',
                'app_name_placeholder' => 'Назва програми',
                'app_environment_label' => 'Навколишнє середовище програми',
                'app_environment_label_local' => 'Місцеві',
                'app_environment_label_developement' => 'Розвиток',
                'app_environment_label_qa' => 'Qa',
                'app_environment_label_production' => 'Виробництво',
                'app_environment_label_other' => 'Інший',
                'app_environment_placeholder_other' => 'Введіть своє оточення ...',
                'app_debug_label' => 'Налагодження програми',
                'app_debug_label_true' => 'Правда',
                'app_debug_label_false' => 'помилковий',
                'app_log_level_label' => 'Рівень журналу програм',
                'app_log_level_label_debug' => 'налагоджувати',
                'app_log_level_label_info' => 'інформація',
                'app_log_level_label_notice' => 'повідомлення',
                'app_log_level_label_warning' => 'увага',
                'app_log_level_label_error' => 'помилка',
                'app_log_level_label_critical' => 'критичний',
                'app_log_level_label_alert' => 'попередження',
                'app_log_level_label_emergency' => 'надзвичайної ситуації',
                'app_url_label' => 'URL-адреса програми',
                'app_url_placeholder' => 'URL-адреса програми',
                'db_connection_label' => 'Підключення до бази даних',
                'db_connection_label_mysql' => 'mysql',
                'db_connection_label_sqlite' => 'sqlite',
                'db_connection_label_pgsql' => 'pgsql',
                'db_connection_label_sqlsrv' => 'sqlsrv',
                'db_host_label' => 'Хост бази даних',
                'db_host_placeholder' => 'Хост бази даних',
                'db_port_label' => 'Порт баз даних',
                'db_port_placeholder' => 'Порт баз даних',
                'db_name_label' => 'Ім\'я бази даних',
                'db_name_placeholder' => 'Ім\'я бази даних',
                'db_username_label' => 'Ім\'я користувача бази даних',
                'db_username_placeholder' => 'Ім\'я користувача бази даних',
                'db_password_label' => 'Пароль бази даних',
                'db_password_placeholder' => 'Пароль бази даних',
                'app_tabs' => [
                    'more_info' => 'Більше інформації',
                    'broadcasting_title' => 'Трансляція, кешування, сесія, & amp; Черга',
                    'broadcasting_label' => 'Драйвер мовлення',
                    'broadcasting_placeholder' => 'Драйвер мовлення',
                    'cache_label' => 'Драйвер кешу',
                    'cache_placeholder' => 'Драйвер кешу',
                    'session_label' => 'Драйвер сеансу',
                    'session_placeholder' => 'Драйвер сеансу',
                    'queue_label' => 'Драйвер черги',
                    'queue_placeholder' => 'Драйвер черги',
                    'redis_label' => 'Redis Driver',
                    'redis_host' => 'Redis Host',
                    'redis_password' => 'Повторно ввести пароль',
                    'redis_port' => 'Порт Redis',
                    'mail_label' => 'Пошта',
                    'mail_driver_label' => 'Драйвер пошти',
                    'mail_driver_placeholder' => 'Драйвер пошти',
                    'mail_host_label' => 'Mail Host',
                    'mail_host_placeholder' => 'Mail Host',
                    'mail_port_label' => 'Поштовий порт',
                    'mail_port_placeholder' => 'Поштовий порт',
                    'mail_username_label' => 'Ім\'я користувача пошти',
                    'mail_username_placeholder' => 'Ім\'я користувача пошти',
                    'mail_password_label' => 'Пароль електронної пошти',
                    'mail_password_placeholder' => 'Пароль електронної пошти',
                    'mail_encryption_label' => 'Шифрування пошти',
                    'mail_encryption_placeholder' => 'Шифрування пошти',
                    'pusher_label' => 'Штовхач',
                    'pusher_app_id_label' => 'Id Pusher App',
                    'pusher_app_id_palceholder' => 'Id Pusher App',
                    'pusher_app_key_label' => 'Ключ програми Pusher',
                    'pusher_app_key_palceholder' => 'Ключ програми Pusher',
                    'pusher_app_secret_label' => 'Pusher App Secret',
                    'pusher_app_secret_palceholder' => 'Pusher App Secret',
                ],
                'buttons' => [
                    'setup_database' => 'Налаштування бази даних',
                    'setup_application' => 'Програма налаштування',
                    'install' => 'Встановіть',
                ],
            ],
        ],
        'classic' => [
            'templateTitle' => 'Крок 3 | Налаштування середовища | Класичний редактор',
            'title' => 'Редактор класичного середовища',
            'save' => 'Зберегти .env',
            'back' => 'Використовуйте майстер форм',
            'install' => 'Встановіть',
        ],
        'success' => 'Налаштування файлу .env збережено.',
        'errors' => 'Неможливо зберегти файл .env. Будь ласка, створіть його вручну.',
    ],
    'install' => 'Встановіть',
    'installed' => [
        'success_log_message' => 'Інсталятор Laravel успішно встановлено на',
    ],
    'final' => [
        'title' => 'Установка завершена',
        'templateTitle' => 'Установка завершена',
        'finished' => 'Програму успішно встановлено.',
        'migration' => 'Міграція та вивід консолі насіння:',
        'console' => 'Вихід консолі програми:',
        'log' => 'Вхід журналу встановлення:',
        'env' => 'Фінальний файл .env:',
        'exit' => 'Натисніть тут, щоб вийти',
    ],
    'updater' => [
        'title' => 'Laravel Updater',
        'welcome' => [
            'title' => 'Ласкаво просимо до оновлення',
            'message' => 'Ласкаво просимо до майстра оновлення.',
        ],
        'overview' => [
            'title' => 'Огляд',
            'message' => 'Є 1 оновлення. | Є: оновлення номера.',
            'install_updates' => 'Встановити оновлення',
        ],
        'final' => [
            'title' => 'Готово',
            'finished' => 'База даних програми успішно оновлена.',
            'exit' => 'Натисніть тут, щоб вийти',
        ],
        'log' => [
            'success_message' => 'Інсталятор Laravel успішно оновлено',
        ],
    ],
];