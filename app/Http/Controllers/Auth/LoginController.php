<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

/**
 * Classe LoginController responsável pelo gerenciamento da autenticação de usuários.
 * 
 * Esta classe oferece métodos para exibir o formulário de login, autenticar usuários
 * e realizar o logout, utilizando o sistema de autenticação do Laravel.
 */
class LoginController extends Controller
{

    /**
     * Exibe o formulário de login.
     *
     * @return \Illuminate\Http\Response Retorna a view com o formulário de login.
     * 
     * O método `create` carrega a view `auth.signin`, que contém o formulário onde
     * os usuários inserem suas credenciais para realizar login.
     */
    public function create()
    {
        return view('auth.signin');
    }

    /**
     * Processa o login do usuário.
     *
     * @param  \Illuminate\Http\Request  $request A solicitação HTTP contendo os dados enviados pelo formulário.
     * @return \Illuminate\Http\Response Retorna uma resposta de redirecionamento ou mensagem de erro.
     * 
     * O método `store` valida as credenciais fornecidas pelo usuário, tenta autenticar o
     * usuário com base nessas credenciais e redireciona o usuário para o dashboard caso
     * a autenticação seja bem-sucedida. Caso contrário, exibe uma mensagem de erro.
     */
    public function store(Request $request)
    {
        // Recupera as credenciais do formulário (email e senha)
        $credentials = $request->only('email', 'password');

        // Verifica se a opção "lembrar-me" foi marcada
        $rememberMe = $request->rememberMe ? true : false;

        /**
         * Tenta autenticar o usuário usando as credenciais fornecidas.
         * 
         * - O método `attempt` tenta autenticar o usuário e, caso bem-sucedido, regenera
         *   a sessão para evitar ataques de sessão fixa.
         * - Se a autenticação for bem-sucedida, o usuário é redirecionado para o dashboard
         *   ou para a página onde ele tentou acessar antes do login.
         * - Se a autenticação falhar, uma mensagem de erro é retornada.
         */
        if (Auth::attempt($credentials, $rememberMe)) {
            // Regenera a sessão para evitar ataques de sessão fixa
            $request->session()->regenerate();

            // Redireciona o usuário para a página pretendida ou para o dashboard
            return redirect()->intended('/dashboard');
        }

        // Se a autenticação falhar, retorna ao formulário com uma mensagem de erro
        return back()->withErrors([
            'message' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ])->withInput($request->only('email'));
    }

    /**
     * Realiza o logout do usuário.
     *
     * @param  \Illuminate\Http\Request  $request A solicitação HTTP.
     * @return \Illuminate\Http\Response Redireciona o usuário para a página de login após o logout.
     * 
     * O método `destroy` lida com o processo de logout. Ele desloga o usuário, invalida a sessão
     * atual e regenera o token CSRF para segurança, redirecionando o usuário para a página de login.
     */
    public function destroy(Request $request)
    {
        // Realiza o logout do usuário
        Auth::logout();

        // Invalida a sessão atual para garantir que não possa ser reutilizada
        $request->session()->invalidate();

        // Regenera o token CSRF por questões de segurança
        $request->session()->regenerateToken();

        // Redireciona o usuário para a página de login
        return redirect('/sign-in');
    }
}
