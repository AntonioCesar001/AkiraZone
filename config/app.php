<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

    /*
    |--------------------------------------------------------------------------
    | Horário do Agendamento
    |--------------------------------------------------------------------------
    |
    | Configura as horas e minutos para o agendamento de tarefas.
    | As configurações podem ser definidas no arquivo .env.
    |
    */
    'hour' => env('SCHEDULE_HOUR', ''),
    'min' => env('SCHEDULE_MIN', ''),
    'is_demo' => env('IS_DEMO', false),

    /*
    |--------------------------------------------------------------------------
    | Nome da Aplicação
    |--------------------------------------------------------------------------
    |
    | Este valor é o nome da sua aplicação. Ele é usado quando o
    | framework precisa inserir o nome da aplicação em uma notificação
    | ou em qualquer outro local conforme necessário pela aplicação.
    |
    */
    'name' => env('APP_NAME', 'AkiraZone'),

    /*
    |--------------------------------------------------------------------------
    | Ambiente da Aplicação
    |--------------------------------------------------------------------------
    |
    | Este valor determina o "ambiente" em que sua aplicação está
    | atualmente em execução. Isso pode influenciar como você prefere
    | configurar vários serviços que a aplicação utiliza. Defina isso no seu
    | arquivo ".env".
    |
    */
    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Modo de Depuração da Aplicação
    |--------------------------------------------------------------------------
    |
    | Quando sua aplicação está no modo de depuração, mensagens de erro
    | detalhadas com rastreamentos de pilha serão mostradas em cada erro
    | que ocorrer na aplicação. Se desabilitado, uma página de erro genérica
    | simples será exibida.
    |
    */
    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | URL da Aplicação
    |--------------------------------------------------------------------------
    |
    | Esta URL é usada pelo console para gerar URLs adequadamente ao usar
    | a ferramenta de linha de comando Artisan. Você deve definir isso
    | para a raiz da sua aplicação para que seja usada ao executar tarefas
    | Artisan.
    |
    */
    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL'),

    /*
    |--------------------------------------------------------------------------
    | Fuso Horário da Aplicação
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar o fuso horário padrão para sua aplicação,
    | que será usado pelas funções de data e hora do PHP. Configuramos isso
    | para um padrão sensato para você.
    |
    */
    'timezone' => 'America/Sao_Paulo',

    /*
    |--------------------------------------------------------------------------
    | Configuração de Localidade da Aplicação
    |--------------------------------------------------------------------------
    |
    | A localidade da aplicação determina a localidade padrão que será
    | usada pelo provedor de serviços de tradução. Você é livre para
    | definir este valor para qualquer uma das localidades que serão
    | suportadas pela aplicação.
    |
    */
    'locale' => 'pt-br',

    /*
    |--------------------------------------------------------------------------
    | Localidade de Fallback da Aplicação
    |--------------------------------------------------------------------------
    |
    | A localidade de fallback determina a localidade a ser usada quando a
    | atual não estiver disponível. Você pode alterar o valor para corresponder
    | a qualquer uma das pastas de idioma fornecidas pela sua aplicação.
    |
    */
    'fallback_locale' => 'pt-br',

    /*
    |--------------------------------------------------------------------------
    | Localidade do Faker
    |--------------------------------------------------------------------------
    |
    | Esta localidade será usada pela biblioteca Faker do PHP ao gerar dados
    | falsos para suas sementes de banco de dados. Por exemplo, isso será usado
    | para obter números de telefone localizados, informações de endereço e mais.
    |
    */
    'faker_locale' => 'en_US',

    /*
    |--------------------------------------------------------------------------
    | Chave de Criptografia
    |--------------------------------------------------------------------------
    |
    | Esta chave é usada pelo serviço de criptografia do Illuminate e deve
    | ser definida como uma string aleatória de 32 caracteres; caso contrário,
    | essas strings criptografadas não serão seguras. Por favor, faça isso antes
    | de implantar uma aplicação!
    |
    */
    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Driver do Modo de Manutenção
    |--------------------------------------------------------------------------
    |
    | Estas opções de configuração determinam o driver usado para determinar
    | e gerenciar o status do "modo de manutenção" do Laravel. O driver "cache"
    | permitirá que o modo de manutenção seja controlado entre várias máquinas.
    |
    | Drivers suportados: "file", "cache"
    |
    */
    'maintenance' => [
        'driver' => 'file',
        // 'store'  => 'redis',
    ],

    /*
    |--------------------------------------------------------------------------
    | Provedores de Serviço Autoloaded
    |--------------------------------------------------------------------------
    |
    | Os provedores de serviço listados aqui serão carregados automaticamente
    | na solicitação da sua aplicação. Fique à vontade para adicionar seus próprios
    | serviços a este array para conceder funcionalidade expandida às suas aplicações.
    |
    */
    'providers' => ServiceProvider::defaultProviders()->merge([
        /*
         * Provedores de Serviço de Pacotes...
         */

        /*
         * Provedores de Serviço da Aplicação...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
    ])->toArray(),

    /*
    |--------------------------------------------------------------------------
    | Aliases de Classe
    |--------------------------------------------------------------------------
    |
    | Este array de aliases de classe será registrado quando esta aplicação
    | for iniciada. No entanto, sinta-se à vontade para registrar quantos quiser,
    | pois os aliases são carregados "lazy", então não prejudicam o desempenho.
    |
    */
    'aliases' => Facade::defaultAliases()->merge([
        // 'Example' => App\Facades\Example::class,
    ])->toArray(),

];
