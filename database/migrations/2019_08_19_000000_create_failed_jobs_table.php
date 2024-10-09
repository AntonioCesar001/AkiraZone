<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Esta classe representa uma migração para a criação da tabela 'failed_jobs'.
 * A tabela é utilizada para armazenar informações sobre jobs que falharam durante o processamento.
 */
return new class extends Migration
{
    /**
     * Executa a migração, criando a tabela 'failed_jobs'.
     *
     * Este método é chamado quando a migração é executada.
     * Ele define a estrutura da tabela 'failed_jobs', incluindo
     * todos os campos necessários para armazenar as informações sobre os jobs falhados.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id(); // Cria uma coluna 'id' como chave primária auto-incrementável.
            $table->string('uuid')->unique(); // Cria uma coluna 'uuid' para identificar unicamente cada job falhado.
            $table->text('connection'); // Cria uma coluna para armazenar informações sobre a conexão utilizada pelo job.
            $table->text('queue'); // Cria uma coluna para armazenar o nome da fila do job.
            $table->longText('payload'); // Cria uma coluna para armazenar o payload do job que falhou.
            $table->longText('exception'); // Cria uma coluna para armazenar a exceção que foi lançada durante o processamento do job.
            $table->timestamp('failed_at')->useCurrent(); // Cria uma coluna para armazenar a data e hora em que o job falhou, com o valor padrão definido como o momento atual.
        });
    }

    /**
     * Reverte a migração, removendo a tabela 'failed_jobs'.
     *
     * Este método é chamado quando a migração é revertida.
     * Ele remove a tabela 'failed_jobs' do banco de dados.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('failed_jobs'); // Remove a tabela 'failed_jobs' se existir.
    }
};
