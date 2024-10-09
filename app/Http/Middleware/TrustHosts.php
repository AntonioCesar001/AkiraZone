<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustHosts as Middleware;

/**
 * Middleware TrustHosts para gerenciar hosts confiáveis na aplicação.
 * 
 * Este middleware determina quais hosts devem ser considerados confiáveis
 * para a aplicação, permitindo um controle mais rigoroso sobre as solicitações
 * recebidas.
 */
class TrustHosts extends Middleware
{
    /**
     * Obtém os padrões de host que devem ser confiáveis.
     *
     * @return array<int, string|null>  Um array de padrões de host.
     */
    public function hosts(): array
    {
        return [
            $this->allSubdomainsOfApplicationUrl(),
        ];
    }
}
