<?php

use Laravel\Sanctum\Sanctum;

return [

    /*
    |--------------------------------------------------------------------------
    | Domínios com Estado
    |--------------------------------------------------------------------------
    |
    | Solicitações dos seguintes domínios / hosts receberão cookies de
    | autenticação de API com estado. Normalmente, isso deve incluir seus domínios
    | local e de produção que acessam sua API via um frontend SPA.
    |
    */

    'stateful' => explode(',', env('SANCTUM_STATEFUL_DOMAINS', sprintf(
        '%s%s',
        'localhost,localhost:3000,127.0.0.1,127.0.0.1:8000,::1',
        Sanctum::currentApplicationUrlWithPort()
    ))),

    /*
    |--------------------------------------------------------------------------
    | Guardas do Sanctum
    |--------------------------------------------------------------------------
    |
    | Este array contém os guardas de autenticação que serão verificados
    | quando o Sanctum tentar autenticar uma solicitação. Se nenhum desses
    | guardas for capaz de autenticar a solicitação, o Sanctum usará o token
    | bearer presente em uma solicitação de entrada para autenticação.
    |
    */

    'guard' => ['web'],

    /*
    |--------------------------------------------------------------------------
    | Minutos de Expiração
    |--------------------------------------------------------------------------
    |
    | Este valor controla o número de minutos até que um token emitido
    | seja considerado expirado. Se esse valor for nulo, tokens de acesso
    | pessoais não expiram. Isso não altera a duração das sessões de
    | primeira parte.
    |
    */

    'expiration' => null,

    /*
    |--------------------------------------------------------------------------
    | Middleware do Sanctum
    |--------------------------------------------------------------------------
    |
    | Ao autenticar sua SPA de primeira parte com o Sanctum, você pode precisar
    | personalizar alguns dos middlewares que o Sanctum usa ao processar a
    | solicitação. Você pode alterar os middlewares listados abaixo conforme necessário.
    |
    */

    'middleware' => [
        'verify_csrf_token' => App\Http\Middleware\VerifyCsrfToken::class,
        'encrypt_cookies' => App\Http\Middleware\EncryptCookies::class,
    ],

];
