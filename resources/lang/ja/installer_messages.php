<?php 

return [
    'title' => 'Laravelインストーラー',
    'next' => '次の一歩',
    'back' => '前',
    'finish' => 'インストール',
    'forms' => [
        'errorTitle' => '以下のエラーが発生しました。',
    ],
    'welcome' => [
        'templateTitle' => 'ようこそ',
        'title' => 'Laravelインストーラー',
        'message' => '簡単なインストールとセットアップウィザード。',
        'next' => '要件を確認する',
    ],
    'requirements' => [
        'templateTitle' => 'ステップ1サーバー要件',
        'title' => 'サーバー要件',
        'next' => '権限を確認する',
    ],
    'permissions' => [
        'templateTitle' => 'ステップ2アクセス許可',
        'title' => 'アクセス許可',
        'next' => '環境を設定する',
    ],
    'environment' => [
        'menu' => [
            'templateTitle' => 'ステップ3環境設定',
            'title' => '環境設定',
            'desc' => 'アプリの<code> .env </code>ファイルの設定方法を選択してください。',
            'wizard-button' => 'フォームウィザードの設定',
            'classic-button' => 'クラシックテキストエディタ',
        ],
        'wizard' => [
            'templateTitle' => 'ステップ3環境設定|ガイド付きウィザード',
            'title' => 'ガイド付き<code> .env </code>ウィザード',
            'tabs' => [
                'environment' => '環境',
                'database' => 'データベース',
                'application' => '応用',
            ],
            'form' => [
                'name_required' => '環境名が必要です。',
                'app_name_label' => 'アプリ名',
                'app_name_placeholder' => 'アプリ名',
                'app_environment_label' => 'アプリ環境',
                'app_environment_label_local' => '地元',
                'app_environment_label_developement' => '開発',
                'app_environment_label_qa' => 'Qa',
                'app_environment_label_production' => '製造',
                'app_environment_label_other' => 'その他の',
                'app_environment_placeholder_other' => 'あなたの環境を入力してください...',
                'app_debug_label' => 'アプリのデバッグ',
                'app_debug_label_true' => '本当',
                'app_debug_label_false' => '偽',
                'app_log_level_label' => 'アプリログレベル',
                'app_log_level_label_debug' => 'デバッグ',
                'app_log_level_label_info' => '情報',
                'app_log_level_label_notice' => '通知',
                'app_log_level_label_warning' => '警告',
                'app_log_level_label_error' => 'エラー',
                'app_log_level_label_critical' => 'クリティカル',
                'app_log_level_label_alert' => '警戒',
                'app_log_level_label_emergency' => '緊急',
                'app_url_label' => 'アプリのURL',
                'app_url_placeholder' => 'アプリのURL',
                'db_connection_label' => 'データベース接続',
                'db_connection_label_mysql' => 'MySQL',
                'db_connection_label_sqlite' => 'SQLite',
                'db_connection_label_pgsql' => 'pgsql',
                'db_connection_label_sqlsrv' => 'sqlsrv',
                'db_host_label' => 'データベースホスト',
                'db_host_placeholder' => 'データベースホスト',
                'db_port_label' => 'データベースポート',
                'db_port_placeholder' => 'データベースポート',
                'db_name_label' => 'データベース名',
                'db_name_placeholder' => 'データベース名',
                'db_username_label' => 'データベースユーザー名',
                'db_username_placeholder' => 'データベースユーザー名',
                'db_password_label' => 'データベースパスワード',
                'db_password_placeholder' => 'データベースパスワード',
                'app_tabs' => [
                    'more_info' => 'より多くの情報',
                    'broadcasting_title' => '放送、キャッシング、セッション、およびキュー',
                    'broadcasting_label' => 'ブロードキャストドライバ',
                    'broadcasting_placeholder' => 'ブロードキャストドライバ',
                    'cache_label' => 'キャッシュドライバ',
                    'cache_placeholder' => 'キャッシュドライバ',
                    'session_label' => 'セッションドライバ',
                    'session_placeholder' => 'セッションドライバ',
                    'queue_label' => 'キュードライバ',
                    'queue_placeholder' => 'キュードライバ',
                    'redis_label' => 'Redisドライバー',
                    'redis_host' => 'Redisホスト',
                    'redis_password' => 'Redisパスワード',
                    'redis_port' => 'レディスポート',
                    'mail_label' => '郵便物',
                    'mail_driver_label' => 'メールドライバー',
                    'mail_driver_placeholder' => 'メールドライバー',
                    'mail_host_label' => 'メールホスト',
                    'mail_host_placeholder' => 'メールホスト',
                    'mail_port_label' => 'メールポート',
                    'mail_port_placeholder' => 'メールポート',
                    'mail_username_label' => 'メールユーザー名',
                    'mail_username_placeholder' => 'メールユーザー名',
                    'mail_password_label' => 'メールパスワード',
                    'mail_password_placeholder' => 'メールパスワード',
                    'mail_encryption_label' => 'メール暗号化',
                    'mail_encryption_placeholder' => 'メール暗号化',
                    'pusher_label' => 'プッシャー',
                    'pusher_app_id_label' => 'プッシャーアプリID',
                    'pusher_app_id_palceholder' => 'プッシャーアプリID',
                    'pusher_app_key_label' => 'プッシャーアプリキー',
                    'pusher_app_key_palceholder' => 'プッシャーアプリキー',
                    'pusher_app_secret_label' => 'プッシャーアプリの秘密',
                    'pusher_app_secret_palceholder' => 'プッシャーアプリの秘密',
                ],
                'buttons' => [
                    'setup_database' => 'データベースの設定',
                    'setup_application' => 'セットアップアプリケーション',
                    'install' => 'インストール',
                ],
            ],
        ],
        'classic' => [
            'templateTitle' => 'ステップ3環境設定|クラシックエディタ',
            'title' => 'クラシック環境エディタ',
            'save' => '.envを保存',
            'back' => 'フォームウィザードを使用する',
            'install' => 'インストール',
        ],
        'success' => 'あなたの.envファイル設定は保存されました。',
        'errors' => '.envファイルを保存できません。手動で作成してください。',
    ],
    'install' => 'インストール',
    'installed' => [
        'success_log_message' => 'Laravelインストーラーはに正常にインストールされました',
    ],
    'final' => [
        'title' => 'インストール完了',
        'templateTitle' => 'インストール完了',
        'finished' => 'アプリケーションは正常にインストールされました。',
        'migration' => '移行とSeed Consoleの出力：',
        'console' => 'アプリケーションコンソールの出力：',
        'log' => 'インストールログエントリ：',
        'env' => '最終的な.envファイル：',
        'exit' => 'ここをクリックして終了',
    ],
    'updater' => [
        'title' => 'Laravel Updater',
        'welcome' => [
            'title' => 'アップデータへようこそ',
            'message' => 'アップデートウィザードへようこそ。',
        ],
        'overview' => [
            'title' => '概要',
            'message' => '1件の更新があります| |数の更新があります。',
            'install_updates' => '更新をインストールする',
        ],
        'final' => [
            'title' => '終了しました',
            'finished' => 'アプリケーションのデータベースは正常に更新されました。',
            'exit' => 'ここをクリックして終了',
        ],
        'log' => [
            'success_message' => 'Laravelインストーラーがに更新されました',
        ],
    ],
];