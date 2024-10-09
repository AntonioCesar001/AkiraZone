<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Classe NavbarGuest que representa um componente de barra de navegação para usuários convidados.
 *
 * Este componente encapsula a lógica e a estrutura da barra de navegação
 * visível para usuários que não estão autenticados, permitindo uma interface
 * de usuário consistente e simplificada.
 */
class NavbarGuest extends Component
{
    /**
     * Cria uma nova instância do componente.
     *
     * O construtor pode ser usado para inicializar qualquer
     * propriedade necessária, mas atualmente não possui
     * lógica personalizada.
     */
    public function __construct()
    {
        //
    }

    /**
     * Obtém a visualização / conteúdo que representa o componente.
     *
     * Este método é responsável por retornar a view que será renderizada
     * quando o componente for utilizado em outras partes da aplicação.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        // Retorna a view que representa a barra de navegação para usuários convidados.
        return view('components.navbar-guest');
    }
}
