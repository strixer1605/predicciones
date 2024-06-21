<?php
    session_start();

    // Verificar si hay una sesión activa
    if (isset($_SESSION['dni'])) {
        session_destroy();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/logIn.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&display=swap" rel="stylesheet">
</head>
<body>
<div class="header d-flex justify-content-between">
        <div class="logo-container"><a href="../index.php" class="nav-item nav-link"><img src="../../imagenes/logo-copa-america.png" alt="logo"></a></div>
        <div class="nav-links">
            <div class="nav-item">
                <a href="logIn.php" id="login-link" class="nav-link">Iniciar Sesión</a>
            </div>
            <div class="nav-item">
                <a href="#" id="perfil-link" class="nav-link d-none">Mi Cuenta</a>
            </div>
            <div class="nav-item">
                <a href="modulos/logOut.php" id="cerrar-sesion-link" class="nav-link d-none">Cerrar Sesión</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="login-container">
            <h2>Iniciar Sesión</h2>
            <div class="form-group">
                <label for="dni">Dni</label>
                <input type="dni" class="form-control" id="dni" placeholder="Ingrese su dni">
            </div>
            <button type="submit" id="enviar" class="btn btn-primary">Iniciar Sesión</button>
            <a href="register.php" class="register-link">¿No tienes una cuenta? Crear una cuenta</a>
        </div>
    </div>
    <div class="footer">
        FOOTER
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../funciones/logIn.js"></script>
    <script>
    $(document).ready(function() {
        // Vaciar todos los campos del formulario al cargar la página
        $('#dni').val('');
    });
    </script>
</body>
</html>
