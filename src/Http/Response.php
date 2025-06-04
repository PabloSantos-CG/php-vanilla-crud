<?php

namespace App\Http;


class Response
{
    public function json(array $data = [], int $status_code = 200)
    {
        http_response_code($status_code);
        header('Content-type: application/json');

        echo json_encode($data);
    }
}
