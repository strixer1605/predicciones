<?php
// session_start();

include ('conexion.php');
if (isset($_SESSION['dni'])) {
    $estaLogueado = true;
    $dniUsuario = $_SESSION['dni'];
    if($_SESSION['dni'] == "46736648"){
        $admin = true;
    } else {
        $admin = false;
    }
} else {
    $estaLogueado = false;
    $dniUsuario = null;
}

$mainPais = $_GET['idPais'];
$grupos = [
    1 => [1, 2, 3, 4],
    2 => [5, 6, 7, 8],
    3 => [9, 10, 11, 12],
    4 => [13, 14, 15, 16]
];

foreach ($grupos as $grupoId => $paises) {
    if (in_array($mainPais, $paises)) {
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
                (SELECT fkPartido, dni, GF1, GF2 FROM predicciones WHERE dni = '$dniUsuario') pred 
                ON p.idPartido = pred.fkPartido
            WHERE 
                p.fkPais1 IN (" . implode(',', $paises) . ") 
                OR p.fkPais2 IN (" . implode(',', $paises) . ")
            ORDER BY 
                p.idPartido DESC
        ";
        $result = $conexion->query($sql);
        break;
    }
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