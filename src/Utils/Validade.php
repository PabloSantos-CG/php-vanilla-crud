<?php

namespace App\Utils;

use App\Http\Request;
use App\Http\Response;

class Validate {
    public static function isPasswordValid(string $passwd) {
        if (\strlen($passwd) < 6 || strlen($passwd) > 12) {
            return false;
        }
        return true;
    }

    public static function methodIsAllowed(Request $req, Response $res, string $method) {
        if ($req::method() != $method) {
            $res::json([
                'status' => 'error',
                'message' => 'Invalid Method',
            ], 404);
        }
    }
}