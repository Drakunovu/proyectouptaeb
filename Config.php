<?php
namespace app\config;

use PDO;
use PDOException;

class Config {
    public static function conexion() {
        $host = "sql200.infinityfree.com";
        $db = "if0_41723036_medicina_uptaeb";
        $user = "if0_41723036";
        $password = "yermainxx2025";

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }

        catch(PDOException $e) {
            echo "error";
        }

    }
}