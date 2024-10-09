<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aqui é onde você pode registrar as rotas da API para sua aplicação.
| As rotas são carregadas pelo RouteServiceProvider e todas serão
| atribuídas ao grupo de middlewares "api". Crie algo incrível!
|
*/

/**
 * Rota para obter informações do usuário autenticado.
 *
 * Essa rota é protegida pelo middleware 'auth:sanctum', o que significa que
 * apenas usuários autenticados via token (usando o Sanctum) poderão acessá-la.
 * Ao acessar a rota '/user', a função callback será executada, e o objeto 
 * 'Request' será injetado automaticamente no método, permitindo o acesso 
 * aos dados do usuário autenticado.
 *
 * @param Request $request  A instância da requisição HTTP.
 * @return \Illuminate\Http\JsonResponse Retorna as informações do usuário autenticado.
 */
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    // Retorna o usuário autenticado.
    return $request->user();
});

