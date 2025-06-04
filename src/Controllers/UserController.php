<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Services\UserService;
use App\Utils\Validate;

/**
 * pendente refatorar para implementar try catch e melhorar validações
 */

class UserController
{
    public static function getAllUsers(
        Request $req,
        Response $res,
        UserService $userService
    ) {
        Validate::methodIsAllowed($req, $res, 'GET');

        $data = $userService->getAllUsers();
        $res->json($data);
    }

    public static function getUserById(
        Request $req,
        Response $res,
        string $id,
        UserService $userService,
    ) {
        Validate::methodIsAllowed($req, $res, 'GET');

        $data = $userService->getUserById($id);
        $res->json($data);
    }

    public static function createUser(
        Request $req,
        Response $res,
        UserService $userService,
    ) {
        Validate::methodIsAllowed($req, $res, 'POST');

        if (\count($req->body()) != 3) {
            $res->json([
                'status' => 'error',
                'message' => 'Quantidade de argumentos inválida',
            ]);
        }

        ['username' => $username, 'email' => $email, 'password' => $password] = $req->body();

        $userService->createUser($username, $email, $password);
        $res->json();
    }

    public static function updateUser(
        Request $req,
        Response $res,
        string $id,
        UserService $userService,
    ) {
        Validate::methodIsAllowed($req, $res, 'PUT');

        $data = $req->body();

        if (count($data) > 3 || count($data) == 0) {
            $res->json([
                'status' => 'error',
                'message' => 'Foi informado uma quantidade de parâmetros maior do que o necessário',
            ]);
        }

        $allowedKeys = ['username', 'email', 'password'];

        foreach ($allowedKeys as $key) {
            if (\array_key_exists($key, $data)) {
                $keysMatch[] = true;
            }
        }

        if (count($keysMatch) == 0) {
            $res->json([
                'status' => 'error',
                'message' => 'Quantidade de argumentos insuficiente',
            ]);
        }

        $result = $userService->updateUser($id, ...$data);
        if ($result) $res->json();
    }

    public static function removeUser(
        Request $req,
        Response $res,
        string $id,
        UserService $userService,
    ) {
        Validate::methodIsAllowed($req, $res, 'DELETE');

        $result = $userService->removeUser($id);
        if ($result) $res->json();
    }
}
