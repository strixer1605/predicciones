<?php
    session_start();
    // Verificar si hay una sesión activa
    if (isset($_SESSION['dni'])) {
        $estaLogueado = true;
        if($_SESSION['dni'] == "46736648"){
            $admin = true;
            // echo $_SESSION['dni'];
        }else{
            header("Location: ../index.php");
            exit();
        }
    } else {
        header("Location: ../index.php");
        exit();
    }
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Proxies.
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Países</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/cargarPartidos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header d-flex justify-content-between">
        <div class="logo-container"><a href="../index.php" class="nav-item nav-link"><img src="../../imagenes/logo-copa-america.png" alt="logo"></a></div>
        <div class="nav-links d-flex flex-column flex-sm-row align-items-center">
            <div class="nav-item">
                <a href="main/logIn.php" id="login-link" class="nav-link">Iniciar Sesión</a>
            </div>
            <div class="nav-item">
                <a href="cargarPartidos.php" id="partidos-link" class="nav-link d-none">Administrar Partidos</a>
            </div>
            <div class="nav-item">
                <a href="#" id="perfil-link" class="nav-link d-none">Mi Cuenta</a>
            </div>
            <div class="nav-item">
                <a href="../modulos/logOut.php" id="cerrar-sesion-link" class="nav-link d-none">Cerrar Sesión</a>
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-center">
        <div class="group-container">
            <div class="group-header text-center">
                <h5>Paises</h5>
            </div>
            <?php
            include('../modulos/cargarPartidos.php');
            foreach ($paises as $pais) {
                // Obtener los datos del país
                $idPais = $pais['idPais'];
                $nombrePais = $pais['nombrePais'];
                $bandera = $pais['bandera'];
            
                // Imprimir el código HTML
                echo '<a href="crearPartidos.php?idPais=' . $idPais . '" class="country">';
                echo '<div>';
                echo '<img src="../' . $bandera . '" alt="' . $nombrePais . '">';
                echo '<span>' . $nombrePais . '</span>';
                echo '</div>';
                echo '</a>';
            }
            ?>
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

        document.addEventListener('DOMContentLoaded', function() {
            actualizarNavbar();
        });
    </script>
</body>
</html>
