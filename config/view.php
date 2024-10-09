<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Caminhos de Armazenamento das Visualizações
    |--------------------------------------------------------------------------
    |
    | A maioria dos sistemas de template carrega templates do disco. Aqui você
    | pode especificar um array de caminhos que devem ser verificados para suas
    | visualizações. Claro que o caminho usual de visualização do Laravel já
    | foi registrado para você.
    |
    */

    'paths' => [
        resource_path('views'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Caminho das Visualizações Compiladas
    |--------------------------------------------------------------------------
    |
    | Esta opção determina onde todos os templates Blade compilados serão
    | armazenados para sua aplicação. Normalmente, isso é dentro do diretório
    | storage. No entanto, como de costume, você é livre para mudar este valor.
    |
    */

    'compiled' => env(
        'VIEW_COMPILED_PATH',
        realpath(storage_path('framework/views'))
    ),

];
