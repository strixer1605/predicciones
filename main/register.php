<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/register.css">     
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header">
        <div class="logo-container">
            <a href="../index.php" class="nav-item nav-link">
                <img src="../../imagenes/logo-copa-america.png" alt="logo">
            </a>
        </div>
        <div class="nav-links">
            <div class="nav-item">
                <a href="logIn.php" id="login-link" class="nav-link">Iniciar Sesión</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="register-container">
            <h2>Registro</h2>
                <div class="form-group">
                    <label for="dni">DNI</label>
                    <input type="number" class="form-control" id="dni" style="color: white;" name="dni" placeholder="Ingrese su DNI" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" style="color: white;" name="nombre" placeholder="Ingrese su nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" id="apellido" style="color: white;" name="apellido" placeholder="Ingrese su apellido" required>
                </div>
                <button type="submit" id="enviar" class="btn btn-primary">Registrarse</button>
            <a href="logIn.php" class="login-link">¿Ya tienes una cuenta? Iniciar sesión</a>
        </div>
    </div>
    <div class="footer">
        FOOTER
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../funciones/register.js"></script>
    <script>
        $(document).ready(function() {
            // Vaciar todos los campos del formulario al cargar la página
            $('#dni').val('');
            $('#nombre').val('');
            $('#apellido').val('');
        });
    </script>
</body>
</html>
