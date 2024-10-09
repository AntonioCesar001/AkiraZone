<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Classe AppServiceProvider que registra e inicializa serviços da aplicação.
 *
 * Os provedores de serviço são responsáveis por fornecer as funcionalidades
 * e serviços necessários para a aplicação Laravel. Este provedor é um
 * local ideal para registrar serviços, vinculações de dependência,
 * e qualquer configuração que a aplicação necessite.
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Registra quaisquer serviços da aplicação.
     *
     * Este método é chamado antes de qualquer outra parte da aplicação.
     * Aqui, você pode vincular serviços ao contêiner de serviços.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Inicializa quaisquer serviços da aplicação.
     *
     * Este método é chamado após todos os serviços serem registrados.
     * Você pode usar este método para configurar serviços ou executar
     * qualquer código de inicialização necessário.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
