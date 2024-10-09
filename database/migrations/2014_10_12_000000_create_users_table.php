<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Esta classe representa uma migração para a criação da tabela 'users'.
 * A tabela armazena informações sobre os usuários do sistema.
 */
return new class extends Migration
{
    /**
     * Executa a migração, criando a tabela 'users'.
     *
     * Este método é chamado quando a migração é executada.
     * Ele define a estrutura da tabela 'users', incluindo
     * todos os campos necessários.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Cria uma coluna de ID auto-incrementável.
            $table->string('name'); // Cria uma coluna para armazenar o nome do usuário.
            $table->string('email')->unique(); // Cria uma coluna para armazenar o e-mail, garantindo que seja único.
            $table->timestamp('email_verified_at')->nullable(); // Cria uma coluna para a data de verificação do e-mail, permitindo valores nulos.
            $table->string('password'); // Cria uma coluna para armazenar a senha do usuário.
            $table->string('phone')->nullable(); // Cria uma coluna para armazenar o telefone do usuário, permitindo valores nulos.
            $table->string('location')->nullable(); // Cria uma coluna para armazenar a localização do usuário, permitindo valores nulos.
            $table->text('about')->nullable(); // Cria uma coluna para armazenar informações sobre o usuário, permitindo valores nulos.
            $table->rememberToken(); // Cria uma coluna para o token de "lembrar-me" do usuário.
            $table->timestamps(); // Cria colunas para as datas de criação e atualização do registro.
        });
    }

    /**
     * Reverte a migração, removendo a tabela 'users'.
     *
     * Este método é chamado quando a migração é revertida.
     * Ele remove a tabela 'users' do banco de dados.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('users'); // Remove a tabela 'users' se existir.
    }
};
