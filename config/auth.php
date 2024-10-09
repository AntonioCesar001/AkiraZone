<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Autenticação Padrão
    |--------------------------------------------------------------------------
    |
    | Esta opção controla o "guard" de autenticação padrão e as opções de
    | redefinição de senha para sua aplicação. Você pode mudar esses
    | padrões conforme necessário, mas eles são um ótimo ponto de partida
    | para a maioria das aplicações.
    |
    */
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Guardas de Autenticação
    |--------------------------------------------------------------------------
    |
    | Aqui você pode definir todos os guardas de autenticação para sua
    | aplicação. Claro, uma configuração padrão excelente foi definida
    | para você aqui, que usa o armazenamento de sessão e o provedor de
    | usuários Eloquent.
    |
    | Todos os drivers de autenticação têm um provedor de usuários. Isso
    | define como os usuários são realmente recuperados do seu banco de
    | dados ou outros mecanismos de armazenamento usados por esta
    | aplicação para persistir os dados do seu usuário.
    |
    | Suportado: "session"
    |
    */
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Provedores de Usuários
    |--------------------------------------------------------------------------
    |
    | Todos os drivers de autenticação têm um provedor de usuários. Isso
    | define como os usuários são realmente recuperados do seu banco de
    | dados ou outros mecanismos de armazenamento usados por esta
    | aplicação para persistir os dados do seu usuário.
    |
    | Se você tiver várias tabelas ou modelos de usuários, poderá
    | configurar várias fontes que representam cada modelo/tabela. Essas
    | fontes podem ser atribuídas a qualquer guarda de autenticação extra
    | que você definiu.
    |
    | Suportados: "database", "eloquent"
    |
    */
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Redefinição de Senhas
    |--------------------------------------------------------------------------
    |
    | Você pode especificar várias configurações de redefinição de senha
    | se tiver mais de uma tabela ou modelo de usuário na aplicação e
    | quiser ter configurações de redefinição de senha separadas com base
    | nos tipos específicos de usuários.
    |
    | O tempo de expiração é o número de minutos que cada token de redefinição
    | será considerado válido. Esse recurso de segurança mantém os tokens
    | com vida curta para que tenham menos tempo para serem adivinhados.
    | Você pode mudar isso conforme necessário.
    |
    | A configuração de throttle é o número de segundos que um usuário deve
    | esperar antes de gerar mais tokens de redefinição de senha. Isso
    | impede que o usuário gere rapidamente uma quantidade muito grande de
    | tokens de redefinição de senha.
    |
    */
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Timeout de Confirmação de Senha
    |--------------------------------------------------------------------------
    |
    | Aqui você pode definir a quantidade de segundos antes que a
    | confirmação de senha expire e o usuário seja solicitado a reentrar
    | sua senha na tela de confirmação. Por padrão, o timeout dura
    | três horas.
    |
    */
    'password_timeout' => 10800,

];
