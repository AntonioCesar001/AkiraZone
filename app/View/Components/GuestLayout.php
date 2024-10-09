<?php

namespace App\View\Components;

use Illuminate\View\Component;

/**
 * Classe GuestLayout que representa um componente de layout para usuários convidados.
 *
 * Este componente é utilizado para encapsular a estrutura HTML comum
 * em páginas acessíveis a usuários não autenticados, facilitando a
 * reutilização e a consistência visual em páginas como login e registro.
 */
class GuestLayout extends Component
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
        // Retorna a view que representa o layout para usuários convidados.
        return view('layouts.guest');
    }
}
