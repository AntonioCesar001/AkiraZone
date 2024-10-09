<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

/**
 * Middleware TrustProxies para gerenciar proxies confiáveis na aplicação.
 *
 * Este middleware permite que a aplicação reconheça e confie em proxies que
 * podem estar na frente da aplicação, garantindo que as informações do cliente
 * sejam obtidas corretamente.
 */
class TrustProxies extends Middleware
{
    /**
     * Os proxies confiáveis para esta aplicação.
     *
     * @var array<int, string>|string|null
     */
    protected $proxies;

    /**
     * Os cabeçalhos que devem ser usados para detectar proxies.
     *
     * @var int
     */
    protected $headers =
        Request::HEADER_X_FORWARDED_FOR |
        Request::HEADER_X_FORWARDED_HOST |
        Request::HEADER_X_FORWARDED_PORT |
        Request::HEADER_X_FORWARDED_PROTO |
        Request::HEADER_X_FORWARDED_AWS_ELB;
}
