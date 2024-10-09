<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Driver de Hash Padrão
    |--------------------------------------------------------------------------
    |
    | Esta opção controla o driver de hash padrão que será utilizado para
    | hashear senhas da sua aplicação. Por padrão, o algoritmo bcrypt é
    | usado; no entanto, você pode modificar esta opção se desejar.
    |
    | Suportado: "bcrypt", "argon", "argon2id"
    |
    */

    'driver' => 'bcrypt',

    /*
    |--------------------------------------------------------------------------
    | Opções do Bcrypt
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar as opções de configuração que devem ser usadas
    | quando senhas são hashadas usando o algoritmo Bcrypt. Isso permitirá que você
    | controle a quantidade de tempo que leva para hashear a senha fornecida.
    |
    */

    'bcrypt' => [
        'rounds' => env('BCRYPT_ROUNDS', 10),
    ],

    /*
    |--------------------------------------------------------------------------
    | Opções do Argon
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar as opções de configuração que devem ser usadas
    | quando senhas são hashadas usando o algoritmo Argon. Isso permitirá que você
    | controle a quantidade de tempo que leva para hashear a senha fornecida.
    |
    */

    'argon' => [
        'memory' => 65536,
        'threads' => 1,
        'time' => 4,
    ],

];
