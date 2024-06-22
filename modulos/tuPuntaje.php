<?php
    include ('conexion.php');

    $sql_suma_puntos = "SELECT SUM(puntos) AS total_puntos FROM predicciones WHERE dni = '$dniUsuario'";
    $result_suma_puntos = mysqli_query($conexion, $sql_suma_puntos);

    if ($result_suma_puntos) {
        if (mysqli_num_rows($result_suma_puntos) > 0) {
            $row = mysqli_fetch_assoc($result_suma_puntos);
            $total_puntos = $row['total_puntos'];

            echo $total_puntos;
        } else {
            echo "·)";
        }
    } else {
        // Error en la consulta
        http_response_code(500);
        echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
?>
