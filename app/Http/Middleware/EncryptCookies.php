<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

/**
 * Middleware EncryptCookies para criptografar cookies.
 * 
 * Este middleware intercepta cookies e garante que sejam criptografados
 * antes de serem armazenados ou enviados ao cliente, aumentando a segurança
 * das informações contidas nos cookies.
 */
class EncryptCookies extends Middleware
{
    /**
     * Os nomes dos cookies que não devem ser criptografados.
     *
     * @var array<int, string>
     */
    protected $except = [
        // Lista de cookies que não serão criptografados.
        //
    ];
}
