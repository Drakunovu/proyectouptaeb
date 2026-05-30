<?php
session_start();
require_once __DIR__."/vendor/autoload.php";
use app\controller\Controller;
use app\config\Config;
$pdo = config::conexion();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $form = $_POST["form"];
    switch($form) {
        case "registro":
            $controller = new Controller($pdo);
            $controller->registrar();
        break;
        case "login":
            $controller = new Controller($pdo);
            $controller->login();
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/script/code.js" defer></script>
    <title>Document</title>
</head>
<body>
    <header>
        <div class="top-menu">
            <div class="top-menu__perfil">
                <img class="top-menu__perfil-img" src="assets/media//img/mini/Mayano_Top_Gun.webp" alt="">
                <p class="top-menu__perfil-name">Hola!</p>
            </div>
            <div class="top-menu__links">
                <a href="#" class="top-menu__link">Inicio</a>
                <a href="#" class="top-menu__link">Info</a>
                <a href="#" class="top-menu__link">Más</a>
            </div>
            <div class="top-menu__login">
                <a href="#" class="top-menu__login-lang">ESP</a>
            </div>
        </div>
    </header>
    <main>
        <section class="section-1">
            <div class="section-1__box">
                <div class="login-card">
                    <h1 class="login-card__title">Registro!</h1>
                    <form class="login-card__form" action="" method="POST">
                        <label class="login-card__label"> Cedula
                            <input class="login-card__input" type="text" name="cedula" id="">
                        </label>
                        <label class="login-card__label"> Contraseña
                            <input class="login-card__input" type="password" name="password">
                        </label>
                        <input type="hidden" name="form" value="registro">
                        <button class="login-card__submit" type="submit">Registro</button>
                    </form>
                <?= isset($_SESSION["registro_notif"]) ? $_SESSION["registro_notif"] : "" ?>
    
                </div>
                <div class="login-card">
                    <img class="login-card__logo" src="assets/media/img/uptaeb.jpg" alt="">
                    <h3 class="login-card__title">Servicio de Salud universitaria UPTAEB</h3>
                    <p class="login-card__p">Control de Acceso<p/>
                    
                    <form class="login-card__form" action="" method="POST">
                        <label class="login-card__label"> Cédula de identidad
                            <input class="login-card__input" placeholder="Ej. 1532423" type="text" name="cedula" id="loginCardCedula">
                        </label>
                        <label class="login-card__label"> Contraseña
                            <input class="login-card__input" placeholder="*********" type="password" name="password">
                        </label>
                            <input type="hidden" name="form" value="login">
                        <button class="login-card__submit" type="submit">Ingresar al sistema</button>
                    </form>
                    <p class="login-card__disclaimer">@ 2026 PNF Informatica - Universidad Politecnica Territorial de Lara Andres Eloy Blanco</p>
                    <?= isset($_SESSION["login_notif"]) ? $_SESSION["login_notif"] : "" ?>
                    
                </div>
            </div>
        </section>
    </main>
    <footer>

    </footer>
</body>
</html>