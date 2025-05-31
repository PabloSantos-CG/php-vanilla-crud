<?php

namespace App\Services;

use App\database\Database;
use App\Models\User;
use ErrorException;

class UserService
{
    public function __construct(
        private User $user,
    ) {}

    /** 
     * @return array<int, array{id: int, username: string, email: string, password: string}> | array{} 
     */
    public function getAllUsers()
    {
        return $this->user->getAll();
    }

    public function getUserById(string $id)
    {
        $result = $this->user->getById($id);

        if (!$result) {
            throw new ErrorException('Usuário inexistente ou ID inválido.');
        }

        return $result;
    }

    private function checkUser(?int $id = null, ...$atritubes)
    {
        if (!$id) {
            $sql = 'SELECT * FROM users WHERE username= ? AND email= ? AND password= ?';
        } else {
            $sql = 'SELECT * FROM users WHERE id= ?';
        }

        $pdo = Database::connect();
        $stmt = $pdo->prepare($sql);

        $id ? $stmt->execute([$id]) : $stmt->execute($atritubes);

        $result = $stmt->fetch();

        if (!$result) {
            return true;
        }

        return false;
    }

    //implementar try catch junto com erros mais específicos
    public function createUser(string $username, string $email, string $password)
    {
        $userExists = $this->checkUser($username, $email, $password);
        if (!$userExists) {
            throw new ErrorException('Usuário já existe');
        }

        $newUser = $this->user->create($username, $email, $password);

        if (!$newUser) {
            throw new ErrorException('Não foi possível concluir a operação');
        }

        return true;
    }

    public function updateUser(
        int $id,
        ?string $username = null,
        ?string $email = null,
        ?string $password = null,
    ) {
        $userExists = $this->checkUser($id);

        if (!$userExists) {
            throw new ErrorException('Usuário inexistente.');
        }

        if (!$username && !$email && !$password) {
            throw new ErrorException('Necessário informar um ou mais atributos.');
        }

        $result = $this->user->update($username, $email, $password);

        if (!$result) {
            throw new ErrorException('Não foi possível concluir a operação');
        }

        return true;
    }

    public function removeUser(int $id)
    {
        $userExists = $this->checkUser($id);

        if (!$userExists) {
            throw new ErrorException('Usuário inexistente.');
        }

        $result = $this->user->remove($id);

        if (!$result) {
            throw new ErrorException('Não foi possível concluir a operação');
        }

        return true;
    }
}
