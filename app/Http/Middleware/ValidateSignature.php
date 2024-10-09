<?php

namespace App\Http\Middleware;

use Illuminate\Routing\Middleware\ValidateSignature as Middleware;

/**
 * Middleware ValidateSignature para validar a assinatura de URLs.
 *
 * Este middleware verifica a validade da assinatura das URLs geradas
 * pela aplicação. Ele é utilizado para garantir que a URL não foi
 * alterada e que o pedido é genuíno.
 */
class ValidateSignature extends Middleware
{
    /**
     * Os nomes dos parâmetros da string de consulta que devem ser ignorados.
     *
     * @var array<int, string>
     */
    protected $except = [
        // 'fbclid',          // Exemplo de parâmetro que pode ser ignorado
        // 'utm_campaign',    // Exemplo de parâmetro que pode ser ignorado
        // 'utm_content',     // Exemplo de parâmetro que pode ser ignorado
        // 'utm_medium',      // Exemplo de parâmetro que pode ser ignorado
        // 'utm_source',      // Exemplo de parâmetro que pode ser ignorado
        // 'utm_term',        // Exemplo de parâmetro que pode ser ignorado
    ];
}
