<?php

namespace App\Controllers;

use App\Http\Response;

class NotFoundController
{
    public static function index()
    {
        Response::json([
            'status' => 'error',
            'message' => 'Not Found',
        ], 404);
    }
}
