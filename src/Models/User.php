<?php

namespace App\Models;

use App\Models\Database;
use PDO;

class User
{
    /** 
     * @return array<int, array{id: int, username: string, email: string, password: string}> | array{} 
     */
    public function getAll(): array
    {
        $sql = 'SELECT * FROM users';

        $pdo = Database::connect();
        $stmt = $pdo->prepare($sql);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /** 
     * @return array{id: int, username: string, email: string, password: string} | array{} 
     */
    public function getById(string $id): array
    {
        $sql = 'SELECT * FROM users WHERE id= ?';

        $pdo = Database::connect();
        $stmt = $pdo->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(string $username, string $email, string $password): bool
    {
        $sql = 'INSERT INTO users (username, email, password) VALUES (?, ?, ?)';

        $pdo = Database::connect();
        $stmt = $pdo->prepare($sql);

        return $stmt->execute([$username, $email, $password]);
    }

    public function update(
        string $id,
        ?string $username = null,
        ?string $email = null,
        ?string $password = null,
    ): bool {
        $sql = '
            UPDATE users 
            SET 
                username= COALESCE(:username, username),
                email= COALESCE(:email, email),
                password= COALESCE(:password, password)
            WHERE id= :id
        ';

        $pdo = Database::connect();
        $stmt = $pdo->prepare($sql);

        return $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $password,
            ':id' => $id,
        ]);
    }

    public function remove(string $id): bool
    {
        $sql = 'DELETE FROM users WHERE id= ?';

        $pdo = Database::connect();
        $stmt = $pdo->prepare($sql);

        return $stmt->execute([$id]);
    }
}
