<?php
// session_start();

include ('conexion.php');
if (isset($_SESSION['dni'])) {
    $estaLogueado = true;
    $dniUsuario = $_SESSION['dni'];
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

$result = false; // Inicializa $result fuera del bucle foreach

foreach ($grupos as $grupoId => $paises) {
    if (in_array($mainPais, $paises)) {
        $sql = "
            SELECT 
                p.idPartido, 
                p.fkPais1, 
                p.fkPais2, 
                p.GF1P, 
                p.GF2P, 
                p.ganador,
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
                (SELECT fkPartido, dni, GF1, GF2 FROM predicciones WHERE dni = '" . $dniUsuario . "') pred 
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

if ($result === false) {
    // La consulta falló, maneja el error
    echo "Error en la consulta: " . $conexion->error;
} else {
    $partidos = array(); // Inicializa el array de partidos aquí

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Recorrer cada fila de resultados
        while ($row = $result->fetch_assoc()) {
            // Convertir el estado a texto
            switch ($row['estado']) {
                case 0:
                    $estadoTexto = "Partido Finalizado";
                    break;
                case 1:
                    $estadoTexto = "Partido por jugarse";
                    break;
                case 2:
                    $estadoTexto = "Partido en juego";
                    break;
                default:
                    $estadoTexto = "Estado desconocido";
            }

            // Agregar los datos de cada fila al array de partidos
            $partido = array(
                'idPartido' => $row['idPartido'],
                'fkPais1' => $row['fkPais1'],
                'fkPais2' => $row['fkPais2'],
                'p1GF' => $row['GF1P'],
                'p2GF' => $row['GF2P'],
                'fechaHora' => $row['fechaHora'],
                'fechaFormatted' => date('d/m', strtotime($row['fechaHora'])),
                'horaFormatted' => date('H:i', strtotime($row['fechaHora'])),
                'estado' => $row['estado'],
                'estadoTexto' => $estadoTexto, // Añade el texto del estado
                'nombrePais1' => $row['nombrePais1'],
                'bandera1' => $row['bandera1'],
                'nombrePais2' => $row['nombrePais2'],
                'bandera2' => $row['bandera2'],
                'grupo1' => $row['grupo1'],
                'grupo2' => $row['grupo2'],
                'GF1' => $row['GF1'], 
                'GF2' => $row['GF2'], 
                'dni' => $row['dni']  
            );
            array_push($partidos, $partido);
        }
    } else {
        echo "<label class='d-flex justify-content-center'>No se encontraron resultados.</label>";
    }

    // Guardar los partidos en una variable de sesión para usarlos en otro lugar si es necesario
    $_SESSION['partidos'] = $partidos;
}
?>
