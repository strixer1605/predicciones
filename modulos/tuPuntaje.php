<?php
    include('conexion.php');

    $sql_predicciones = "SELECT puntos FROM predicciones WHERE dni = '$dniUsuario'";
    $result_predicciones = mysqli_query($conexion, $sql_predicciones);

    if ($result_predicciones) {
        $num_rows = mysqli_num_rows($result_predicciones);
        
        if ($num_rows == 1) {
            // Si hay una sola predicción, mostrar ese puntaje
            $row = mysqli_fetch_assoc($result_predicciones);
            $puntos = $row['puntos'];
            echo "Puntos: $puntos";

            // Actualizar puntos en la tabla usuarios
            $sql_actualizar = "UPDATE usuarios SET puntos_totales = ? WHERE dni = ?";
            $stmt = $conexion->prepare($sql_actualizar);
            $stmt->bind_param("is", $puntos, $dniUsuario);
            
            if ($stmt->execute()) {
                echo "Puntos actualizados correctamente.";
            } else {
                echo "Error al actualizar los puntos: " . $stmt->error;
            }
            $stmt->close();

        } else if ($num_rows > 1) {
            // Si hay más de una predicción, sumar los puntos y mostrarlos
            $total_puntos = 0;
            while ($row = mysqli_fetch_assoc($result_predicciones)) {
                $total_puntos += $row['puntos'];
            }
            echo "Total de puntos: $total_puntos";

            // Actualizar puntos en la tabla usuarios
            $sql_actualizar = "UPDATE usuarios SET puntos_totales = ? WHERE dni = ?";
            $stmt = $conexion->prepare($sql_actualizar);
            $stmt->bind_param("is", $total_puntos, $dniUsuario);
            
            if ($stmt->execute()) {
                echo "Puntos actualizados correctamente.";
            } else {
                echo "Error al actualizar los puntos: " . $stmt->error;
            }
            $stmt->close();

        } else {
            echo "No hay predicciones para este usuario.";
        }
    } else {
        http_response_code(500);
        echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
?>