<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Controlador ProfileController para gerenciar o perfil do usuário.
 * 
 * Este controlador permite que os usuários visualizem e atualizem seus dados de perfil,
 * como nome, email, localização, telefone e informações adicionais.
 */
class ProfileController extends Controller
{
    /**
     * Exibe a página de perfil do usuário.
     *
     * @return \Illuminate\Http\Response Retorna a view com os dados do usuário autenticado.
     * 
     * O método `index` recupera os dados do usuário autenticado e renderiza a view
     * onde o usuário pode visualizar suas informações de perfil.
     */
    public function index()
    {
        // Recupera o usuário autenticado usando o ID de autenticação
        $user = User::find(Auth::id());

        // Retorna a view 'user-profile' com os dados do usuário
        return view('laravel-examples.user-profile', compact('user'));
    }

    /**
     * Atualiza os dados do perfil do usuário.
     *
     * @param  \Illuminate\Http\Request  $request A solicitação HTTP contendo os dados atualizados.
     * @return \Illuminate\Http\Response Redireciona o usuário com uma mensagem de sucesso ou erro.
     * 
     * O método `update` valida os dados enviados pelo usuário e atualiza as informações de perfil
     * no banco de dados. Se a aplicação estiver em modo demo e o usuário for um usuário padrão, 
     * ele impede a alteração do email.
     */
    public function update(Request $request)
    {
        // Impede a atualização de dados no modo demo para usuários padrão
        if (config('app.is_demo') && in_array(Auth::id(), [1])) {
            return back()->with('error', "You are in a demo version. You are not allowed to change the email for default users.");
        }

        // Valida os campos enviados na solicitação
        $request->validate([
            'name' => 'required|min:3|max:255', // Nome é obrigatório, com um mínimo de 3 e máximo de 255 caracteres
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(), // Email único, exceto para o próprio usuário
            'location' => 'max:255', // Localização opcional, com máximo de 255 caracteres
            'phone' => 'numeric|digits:10', // Telefone opcional, deve ser numérico e ter 10 dígitos
            'about' => 'max:255', // Informação "sobre" opcional, com máximo de 255 caracteres
        ], [
            'name.required' => 'Nome é necessário', // Mensagem de erro personalizada para o nome
            'email.required' => 'Email é necessário', // Mensagem de erro personalizada para o email
        ]);

        // Recupera o usuário autenticado
        $user = User::find(Auth::id());

        // Atualiza os dados do usuário no banco de dados
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'location' => $request->location,
            'phone' => $request->phone,
            'about' => $request->about,
        ]);

        // Redireciona de volta com uma mensagem de sucesso
        return back()->with('success', 'Perfil atualizado com sucesso.');
    }
}
