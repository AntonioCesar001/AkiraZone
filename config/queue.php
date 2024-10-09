<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Nome da Conexão de Fila Padrão
    |--------------------------------------------------------------------------
    |
    | A API de fila do Laravel suporta uma variedade de back-ends através de uma única
    | API, permitindo acesso conveniente a cada back-end usando a mesma
    | sintaxe para todos. Aqui você pode definir uma conexão padrão.
    |
    */

    'default' => env('QUEUE_CONNECTION', 'sync'),

    /*
    |--------------------------------------------------------------------------
    | Conexões de Fila
    |--------------------------------------------------------------------------
    |
    | Aqui você pode configurar as informações de conexão para cada servidor que
    | é usado pela sua aplicação. Uma configuração padrão foi adicionada
    | para cada back-end fornecido com o Laravel. Você pode adicionar mais.
    |
    | Drivers: "sync", "database", "beanstalkd", "sqs", "redis", "null"
    |
    */

    'connections' => [

        'sync' => [
            'driver' => 'sync',
        ],

        'database' => [
            'driver' => 'database',
            'table' => 'jobs',
            'queue' => 'default',
            'retry_after' => 90,
            'after_commit' => false,
        ],

        'beanstalkd' => [
            'driver' => 'beanstalkd',
            'host' => 'localhost',
            'queue' => 'default',
            'retry_after' => 90,
            'block_for' => 0,
            'after_commit' => false,
        ],

        'sqs' => [
            'driver' => 'sqs',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'prefix' => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'),
            'queue' => env('SQS_QUEUE', 'default'),
            'suffix' => env('SQS_SUFFIX'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'after_commit' => false,
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
            'queue' => env('REDIS_QUEUE', 'default'),
            'retry_after' => 90,
            'block_for' => null,
            'after_commit' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Agrupamento de Jobs
    |--------------------------------------------------------------------------
    |
    | As seguintes opções configuram o banco de dados e a tabela que armazenam
    | informações de agrupamento de jobs. Essas opções podem ser atualizadas para
    | qualquer conexão de banco de dados e tabela que foram definidas pela sua
    | aplicação.
    |
    */

    'batching' => [
        'database' => env('DB_CONNECTION', 'mysql'),
        'table' => 'job_batches',
    ],

    /*
    |--------------------------------------------------------------------------
    | Jobs de Fila Falhados
    |--------------------------------------------------------------------------
    |
    | Essas opções configuram o comportamento do registro de jobs de fila falhados,
    | para que você possa controlar qual banco de dados e tabela são usados para armazenar
    | os jobs que falharam. Você pode mudá-los para qualquer banco de dados/tabela que desejar.
    |
    */

    'failed' => [
        'driver' => env('QUEUE_FAILED_DRIVER', 'database-uuids'),
        'database' => env('DB_CONNECTION', 'mysql'),
        'table' => 'failed_jobs',
    ],

];
