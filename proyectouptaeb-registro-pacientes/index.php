<?php
session_start();
require_once __DIR__."/vendor/autoload.php";
use app\controller\Controller;
use app\controller\PacienteController;
use app\config\Config;

$pdo = Config::conexion(); 
$controller = new Controller($pdo);
$controllerPaciente = new PacienteController($pdo);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $form = isset($_POST["form"]) ? $_POST["form"] : '';
    switch($form) {
        case "registro_prueba":
            $controller->registrar();
            break;

        case "registro_paciente":
            $controllerPaciente->Registrar();    
            break;
        case "login":
            $controller->login();
            break;
    }
}

$status = isset($_GET['status']) ? $_GET['status'] : '';
$msg = isset($_GET['msg']) ? htmlspecialchars($_GET['msg']) : '';

$ruta = isset($_GET["ruta"]) ? trim($_GET["ruta"], "/") : "login";
$partesRuta = explode("/", $ruta);
$paginaActual = $partesRuta[0];

include __DIR__."/app/view/header.php";

switch($paginaActual) {
    case "login":
        include __DIR__."/app/view/login.php";
        break;

    case "registrar": 
        include __DIR__."/app/view/registropaciente.php";
        break;

    case "perfil": 
        include __DIR__."/app/view/perfil.php";
        break;

    case "logout":
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