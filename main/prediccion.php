<?php
    session_start();

    if (isset($_SESSION['dni'])) {
        $estaLogueado = true;
        $dniUsuario = $_SESSION['dni'];
        // echo $dniUsuario;
        if($_SESSION['dni'] == "46736648"){
            $admin = true;
        } else {
            $admin = false;
        }
    } else {
        $estaLogueado = false;
        $dniUsuario = null;
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
        <div class="logo-container"><a href="../index.php" class="nav-item nav-link"><img src="../imagenes/logo-copa-america.png" alt="logo"></a></div>
        <div class="nav-links d-flex flex-column flex-sm-row align-items-center">
            <div class="nav-item">
                <a href="logIn.php" id="login-link" class="nav-link">Iniciar Sesión</a>
            </div>
            <div class="nav-item">
                <a href="cargarPartidos.php" id="partidos-link" class="nav-link d-none">Cargar Partidos</a>
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
        <div class="row">
            <div class="group-container">
                <center><h5>Grupo A</h5></center>
                <?php
                include('../modulos/traerPartidos.php');
                $fechaActual = date('Y-m-d H:i:s');

                foreach ($partidos as $partido) {
                    echo '
                        <div class="match-container">
                            <div class="match">
                                <div class="team col-md-3">
                                    <img src="' . $partido['bandera1'] . '" alt="">
                                    <span>' . $partido['nombrePais1'] . '</span>
                                </div>
                                <div class="col-md-1 d-flex flex-column align-items-center justify-content-center">
                                    <span style="padding-right: 12px;">GF</span>';

                                        if ($partido['estado'] == 2) {
                                            echo '<label>' . ($partido['p1GF'] !== null ? $partido['p1GF'] : '') . '</label>';
                                        }
                                        elseif ($partido['estado'] == 0){
                                            echo '<label>' .$partido['p1GF']. '</label>';
                                        }
                                        elseif($partido['estado'] == 1){
                                            echo '<input type="number" class="score-input gf1"';
                                            if ($partido['dni'] === $dniUsuario) {
                                                echo ' value="' . $partido['p1GF'] . '"';
                                            }
                                            echo '>';
                                        }

                                    echo '</div>
                                    <div class="col-md-2 d-flex flex-column align-items-center">
                                        <span style="padding-right: 2px;">';
                                        if ($partido['estado'] == 2) {
                                            echo 'Jugando';
                                        }
                                        elseif ($partido['estado'] == 0){
                                            echo 'Finalizado';
                                        }
                                        else {
                                            echo 'Próximo';
                                        }
                                        echo '</span>
                                        <span style="padding-left: 5px;">' . $partido['fechaHoraFormatted'] . '</span>
                                    </div>
                                    <div class="col-md-1 d-flex flex-column align-items-center justify-content-center">
                                        <span style="padding-right: 12px">GF</span>';

                                        if ($partido['estado'] == 2) {
                                            echo '<label>' . ($partido['p2GF'] !== null ? $partido['p2GF'] : '-') . '</label>';
                                        }
                                        elseif ($partido['estado'] == 0){
                                            echo '<label>' .$partido['p2GF']. '</label>';
                                        }
                                        else {
                                            echo '<input type="number" class="score-input gf2"';
                                            if ($partido['dni'] === $dniUsuario) {
                                                echo ' value="' . $partido['p2GF'] . '"';
                                            }
                                            echo '>';
                                        }

                                echo '</div>
                                <div class="team col-md-3">
                                    <img src="' . $partido['bandera2'] . '" alt="">
                                    <span>' . $partido['nombrePais2'] . '</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-success predict-btn" data-partido="'. $partido['idPartido'] .'">Predecir</button>
                            </div>
                        </div>
                    ';
                }
                ?>
                <label class="d-flex justify-content-center">*¡¡Si hay números cargados fueron tu última predicción!!*</label>
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

            document.addEventListener('DOMContentLoaded', function() {
                actualizarNavbar();
            });
        </script>
    </body>
</html>
