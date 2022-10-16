<?php 

return [
    'title' => 'Laravel Installer',
    'next' => 'Nächster Schritt',
    'finish' => 'Installieren',
    'welcome' => [
        'title' => 'Willkommen zum Installer',
        'message' => 'Willkommen zum Laravel Installationsassistent.',
        'templateTitle' => 'Herzlich willkommen',
        'next' => 'Überprüfen Sie die Anforderungen',
    ],
    'requirements' => [
        'title' => 'Vorraussetzungen',
        'templateTitle' => 'Schritt 1 | Serveranforderungen',
        'next' => 'Überprüfen Sie die Berechtigungen',
    ],
    'permissions' => [
        'title' => 'Berechtigungen',
        'templateTitle' => 'Schritt 2 | Berechtigungen',
        'next' => 'Umgebung konfigurieren',
    ],
    'environment' => [
        'title' => 'Umgebungsvariablen',
        'save' => 'Speicher .env',
        'success' => 'Ihre .env Konfiguration wurde gespeichert.',
        'errors' => 'Ihre .env Konfiguration konnte nicht gespeichert werden, Bitte erstellen Sie diese Manuell.',
        'menu' => [
            'templateTitle' => 'Schritt 3 | Umgebungseinstellungen',
            'title' => 'Umgebungseinstellungen',
            'desc' => 'Wählen Sie aus, wie Sie die Datei apps <code> .env </ code> konfigurieren möchten.',
            'wizard-button' => 'Formularassistent einrichten',
            'classic-button' => 'Klassischer Texteditor',
        ],
        'wizard' => [
            'templateTitle' => 'Schritt 3 | Umgebungseinstellungen | Geführter Assistent',
            'title' => 'Geführter <code> .env </ code> Assistent',
            'tabs' => [
                'environment' => 'Umgebung',
                'database' => 'Datenbank',
                'application' => 'Anwendung',
            ],
            'form' => [
                'name_required' => 'Ein Umgebungsname ist erforderlich.',
                'app_name_label' => 'App Name',
                'app_name_placeholder' => 'App Name',
                'app_environment_label' => 'App-Umgebung',
                'app_environment_label_local' => 'Lokal',
                'app_environment_label_developement' => 'Entwicklung',
                'app_environment_label_qa' => 'Qa',
                'app_environment_label_production' => 'Produktion',
                'app_environment_label_other' => 'Andere',
                'app_environment_placeholder_other' => 'Betreten Sie Ihre Umgebung ...',
                'app_debug_label' => 'App-Debug',
                'app_debug_label_true' => 'Wahr',
                'app_debug_label_false' => 'Falsch',
                'app_log_level_label' => 'App-Protokollebene',
                'app_log_level_label_debug' => 'debuggen',
                'app_log_level_label_info' => 'Info',
                'app_log_level_label_notice' => 'beachten',
                'app_log_level_label_warning' => 'Warnung',
                'app_log_level_label_error' => 'Error',
                'app_log_level_label_critical' => 'kritisch',
                'app_log_level_label_alert' => 'warnen',
                'app_log_level_label_emergency' => 'Notfall',
                'app_url_label' => 'App-URL',
                'app_url_placeholder' => 'App-URL',
                'db_connection_label' => 'Datenbankverbindung',
                'db_connection_label_mysql' => 'MySQL',
                'db_connection_label_sqlite' => 'SQLite',
                'db_connection_label_pgsql' => 'pgsql',
                'db_connection_label_sqlsrv' => 'sqlsrv',
                'db_host_label' => 'Datenbank-Host',
                'db_host_placeholder' => 'Datenbank-Host',
                'db_port_label' => 'Datenbank-Port',
                'db_port_placeholder' => 'Datenbank-Port',
                'db_name_label' => 'Name der Datenbank',
                'db_name_placeholder' => 'Name der Datenbank',
                'db_username_label' => 'Datenbank-Benutzername',
                'db_username_placeholder' => 'Datenbank-Benutzername',
                'db_password_label' => 'Datenbank-Passwort',
                'db_password_placeholder' => 'Datenbank-Passwort',
                'app_tabs' => [
                    'more_info' => 'Mehr Info',
                    'broadcasting_title' => 'Broadcasting, Caching, Sitzung & amp; Warteschlange',
                    'broadcasting_label' => 'Broadcast-Treiber',
                    'broadcasting_placeholder' => 'Broadcast-Treiber',
                    'cache_label' => 'Cache-Treiber',
                    'cache_placeholder' => 'Cache-Treiber',
                    'session_label' => 'Sitzungstreiber',
                    'session_placeholder' => 'Sitzungstreiber',
                    'queue_label' => 'Warteschlangentreiber',
                    'queue_placeholder' => 'Warteschlangentreiber',
                    'redis_label' => 'Redis Treiber',
                    'redis_host' => 'Redis Host',
                    'redis_password' => 'Passwort erneut eingeben',
                    'redis_port' => 'Redis Port',
                    'mail_label' => 'Mail',
                    'mail_driver_label' => 'Mail-Treiber',
                    'mail_driver_placeholder' => 'Mail-Treiber',
                    'mail_host_label' => 'Mail-Host',
                    'mail_host_placeholder' => 'Mail-Host',
                    'mail_port_label' => 'Mail-Port',
                    'mail_port_placeholder' => 'Mail-Port',
                    'mail_username_label' => 'E-Mail-Benutzername',
                    'mail_username_placeholder' => 'E-Mail-Benutzername',
                    'mail_password_label' => 'E-Mail-Passwort',
                    'mail_password_placeholder' => 'E-Mail-Passwort',
                    'mail_encryption_label' => 'Mail-Verschlüsselung',
                    'mail_encryption_placeholder' => 'Mail-Verschlüsselung',
                    'pusher_label' => 'Pusher',
                    'pusher_app_id_label' => 'Pusher App-ID',
                    'pusher_app_id_palceholder' => 'Pusher App-ID',
                    'pusher_app_key_label' => 'Pusher App Key',
                    'pusher_app_key_palceholder' => 'Pusher App Key',
                    'pusher_app_secret_label' => 'Drücker App Geheimnis',
                    'pusher_app_secret_palceholder' => 'Drücker App Geheimnis',
                ],
                'buttons' => [
                    'setup_database' => 'Datenbank einrichten',
                    'setup_application' => 'Setup-Anwendung',
                    'install' => 'Installieren',
                ],
            ],
        ],
        'classic' => [
            'templateTitle' => 'Schritt 3 | Umgebungseinstellungen | Klassischer Editor',
            'title' => 'Klassischer Umgebungseditor',
            'save' => 'Speichern Sie .env',
            'back' => 'Verwenden Sie den Formularassistenten',
            'install' => 'Installieren',
        ],
    ],
    'final' => [
        'title' => 'Fertig!',
        'finished' => 'Die Anwendung wurde erfolgreich Installiert.',
        'exit' => 'Hier Klicken zum Beenden',
        'templateTitle' => 'Installation beendet',
        'migration' => 'Ausgabe von Migration & Seed Console:',
        'console' => 'Anwendungskonsolenausgabe:',
        'log' => 'Installationsprotokolleintrag:',
        'env' => 'Endgültige .env-Datei:',
    ],
    'back' => 'Bisherige',
    'forms' => [
        'errorTitle' => 'Folgende Fehler sind aufgetreten:',
    ],
    'install' => 'Installieren',
    'installed' => [
        'success_log_message' => 'Laravel Installer erfolgreich installiert am',
    ],
    'updater' => [
        'title' => 'Laravel Updater',
        'welcome' => [
            'title' => 'Willkommen im Updater',
            'message' => 'Willkommen beim Update-Assistenten.',
        ],
        'overview' => [
            'title' => 'Überblick',
            'message' => 'Es gibt 1 Update. | Es gibt: Anzahl Updates.',
            'install_updates' => 'Installiere Updates',
        ],
        'final' => [
            'title' => 'Fertig',
            'finished' => 'Die Datenbank der Anwendung wurde erfolgreich aktualisiert.',
            'exit' => 'Klicken Sie hier, um den Vorgang zu beenden',
        ],
        'log' => [
            'success_message' => 'Laravel Installer erfolgreich aktualisiert am',
        ],
    ],
];