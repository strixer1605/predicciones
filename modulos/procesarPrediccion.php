<?php
session_start();

if (!isset($_SESSION['dni'])) {
    echo json_encode(array("error" => "Debe iniciar sesión para acceder a esta funcionalidad"));
} else {
    if (isset($_POST['gf1']) && isset($_POST['gf2']) && isset($_POST['idPartido'])) {
        $dni = $_SESSION['dni'];
        $gf1 = $_POST['gf1'];
        $gf2 = $_POST['gf2'];
        $idPartido = $_POST['idPartido'];
        
        include('conexion.php');
        // Consulta SQL para verificar si ya existe una predicción para el mismo fkPartido y dni
        $sql_check = "SELECT * FROM predicciones WHERE fkPartido='$idPartido' AND dni='$dni'";
        $result_check = $conexion->query($sql_check);

        if ($result_check) {
            if ($result_check->num_rows > 0) {
                // Si ya existe una predicción, realiza una actualización en lugar de una inserción
                $row = $result_check->fetch_assoc();
                $fkPartido = $row['fkPartido'];
                $dni = $row['dni'];
                $sql_update = "UPDATE predicciones SET GF1='$gf1', GF2='$gf2' WHERE fkPartido='$fkPartido' AND dni='$dni'";
                if ($conexion->query($sql_update) === TRUE) {
                    echo json_encode(array("success" => "Predicción actualizada correctamente"));
                } else {
                    echo json_encode(array("error" => "Error al actualizar la predicción: " . $conexion->error));
                }
            } else {
                // Si no existe una predicción, realiza una inserción
                $sql_insert = "INSERT INTO predicciones (fkPartido, dni, GF1, GF2) VALUES ('$idPartido', '$dni', '$gf1', '$gf2')";
                if ($conexion->query($sql_insert) === TRUE) {
                    echo json_encode(array("success" => "Predicción realizada correctamente"));
                } else {
                    echo json_encode(array("error" => "Error al realizar la predicción: " . $conexion->error));
                }
            }
        } else {
            echo json_encode(array("error" => "Error al consultar la base de datos"));
        }
    } else {
        // Si faltan datos en la solicitud, devuelve un mensaje de error
        echo json_encode(array("error" => "No se recibieron todos los datos necesarios para procesar la solicitud"));
    }
}
?>
