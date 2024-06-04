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
<style>
    body {
    background: linear-gradient(to bottom, #003282, #0056b3); /* Degradado de azul oscuro a un azul más claro */
    font-family: 'Gabarito', sans-serif;
    margin: 0;
    overflow-x: hidden; /* Evitar scroll horizontal */
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.header, .footer {
    background-color: #003282;
    color: white;
    text-align: center;
    padding: 10px 0;
    width: 100%;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.4);
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header img {
    height: 50px;
}

.nav-links {
    display: flex;
    align-items: center;
    padding-right: 20px;
}

.nav-item {
    margin-right: 10px;
}

.nav-item:last-child {
    margin-right: 0;
}

a{
    color: white;
}

.container {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
}

.register-container {
    background-color: #003366;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.4);
    max-width: 400px;
    width: 100%;
    color: white;
    margin: 20px;
}

.register-container h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    font-weight: bold;
}

.form-control {
    background-color: #003366;
    border: 1px solid #ccc;
    color: white;
}

.form-control:focus {
    background-color: #004080;
    border-color: #0056b3;
}

.btn-primary {
    background-color: #0056b3;
    border: none;
    width: 100%;
    padding: 10px;
    border-radius: 20px;
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: #0073e6;
}

.login-link {
    display: block;
    text-align: center;
    margin-top: 20px;
    color: #0073e6;
    text-decoration: none;
}

.login-link:hover {
    text-decoration: underline;
}

</style>
<body>
    <div class="header">
        <div class="logo-container">
            <a href="../index.php" class="nav-item nav-link">
                <img src="../imagenes/logo-copa-america.png" alt="logo">
            </a>
        </div>
        <div class="nav-links">
            <div class="nav-item">
                <a href="main/logIn.php" id="login-link" class="nav-link">Iniciar Sesión</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="register-container">
            <h2>Registro</h2>
                <div class="form-group">
                    <label for="dni">DNI</label>
                    <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese su DNI" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese su apellido" required>
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su correo electrónico" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Ingrese su contraseña" required>
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
            $('#email').val('');
            $('#contraseña').val('');
        });
    </script>
</body>
</html>
