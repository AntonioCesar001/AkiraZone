<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

/**
 * Classe RouteServiceProvider que configura as rotas da aplicação.
 *
 * Este provedor é utilizado para definir os bindings de modelo de rota,
 * filtros de padrões e outras configurações de rota.
 */
class RouteServiceProvider extends ServiceProvider
{
    /**
     * O caminho para a rota "home" da sua aplicação.
     *
     * Normalmente, os usuários são redirecionados aqui após a autenticação.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define os bindings de modelo de rota, filtros de padrão e outras configurações de rota.
     *
     * Este método é chamado durante a inicialização da aplicação.
     *
     * @return void
     */
    public function boot(): void
    {
        // Configuração do limitador de taxa para a API.
        RateLimiter::for('api', function (Request $request) {
            // Permite até 60 requisições por minuto por usuário ou por IP.
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        // Definindo as rotas da aplicação.
        $this->routes(function () {
            // Grupo de rotas da API, aplicando middleware 'api' e prefixo 'api'.
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Grupo de rotas da aplicação web, aplicando middleware 'web'.
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
