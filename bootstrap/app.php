<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

// Cria uma nova instância da aplicação Laravel. Esta instância é o "cola" que une
// todos os componentes do Laravel e serve como o contêiner de Injeção de Dependência (IoC),
// conectando todas as diversas partes do sistema.
$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

// Vincula as interfaces importantes ao contêiner para que possam ser resolvidas conforme necessário.
// Os "kernels" lidam com as requisições recebidas pela aplicação, tanto da interface web quanto da linha de comando (CLI).
$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

// Retorna a instância da aplicação. Esta instância é fornecida ao script chamador
// para que possamos separar a construção das instâncias da execução real da aplicação
// e do envio de respostas.
return $app;
