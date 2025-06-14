<?php

namespace App\Core;

use App\Controllers\NotFoundController;


class Core
{
    /**
     * @param array{
     *     method: string,
     *     path: string,
     *     controller: callable
     * } $route
     */
    private static function methodAllowed($route)
    {
        if ($_SERVER['REQUEST_METHOD'] !== $route['method']) {
            return false;
        }
        return true;
    }

    /**
     * @param array<int, array{
     *     method: string,
     *     path: string,
     *     controller: callable
     * }> $routes
     */
    public static function run($routes)
    {
        $url = '/';

        if (isset($_GET['url'])) {
            $url .= $_GET['url'];
            $url = rtrim($url, '/');
        }

        $routeNotFound = true;

        foreach ($routes as $route) {
            $pattern = '#^' . preg_replace('#\{[^}]+\}#', '(\d+)', $route['path']) . '$#';

            if (preg_match($pattern, $url, $matches) && self::methodAllowed($route)) {
                array_shift($matches);
                call_user_func($route['controller'], ...$matches);

                $routeNotFound = false;
                break;
            }
        }

        if ($routeNotFound) {
            NotFoundController::index();
        }
    }
}
