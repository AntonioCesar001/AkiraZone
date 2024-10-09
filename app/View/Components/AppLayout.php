<?php

namespace App\View\Components;

use Illuminate\View\Component;

/**
 * Classe AppLayout que representa um componente de layout da aplicação.
 *
 * Este componente é utilizado para encapsular a estrutura HTML comum
 * em diferentes partes da aplicação, facilitando a reutilização e a
 * consistência visual.
 */
class AppLayout extends Component
{
    /**
     * Obtém a visualização / conteúdo que representa o componente.
     *
     * Este método é responsável por retornar a view que será renderizada
     * quando o componente for utilizado em outras partes da aplicação.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        // Retorna a view que representa o layout principal da aplicação.
        return view('layouts.app');
    }
}
