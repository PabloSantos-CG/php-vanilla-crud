<?php

// quem vai executar regex para capturar id e executar o método correspondente que está no routes
class Core
{
    /**
     * @param array<int, array{
     *     method: string,
     *     path: string,
     *     controller: callable
     * }> $routes
     */
    public function run($routes)
    {
        $url = $_GET['url'];

        
    }
}
