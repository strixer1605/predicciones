<?php
    include('conexion.php');

    $dniAdmin = 648927105384712;

    $sql_prediccionesTop = "SELECT * FROM usuarios WHERE dni != $dniAdmin ORDER BY puntos_totales DESC LIMIT 10";
    $result_prediccionesTop = mysqli_query($conexion, $sql_prediccionesTop);

    if ($result_prediccionesTop) {
        if (mysqli_num_rows($result_prediccionesTop) > 0) {
            echo '<h2 style="font-size: 30px;">Top 10 Puntajes</h2>';
            echo '<br>';
            // Añadimos el contenedor div con la clase table-responsive
            echo '<div class="table-responsive">';
            echo '<table class="table table-bordered table-striped" style="width: 100%; border: 1px solid white;">';
            echo '<thead><tr style="font-size: 18px; color: white; font-weight: bold; border: 2px solid white;"><th style="padding: 10px;">Posición</th><th style="padding: 10px;">DNI</th><th style="padding: 10px;">Nombre</th><th style="padding: 10px;">Apellido</th><th style="padding: 10px;">Puntos Totales</th></tr></thead>';
            echo '<tbody>';

            $posicion = 1;
            while ($row = mysqli_fetch_assoc($result_prediccionesTop)) {
                $dni = $row['dni'];
                $nombre = $row['nombre'];
                $apellido = $row['apellido'];
                $puntosTotales = $row['puntos_totales'];

                echo "<tr style='font-size: 18px; color: white; border: 2px solid white;'><td style='padding: 10px;'>$posicion</td><td style='padding: 10px;'>$dni</td><td style='padding: 10px;'>$nombre</td><td style='padding: 10px;'>$apellido</td><td style='padding: 10px;'>$puntosTotales</td></tr>";

                $posicion++;
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>'; // Cerramos el div table-responsive
        } else {
            echo "No se encontraron usuarios con puntajes.";
        }
    } else {
        http_response_code(500);
        echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
?>
