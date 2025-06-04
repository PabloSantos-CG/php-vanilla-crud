<?php

namespace App\Http;


class Request
{
    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function body()
    {
        $json = json_decode(file_get_contents('php://input'), true) ?? [];

        $data = match ($this->method()) {
            'GET' => $_GET,
            'POST', 'PUT', 'DELETE' => $json,
        };

        return $data;
    }
}
