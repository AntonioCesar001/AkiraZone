<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

/**
 * Middleware TrimStrings para remover espaços em branco das strings em solicitações HTTP.
 * 
 * Este middleware processa solicitações e remove espaços em branco do início e do fim
 * de todos os atributos de string, melhorando a consistência dos dados recebidos.
 */
class TrimStrings extends Middleware
{
    /**
     * Os nomes dos atributos que não devem ser removidos de espaços em branco.
     *
     * @var array<int, string>
     */
    protected $except = [
        'current_password',
        'password',
        'password_confirmation',
    ];
}
