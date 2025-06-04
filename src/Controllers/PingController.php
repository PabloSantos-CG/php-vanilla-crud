<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;

class PingController
{
    public static function ping(Request $req, Response $res)
    {
        if ($req->method() != 'GET') {
            $res->json([
                'status' => 'error',
                'message' => 'Invalid Method',
            ]);
        }

        $res->json(['ping' => 'pong']);
    }
}
