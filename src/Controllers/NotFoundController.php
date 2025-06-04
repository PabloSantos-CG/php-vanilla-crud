<?php

namespace App\Controllers;

use App\Http\Response;

class NotFoundController
{
    public static function index()
    {
        $res = new Response();

        $res->json([
            'status' => 'error',
            'message' => 'Not Found',
        ], 404);
    }
}
