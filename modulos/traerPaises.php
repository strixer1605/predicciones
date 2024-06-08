<?php

include('conexion.php');

// Consulta para obtener los datos de la tabla "paises"
$sql = "SELECT * FROM paises";
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


$sql1 = "SELECT * FROM paises WHERE idPais IN (1, 2, 3, 4)";
$result1 = $conexion->query($sql1);

$paises1 = array();

// Verificar si se encontraron resultados
if ($result1->num_rows > 0) {
    // Recorrer cada fila de resultados
    while($row1 = $result1->fetch_assoc()) {
        // Agregar los datos de cada fila al array de países
        $pais1 = array(
            'idPais' => $row1['idPais'],
            'nombrePais' => $row1['nombrePais'],
            'bandera' => $row1['bandera'],
            'PJ' => $row1['PJ'],
            'G' => $row1['G'],
            'E' => $row1['E'],
            'P' => $row1['P'],
            'GF' => $row1['GF'],
            'GC' => $row1['GC'],
            'DG' => $row1['DG'],
            'puntos' => $row1['pts']

        );
        array_push($paises1, $pais1);
    }
} else {
    echo "No se encontraron resultados.";
}

$sql2 = "SELECT * FROM paises WHERE idPais IN (5, 6, 7, 8)";
$result2 = $conexion->query($sql2);

$paises2 = array();

// Verificar si se encontraron resultados
if ($result2->num_rows > 0) {
    // Recorrer cada fila de resultados
    while($row2 = $result2->fetch_assoc()) {
        // Agregar los datos de cada fila al array de países
        $pais2 = array(
            'idPais' => $row2['idPais'],
            'nombrePais' => $row2['nombrePais'],
            'bandera' => $row2['bandera'],
            'PJ' => $row2['PJ'],
            'G' => $row2['G'],
            'E' => $row2['E'],
            'P' => $row2['P'],
            'GF' => $row2['GF'],
            'GC' => $row2['GC'],
            'DG' => $row2['DG'],
            'puntos' => $row2['pts']
        );
        array_push($paises2, $pais2);
    }
} else {
    echo "No se encontraron resultados.";
}

$sql3 = "SELECT * FROM paises  WHERE idPais IN (9, 10, 11, 12)";
$result3 = $conexion->query($sql3);

$paises3 = array();

// Verificar si se encontraron resultados
if ($result3->num_rows > 0) {
    // Recorrer cada fila de resultados
    while($row3 = $result3->fetch_assoc()) {
        // Agregar los datos de cada fila al array de países
        $pais3 = array(
            'idPais' => $row3['idPais'],
            'nombrePais' => $row3['nombrePais'],
            'bandera' => $row3['bandera'],
            'PJ' => $row3['PJ'],
            'G' => $row3['G'],
            'E' => $row3['E'],
            'P' => $row3['P'],
            'GF' => $row3['GF'],
            'GC' => $row3['GC'],
            'DG' => $row3['DG'],
            'puntos' => $row3['pts']
        );
        array_push($paises3, $pais3);
    }
} else {
    echo "No se encontraron resultados.";
}


$sql4 = "SELECT * FROM paises WHERE idPais IN (13, 14 ,15 ,16)";
$result4 = $conexion->query($sql4);

$paises4 = array();

// Verificar si se encontraron resultados
if ($result4->num_rows > 0) {
    // Recorrer cada fila de resultados
    while($row4 = $result4->fetch_assoc()) {
        // Agregar los datos de cada fila al array de países
        $pais4 = array(
            'idPais' => $row4['idPais'],
            'nombrePais' => $row4['nombrePais'],
            'bandera' => $row4['bandera'],
            'PJ' => $row4['PJ'],
            'G' => $row4['G'],
            'E' => $row4['E'],
            'P' => $row4['P'],
            'GF' => $row4['GF'],
            'GC' => $row4['GC'],
            'DG' => $row4['DG'],
            'puntos' => $row4['pts']

        );
        array_push($paises4, $pais4);
    }
} else {
    echo "No se encontraron resultados.";
}

// Cerrar conexión
$conexion->close();
?>
