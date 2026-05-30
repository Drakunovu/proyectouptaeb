<?php
session_start();
if ($_SESSION["cedula"]) {
    echo "Estas logueado";
}

else {
    header("Location: index.php");
}
?>


<main>
        <section class="section-1">
            <div class="section-1__box">
                <p>Haz iniciado sesión correctamente!</p>
                <a href="logout" style="color: blue">Cerrar sesión</a>
            </div>
        </section>
    </main>
    <footer>

    </footer>
</body>
</html>
