<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

/**
 * Middleware Authenticate para gerenciar a autenticação de usuários.
 * 
 * Este middleware verifica se o usuário está autenticado. Se não estiver, redireciona 
 * para a página de login apropriada.
 */
class Authenticate extends Middleware
{
    /**
     * Obtém o caminho para onde o usuário deve ser redirecionado quando não estiver autenticado.
     *
     * @param  \Illuminate\Http\Request  $request A solicitação HTTP do usuário.
     * @return string|null Retorna a rota para a página de login ou null se a solicitação esperar uma resposta JSON.
     * 
     * O método `redirectTo` determina a rota de redirecionamento para usuários não autenticados.
     * Se a solicitação for uma requisição AJAX (esperando uma resposta JSON), o método retornará null,
     * permitindo que o sistema trate o erro de forma diferente. Caso contrário, redireciona para a rota
     * de login, definida como 'sign-in'.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Se a requisição esperar uma resposta JSON, retorna null; caso contrário, redireciona para 'sign-in'
        return $request->expectsJson() ? null : route('sign-in');
    }
}
