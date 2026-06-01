<?php
namespace app\config;

use PDO;
use PDOException;

class Config {
    public static function conexion() {
        $host = getenv("DB_HOST") ?: "localhost";
        $db = getenv("DB_NAME") ?: "servicio_medico";
        $user = getenv("DB_USER") ?: "root";
        $password = getenv("DB_PASS") !== false ? getenv("DB_PASS") : "";

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
?>
