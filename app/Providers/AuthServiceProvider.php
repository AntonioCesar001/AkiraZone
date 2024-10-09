<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

/**
 * Classe AuthServiceProvider que registra políticas de autenticação e autorização.
 *
 * Este provedor é responsável por associar modelos a políticas, que definem
 * as permissões de acesso para diferentes ações e recursos dentro da aplicação.
 */
class AuthServiceProvider extends ServiceProvider
{
    /**
     * O mapeamento de modelos para políticas da aplicação.
     *
     * Este array permite que você defina quais políticas devem ser usadas
     * para cada modelo da sua aplicação. As chaves são os nomes dos modelos
     * e os valores são as classes das políticas correspondentes.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Registra quaisquer serviços de autenticação/autorização.
     *
     * Este método é chamado após os serviços de autenticação terem sido
     * registrados. Você pode usar este método para definir gates e
     * políticas que controlam o acesso aos recursos da aplicação.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
