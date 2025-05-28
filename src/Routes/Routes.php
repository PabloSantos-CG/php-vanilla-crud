<?php

namespace App\Routes;


class Routes
{
    private static array $routes = [];

    private function __construct() {}

    public static function get(string $path, callable $callable)
    {
        Routes::$routes[] = [
            'method' => 'GET',
            'path' => $path,
            'controller' => $callable,
        ];
    }

    public static function post(string $path, callable $callable)
    {
        Routes::$routes[] = [
            'method' => 'POST',
            'path' => $path,
            'controller' => $callable,
        ];
    }

    public static function put(string $path, callable $callable)
    {
        Routes::$routes[] = [
            'method' => 'PUT',
            'path' => $path,
            'controller' => $callable,
        ];
    }

    public static function delete(string $path, callable $callable)
    {
        Routes::$routes[] = [
            'method' => 'DELETE',
            'path' => $path,
            'controller' => $callable,
        ];
    }


    public static function routes(): array
    {
        return Routes::$routes;
    }

    public static function ping()
    {
        if (isset($_GET['url']) && $_GET['url'] === 'ping') {
            header('Content-Type: application/json');
            echo json_encode(['ping' => 'pong']);
        }
    }
}
