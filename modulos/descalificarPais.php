<?php

    include 'conexion.php';

    // Verificar que el parámetro idPais esté presente en la URL
    if (isset($_POST['idPais']) && !empty($_POST['idPais'])) {
        $idPais = $_POST['idPais'];

        // Verificar que el valor de idPais sea un entero válido
        if (filter_var($idPais, FILTER_VALIDATE_INT)) {
            $sqlDescalificarPais = "UPDATE `paises` SET estado = 0 WHERE idPais = ?";
            
            if($stmt = $conexion->prepare($sqlDescalificarPais)){
                $stmt->bind_param("i", $idPais);

                if($stmt->execute()){
                    echo "0"; // Éxito
                } else {
                    echo "Error en la ejecución de la consulta: " . $stmt->error; // Mensaje de error detallado
                }

                $stmt->close();
            } else {
                echo "Error en la preparación de la consulta: " . $conexion->error; // Mensaje de error detallado
            }
        } else {
            echo "El valor de idPais no es válido.";
        }
    } else {
        echo "El parámetro idPais no está presente en la URL o está vacío.";
    }

    // Cerrar la conexión
    $conexion->close();

?>
