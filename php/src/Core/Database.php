<?php

namespace App\Core;

use PDO;
use PDOException;
use PDOStatement;

class Database
{
    private static \PDO $db;

    public function __construct()
    {
        $host = $_ENV['HOST'];
        $dbname = $_ENV['DB'];
        $username = $_ENV['USR'];
        $password = $_ENV['PSW'];

        try {
            self::$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            exit('Db connection error');
        }
    }

    public static function instance(): \PDO
    {
        return self::$db;
    }

    public static function q(string $q, array $params = []): PDOStatement
    {
        $db = self::$db;
        $statement = $db->prepare($q);
        $statement->execute($params);

        return $statement;
    }
}
