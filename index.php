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
        <div class="logo-container"><a href="index.php" class="nav-item nav-link"><img src="../imagenes/logo-copa-america.png" alt="logo"></a></div>
        <div class="nav-links d-flex flex-column flex-sm-row align-items-center">
            <div class="nav-item">
                <a href="main/logIn.php" id="login-link" class="nav-link">Iniciar Sesión</a>
            </div>
            <div class="nav-item">
                <a href="main/cargarPartidos.php" id="partidos-link" class="nav-link d-none">Administrar Partidos</a>
            </div>
            <div class="nav-item">
                <a href="main/miCuentaTop.php" id="perfil-link" class="nav-link d-none">Mi Cuenta</a>
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
                        <span class="stats">
                            <span>PJ</span>
                            <span>G</span>
                            <span>E</span>
                            <span>P</span>
                            <span>GF</span>
                            <span>GC</span>
                            <span>DG</span>
                            <span class="points">PTS</span>
                        </span>
                    </div>
                    <?php include('modulos/traerPaises.php');
                    foreach ($paises1 as $pais1) {
                        $idPais = $pais1['idPais'];
                        $nombrePais = $pais1['nombrePais'];
                        $bandera = $pais1['bandera'];
                        $pts = $pais1['puntos'];
                        $pj = $pais1['PJ'];
                        $g = $pais1['G'];
                        $e = $pais1['E'];
                        $p = $pais1['P'];
                        $gf = $pais1['GF'];
                        $gc = $pais1['GC'];
                        $dg = $pais1['DG'];

                        echo '<a href="main/prediccion.php?idPais=' . $idPais . '" class="country">';
                        echo '<div>';
                        echo '<img src="' . $bandera . '" alt="' . $nombrePais . '">';
                        echo '<span>' . $nombrePais . '</span>';
                        echo '</div>';
                        echo '<div class="stats">';
                        echo '<span>' . $pj . '</span>';
                        echo '<span>' . $g . '</span>';
                        echo '<span>' . $e . '</span>';
                        echo '<span>' . $p . '</span>';
                        echo '<span>' . $gf . '</span>';
                        echo '<span>' . $gc . '</span>';
                        echo '<span>' . $dg . '</span>';
                        echo '<span class="points">' . $pts . '</span>';
                        echo '</div>';
                        echo '</a>';
                    } ?>
                </div>
                <!-- Grupo B -->
                <div class="group-container">
                    <div class="group-header">
                        <h5>Grupo B</h5>
                        <span class="stats">
                            <span>PJ</span>
                            <span>G</span>
                            <span>E</span>
                            <span>P</span>
                            <span>GF</span>
                            <span>GC</span>
                            <span>DG</span>
                            <span class="points">PTS</span>
                        </span>
                    </div>
                    <?php foreach ($paises2 as $pais2) {
                        $idPais = $pais2['idPais'];
                        $nombrePais = $pais2['nombrePais'];
                        $bandera = $pais2['bandera'];
                        $pts = $pais2['puntos'];
                        $pj = $pais2['PJ'];
                        $g = $pais2['G'];
                        $e = $pais2['E'];
                        $p = $pais2['P'];
                        $gf = $pais2['GF'];
                        $gc = $pais2['GC'];
                        $dg = $pais2['DG'];

                        echo '<a href="main/prediccion.php?idPais=' . $idPais . '" class="country">';
                        echo '<div>';
                        echo '<img src="' . $bandera . '" alt="' . $nombrePais . '">';
                        echo '<span>' . $nombrePais . '</span>';
                        echo '</div>';
                        echo '<div class="stats">';
                        echo '<span>' . $pj . '</span>';
                        echo '<span>' . $g . '</span>';
                        echo '<span>' . $e . '</span>';
                        echo '<span>' . $p . '</span>';
                        echo '<span>' . $gf . '</span>';
                        echo '<span>' . $gc . '</span>';
                        echo '<span>' . $dg . '</span>';
                        echo '<span class="points">' . $pts . '</span>';
                        echo '</div>';
                        echo '</a>';
                    } ?>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Grupo C -->
                <div class="group-container">
                    <div class="group-header">
                        <h5>Grupo C</h5>
                        <span class="stats">
                            <span>PJ</span>
                            <span>G</span>
                            <span>E</span>
                            <span>P</span>
                            <span>GF</span>
                            <span>GC</span>
                            <span>DG</span>
                            <span class="points">PTS</span>
                        </span>
                    </div>
                    <?php foreach ($paises3 as $pais3) {
                        $idPais = $pais3['idPais'];
                        $nombrePais = $pais3['nombrePais'];
                        $bandera = $pais3['bandera'];
                        $pts = $pais3['puntos'];
                        $pj = $pais3['PJ'];
                        $g = $pais3['G'];
                        $e = $pais3['E'];
                        $p = $pais3['P'];
                        $gf = $pais3['GF'];
                        $gc = $pais3['GC'];
                        $dg = $pais3['DG'];

                        echo '<a href="main/prediccion.php?idPais=' . $idPais . '" class="country">';
                        echo '<div>';
                        echo '<img src="' . $bandera . '" alt="' . $nombrePais . '">';
                        echo '<span>' . $nombrePais . '</span>';
                        echo '</div>';
                        echo '<div class="stats">';
                        echo '<span>' . $pj . '</span>';
                        echo '<span>' . $g . '</span>';
                        echo '<span>' . $e . '</span>';
                        echo '<span>' . $p . '</span>';
                        echo '<span>' . $gf . '</span>';
                        echo '<span>' . $gc . '</span>';
                        echo '<span>' . $dg . '</span>';
                        echo '<span class="points">' . $pts . '</span>';
                        echo '</div>';
                        echo '</a>';
                    } ?>
                </div>
                <!-- Grupo D -->
                <div class="group-container">
                    <div class="group-header">
                        <h5>Grupo D</h5>
                        <span class="stats">
                            <span>PJ</span>
                            <span>G</span>
                            <span>E</span>
                            <span>P</span>
                            <span>GF</span>
                            <span>GC</span>
                            <span>DG</span>
                            <span class="points">PTS</span>
                        </span>
                    </div>
                    <?php foreach ($paises4 as $pais4) {
                        $idPais = $pais4['idPais'];
                        $nombrePais = $pais4['nombrePais'];
                        $bandera = $pais4['bandera'];
                        $pts = $pais4['puntos'];
                        $pj = $pais4['PJ'];
                        $g = $pais4['G'];
                        $e = $pais4['E'];
                        $p = $pais4['P'];
                        $gf = $pais4['GF'];
                        $gc = $pais4['GC'];
                        $dg = $pais4['DG'];

                        echo '<a href="main/prediccion.php?idPais=' . $idPais . '" class="country">';
                        echo '<div>';
                        echo '<img src="' . $bandera . '" alt="' . $nombrePais . '">';
                        echo '<span>' . $nombrePais . '</span>';
                        echo '</div>';
                        echo '<div class="stats">';
                        echo '<span>' . $pj . '</span>';
                        echo '<span>' . $g . '</span>';
                        echo '<span>' . $e . '</span>';
                        echo '<span>' . $p . '</span>';
                        echo '<span>' . $gf . '</span>';
                        echo '<span>' . $gc . '</span>';
                        echo '<span>' . $dg . '</span>';
                        echo '<span class="points">' . $pts . '</span>';
                        echo '</div>';
                        echo '</a>';
                    } ?>
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

        // Llamar a la función al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            actualizarNavbar();
        });

    </script>
</body>
</html>
