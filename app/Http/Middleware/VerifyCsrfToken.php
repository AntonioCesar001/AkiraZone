<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

/**
 * Middleware VerifyCsrfToken para verificar tokens CSRF.
 *
 * Este middleware protege a aplicação contra ataques de Cross-Site Request Forgery
 * garantindo que as solicitações HTTP que alteram o estado sejam autenticadas
 * com um token CSRF válido.
 */
class VerifyCsrfToken extends Middleware
{
    /**
     * As URIs que devem ser excluídas da verificação CSRF.
     *
     * @var array<int, string>
     */
    protected $except = [
        // Adicione aqui as URIs que você deseja excluir da verificação CSRF
    ];
}
