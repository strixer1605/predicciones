<?php
include('conexion.php');

$mainPais = $_GET['idPais'];
if ($mainPais == "1" || $mainPais == "2" || $mainPais == "3" || $mainPais == "4") {
    $sql = "
        SELECT 
            p.idPartido, 
            p.fkPais1, 
            p.fkPais2, 
            p.p1GF, 
            p.p2GF, 
            p.fechaHora,
            p.estado,
            pais1.nombrePais as nombrePais1,
            pais1.bandera as bandera1,
            pais2.nombrePais as nombrePais2,
            pais2.bandera as bandera2
        FROM 
            partidos p
        JOIN 
            paises pais1 ON p.fkPais1 = pais1.idPais
        JOIN 
            paises pais2 ON p.fkPais2 = pais2.idPais
        WHERE 
            p.fkPais1 IN (1,2,3,4) OR p.fkPais2 IN (1,2,3,4)
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
            'bandera2' => $row['bandera2']
        );
        array_push($partidos, $partido);
    }
} else {
    echo "No se encontraron resultados.";
}
?>