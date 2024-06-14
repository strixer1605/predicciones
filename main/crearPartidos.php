<?php
    session_start();
    // Verificar si hay una sesión activa
    if (isset($_SESSION['dni'])) {
        $estaLogueado = true;
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
    <title>Crear Partido</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/crearPartidos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&display=swap" rel="stylesheet">
    
</head>
<body>
    <div class="header d-flex justify-content-between">
        <div class="logo-container">
            <a href="../index.php" class="nav-item nav-link"><img src="../imagenes/logo-copa-america.png" alt="logo"></a>
        </div>
        <div class="nav-links d-flex flex-column flex-sm-row align-items-center">
            <div class="nav-item">
                <a href="main/logIn.php" id="login-link" class="nav-link">Iniciar Sesión</a>
            </div>
            <div class="nav-item">
                <a href="main/cargarPartidos.php" id="partidos-link" class="nav-link d-none">Cargar Partidos</a>
            </div>
            <div class="nav-item">
                <a href="#" id="perfil-link" class="nav-link d-none">Mi Cuenta</a>
            </div>
            <div class="nav-item">
                <a href="../modulos/logOut.php" id="cerrar-sesion-link" class="nav-link d-none">Cerrar Sesión</a>
            </div>
        </div>
    </div>
    <?php
        include '../modulos/crearPartidos.php';
    ?>
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-12 col-md-5 d-flex flex-column align-items-center">
                <img style="height: 50px;" src="<?php echo $paisEspecifico['bandera']; ?>" alt="<?php echo $paisEspecifico['nombrePais']; ?>">
                <span class="mt-2" id="nombrePais1" style="padding-top: 8px;"><?php echo $paisEspecifico['nombrePais']; ?></span>
            </div>
            <div class="col-12 col-md-2 d-flex flex-column align-items-center">
                <div class="form-group">
                    <input id="fecha" type="date" class="form-control mb-2">
                </div>
                <div class="form-group">
                    <input id="hora" type="time" class="form-control">
                </div>
            </div>
            <div class="col-12 col-md-5 d-flex flex-column align-items-center">
                <img id="bandera" style="height: 50px;" src="<?php echo !empty($paisesEstado1) ? $paisesEstado1[0]['bandera'] : ''; ?>" alt="<?php echo !empty($paisesEstado1) ? $paisesEstado1[0]['nombrePais'] : ''; ?>">
                <div class="form-group mt-2">
                    <select class="form-control" id="paisRival" onchange="cambiarBandera(this)">
                        <?php
                        // Generar opciones del select con los países obtenidos
                        if (!empty($paisesEstado1)) {
                            foreach ($paisesEstado1 as $pais) {
                                echo '<option value="' . $pais['idPais'] . '"';
                                if ($pais['idPais'] == $idPais) {
                                    echo ' selected';
                                }
                                echo '>' . $pais['nombrePais'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12 text-center">
                <button type="submit" id="crear" class="btn btn-primary">Crear Partido</button>
            </div>
        </div>
    </div>

    <div class="footer mt-5">
        <span>FOOTER</span>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../funciones/crearPartidos.js"></script>
<script>
    var banderas = <?php echo $jsonPaisesEstado1; ?>;
    
    function cambiarBandera(select) {
        var index = select.selectedIndex;
        document.getElementById('bandera').src = banderas[index].bandera;
    }
</script>
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

