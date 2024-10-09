<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Esta classe representa uma migração para a criação da tabela 'password_reset_tokens'.
 * A tabela é utilizada para armazenar tokens de redefinição de senha associados aos e-mails dos usuários.
 */
return new class extends Migration
{
    /**
     * Executa a migração, criando a tabela 'password_reset_tokens'.
     *
     * Este método é chamado quando a migração é executada.
     * Ele define a estrutura da tabela 'password_reset_tokens', incluindo
     * todos os campos necessários para armazenar os tokens de redefinição de senha.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Cria uma coluna 'email' como chave primária para identificar unicamente cada registro.
            $table->string('token'); // Cria uma coluna para armazenar o token de redefinição de senha.
            $table->timestamp('created_at')->nullable(); // Cria uma coluna para armazenar a data e hora em que o token foi criado, permitindo valores nulos.
        });
    }

    /**
     * Reverte a migração, removendo a tabela 'password_reset_tokens'.
     *
     * Este método é chamado quando a migração é revertida.
     * Ele remove a tabela 'password_reset_tokens' do banco de dados.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('password_reset_tokens'); // Remove a tabela 'password_reset_tokens' se existir.
    }
};
