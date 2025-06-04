<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;

class NotFoundController
{
    public static function index(Request $req, Response $res)
    {
        $res->json([
            'status' => 'error',
            'message' => 'Not Found',
        ], 404);
    }
}
