<?php
session_start();
if ($_SESSION["cedula"]) {
    echo "Estas logueado";
}

else {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>