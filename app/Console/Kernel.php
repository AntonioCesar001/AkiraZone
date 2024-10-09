<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

/**
 * Classe Kernel responsável pelo agendamento de tarefas e registro de comandos na aplicação.
 */
class Kernel extends ConsoleKernel
{
    /**
     * Define o agendamento de comandos da aplicação.
     *
     * @param Schedule $schedule Instância do agendador de tarefas do Laravel.
     * 
     * O método `schedule` configura a execução periódica de comandos na aplicação. A programação do
     * agendamento é baseada em parâmetros configuráveis no arquivo de configuração `app.php`:
     * - `app.hour`: define o intervalo de horas para o agendamento.
     * - `app.min`: define o intervalo de minutos para o agendamento.
     * - `app.is_demo`: se verdadeiro, ativa o comando `migrate:fresh --seed` para rodar conforme o cron definido.
     */
    protected function schedule(Schedule $schedule)
    {
        // Recupera os valores das configurações de hora e minuto
        $hour = config('app.hour');
        $min = config('app.min');

        // Define o intervalo para o cron com base nos valores de configuração
        $scheduledInterval = $hour !== '' 
            ? (($min !== '' && $min != 0) 
                ?  $min . ' */' . $hour . ' * * *'  // Define um cron baseado em minutos e horas
                : '0 */' . $hour . ' * * *')        // Define um cron somente baseado em horas
            : '*/' . $min . ' * * * *';             // Define um cron apenas para minutos

        // Se o modo de demonstração está ativo, agenda a migração do banco de dados com a seeding
        if (config('app.is_demo')) {
            $schedule->command('migrate:fresh --seed')->cron($scheduledInterval);
        }
    }

    /**
     * Registra os comandos da aplicação.
     *
     * Este método carrega os comandos personalizados definidos no diretório `Commands` e também 
     * registra as rotas do console definidas em `routes/console.php`.
     */
    protected function commands(): void
    {
        // Carrega comandos personalizados do diretório 'Commands'
        $this->load(__DIR__ . '/Commands');

        // Requer o arquivo de rotas do console
        require base_path('routes/console.php');
    }
}
