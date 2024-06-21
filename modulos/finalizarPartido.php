<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si las variables idPartido, gf1 y gf2 tienen contenido
    if (isset($_POST['idPartido']) && isset($_POST['gf1']) && isset($_POST['gf2'])) {

        // Incluye el archivo de conexión a la base de datos
        include ('conexion.php');

        // Sanitiza las variables para evitar inyecciones SQL
        $gf1 = $_POST['gf1'];
        $gf2 = $_POST['gf2'];
        $idPartido = $_POST['idPartido'];

        // Verifica si el estado del partido ya es 0
        $sqlVerificarEstado = "SELECT estado FROM partidos WHERE idPartido = ?";
        if ($stmtVerificar = $conexion->prepare($sqlVerificarEstado)) {
            $stmtVerificar->bind_param("i", $idPartido);
            $stmtVerificar->execute();
            $stmtVerificar->bind_result($estado);
            $stmtVerificar->fetch();
            $stmtVerificar->close();

            if ($estado == 0) {
                echo "1"; // El partido ya ha terminado
                exit;
            }
        } else {
            echo "0"; // Error en la consulta
            exit;
        }

        // Prepara la consulta SQL para actualizar el estado del partido y los goles
        $sqlActualizarPartido = "UPDATE partidos SET GF1P = ?, GF2P = ?, estado = 0 WHERE idPartido = ?";
        
        if ($stmtActualizar = $conexion->prepare($sqlActualizarPartido)) {
            $stmtActualizar->bind_param("iii", $gf1, $gf2, $idPartido);
        
            if ($stmtActualizar->execute()) {
                // Determinar quién es el ganador o si hay empate
                $ganador = 0; 
        
                if ($gf1 > $gf2) {
                    $ganador = 1; 
                } elseif ($gf2 > $gf1) {
                    $ganador = 2; 
                }

                $sqlActualizarGanador = "UPDATE partidos SET ganador = ? WHERE idPartido = ?";
        
                if ($stmtActualizarGanador = $conexion->prepare($sqlActualizarGanador)) {
                    $stmtActualizarGanador->bind_param("ii", $ganador, $idPartido);
        
                    if ($stmtActualizarGanador->execute()) {
                        echo "0"; // Éxito
                    } else {
                        echo "1"; // Error en la ejecución
                    }
        
                    $stmtActualizarGanador->close();
                } else {
                    echo "1"; // Error en la preparación de la consulta
                }
            } else {
                echo "1"; // Error en la ejecución
            }
        
            $stmtActualizar->close();
        } else {
            echo "1"; // Error en la preparación de la consulta
        }

        // Cierra la conexión a la base de datos
        $conexion->close();
    } else {
        echo "Faltan datos necesarios.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>