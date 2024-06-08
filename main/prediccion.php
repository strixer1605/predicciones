<?php
    session_start();

    // Verificar si hay una sesión activa
    if (isset($_SESSION['dni'])) {
        $estaLogueado = true;
        echo $_SESSION['dni']; 
        if($_SESSION['dni'] == "46736648"){
            $admin = true;
        } else {
            $admin = false;
        }
    } else {
        $estaLogueado = false;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/prediccion.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&display=swap" rel="stylesheet">
    <style>
        /* Estilos para eliminar las flechas de los inputs tipo number */
        input[type=number] {
            -moz-appearance: textfield;
        }
        input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
    <title>Predicciones</title>
</head>
<body>
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
            <h5>Grupo A</h5>
                <?php
                    include('../modulos/traerPartidos.php');
                    foreach ($partidos as $partido) {
                        echo '<div class="match">
                        <div class="team col-md-3">
                            <img src="' . $partido['bandera1'] . '" alt="">
                            <span style="padding-right: 8px;">' . $partido['nombrePais1'] . '</span>
                        </div>
                        <div class="col-md-1 d-flex flex-column align-items-center">
                            <span style="padding-right: 12px;">GF</span>
                            <input type="number" value="0" class="score-input gf1">
                        </div>
                        <div class="col-md-1 d-flex flex-column align-items-center">
                            <span style="padding-right: 12px;">GC</span>
                            <input type="number" value="0" class="score-input gc1">
                        </div>
                        <div class="col-md-2 d-flex flex-column align-items-center">
                            <span style="padding-right: 4px;">Juegan</span>
                            <span style="padding-left: 9px;">' . $partido['fechaHora'] . '</span>
                        </div>
                        <div class="col-md-1 d-flex flex-column align-items-center">
                            <span style="padding-right: 12px;">GF</span>
                            <input type="number" value="0" class="score-input gf2">
                        </div>
                        <div class="col-md-1 d-flex flex-column align-items-center">
                            <span style="padding-right: 12px;">GC</span>
                            <input type="number" value="0" class="score-input gc2">
                        </div>
                        <div class="team col-md-3">
                            <img src="' . $partido['bandera2'] . '" alt="">
                            <span style="padding-right: 8px;">' . $partido['nombrePais2'] . '</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="button" id="' . $partido['idPartido'] . '" class="btn btn-success">Predecir</button>
                    </div>
                    
                    
                        ';
                    }
                ?>
                
                
                <!-- <div class="match">
                        <div class="row">
                            <div class="team col-4">
                                <img src="../imagenes/peru.png" alt="">
                                <span style="padding-right: 9px;">Perú</span>
                            </div>
                            <div class="col-2 d-flex flex-column align-items-center">
                                <span style="padding-right: 7px;">GF</span>
                                <input type="number" class="score-input" id="11">
                            </div>
                            <div class="col-2 d-flex flex-column align-items-center">
                                <span style="padding-right: 7px;">GC</span>
                                <input type="number" class="score-input" id="1">
                            </div>
                            <div class="col-4">
                                <span>Juegan</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="team col-4">
                                <img src="../imagenes/chile.png" alt="">
                                <span style="padding-right: 9px;">Chile</span>
                            </div>
                            <div class="col-2 d-flex flex-column align-items-center">
                                <span>GF</span>
                                <input type="number" class="score-input" id="1">
                            </div>
                            <div class="col-2 d-flex flex-column align-items-center">
                                <span>GC</span>
                                <input type="number" class="score-input" id="1">
                            </div>
                            <div class="col-4">
                                <span>20/6 - 21:00</span>
                            </div>
                        </div>
                    <div class="col-12 d-flex justify-content-center">
                        <input type="button" class="btn btn-success" value="predecir">
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="footer">
        <span>FOOTER</span>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
