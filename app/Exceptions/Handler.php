<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

/**
 * Classe Handler responsável por gerenciar as exceções da aplicação.
 * 
 * Estende a classe ExceptionHandler do Laravel e permite personalizar o tratamento e
 * o relatório de exceções.
 */
class Handler extends ExceptionHandler
{
    /**
     * Lista de inputs que nunca devem ser exibidos na sessão durante
     * exceções de validação.
     *
     * @var array<int, string> Lista de campos que não devem ser "flashados" para a sessão.
     * 
     * O Laravel por padrão envia (ou "flasha") os dados de entrada (inputs) do formulário
     * para a sessão ao ocorrer um erro de validação. No entanto, esta lista contém
     * campos sensíveis que não devem ser incluídos na sessão por questões de segurança.
     * 
     * Aqui estão três campos comuns de senha que devem ser omitidos:
     * - 'current_password': a senha atual do usuário.
     * - 'password': o novo campo de senha.
     * - 'password_confirmation': a confirmação da nova senha.
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Registra os callbacks para o tratamento de exceções na aplicação.
     * 
     * O método `register` permite definir como exceções serão tratadas ou reportadas.
     * 
     * - `reportable`: um callback que permite capturar e processar exceções lançadas na aplicação.
     *   Ele recebe uma instância de `Throwable` como parâmetro, que representa qualquer exceção
     *   ou erro que ocorra. Neste caso, o callback está vazio (`//`), o que significa que nenhuma
     *   ação específica está sendo tomada para reportar as exceções.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
            // Aqui você pode definir a lógica para lidar com exceções específicas,
            // como reportá-las para serviços de monitoramento de erros, como Sentry ou Bugsnag.
        });
    }
}
