<nav class="navbar navbar-expand-sm navbar-custom">
    <a class="navbar-brand" href="../index.php">
        <img src="../../imagenes/logo-copa-america.png" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">&#9776;</span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="logIn.php" id="login-link" class="nav-link">Iniciar Sesión</a>
            </li>
            <li class="nav-item">
                <a href="cargarPartidos.php" id="partidos-link" class="nav-link d-none">Administrar Partidos</a>
            </li>
            <li class="nav-item">
                <a href="miCuentaTop.php" id="perfil-link" class="nav-link d-none">Mi Cuenta</a>
            </li>
            <li class="nav-item">
                <a href="../modulos/logOut.php" id="cerrar-sesion-link" class="nav-link d-none">Cerrar Sesión</a>
            </li>
        </ul>
    </div>
</nav>
<style>
.navbar-custom {
    background-color: #003282;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.4);
    margin-bottom: 20px;
}

.navbar-nav .nav-link {
    color: white;
    margin: 0 10px;
    display: inline-block;
}

.navbar-toggler-icon {
    color: white;
}

.navbar-collapse {
    justify-content: flex-end;
}

.nav-item.active .nav-link {
    font-weight: bold;
}

.navbar-brand {
    position: relative;
}

.navbar-brand::after {
    content: '';
    display: block;
    width: 1px;
    height: 100%;
    background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 50%, rgba(255, 255, 255, 0) 100%);
    position: absolute;
    right: -20px;
    top: 0;
}
</style>