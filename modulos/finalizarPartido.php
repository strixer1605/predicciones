<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si las variables idPartido, gf1 y gf2 tienen contenido
    if (isset($_POST['idPartido']) && isset($_POST['gf1']) && isset($_POST['gf2']) && isset($_POST['fkPais1']) && isset($_POST['fkPais2'])) {

        // Incluye el archivo de conexión a la base de datos
        include ('conexion.php');

        // Sanitiza las variables para evitar inyecciones SQL
        $gf1 = intval($_POST['gf1']);
        $gf2 = intval($_POST['gf2']);
        $idPartido = intval($_POST['idPartido']);
        $fkPais1 = intval($_POST['fkPais1']);
        $fkPais2 = intval($_POST['fkPais2']);

        // Verifica si el estado del partido ya es 0
        $sqlVerificarEstado = "SELECT estado FROM partidos WHERE idPartido = ?";
        if ($stmtVerificar = $conexion->prepare($sqlVerificarEstado)) {
            $stmtVerificar->bind_param("i", $idPartido);
            $stmtVerificar->execute();
            $stmtVerificar->bind_result($estado);
            $stmtVerificar->fetch();
            $stmtVerificar->close();

            if ($estado == 0) {
                echo "1"; // El partido ya ha terminado
                exit;
            }
        } else {
            echo "0"; // Error en la consulta
            exit;
        }

        // Obtener estadísticas del país 1
        $sqlEstadisticasPais1 = "SELECT PJ, G, E, P, GF, GC, DG, pts FROM paises WHERE idPais = ?";
        $estadisticasPais1 = array();
        if ($stmtEstadisticasPais1 = $conexion->prepare($sqlEstadisticasPais1)) {
            $stmtEstadisticasPais1->bind_param("i", $fkPais1);
            $stmtEstadisticasPais1->execute();
            $resultPais1 = $stmtEstadisticasPais1->get_result();
            $estadisticasPais1 = $resultPais1->fetch_assoc();
            $stmtEstadisticasPais1->close();
        }

        // Obtener estadísticas del país 2
        $sqlEstadisticasPais2 = "SELECT PJ, G, E, P, GF, GC, DG, pts FROM paises WHERE idPais = ?";
        $estadisticasPais2 = array();
        if ($stmtEstadisticasPais2 = $conexion->prepare($sqlEstadisticasPais2)) {
            $stmtEstadisticasPais2->bind_param("i", $fkPais2);
            $stmtEstadisticasPais2->execute();
            $resultPais2 = $stmtEstadisticasPais2->get_result();
            $estadisticasPais2 = $resultPais2->fetch_assoc();
            $stmtEstadisticasPais2->close();
        }

        // Actualizar estadísticas de los países
        $estadisticasPais1['PJ'] += 1;
        $estadisticasPais2['PJ'] += 1;
        $estadisticasPais1['GF'] += $gf1;
        $estadisticasPais1['GC'] += $gf2;
        $estadisticasPais2['GF'] += $gf2;
        $estadisticasPais2['GC'] += $gf1;
        $estadisticasPais1['DG'] = $estadisticasPais1['GF'] - $estadisticasPais1['GC'];
        $estadisticasPais2['DG'] = $estadisticasPais2['GF'] - $estadisticasPais2['GC'];

        if ($gf1 > $gf2) {
            $estadisticasPais1['G'] += 1;
            $estadisticasPais1['pts'] += 3;
            $estadisticasPais2['P'] += 1;
        } elseif ($gf2 > $gf1) {
            $estadisticasPais2['G'] += 1;
            $estadisticasPais2['pts'] += 3;
            $estadisticasPais1['P'] += 1;
        } else {
            $estadisticasPais1['E'] += 1;
            $estadisticasPais2['E'] += 1;
            $estadisticasPais1['pts'] += 1;
            $estadisticasPais2['pts'] += 1;
        }

        // Prepara la consulta SQL para actualizar el estado del partido y los goles
        $sqlActualizarPartido = "UPDATE partidos SET GF1P = ?, GF2P = ?, estado = 0 WHERE idPartido = ?";
        if ($stmtActualizar = $conexion->prepare($sqlActualizarPartido)) {
            $stmtActualizar->bind_param("iii", $gf1, $gf2, $idPartido);
            $stmtActualizar->execute();
            $stmtActualizar->close();
        }

        // Actualizar estadísticas del país 1
        $sqlActualizarPais1 = "UPDATE paises SET PJ = ?, G = ?, E = ?, P = ?, GF = ?, GC = ?, DG = ?, pts = ? WHERE idPais = ?";
        if ($stmtActualizarPais1 = $conexion->prepare($sqlActualizarPais1)) {
            $stmtActualizarPais1->bind_param("iiiiiiiii", $estadisticasPais1['PJ'], $estadisticasPais1['G'], $estadisticasPais1['E'], $estadisticasPais1['P'], $estadisticasPais1['GF'], $estadisticasPais1['GC'], $estadisticasPais1['DG'], $estadisticasPais1['pts'], $fkPais1);
            $stmtActualizarPais1->execute();
            $stmtActualizarPais1->close();
        }

        // Actualizar estadísticas del país 2
        $sqlActualizarPais2 = "UPDATE paises SET PJ = ?, G = ?, E = ?, P = ?, GF = ?, GC = ?, DG = ?, pts = ? WHERE idPais = ?";
        if ($stmtActualizarPais2 = $conexion->prepare($sqlActualizarPais2)) {
            $stmtActualizarPais2->bind_param("iiiiiiiii", $estadisticasPais2['PJ'], $estadisticasPais2['G'], $estadisticasPais2['E'], $estadisticasPais2['P'], $estadisticasPais2['GF'], $estadisticasPais2['GC'], $estadisticasPais2['DG'], $estadisticasPais2['pts'], $fkPais2);
            $stmtActualizarPais2->execute();
            $stmtActualizarPais2->close();
        }

        // Determinar quién es el ganador o si hay empate
        $ganador = 0; 

        if ($gf1 > $gf2) {
            $ganador = 1; 
        } elseif ($gf2 > $gf1) {
            $ganador = 2; 
        }

        $sqlActualizarGanador = "UPDATE partidos SET ganador = ? WHERE idPartido = ?";
        if ($stmtActualizarGanador = $conexion->prepare($sqlActualizarGanador)) {
            $stmtActualizarGanador->bind_param("ii", $ganador, $idPartido);
            $stmtActualizarGanador->execute();
            $stmtActualizarGanador->close();
        }

        echo "0"; // Éxito

        // Cierra la conexión a la base de datos
        $conexion->close();
    } else {
        echo "Faltan datos necesarios.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
