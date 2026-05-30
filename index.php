<?php
session_start();
require_once __DIR__."/vendor/autoload.php";
use app\controller\Controller;
use app\config\Config;
$pdo = config::conexion();
$controller = new Controller($pdo);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $form = $_POST["form"];
    switch($form) {
        case "registro":
            $controller->registrar();
            break;
        case "login":
            $controller->login();
            break;
    }
}

include __DIR__."/app/view/header.php";

$ruta = isset($_GET["ruta"]) ? trim ($_GET["ruta"], "/") : "login";
$partesRuta = explode("/", $ruta);
$paginaActual = $partesRuta[0];

switch($paginaActual) {
    case "login":
        include __DIR__."/app/view/login.php";
        break;

    case "perfil": 
        include __DIR__."/app/view/perfil.php";
        break;

    case "logout";
        session_unset();
        session_destroy();
        header("Location: login");
        exit();
        break;

    default: 
        include __DIR__."/app/view/login.php";
        break;
    }
?>