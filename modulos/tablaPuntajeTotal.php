<?php
    include('conexion.php');

    $sql_prediccionesTop = "SELECT * FROM usuarios ORDER BY puntos_totales DESC LIMIT 10";
    $result_prediccionesTop = mysqli_query($conexion, $sql_prediccionesTop);

    if ($result_prediccionesTop) {
        if (mysqli_num_rows($result_prediccionesTop) > 0) {
            echo '<h2 style="font-size: 30px;">Top 10 Puntajes</h2>';
            echo '<br>';
            echo '<table style="width: 100%; border: 1px solid white;">';
            echo '<tr style="font-size: 18px; color: white; font-weight: bold; border: 2px solid white;"><th style="padding: 10px;">Posición</th><th style="padding: 10px;">DNI</th><th style="padding: 10px;">Nombre</th><th style="padding: 10px;">Apellido</th><th style="padding: 10px;">Puntos Totales</th></tr>';

            $posicion = 1;
            while ($row = mysqli_fetch_assoc($result_prediccionesTop)) {
                $dni = $row['dni'];
                $nombre = $row['nombre'];
                $apellido = $row['apellido'];
                $puntosTotales = $row['puntos_totales'];

                echo "<tr style='font-size: 18px; color: white; border: 2px solid white;'><td style='padding: 10px;'>$posicion</td><td style='padding: 10px;'>$dni</td><td style='padding: 10px;'>$nombre</td><td style='padding: 10px;'>$apellido</td><td style='padding: 10px;'>$puntosTotales</td></tr>";

                $posicion++;
            }
            echo '</table>';
        } else {
            echo "No se encontraron usuarios con puntajes.";
        }
    } else {
        http_response_code(500);
        echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
?>
