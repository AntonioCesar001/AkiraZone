<?php

/**
 * Verifica se a rota atual corresponde ao nome da rota fornecido.
 *
 * @param string $routeName O nome da rota a ser verificado.
 * @return string Retorna 'active' se a rota atual corresponder ao nome da rota, caso contrário, retorna uma string vazia.
 */
function is_current_route($routeName)
{
    return request()->routeIs($routeName) ? 'active' : '';
}

/**
 * Verifica se um valor existe em um array multidimensional.
 *
 * @param mixed $needle O valor a ser buscado.
 * @param array $haystack O array em que a busca será realizada.
 * @param bool $strict (Opcional) Se deve ser feita uma comparação estrita. Padrão: false.
 * @return bool Retorna true se o valor for encontrado, caso contrário, retorna false.
 */
function in_array_r($needle, $haystack, $strict = false)
{
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}

/**
 * Obtém um array de categorias baseado em um pai e, opcionalmente, um filho.
 *
 * @param string $parent A categoria pai que será buscada.
 * @param string|null $child (Opcional) A categoria filho que será buscada.
 * @return mixed Retorna a categoria pai se nenhum filho for fornecido, 
 *               caso contrário, retorna a categoria filho. 
 *               Retorna null se a categoria pai não existir.
 */
function getCategoriesArray($parent, $child = null)
{
    $categories = array(
        'dashboard', 'tables', 'wallet', 'RTL',

        'laravel-examples' => array(
            'user-profile',
            'users-management',
        ),
    );

    if ($child)
        return $categories[$parent][$child] ?? null; // Usando null coalescing para evitar erro se não existir.
    else
        return $categories[$parent] ?? null; // Usando null coalescing para evitar erro se não existir.
}
