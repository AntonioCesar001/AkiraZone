<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

/**
 * Classe ForgotPasswordController responsável por gerenciar a funcionalidade de
 * recuperação de senha de usuários.
 * 
 * Este controlador oferece suporte para o envio de links de redefinição de senha
 * para o email do usuário, permitindo que eles redefinam suas credenciais caso
 * tenham esquecido a senha.
 */
class ForgotPasswordController extends Controller
{
    /**
     * Exibe o formulário para recuperação de senha.
     *
     * @return \Illuminate\View\View Retorna a view que contém o formulário de recuperação de senha.
     * 
     * O método `create` carrega a view `auth.passrecover.forgot-password`, que contém o formulário
     * onde o usuário pode inserir seu email para receber o link de redefinição de senha.
     */
    public function create()
    {
        return view('auth.passrecover.forgot-password');
    }

    /**
     * Processa a solicitação de recuperação de senha.
     *
     * @param \Illuminate\Http\Request $request A solicitação HTTP contendo os dados enviados pelo formulário.
     * @return \Illuminate\Http\RedirectResponse Retorna uma resposta de redirecionamento com mensagens de erro ou sucesso.
     * 
     * O método `store` lida com a validação do email do usuário e o envio do link de recuperação de senha.
     * - Se o modo de demonstração (`is_demo`) estiver ativo, desabilita a funcionalidade e retorna uma mensagem de erro.
     * - Valida o campo `email` para garantir que ele seja um email válido.
     * - Se a validação passar, usa o `Password::sendResetLink` para enviar o link de redefinição.
     * - Dependendo do resultado, exibe uma mensagem de sucesso ou erro.
     */
    public function store(Request $request)
    {
        // Verifica se a aplicação está no modo de demonstração, onde o reset de senha é desabilitado
        if (config('app.is_demo')) {
            return back()->with('error', "Você está em uma versão demo, a redefinição de senha está desabilitada.");
        }

        // Valida o campo 'email', certificando-se de que um email válido seja fornecido
        $request->validate([
            'email' => 'required|email',
        ]);

        /**
         * Tenta enviar o link de redefinição de senha para o email fornecido.
         * 
         * - Usa o método `sendResetLink` da facade `Password` para enviar o link de recuperação
         *   para o email especificado.
         * - Se o link for enviado com sucesso, uma mensagem de status é retornada.
         * - Caso contrário, o formulário será reapresentado, com o campo `email` preenchido
         *   e uma mensagem de erro será exibida.
         */
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Verifica o status do envio do link e retorna a resposta apropriada
        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status)) // Retorna uma mensagem de sucesso
            : back()->withInput($request->only('email')) // Retorna o formulário com o email preenchido
              ->withErrors(['email' => __($status)]); // Exibe uma mensagem de erro
    }
}
