<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

/**
 * Classe ResetPasswordController responsável pela redefinição de senhas dos usuários.
 * 
 * Esta classe oferece métodos para exibir o formulário de redefinição de senha e processar
 * a solicitação, garantindo que as senhas dos usuários sejam redefinidas com segurança.
 */
class ResetPasswordController extends Controller
{
    /**
     * Exibe o formulário de redefinição de senha.
     *
     * @param  \Illuminate\Http\Request  $request A solicitação HTTP contendo o token de redefinição.
     * @return \Illuminate\Http\Response Retorna a view com o formulário de redefinição de senha.
     * 
     * O método `create` exibe o formulário onde o usuário pode inserir o token de redefinição,
     * o email e a nova senha.
     */
    public function create(Request $request)
    {
        // Retorna a view com o formulário de redefinição de senha, passando o request para a view
        return view('auth.passrecover.reset-password', ['request' => $request]);
    }

    /**
     * Processa a redefinição de senha.
     *
     * @param  \Illuminate\Http\Request  $request A solicitação HTTP contendo os dados de redefinição.
     * @return \Illuminate\Http\Response Redireciona o usuário ou exibe mensagens de erro.
     * 
     * O método `store` valida os dados enviados pelo formulário e tenta redefinir a senha do usuário.
     * Se a redefinição for bem-sucedida, o usuário é redirecionado para a página de login com uma
     * mensagem de sucesso. Caso contrário, ele é redirecionado de volta ao formulário com um erro.
     */
    public function store(Request $request)
    {
        // Valida os campos do formulário
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        /**
         * Tenta redefinir a senha do usuário.
         * 
         * - O método `Password::reset` lida com a lógica de redefinição de senha no Laravel. Ele
         *   recebe os dados da solicitação, verifica se o token de redefinição é válido, e, caso seja,
         *   atualiza a senha do usuário no banco de dados.
         * - A função de callback dentro do método `Password::reset` é usada para forçar a atualização
         *   da senha, utilizando o método `Hash::make` para criptografar a nova senha.
         * - O evento `PasswordReset` é disparado após a redefinição bem-sucedida.
         */
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password), // Criptografa e define a nova senha
                    'remember_token' => Str::random(60), // Gera um novo token de lembrança
                ])->save();

                // Dispara o evento de redefinição de senha
                event(new PasswordReset($user));
            }
        );

        // Se a redefinição for bem-sucedida, redireciona o usuário para a página de login com uma mensagem de sucesso
        return $status == Password::PASSWORD_RESET
            ? redirect()->route('sign-in')->with('status', __($status))
            : back()->withInput($request->only('email'))
                    ->withErrors(['email' => __($status)]);
    }
}
