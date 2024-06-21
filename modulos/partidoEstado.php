<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si la variable idPartido tiene contenido
    if (isset($_POST['idPartido']) && !empty($_POST['idPartido'])) {
        // Incluye el archivo de conexión a la base de datos
        include ('conexion.php');

        // Sanitiza la variable idPartido para evitar inyecciones SQL
        $idPartido = intval($_POST['idPartido']);

        // Prepara la consulta SQL para verificar el estado actual del partido
        $sql_check = "SELECT estado FROM partidos WHERE idPartido = ?";
        
        if ($stmt_check = $conexion->prepare($sql_check)) {
            $stmt_check->bind_param("i", $idPartido);
            $stmt_check->execute();
            $stmt_check->bind_result($estadoActual);
            $stmt_check->fetch();
            $stmt_check->close();

            if ($estadoActual == 2) {
                echo "2"; // El partido ya está en curso
                exit;
            }

            // Prepara la consulta SQL para actualizar el estado del partido
            $sql = "UPDATE partidos SET estado = 2 WHERE idPartido = ?";
            if ($stmt = $conexion->prepare($sql)) {
                // Vincula la variable idPartido como un parámetro a la consulta
                $stmt->bind_param("i", $idPartido);

                // Ejecuta la consulta
                if ($stmt->execute()) {
                    echo "0"; // Éxito
                } else {
                    echo "1"; // Error en la ejecución de la consulta
                }

                // Cierra la declaración preparada
                $stmt->close();
            } else {
                echo "1"; // Error al preparar la consulta
            }
        } else {
            echo "1"; // Error al preparar la consulta de verificación
        }

        // Cierra la conexión a la base de datos
        $conexion->close();
    } else {
        echo "La variable idPartido no tiene contenido.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
