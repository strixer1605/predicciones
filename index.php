<?php
    session_start();

    // Verificar si hay una sesión activa
    if (isset($_SESSION['email'])) {
        $estaLogueado = true;
    } else {
        $estaLogueado = false;
    }
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Proxies.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Grupos</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header d-flex justify-content-between">
        <div class="logo-container"><a href="#" class="nav-item nav-link"><img src="imagenes/logo-copa-america.png" alt="logo"></a></div>
        <div class="nav-links">
            <div class="nav-item">
                <a href="main/logIn.php" id="login-link" class="nav-link">Iniciar Sesión</a>
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
        <div class="row">
            <div class="col-md-6">
                <div class="group-container">
                    <div class="group-header">
                        <h5>Grupo A</h5>
                        <span class="points">PTS</span>
                    </div>
                    <a href="pagina_destino.html" class="country">
                        <div>
                            <img src="imagenes/argentina.png" alt="Argentina">
                            <span>Argentina</span>
                        </div>
                        <span class="points">0</span>
                    </a>
                    <a href="pagina_destino.html" class="country">
                        <div>
                            <img src="imagenes/canada.png" alt="Canadá">
                            <span>Canadá</span>
                        </div>
                        <span class="points">0</span>
                    </a>
                    <a href="pagina_destino.html" class="country">
                        <div>
                            <img src="imagenes/chile.png" alt="Chile">
                            <span>Chile</span>
                        </div>
                        <span class="points">0</span>
                    </a>
                    <a href="pagina_destino.html" class="country">
                        <div>
                            <img src="imagenes/peru.png" alt="Perú">
                            <span>Perú</span>
                        </div>
                        <span class="points">0</span>
                    </a>
                </div>
                <div class="group-container">
                    <div class="group-header">
                        <h5>Grupo B</h5>
                        <span class="points">PTS</span>
                    </div>
                    <a href="pagina_destino.html" class="country">
                        <div>
                            <img src="imagenes/ecuador.png" alt="Ecuador">
                            <span>Ecuador</span>
                        </div>
                        <span class="points">0</span>
                    </a>
                    <a href="pagina_destino.html" class="country">
                        <div>
                            <img src="imagenes/jamaica.png" alt="Jamaica">
                            <span>Jamaica</span>
                        </div>
                        <span class="points">0</span>
                    </a>
                    <a href="pagina_destino.html" class="country">
                        <div>
                            <img src="imagenes/mexico.png" alt="México">
                            <span>México</span>
                        </div>
                        <span class="points">0</span>
                    </a>
                    <a href="pagina_destino.html" class="country">
                        <div>
                            <img src="imagenes/venezuela.png" alt="Venezuela">
                            <span>Venezuela</span>
                        </div>
                        <span class="points">0</span>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="group-container">
                    <div class="group-header">
                        <h5>Grupo C</h5>
                        <span class="points">PTS</span>
                    </div>
                    <a href="pagina_destino.html" class="country">
                        <div>
                            <img src="imagenes/bolivia.png" alt="Bolivia">
                            <span>Bolivia</span>
                        </div>
                        <span class="points">0</span>
                    </a>
                    <a href="pagina_destino.html" class="country">
                        <div>
                            <img src="imagenes/estadosUnidos.png" alt="Estados Unidos">
                            <span>Estados Unidos</span>
                        </div>
                        <span class="points">0</span>
                    </a>
                    <a href="pagina_destino.html" class="country">
                        <div>
                            <img src="imagenes/panama.png" alt="Panamá">
                            <span>Panamá</span>
                        </div>
                        <span class="points">0</span>
                    </a>
                    <a href="pagina_destino.html" class="country">
                        <div>
                            <img src="imagenes/uruguay.png" alt="Uruguay">
                            <span>Uruguay</span>
                        </div>
                        <span class="points">0</span>
                    </a>
                </div>
                <div class="group-container">
                    <div class="group-header">
                        <h5>Grupo D</h5>
                        <span class="points">PTS</span>
                    </div>
                    <a href="pagina_destino.html" class="country">
                        <div>
                            <img src="imagenes/brasil.png" alt="Brasil">
                            <span>Brasil</span>
                        </div>
                        <span class="points">0</span>
                    </a>
                    <a href="pagina_destino.html" class="country">
                        <div>
                            <img src="imagenes/colombia.png" alt="Colombia">
                            <span>Colombia</span>
                        </div>
                        <span class="points">0</span>
                    </a>
                    <a href="pagina_destino.html" class="country">
                        <div>
                            <img src="imagenes/costaRica.png" alt="Costa Rica">
                            <span>Costa Rica</span>
                        </div>
                        <span class="points">0</span>
                    </a>
                    <a href="pagina_destino.html" class="country">
                        <div>
                            <img src="imagenes/paraguay.png" alt="Paraguay">
                            <span>Paraguay</span>
                        </div>
                        <span class="points">0</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        FOOTER
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function actualizarNavbar() {
            var estaLogueado = <?php echo $estaLogueado ? 'true' : 'false'; ?>;

            if (estaLogueado) {
                document.getElementById('login-link').classList.add('d-none');
                document.getElementById('perfil-link').classList.remove('d-none');
                document.getElementById('cerrar-sesion-link').classList.remove('d-none');
            } else {
                document.getElementById('login-link').classList.remove('d-none');
                document.getElementById('perfil-link').classList.add('d-none');
                document.getElementById('cerrar-sesion-link').classList.add('d-none');
            }
        }

        // Llamar a la función al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            actualizarNavbar();
        });

    </script>
</body>
</html>
