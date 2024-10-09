<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Classe User que representa um modelo de usuário na aplicação.
 *
 * Este modelo é responsável por interagir com a tabela de usuários no banco de dados.
 * Ele utiliza os recursos de autenticação do Laravel, notificações e API tokens.
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Os atributos que são atribuíveis em massa.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * Os atributos que devem ser ocultos para serialização.
     *
     * Esses atributos não serão incluídos na representação em JSON do modelo.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password', // A senha do usuário não será exposta.
        'remember_token', // O token de "lembrar-me" também é oculto.
    ];

    /**
     * Os atributos que devem ser convertidos.
     *
     * Aqui, especificamos como os atributos devem ser convertidos ao serem acessados.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime', // Converte o campo de verificação de e-mail para um objeto DateTime.
        'password' => 'hashed', // Garante que a senha seja sempre tratada como um valor hash.
    ];
}
