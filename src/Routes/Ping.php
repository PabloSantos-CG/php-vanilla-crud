<?php

namespace App\Routes;

use App\Http\Request;
use App\Http\Response;

class Ping
{
    public static function ping(Request $req, Response $res)
    {
        if ($req->method() != 'GET') {
            $res->json([
                'status' => 'error',
                'message' => 'Invalid Method',
            ]);
        }
        if (isset($_GET['url']) && $_GET['url'] === 'ping') {
            $res->json(['ping' => 'pong']);
        }
    }
}
