<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Driver de Sessão Padrão
    |--------------------------------------------------------------------------
    |
    | Esta opção controla o "driver" de sessão padrão que será usado nas
    | requisições. Por padrão, usaremos o driver nativo leve, mas você pode
    | especificar qualquer um dos outros drivers disponíveis aqui.
    |
    | Suportados: "file", "cookie", "database", "apc",
    |            "memcached", "redis", "dynamodb", "array"
    |
    */

    'driver' => env('SESSION_DRIVER', 'file'),

    /*
    |--------------------------------------------------------------------------
    | Duração da Sessão
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar o número de minutos que a sessão deve ser
    | permitida a permanecer ociosa antes de expirar. Se você quiser que
    | expire imediatamente ao fechar o navegador, defina essa opção.
    |
    */

    'lifetime' => env('SESSION_LIFETIME', 120),

    'expire_on_close' => false,

    /*
    |--------------------------------------------------------------------------
    | Criptografia da Sessão
    |--------------------------------------------------------------------------
    |
    | Esta opção permite que você especifique facilmente que todos os dados
    | da sua sessão devem ser criptografados antes de serem armazenados.
    | Toda a criptografia será executada automaticamente pelo Laravel e você
    | pode usar a Sessão como de costume.
    |
    */

    'encrypt' => false,

    /*
    |--------------------------------------------------------------------------
    | Localização do Arquivo de Sessão
    |--------------------------------------------------------------------------
    |
    | Ao usar o driver de sessão nativo, precisamos de uma localização onde os
    | arquivos de sessão possam ser armazenados. Um padrão foi definido para
    | você, mas uma localização diferente pode ser especificada. Isso é
    | necessário apenas para sessões em arquivos.
    |
    */

    'files' => storage_path('framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Conexão do Banco de Dados da Sessão
    |--------------------------------------------------------------------------
    |
    | Ao usar os drivers de sessão "database" ou "redis", você pode especificar
    | uma conexão que deve ser usada para gerenciar essas sessões. Isso deve
    | corresponder a uma conexão nas opções de configuração do seu banco de dados.
    |
    */

    'connection' => env('SESSION_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Tabela do Banco de Dados da Sessão
    |--------------------------------------------------------------------------
    |
    | Ao usar o driver de sessão "database", você pode especificar a tabela que
    | devemos usar para gerenciar as sessões. Um padrão sensato é fornecido, mas
    | você pode alterá-lo conforme necessário.
    |
    */

    'table' => 'sessions',

    /*
    |--------------------------------------------------------------------------
    | Armazenamento em Cache da Sessão
    |--------------------------------------------------------------------------
    |
    | Ao usar um dos backends de sessão baseados em cache do framework, você pode
    | listar um armazenamento em cache que deve ser usado para essas sessões.
    | Este valor deve corresponder a um dos "stores" de cache configurados da sua
    | aplicação.
    |
    | Afeta: "apc", "dynamodb", "memcached", "redis"
    |
    */

    'store' => env('SESSION_STORE'),

    /*
    |--------------------------------------------------------------------------
    | Loteria de Limpeza de Sessão
    |--------------------------------------------------------------------------
    |
    | Alguns drivers de sessão devem manualmente limpar sua localização de
    | armazenamento para se livrar de sessões antigas. Aqui estão as chances de
    | que isso aconteça em uma dada requisição. Por padrão, as chances são 2 em 100.
    |
    */

    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Nome do Cookie da Sessão
    |--------------------------------------------------------------------------
    |
    | Aqui você pode alterar o nome do cookie usado para identificar uma
    | instância de sessão pelo ID. O nome especificado aqui será usado sempre
    | que um novo cookie de sessão for criado pelo framework para cada driver.
    |
    */

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_session'
    ),

    /*
    |--------------------------------------------------------------------------
    | Caminho do Cookie da Sessão
    |--------------------------------------------------------------------------
    |
    | O caminho do cookie da sessão determina o caminho para o qual o cookie
    | será considerado disponível. Normalmente, este será o caminho raiz da
    | sua aplicação, mas você pode alterá-lo conforme necessário.
    |
    */

    'path' => '/',

    /*
    |--------------------------------------------------------------------------
    | Domínio do Cookie da Sessão
    |--------------------------------------------------------------------------
    |
    | Aqui você pode alterar o domínio do cookie usado para identificar uma
    | sessão na sua aplicação. Isso determinará quais domínios o cookie está
    | disponível na sua aplicação. Um padrão sensato foi definido.
    |
    */

    'domain' => env('SESSION_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | Cookies Somente HTTPS
    |--------------------------------------------------------------------------
    |
    | Ao definir esta opção como verdadeira, os cookies de sessão só serão
    | enviados de volta ao servidor se o navegador tiver uma conexão HTTPS.
    | Isso impedirá que o cookie seja enviado quando não puder ser feito de
    | forma segura.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIE'),

    /*
    |--------------------------------------------------------------------------
    | Acesso HTTP Somente
    |--------------------------------------------------------------------------
    |
    | Definir este valor como verdadeiro impedirá que o JavaScript acesse o
    | valor do cookie, e o cookie só será acessível através do protocolo HTTP.
    | Você pode modificar esta opção se necessário.
    |
    */

    'http_only' => true,

    /*
    |--------------------------------------------------------------------------
    | Cookies Same-Site
    |--------------------------------------------------------------------------
    |
    | Esta opção determina como seus cookies se comportam quando ocorrem
    | requisições de terceiros e pode ser usada para mitigar ataques CSRF.
    | Por padrão, definiremos este valor como "lax", pois esse é um valor
    | seguro padrão.
    |
    | Suportados: "lax", "strict", "none", null
    |
    */

    'same_site' => 'lax',

];
