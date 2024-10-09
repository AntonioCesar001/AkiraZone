<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

/**
 * Middleware PreventRequestsDuringMaintenance para gerenciar solicitações durante o modo de manutenção.
 * 
 * Este middleware intercepta todas as solicitações feitas à aplicação enquanto ela está em modo de manutenção
 * e permite o acesso a rotas específicas, conforme configurado.
 */
class PreventRequestsDuringMaintenance extends Middleware
{
    /**
     * As URIs que devem ser acessíveis enquanto o modo de manutenção está habilitado.
     *
     * @var array<int, string>
     */
    protected $except = [
        // Lista de URIs que podem ser acessadas durante o modo de manutenção.
        //
    ];
}
