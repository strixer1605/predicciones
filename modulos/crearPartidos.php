<?php
include 'conexion.php';

$idPais = $_GET['idPais'];

// Consulta para obtener los datos del país específico
$sqlPaisEspecifico = "SELECT idPais, nombrePais, bandera FROM paises WHERE idPais = $idPais";
$resultPaisEspecifico = $conexion->query($sqlPaisEspecifico);

if ($resultPaisEspecifico->num_rows > 0) {
    $rowPaisEspecifico = $resultPaisEspecifico->fetch_assoc();
    $paisEspecifico = array(
        'idPais' => $rowPaisEspecifico['idPais'],
        'nombrePais' => $rowPaisEspecifico['nombrePais'],
        'bandera' => $rowPaisEspecifico['bandera']
    );
} else {
    echo "No se encontró ningún país con el ID proporcionado.";
}

// Consulta para obtener todos los países con estado 1 y diferente al país específico
$sqlPaisesEstado1 = "SELECT idPais, nombrePais, bandera FROM paises WHERE estado = 1 AND idPais != $idPais";
$resultPaisesEstado1 = $conexion->query($sqlPaisesEstado1);

// Verificar si la consulta se realizó correctamente
if ($resultPaisesEstado1) {
    $paisesEstado1 = array();
    while ($row = $resultPaisesEstado1->fetch_assoc()) {
        $paisesEstado1[] = $row;
    }

    // Codificar el array como JSON
    $jsonPaisesEstado1 = json_encode($paisesEstado1);
} else {
    // Manejar el caso en que la consulta no se realice correctamente
    $jsonPaisesEstado1 = json_encode(array()); // Devolver un array vacío en caso de error
}
echo '<script>var jsonPaisesEstado1 = ' . $jsonPaisesEstado1 . ';</script>';

$conexion->close();
?>

