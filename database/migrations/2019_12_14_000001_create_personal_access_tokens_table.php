<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Esta classe representa uma migração para a criação da tabela 'personal_access_tokens'.
 * A tabela é utilizada para armazenar tokens de acesso pessoal, que podem ser usados
 * para autenticação em aplicações e APIs.
 */
return new class extends Migration
{
    /**
     * Executa a migração, criando a tabela 'personal_access_tokens'.
     *
     * Este método é chamado quando a migração é executada.
     * Ele define a estrutura da tabela 'personal_access_tokens', incluindo
     * todos os campos necessários para armazenar informações sobre os tokens.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id(); // Cria uma coluna 'id' como chave primária auto-incrementável.
            $table->morphs('tokenable'); // Cria colunas 'tokenable_id' e 'tokenable_type' para suporte a relacionamentos polimórficos.
            $table->string('name'); // Cria uma coluna para armazenar o nome do token.
            $table->string('token', 64)->unique(); // Cria uma coluna para armazenar o token de acesso, limitado a 64 caracteres e com valor único.
            $table->text('abilities')->nullable(); // Cria uma coluna para armazenar as habilidades do token, permitindo que seja nula.
            $table->timestamp('last_used_at')->nullable(); // Cria uma coluna para armazenar a última vez que o token foi usado, permitindo que seja nula.
            $table->timestamp('expires_at')->nullable(); // Cria uma coluna para armazenar a data e hora de expiração do token, permitindo que seja nula.
            $table->timestamps(); // Cria colunas de controle de criação e atualização automáticas ('created_at' e 'updated_at').
        });
    }

    /**
     * Reverte a migração, removendo a tabela 'personal_access_tokens'.
     *
     * Este método é chamado quando a migração é revertida.
     * Ele remove a tabela 'personal_access_tokens' do banco de dados.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens'); // Remove a tabela 'personal_access_tokens' se existir.
    }
};
