<?php

namespace App\database;

use PDO;


class Database
{
    private function __construct() {}

    public static function connect(): PDO
    {
        $host = getenv('DB_HOST');
        $dbname = getenv('DB_DATABASE');
        $db_username = getenv('DB_USERNAME');
        $db_password = getenv('DB_PASSWORD');
        $charset = 'utf8mb4';
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

        return new PDO($dsn, $db_username, $db_password);
    }
}
