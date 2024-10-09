<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| Este arquivo é onde você pode definir todos os comandos de console baseados
| em closures. Cada closure está vinculada a uma instância de comando, permitindo
| uma abordagem simples para interagir com os métodos de entrada e saída do comando.
|
*/

/**
 * Comando Artisan personalizado 'inspire'.
 *
 * Este comando, quando executado, exibe uma citação inspiradora usando a classe 'Inspiring'.
 * Ele está disponível no terminal através do comando `php artisan inspire`.
 *
 * @return void
 */
Artisan::command('inspire', function () {
    // Exibe uma citação inspiradora no console.
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

