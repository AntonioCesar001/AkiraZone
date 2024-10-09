<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * UserFactory é uma fábrica de modelos para a classe User.
 * Este arquivo é responsável por gerar instâncias fictícias do modelo User,
 * facilitando o preenchimento do banco de dados para testes e desenvolvimento.
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define o estado padrão do modelo User.
     *
     * Este método é chamado automaticamente ao criar um novo modelo User.
     * Ele retorna um array associativo com os atributos do modelo,
     * preenchendo-os com dados fictícios gerados pela biblioteca Faker.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(), // Gera um nome fictício.
            'email' => fake()->unique()->safeEmail(), // Gera um e-mail fictício único e seguro.
            'email_verified_at' => now(), // Define a data atual para o campo de verificação de e-mail.
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // Define uma senha hash (senha: 'password').
            'remember_token' => Str::random(10), // Gera um token aleatório para a funcionalidade de "lembrar-me".
        ];
    }

    /**
     * Indica que o endereço de e-mail do modelo deve ser não verificado.
     *
     * Este método altera o estado do modelo para que o campo
     * 'email_verified_at' seja definido como null, indicando
     * que o usuário não verificou seu e-mail.
     *
     * @return static
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null, // Define 'email_verified_at' como null.
        ]);
    }
}
