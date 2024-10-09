<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Esta classe é responsável por popular o banco de dados com dados iniciais.
 * Utiliza o Seeder para criar registros em tabelas específicas.
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Executa os seeders para popular o banco de dados.
     *
     * O método 'run' é chamado quando a migração de seeders é executada.
     * Neste caso, ele cria um usuário com dados predefinidos usando o UserFactory.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Alec Thompson', // Nome do usuário
            'email' => 'admin@corporateui.com', // E-mail do usuário, deve ser único
            'password' => Hash::make('secret'), // Senha do usuário, criptografada usando o Hash
            'about' => "Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality).", // Descrição sobre o usuário
        ]);
    }
}
