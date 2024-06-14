<?php
// Incluir la conexión a la base de datos
include('conexion.php');

// Consulta SQL para traer los datos de los países con estado 1
$sql = "SELECT idPais, nombrePais, bandera FROM paises WHERE estado = 1";
$result = $conexion->query($sql);

$paises = array(); // Arreglo para almacenar los datos de los países

if ($result->num_rows > 0) {
    // Recorrer los resultados y guardarlos en el arreglo
    while($row = $result->fetch_assoc()) {
        $pais = array(
            'idPais' => $row['idPais'],
            'nombrePais' => $row['nombrePais'],
            'bandera' => $row['bandera']
        );
        array_push($paises, $pais);
    }
} else {
    echo "No se encontraron países con estado 1";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
