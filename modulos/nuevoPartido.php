<?php
include 'conexion.php'; // Incluye el archivo de conexión a la base de datos

// Obtener los datos del formulario
$nombrePais = $_POST['nombrePais'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$paisRival = $_POST['paisRival'];

// Obtener el idPais de fkPais1 mediante el nombre del país
$sqlBuscarPais = "SELECT idPais FROM paises WHERE nombrePais = ?";
$stmtBuscarPais = $conexion->prepare($sqlBuscarPais);
$stmtBuscarPais->bind_param("s", $nombrePais);
$stmtBuscarPais->execute();
$resultBuscarPais = $stmtBuscarPais->get_result();

if ($resultBuscarPais->num_rows > 0) {
    $rowPais = $resultBuscarPais->fetch_assoc();
    $fkPais1 = $rowPais['idPais'];

    // Insertar el nuevo partido en la tabla partidos
    $sqlInsertPartido = "INSERT INTO partidos (fkPais1, fkPais2, fechaHora, estado) VALUES (?, ?, ?, 1)";
    $stmtInsertPartido = $conexion->prepare($sqlInsertPartido);
    $fechaHora = $fecha . ' ' . $hora; // Concatenar fecha y hora en un solo campo
    $stmtInsertPartido->bind_param("iss", $fkPais1, $paisRival, $fechaHora);
    $stmtInsertPartido->execute();

    if ($stmtInsertPartido->affected_rows > 0) {
        echo "0"; // Éxito en la inserción
    } else {
        echo "1"; // Error en la inserción
    }
} else {
    echo "1"; // No se encontró el país con el nombre especificado
}

$stmtBuscarPais->close();
$stmtInsertPartido->close();
$conexion->close();
?>
