<?php
    session_start();

    $admin = false;
    if (isset($_SESSION['dni'])) {
        $estaLogueado = true;
        if ($_SESSION['dni'] == "648927105384712") {
            $admin = true;
        } else {
            $admin = false;
            // Redirigir a index.php si no es administrador
            header("Location: ../index.php");
            exit();
        }
    } else {
        $estaLogueado = false;
        // Redirigir a index.php si no hay sesión activa
        header("Location: ../index.php");
        exit();
    }
    $idPais = $_GET['idPais'];
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
    <?php
        include '../modulos/header.php';
        include '../modulos/crearPartidos.php';
        include '../modulos/traerPartidos.php';
    ?>
    <div class="container mt-5">
        <h1 class="d-flex justify-content-center mb-5 text-center">Crear partido</h1>
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

    <div class="container mt-5">
        <h1 class="d-flex justify-content-center mb-5 text-center">Administrar partidos</h1>
        <?php
            foreach ($partidos as $partido) {
                if ($partido['fkPais1'] == $mainPais || $partido['fkPais2'] == $mainPais) {
                    $fechaHora = new DateTime($partido['fechaHora']);
                    $fecha = $fechaHora->format('d/m');
                    $hora = $fechaHora->format('H:i'); 
                    
                    // Verifica si el estado del partido es distinto de 0
                    if ($partido['estado'] != 0) {
                        echo '
                            <div class="main row" style="justify-content: center; flex-direction:column; margin-bottom: 40px;">
                                <div class="data-container">
                                    <div class="row">
                                        <div class="data-group col-12">
                                            <img id="img1" src="' . $partido['bandera1'] . '" alt="">
                                            <span>' . $partido['nombrePais1'] . '</span>
                                            <input class="score-input gf1" type="number"></input>
                                            <input style=display:none; disabled class="fkPais1" value="'.$partido['fkPais1'].'"></input>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="data-group col-12">
                                            <span>' . $fecha . '</span>
                                            <span>' . $hora . 'Hs</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="data-group col-12">
                                            <img id="img2" src="' . $partido['bandera2'] . '" alt="">
                                            <span>' . $partido['nombrePais2'] . '</span>
                                            <input class="score-input gf2" type="number"></input>
                                            <input style=display:none; disabled class="fkPais2" value="'.$partido['fkPais2'].'"></input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <span>' . $partido['estadoTexto'] .'</span>
                                        <button data-partido="'. $partido['idPartido'] .'" type="submit" class="main btn btn-primary" style="margin-bottom: 20px;">Partido en curso</button>
                                        <button data-partido="'. $partido['idPartido'] .'" type="submit" class="main2 btn btn-primary">Resultado final</button>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                }
            } 
            ?>
        <div class="row pt-5">
            <div class="col-12 text-center">
                <button type="submit" id="descalificar" data-idpais="<?php echo $idPais ?>" class="btn btn-danger">Descalificar Pais</button>
            </div>
        </div>
    </div>

    <?php
        include '../modulos/footer.php';
    ?>
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
    var admin = <?php echo $admin ? 'true' : 'false'; ?>;

    function actualizarNavbar() {
        var estaLogueado = <?php echo $estaLogueado ? 'true' : 'false'; ?>;

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
