<?php

namespace App\Controllers;

use App\Requeste\Request;
use App\Response\Response;

class UserController
{
    public static function getAllUsers(Request $req, Response $res) {}
    public static function getUserById(Request $req, Response $res, string $id) {}
    public static function createUser(Request $req, Response $res) {}
    public static function updateUser(Request $req, Response $res, string $id) {}
    public static function removeUser(Request $req, Response $res, string $id) {}
}

