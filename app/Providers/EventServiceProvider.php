<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

/**
 * Classe EventServiceProvider que registra eventos e ouvintes na aplicação.
 *
 * Este provedor é utilizado para mapear eventos a ouvintes específicos
 * que serão executados quando os eventos forem disparados.
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * O mapeamento de eventos para ouvintes da aplicação.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Registra quaisquer eventos para sua aplicação.
     *
     * Este método é chamado durante a inicialização da aplicação. 
     * Ele pode ser utilizado para adicionar lógica adicional de eventos,
     * mas neste caso, não é necessário.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determina se os eventos e ouvintes devem ser descobertos automaticamente.
     *
     * @return bool
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
