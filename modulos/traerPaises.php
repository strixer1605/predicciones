<?php

include('conexion.php');

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Consulta para obtener los datos de la tabla "paises"
$sql = "SELECT idPais, nombrePais, bandera FROM paises";
$result = $conexion->query($sql);

$paises = array();

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Recorrer cada fila de resultados
    while($row = $result->fetch_assoc()) {
        // Agregar los datos de cada fila al array de países
        $pais = array(
            'idPais' => $row['idPais'],
            'nombrePais' => $row['nombrePais'],
            'bandera' => $row['bandera']
        );
        array_push($paises, $pais);
    }
} else {
    echo "No se encontraron resultados.";
}

// Cerrar conexión
$conexion->close();


?>
