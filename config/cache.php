<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Armazenamento de Cache Padrão
    |--------------------------------------------------------------------------
    |
    | Esta opção controla a conexão de cache padrão que é usada enquanto
    | usa esta biblioteca de caching. Esta conexão é utilizada quando outra
    | não é especificada explicitamente ao executar uma função de cache dada.
    |
    */
    'default' => env('CACHE_DRIVER', 'file'),

    /*
    |--------------------------------------------------------------------------
    | Armazenamentos de Cache
    |--------------------------------------------------------------------------
    |
    | Aqui você pode definir todos os "armazenamentos" de cache para sua
    | aplicação, assim como seus drivers. Você pode até definir múltiplos
    | armazenamentos para o mesmo driver de cache para agrupar tipos de itens
    | armazenados em seus caches.
    |
    | Drivers suportados: "apc", "array", "database", "file",
    |         "memcached", "redis", "dynamodb", "octane", "null"
    |
    */
    'stores' => [

        'apc' => [
            'driver' => 'apc',
        ],

        'array' => [
            'driver' => 'array',
            'serialize' => false,
        ],

        'database' => [
            'driver' => 'database',
            'table' => 'cache',
            'connection' => null,
            'lock_connection' => null,
        ],

        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
            'lock_path' => storage_path('framework/cache/data'),
        ],

        'memcached' => [
            'driver' => 'memcached',
            'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),
            'sasl' => [
                env('MEMCACHED_USERNAME'),
                env('MEMCACHED_PASSWORD'),
            ],
            'options' => [
                // Memcached::OPT_CONNECT_TIMEOUT => 2000,
            ],
            'servers' => [
                [
                    'host' => env('MEMCACHED_HOST', '127.0.0.1'),
                    'port' => env('MEMCACHED_PORT', 11211),
                    'weight' => 100,
                ],
            ],
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'cache',
            'lock_connection' => 'default',
        ],

        'dynamodb' => [
            'driver' => 'dynamodb',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'table' => env('DYNAMODB_CACHE_TABLE', 'cache'),
            'endpoint' => env('DYNAMODB_ENDPOINT'),
        ],

        'octane' => [
            'driver' => 'octane',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Prefixo de Chave de Cache
    |--------------------------------------------------------------------------
    |
    | Ao utilizar os armazenamentos de cache APC, banco de dados, memcached,
    | Redis ou DynamoDB, pode haver outras aplicações usando o mesmo cache.
    | Por esse motivo, você pode prefixar cada chave de cache para evitar
    | colisões.
    |
    */
    'prefix' => env('CACHE_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_cache_'),

];
