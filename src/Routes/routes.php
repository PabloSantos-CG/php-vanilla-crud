<?php

use App\Controllers\UserController;
use App\Requeste\Request;
use App\Response\Response;
use App\Routes\Routes;


// Rota de test -> Ping: Pong
Routes::ping();

$req = new Request();
$res = new Response();

// Rotas de User
Routes::get('/users', fn() => UserController::getAllUsers($req, $res));
Routes::get('/users/{id}', fn($id) => UserController::getUserById($req, $res, $id));
Routes::post('/users', fn() => UserController::addUser($req, $res));
Routes::put('/users/{id}', fn($id) => UserController::updateUser($req, $res, $id));
Routes::delete('/users/{id}', fn($id) => UserController::removeUser($req, $res, $id));
