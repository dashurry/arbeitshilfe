<?php 

return [
    'title' => 'Instalação de Laravel',
    'next' => 'Próximo Passo',
    'finish' => 'Instalar',
    'welcome' => [
        'title' => 'Bem-vindo ao Instalador',
        'message' => 'Bem-vindo ao assistente de configuração.',
        'templateTitle' => 'Bem vinda',
        'next' => 'Verifique os requisitos',
    ],
    'requirements' => [
        'title' => 'Requisitos',
        'templateTitle' => '1º passo | Requisitos do servidor',
        'next' => 'Verificar permissões',
    ],
    'permissions' => [
        'title' => 'Permissões',
        'templateTitle' => 'Etapa 2 | Permissões',
        'next' => 'Configurar ambiente',
    ],
    'environment' => [
        'title' => 'Configurações de Ambiente',
        'save' => 'Salvar .env',
        'success' => 'As configurações de seu arquivo .env foram gravadas.',
        'errors' => 'Não foi possível gravar o arquivo .env, por favor crie-o manualmente.',
        'menu' => [
            'templateTitle' => 'Etapa 3 | Configurações de Ambiente',
            'title' => 'Configurações de Ambiente',
            'desc' => 'Por favor, selecione como você deseja configurar o arquivo <code> .env </ code>.',
            'wizard-button' => 'Configuração do Assistente de Formulário',
            'classic-button' => 'Editor de Texto Clássico',
        ],
        'wizard' => [
            'templateTitle' => 'Etapa 3 | Configurações de Ambiente | Assistente Guiado',
            'title' => 'Assistente <code> .env </ code> guiado',
            'tabs' => [
                'environment' => 'Meio Ambiente',
                'database' => 'Base de dados',
                'application' => 'Aplicação',
            ],
            'form' => [
                'name_required' => 'Um nome de ambiente é obrigatório.',
                'app_name_label' => 'Nome do aplicativo',
                'app_name_placeholder' => 'Nome do aplicativo',
                'app_environment_label' => 'Ambiente App',
                'app_environment_label_local' => 'Local',
                'app_environment_label_developement' => 'Desenvolvimento',
                'app_environment_label_qa' => 'Qa',
                'app_environment_label_production' => 'Produção',
                'app_environment_label_other' => 'De outros',
                'app_environment_placeholder_other' => 'Digite seu ambiente ...',
                'app_debug_label' => 'Depuração de aplicativo',
                'app_debug_label_true' => 'Verdade',
                'app_debug_label_false' => 'Falso',
                'app_log_level_label' => 'Nível de registro de aplicativos',
                'app_log_level_label_debug' => 'depurar',
                'app_log_level_label_info' => 'info',
                'app_log_level_label_notice' => 'aviso prévio',
                'app_log_level_label_warning' => 'Aviso',
                'app_log_level_label_error' => 'erro',
                'app_log_level_label_critical' => 'crítico',
                'app_log_level_label_alert' => 'alerta',
                'app_log_level_label_emergency' => 'emergência',
                'app_url_label' => 'URL do aplicativo',
                'app_url_placeholder' => 'URL do aplicativo',
                'db_connection_label' => 'Conexão de banco de dados',
                'db_connection_label_mysql' => 'mysql',
                'db_connection_label_sqlite' => 'sqlite',
                'db_connection_label_pgsql' => 'pgsql',
                'db_connection_label_sqlsrv' => 'sqlsrv',
                'db_host_label' => 'Host de banco de dados',
                'db_host_placeholder' => 'Host de banco de dados',
                'db_port_label' => 'Porta do banco de dados',
                'db_port_placeholder' => 'Porta do banco de dados',
                'db_name_label' => 'Nome do banco de dados',
                'db_name_placeholder' => 'Nome do banco de dados',
                'db_username_label' => 'Nome do usuário do banco de dados',
                'db_username_placeholder' => 'Nome do usuário do banco de dados',
                'db_password_label' => 'Senha do banco de dados',
                'db_password_placeholder' => 'Senha do banco de dados',
                'app_tabs' => [
                    'more_info' => 'Mais informações',
                    'broadcasting_title' => 'Transmissão, Armazenamento em Cache, Sessão e & amp; Fila',
                    'broadcasting_label' => 'Driver de Transmissão',
                    'broadcasting_placeholder' => 'Driver de Transmissão',
                    'cache_label' => 'Driver de Cache',
                    'cache_placeholder' => 'Driver de Cache',
                    'session_label' => 'Driver de sessão',
                    'session_placeholder' => 'Driver de sessão',
                    'queue_label' => 'Driver de fila',
                    'queue_placeholder' => 'Driver de fila',
                    'redis_label' => 'Redis Driver',
                    'redis_host' => 'Anfitrião Redis',
                    'redis_password' => 'Senha Redis',
                    'redis_port' => 'Porto Redis',
                    'mail_label' => 'Enviar',
                    'mail_driver_label' => 'Mail Driver',
                    'mail_driver_placeholder' => 'Mail Driver',
                    'mail_host_label' => 'Host de correio',
                    'mail_host_placeholder' => 'Host de correio',
                    'mail_port_label' => 'Porta de correio',
                    'mail_port_placeholder' => 'Porta de correio',
                    'mail_username_label' => 'Nome de Usuário do Mail',
                    'mail_username_placeholder' => 'Nome de Usuário do Mail',
                    'mail_password_label' => 'Senha do Mail',
                    'mail_password_placeholder' => 'Senha do Mail',
                    'mail_encryption_label' => 'Criptografia de Correio',
                    'mail_encryption_placeholder' => 'Criptografia de Correio',
                    'pusher_label' => 'Empurrador',
                    'pusher_app_id_label' => 'ID do aplicativo empurrador',
                    'pusher_app_id_palceholder' => 'ID do aplicativo empurrador',
                    'pusher_app_key_label' => 'Chave do aplicativo empurrador',
                    'pusher_app_key_palceholder' => 'Chave do aplicativo empurrador',
                    'pusher_app_secret_label' => 'Pusher App Secret',
                    'pusher_app_secret_palceholder' => 'Pusher App Secret',
                ],
                'buttons' => [
                    'setup_database' => 'Banco de dados de configuração',
                    'setup_application' => 'Aplicativo de Configuração',
                    'install' => 'Instalar',
                ],
            ],
        ],
        'classic' => [
            'templateTitle' => 'Etapa 3 | Configurações de Ambiente | Editor Clássico',
            'title' => 'Editor de Ambiente Clássico',
            'save' => 'Salvar .env',
            'back' => 'Use o Assistente de Formulário',
            'install' => 'Instalar',
        ],
    ],
    'final' => [
        'title' => 'Terminado',
        'finished' => 'Aplicação foi instalada com sucesso',
        'exit' => 'Clique aqui para sair',
        'templateTitle' => 'Instalação concluída',
        'migration' => 'Migração e saída do console de sementes:',
        'console' => 'Saída do console de aplicativos:',
        'log' => 'Entrada do Registro de Instalação:',
        'env' => 'Arquivo final .env:',
    ],
    'back' => 'Anterior',
    'forms' => [
        'errorTitle' => 'Ocorreram os seguintes erros:',
    ],
    'install' => 'Instalar',
    'installed' => [
        'success_log_message' => 'Instalador do Laravel instalado com sucesso',
    ],
    'updater' => [
        'title' => 'Laravel Updater',
        'welcome' => [
            'title' => 'Bem-vindo ao atualizador',
            'message' => 'Bem-vindo ao assistente de atualização.',
        ],
        'overview' => [
            'title' => 'visão global',
            'message' => 'Há uma atualização. | Existem: atualizações de números.',
            'install_updates' => 'Instalar atualizações',
        ],
        'final' => [
            'title' => 'Acabado',
            'finished' => 'O banco de dados do aplicativo foi atualizado com sucesso.',
            'exit' => 'Clique aqui para sair',
        ],
        'log' => [
            'success_message' => 'Laravel Installer com sucesso ATUALIZADO em',
        ],
    ],
];