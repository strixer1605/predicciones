<?php
    include ('conexion.php');

    // Consulta para obtener todas las predicciones del usuario
    $sql_predicciones = "SELECT puntos FROM predicciones WHERE dni = '$dniUsuario'";
    $result_predicciones = mysqli_query($conexion, $sql_predicciones);

    if ($result_predicciones) {
        $num_rows = mysqli_num_rows($result_predicciones);
        
        if ($num_rows == 1) {
            // Si hay una sola predicción, mostrar ese puntaje
            $row = mysqli_fetch_assoc($result_predicciones);
            $puntos = $row['puntos'];
            echo "Puntos: $puntos";
        } else if ($num_rows > 1) {
            // Si hay más de una predicción, sumar los puntos y mostrarlos
            $total_puntos = 0;
            while ($row = mysqli_fetch_assoc($result_predicciones)) {
                $total_puntos += $row['puntos'];
            }
            echo "Total de puntos: $total_puntos";
        } else {
            // Si no hay predicciones
            echo "No hay predicciones para este usuario.";
        }
    } else {
        // Error en la consulta
        http_response_code(500);
        echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
?>
