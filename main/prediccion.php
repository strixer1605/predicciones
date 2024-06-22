<?php
    session_start();

    if (isset($_SESSION['dni'])) {
        $estaLogueado = true;
        $dniUsuario = $_SESSION['dni'];
        if($_SESSION['dni'] == "46736648"){
            $admin = true;
        } else {
            $admin = false;
        }
    } else {
        $estaLogueado = false;
        $dniUsuario = null;
        $admin = false; // Asegúrate de definir $admin aquí cuando el usuario no está logueado
    }

    // Obtener los partidos de la sesión
    $partidos = isset($_SESSION['partidos']) ? $_SESSION['partidos'] : [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/prediccion.css">
    <title>Predicciones</title>
    <script>
        function recargarPagina() {
            setTimeout(function() {
                location.reload();
            }, 60000); // 10000 milisegundos = 10 segundos
        }
    </script>
</head>
<body onload="recargarPagina()">
    <div class="header d-flex justify-content-between">
        <div class="logo-container"><a href="../index.php" class="nav-item nav-link"><img src="../../imagenes/logo-copa-america.png" alt="logo"></a></div>
        <div class="nav-links d-flex flex-column flex-sm-row align-items-center">
            <div class="nav-item">
                <a href="logIn.php" id="login-link" class="nav-link">Iniciar Sesión</a>
            </div>
            <div class="nav-item">
                <a href="cargarPartidos.php" id="partidos-link" class="nav-link d-none">Cargar Partidos</a>
            </div>
            <div class="nav-item">
                <a href="miCuentaTop.php" id="perfil-link" class="nav-link d-none">Mi Cuenta</a>
            </div>
            <div class="nav-item">
                <a href="../modulos/logOut.php" id="cerrar-sesion-link" class="nav-link d-none">Cerrar Sesión</a>
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="group-container" id="msj-c">
                <?php include('../modulos/puntajesTablaPredicciones.php'); ?>
                <div class="d-flex justify-content-center">
                    <script>
                        var estaLogueado = <?php echo $estaLogueado ? 'true' : 'false'; ?>;
                        var labelmsj = document.createElement('label');
                        if(estaLogueado == true) {
                            labelmsj.textContent = '* Si aparecen valores ya cargados: Es tu prediccion reciente (editable) *';
                        }
                        else {
                            labelmsj.textContent = '* Para participar debes de iniciar sesión o, en su defecto, registrarte *';
                        }

                        var contenedor = document.getElementById('msj-c');
                        contenedor.appendChild(labelmsj);
                    </script>
                </div>
            </div>
        </div>
    </div>

        <div class="footer">
            <span>FOOTER</span>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="../funciones/prediccion.js"></script>
        <script>
            function actualizarNavbar() {
                var estaLogueado = <?php echo $estaLogueado ? 'true' : 'false'; ?>;
                var admin = <?php echo $admin ? 'true' : 'false'; ?>;

                if (estaLogueado) {
                    document.getElementById('login-link').classList.add('d-none');
                    document.getElementById('perfil-link').classList.remove('d-none');
                    document.getElementById('cerrar-sesion-link').classList.remove('d-none');
                    if(admin){
                        document.getElementById('partidos-link').classList.remove('d-none');
                    }
                } else {
                    document.getElementById('login-link').classList.remove('d-none');
                    document.getElementById('perfil-link').classList.add('d-none');
                    document.getElementById('cerrar-sesion-link').classList.add('d-none');
                    document.getElementById('partidos-link').classList.add('d-none');
                }
            }

            function actualizarPredicciones() {
                var estaLogueado = <?php echo $estaLogueado ? 'true' : 'false'; ?>;
                if (!estaLogueado) {
                    var gf1Elements = document.getElementsByClassName('gf1');
                    while (gf1Elements.length > 0) {
                        var gf1Element = gf1Elements[0];
                        gf1Element.style.display = 'none'; // Oculta el elemento gf1

                        // Crea un nuevo elemento <span> con un guion dentro
                        var replacementSpan = document.createElement('span');
                        replacementSpan.textContent = '-';
                        
                        // Reemplaza el input con el nuevo elemento <span>
                        gf1Element.parentNode.replaceChild(replacementSpan, gf1Element);
                    }

                    var gf2Elements = document.getElementsByClassName('gf2');
                    while (gf2Elements.length > 0) {
                        var gf2Element = gf2Elements[0];
                        gf2Element.style.display = 'none'; // Oculta el elemento gf2

                        // Crea un nuevo elemento <span> con un guion dentro
                        var replacementSpan = document.createElement('span');
                        replacementSpan.textContent = '-';
                        
                        // Reemplaza el input con el nuevo elemento <span>
                        gf2Element.parentNode.replaceChild(replacementSpan, gf2Element);
                    }
                }
            }
            document.addEventListener('DOMContentLoaded', function() {
                actualizarNavbar();
                actualizarPredicciones();
            });
        </script>
    </body>
</html>
