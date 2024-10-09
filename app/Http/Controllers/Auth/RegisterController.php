<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

/**
 * Classe RegisterController responsável pelo gerenciamento do registro de novos usuários.
 * 
 * Esta classe oferece métodos para exibir o formulário de registro, validar os dados de
 * entrada e criar novos usuários na base de dados. Após o registro, o usuário é
 * autenticado automaticamente.
 */
class RegisterController extends Controller
{
    /**
     * Exibe o formulário de registro de novos usuários.
     *
     * @return \Illuminate\Http\Response Retorna a view que contém o formulário de registro.
     * 
     * O método `create` carrega a view `auth.signup`, que exibe o formulário onde o usuário
     * pode inserir seus dados (nome, email, senha, aceitação de termos) para se registrar.
     */
    public function create()
    {
        return view('auth.signup');
    }

    /**
     * Processa o registro de um novo usuário.
     *
     * @param  \Illuminate\Http\Request  $request A solicitação HTTP contendo os dados enviados pelo formulário.
     * @return \Illuminate\Http\Response Redireciona o usuário após o registro ou exibe mensagens de erro.
     * 
     * O método `store` valida os dados fornecidos pelo usuário, cria o novo registro no banco de dados,
     * e autentica o usuário automaticamente, redirecionando-o para a página inicial.
     */
    public function store(Request $request)
    {
        // Valida os dados de entrada do formulário
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:7|max:255',
            'terms' => 'accepted',
        ], [
            // Mensagens de erro personalizadas para validação
            'name.required' => 'Nome é necessário',
            'email.required' => 'Email é necessário',
            'password.required' => 'Senha é necessária',
            'terms.accepted' => 'Você deve aceitar os termos e condições'
        ]);

        // Cria o novo usuário no banco de dados
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // A senha é criptografada usando Hash
        ]);

        // Autentica o usuário recém-criado
        Auth::login($user);

        // Redireciona o usuário para a página inicial definida em RouteServiceProvider::HOME
        return redirect(RouteServiceProvider::HOME);
    }
}
