<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

/**
 * Classe BroadcastServiceProvider que configura os serviços de broadcast.
 *
 * Este provedor é utilizado para registrar rotas de broadcast e
 * vincular as definições de canal para eventos que podem ser transmitidos
 * para os clientes.
 */
class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Inicializa quaisquer serviços da aplicação.
     *
     * Este método é chamado ao iniciar a aplicação. Ele é responsável
     * por registrar as rotas de broadcast e incluir o arquivo de definição
     * de canais, onde você pode definir quais canais estão disponíveis
     * para broadcasting.
     *
     * @return void
     */
    public function boot(): void
    {
        // Registra as rotas de broadcast.
        Broadcast::routes();

        // Inclui o arquivo de definição de canais.
        require base_path('routes/channels.php');
    }
}
