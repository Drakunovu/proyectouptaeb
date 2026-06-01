<?php
if ($_SESSION["cedula"]) {
    
}

else {
    header("Location: index.php");
}
?>

<main class="perfil">
        <section class="section-1">
            <div class="section-1__box">
                <div class="action-card">
                    <h2 class="action-card__title">Gestión de usuarios</h2>
                    <div class="action-card__button-grid">    
                        <a name="openModal" value="modalRegistrarUsuario" class="action-card__button action-card__button--grid-principal" href="">Registrar paciente</a>
                        <a name="openModal" value="modalActualizarUsuario" class="action-card__button" href="">Actualizar paciente</a>
                        <a name="openModal" value="modalBuscarUsuario" class="action-card__button" href="">Buscar usuario</a>
                    </div>
                </div>
                <div class="action-card">
                    <h2 class="action-card__title">Gestión de consultas</h2>
                    <div class="action-card__button-grid">    
                        <a class="action-card__button action-card__button--grid-principal" href="">Iniciar consulta</a>
                        <a class="action-card__button" href="">Actualiza consulta</a>
                        <a class="action-card__button" href="">Buscar consulta</a>
                    </div>
                </div>
                <div class="action-card">
                    <h2>Gestión de sesión</h2>
                    <a href="logout" style="color: blue">Cerrar sesión</a>
                </div>
            </div>
        </section>
        <dialog id="modalRegistrarUsuario" class="modal-usuario">
            <p>aaaaaaaaaaaaaaaaaaaregistro</p>
        </dialog>
        <dialog id="modalBuscarUsuario" class="modal-usuario">
            <p>aaaaaaaaaaaaaaaaaaabuscar</p>
        </dialog>
        <dialog id="modalActualizarUsuario" class="modal-usuario">
            <p>aaaaaaaaaaaaactualizar</p>
        </dialog>
        
    </main>
    <footer>

    </footer>
</body>
</html>
