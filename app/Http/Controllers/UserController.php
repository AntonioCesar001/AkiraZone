<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

/**
 * Controlador UserController para gerenciar usuários.
 * 
 * Este controlador permite visualizar a lista de usuários cadastrados na aplicação.
 */
class UserController extends Controller
{
    /**
     * Exibe a lista de usuários cadastrados.
     *
     * @return \Illuminate\Http\Response Retorna a view com a lista de usuários.
     * 
     * O método `index` recupera todos os usuários do banco de dados usando o modelo `User`
     * e renderiza a view `users-management` com os dados dos usuários.
     */
    public function index()
    {
        // Recupera todos os usuários do banco de dados
        $users = User::all();

        // Retorna a view 'users-management' com os dados dos usuários
        return view('laravel-examples.users-management', compact('users'));
    }
}
