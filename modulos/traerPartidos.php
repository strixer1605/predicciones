<?php
include('conexion.php');

$mainPais = $_GET['idPais'];
if ($mainPais == "1" || $mainPais == "2" || $mainPais == "3" || $mainPais == "4"){
    $sql = "
        SELECT 
            p.idPartido, 
            p.fkPais1, 
            p.fkPais2, 
            p.p1GF, 
            p.p2GF, 
            p.fechaHora,
            p.estado,
            pais1.nombrePais AS nombrePais1,
            pais1.bandera AS bandera1,
            pais1.grupo AS grupo1,
            pais2.nombrePais AS nombrePais2,
            pais2.bandera AS bandera2,
            pais2.grupo AS grupo2,
            pred.GF1,
            pred.GF2,
            pred.dni
        FROM 
            partidos p
        JOIN 
            paises pais1 ON p.fkPais1 = pais1.idPais
        JOIN 
            paises pais2 ON p.fkPais2 = pais2.idPais
        LEFT JOIN 
            (SELECT fkPartido, dni, GF1, GF2 FROM predicciones) pred ON p.idPartido = pred.fkPartido
        WHERE 
            p.fkPais1 IN (1,2,3,4) OR p.fkPais2 IN (1,2,3,4)
        ORDER BY 
            p.idPartido DESC
    ";
    $result = $conexion->query($sql);
}
else if($mainPais == "5" || $mainPais == "6" || $mainPais == "7" || $mainPais == "8"){
    $sql = "
        SELECT 
            p.idPartido, 
            p.fkPais1, 
            p.fkPais2, 
            p.p1GF, 
            p.p2GF, 
            p.fechaHora,
            p.estado,
            pais1.nombrePais AS nombrePais1,
            pais1.bandera AS bandera1,
            pais1.grupo AS grupo1,
            pais2.nombrePais AS nombrePais2,
            pais2.bandera AS bandera2,
            pais2.grupo AS grupo2,
            pred.GF1,
            pred.GF2,
            pred.dni
        FROM 
            partidos p
        JOIN 
            paises pais1 ON p.fkPais1 = pais1.idPais
        JOIN 
            paises pais2 ON p.fkPais2 = pais2.idPais
        LEFT JOIN 
            (SELECT fkPartido, dni, GF1, GF2 FROM predicciones) pred ON p.idPartido = pred.fkPartido
        WHERE 
            p.fkPais1 IN (5,6,7,8) OR p.fkPais2 IN (5,6,7,8)
        ORDER BY 
            p.idPartido DESC
    ";
    $result = $conexion->query($sql);
}

else if($mainPais == "9" || $mainPais == "10" || $mainPais == "11" || $mainPais == "12"){
    $sql = "
        SELECT 
            p.idPartido, 
            p.fkPais1, 
            p.fkPais2, 
            p.p1GF, 
            p.p2GF, 
            p.fechaHora,
            p.estado,
            pais1.nombrePais AS nombrePais1,
            pais1.bandera AS bandera1,
            pais1.grupo AS grupo1,
            pais2.nombrePais AS nombrePais2,
            pais2.bandera AS bandera2,
            pais2.grupo AS grupo2,
            pred.GF1,
            pred.GF2,
            pred.dni
        FROM 
            partidos p
        JOIN 
            paises pais1 ON p.fkPais1 = pais1.idPais
        JOIN 
            paises pais2 ON p.fkPais2 = pais2.idPais
        LEFT JOIN 
            (SELECT fkPartido, dni, GF1, GF2 FROM predicciones) pred ON p.idPartido = pred.fkPartido
        WHERE 
            p.fkPais1 IN (9,10,11,12) OR p.fkPais2 IN (9,10,11,12)
        ORDER BY 
            p.idPartido DESC
    ";
    $result = $conexion->query($sql);
}

else if($mainPais == "13" || $mainPais == "14" || $mainPais == "15" || $mainPais == "16"){
    $sql = "
        SELECT 
            p.idPartido, 
            p.fkPais1, 
            p.fkPais2, 
            p.p1GF, 
            p.p2GF, 
            p.fechaHora,
            p.estado,
            pais1.nombrePais AS nombrePais1,
            pais1.bandera AS bandera1,
            pais1.grupo AS grupo1,
            pais2.nombrePais AS nombrePais2,
            pais2.bandera AS bandera2,
            pais2.grupo AS grupo2,
            pred.GF1,
            pred.GF2,
            pred.dni
        FROM 
            partidos p
        JOIN 
            paises pais1 ON p.fkPais1 = pais1.idPais
        JOIN 
            paises pais2 ON p.fkPais2 = pais2.idPais
        LEFT JOIN 
            (SELECT fkPartido, dni, GF1, GF2 FROM predicciones) pred ON p.idPartido = pred.fkPartido
        WHERE 
            p.fkPais1 IN (13,14,15,16) OR p.fkPais2 IN (13,14,15,16)
        ORDER BY 
            p.idPartido DESC
    ";
    $result = $conexion->query($sql);
}

$partidos = array();

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Recorrer cada fila de resultados
    while ($row = $result->fetch_assoc()) {
        // Agregar los datos de cada fila al array de partidos
        $partido = array(
            'idPartido' => $row['idPartido'],
            'fkPais1' => $row['fkPais1'],
            'fkPais2' => $row['fkPais2'],
            'p1GF' => $row['p1GF'],
            'p2GF' => $row['p2GF'],
            'fechaHora' => date('d/m H:i', strtotime($row['fechaHora'])),
            'estado' => $row['estado'],
            'nombrePais1' => $row['nombrePais1'],
            'bandera1' => $row['bandera1'],
            'nombrePais2' => $row['nombrePais2'],
            'bandera2' => $row['bandera2'],
            'grupo1' => $row['grupo1'],
            'grupo2' => $row['grupo2'],
            'GF1' => $row['GF1'], // Agregar GF1 desde la subconsulta
            'GF2' => $row['GF2'],  // Agregar GF2 desde la subconsulta
            'dni' => $row['dni']
        );
        array_push($partidos, $partido);
    }
} else {
    echo "<label class='d-flex justify-content-center'>No se encontraron resultados.</label>";
}
?>
