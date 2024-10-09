<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

// Define o ponto de partida da aplicação Laravel, registrando o tempo atual.
define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| Este bloco verifica se a aplicação está em modo de manutenção. 
| Se a aplicação estiver em modo de manutenção, um arquivo de manutenção
| é carregado para que qualquer conteúdo pré-renderizado possa ser exibido,
| em vez de iniciar o framework, o que poderia causar uma exceção.
|
*/

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance; // Carrega o arquivo de manutenção, se existir.
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| O Composer fornece um carregador de classes conveniente e gerado automaticamente
| para esta aplicação. Precisamos apenas utilizá-lo! Vamos simplesmente requerê-lo
| neste script para que não precisemos carregar manualmente nossas classes.
|
*/

require __DIR__.'/../vendor/autoload.php'; // Requer o autoload do Composer para carregar classes automaticamente.

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Depois de ter a aplicação, podemos tratar a requisição de entrada usando
| o núcleo HTTP da aplicação. Em seguida, enviaremos a resposta de volta
| para o navegador do cliente, permitindo que ele aproveite nossa aplicação.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php'; // Carrega a aplicação.

$kernel = $app->make(Kernel::class); // Obtém a instância do núcleo HTTP.

$response = $kernel->handle(
    $request = Request::capture() // Captura a requisição atual.
)->send(); // Trata a requisição e envia a resposta.

$kernel->terminate($request, $response); // Finaliza o núcleo HTTP, realizando quaisquer tarefas de limpeza.
