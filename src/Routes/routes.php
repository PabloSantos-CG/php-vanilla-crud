<?php

use App\Controllers\UserController;
use App\Models\User;
use App\Requeste\Request;
use App\Response\Response;
use App\Routes\Routes;
use App\Services\UserService;

// Rota de test -> Ping: Pong
Routes::ping();

$req = new Request();
$res = new Response();

// Rotas de User
$user = new User();
$userService = new UserService($user);

Routes::get('/users', fn() => UserController::getAllUsers($req, $res, $userService));
Routes::get('/users/{id}', fn($id) => UserController::getUserById($req, $res, $id, $userService));
Routes::post('/users', fn() => UserController::createUser($req, $res, $userService));
Routes::put('/users/{id}', fn($id) => UserController::updateUser($req, $res, $id, $userService));
Routes::delete('/users/{id}', fn($id) => UserController::removeUser($req, $res, $id, $userService));
