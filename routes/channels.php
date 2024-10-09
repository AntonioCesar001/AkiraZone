<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Aqui você pode registrar todos os canais de broadcast de eventos que sua
| aplicação suporta. As funções de callback fornecidas são usadas para verificar
| se um usuário autenticado tem permissão para escutar o canal.
|
*/

/**
 * Define um canal de broadcasting para o modelo 'User'.
 *
 * O nome do canal é dinâmico, seguindo o padrão 'App.Models.User.{id}'.
 * A função de callback é usada para autorizar o acesso ao canal, garantindo
 * que o usuário autenticado só possa acessar o canal correspondente ao seu próprio ID.
 *
 * @param \App\Models\User $user O usuário atualmente autenticado.
 * @param int $id O ID do canal ao qual o usuário está tentando se conectar.
 * @return bool Retorna true se o usuário autenticado puder acessar o canal, caso contrário, false.
 */
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    // Verifica se o ID do usuário autenticado é igual ao ID do canal.
    return (int) $user->id === (int) $id;
});
