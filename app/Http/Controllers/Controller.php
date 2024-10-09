<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * Classe base para todos os controladores da aplicação.
 * 
 * A classe `Controller` serve como a classe pai para todos os controladores. Ela facilita
 * a reutilização de funcionalidades comuns, como autorização e validação, utilizando os
 * *traits* `AuthorizesRequests` e `ValidatesRequests`.
 */
class Controller extends BaseController
{
    // Usa o *trait* AuthorizesRequests para adicionar funcionalidades de autorização
    use AuthorizesRequests;

    // Usa o *trait* ValidatesRequests para adicionar funcionalidades de validação
    use ValidatesRequests;
}
