<?php

use App\Controllers\UserController;
use App\Routes\Routes;

// Rota de test -> Ping: Pong
Routes::ping();

// Rotas de User
Routes::get('/users', fn() => UserController::getAllUsers());
Routes::get('/users/{id}', fn($id) => UserController::getUserById($id));
Routes::post('/users', fn($data) => UserController::addUser($data));
Routes::put('/users/{id}', fn($id, $data) => UserController::updateUser($id, $data));
Routes::delete('/users/{id}', fn($id) => UserController::removeUser($id));
