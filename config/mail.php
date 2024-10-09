<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mailer Padrão
    |--------------------------------------------------------------------------
    |
    | Esta opção controla o mailer padrão que é usado para enviar qualquer
    | mensagem de e-mail enviada pela sua aplicação. Mailers alternativos
    | podem ser configurados e usados conforme necessário; no entanto,
    | este mailer será usado por padrão.
    |
    */

    'default' => env('MAIL_MAILER', 'smtp'),

    /*
    |--------------------------------------------------------------------------
    | Configurações dos Mailers
    |--------------------------------------------------------------------------
    |
    | Aqui você pode configurar todos os mailers usados pela sua aplicação
    | e suas respectivas configurações. Vários exemplos foram configurados
    | para você, e você é livre para adicionar os seus próprios conforme
    | a sua aplicação exige.
    |
    | O Laravel suporta uma variedade de drivers de "transporte" de e-mail
    | que podem ser usados ao enviar um e-mail. Você especificará qual
    | deles está usando para seus mailers abaixo. Você é livre para adicionar
    | mailers adicionais conforme necessário.
    |
    | Suportado: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    |            "postmark", "log", "array", "failover"
    |
    */

    'mailers' => [
        'smtp' => [
            'transport' => 'smtp',
            'url' => env('MAIL_URL'),
            'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
            'port' => env('MAIL_PORT', 587),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN'),
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'mailgun' => [
            'transport' => 'mailgun',
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

        'postmark' => [
            'transport' => 'postmark',
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Endereço "De" Global
    |--------------------------------------------------------------------------
    |
    | Você pode querer que todos os e-mails enviados pela sua aplicação
    | sejam enviados do mesmo endereço. Aqui, você pode especificar um nome
    | e um endereço que são usados globalmente para todos os e-mails que
    | são enviados pela sua aplicação.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'akirazonee@gmail.com'),
        'name' => env('MAIL_FROM_NAME', 'AkiraZone'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Configurações de Markdown para E-mails
    |--------------------------------------------------------------------------
    |
    | Se você está usando renderização de e-mail baseada em Markdown, você
    | pode configurar seu tema e caminhos de componentes aqui, permitindo
    | que você personalize o design dos e-mails. Ou, você pode simplesmente
    | manter os padrões do Laravel!
    |
    */

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

];
