<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware RedirectIfAuthenticated para gerenciar redirecionamento de usuários autenticados.
 * 
 * Este middleware verifica se um usuário está autenticado e redireciona para uma rota específica
 * se eles tentarem acessar páginas de autenticação.
 */
class RedirectIfAuthenticated
{
    /**
     * Manipula uma solicitação de entrada.
     *
     * @param  \Illuminate\Http\Request  $request  A solicitação HTTP do usuário.
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next  O próximo middleware a ser chamado.
     * @param  string ...$guards  Os guardas de autenticação a serem verificados.
     * @return \Symfony\Component\HttpFoundation\Response  Retorna a resposta do middleware.
     * 
     * O método `handle` verifica se o usuário está autenticado por meio de um ou mais guardas.
     * Se um usuário autenticado for encontrado, ele será redirecionado para a rota definida como `HOME`.
     * Caso contrário, a solicitação é passada para o próximo middleware na cadeia.
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        // Define os guardas a serem utilizados. Se nenhum for fornecido, usa o guard padrão.
        $guards = empty($guards) ? [null] : $guards;

        // Itera sobre os guardas para verificar se o usuário está autenticado.
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Se o usuário estiver autenticado, redireciona para a rota HOME.
                return redirect(RouteServiceProvider::HOME);
            }
        }

        // Se o usuário não estiver autenticado, continua com a solicitação.
        return $next($request);
    }
}
