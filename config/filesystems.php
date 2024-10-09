<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Disco Padrão do Sistema de Arquivos
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar o disco padrão do sistema de arquivos que deve
    | ser usado pelo framework. O disco "local", assim como uma variedade de
    | discos baseados em nuvem estão disponíveis para sua aplicação. É só armazenar!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Discos do Sistema de Arquivos
    |--------------------------------------------------------------------------
    |
    | Aqui você pode configurar quantos "discos" de sistema de arquivos
    | desejar, e você pode até mesmo configurar múltiplos discos do mesmo driver.
    | Os padrões foram configurados para cada driver como um exemplo dos valores
    | necessários.
    |
    | Drivers Suportados: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Links Simbólicos
    |--------------------------------------------------------------------------
    |
    | Aqui você pode configurar os links simbólicos que serão criados quando o
    | comando `storage:link` do Artisan for executado. As chaves do array devem ser
    | as localizações dos links e os valores devem ser seus destinos.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
