<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Configuração de Compartilhamento de Recursos entre Origem Cruzada (CORS)
    |--------------------------------------------------------------------------
    |
    | Aqui você pode configurar suas definições para compartilhamento de recursos
    | entre origens cruzadas ou "CORS". Isso determina quais operações entre
    | origens cruzadas podem ser executadas em navegadores da web. Você é livre
    | para ajustar essas configurações conforme necessário.
    |
    | Para aprender mais: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
