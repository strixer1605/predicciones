<?php
    include('conexion.php');

    // Función para obtener datos de los países basados en sus IDs
    function obtenerDatosPaises($conexion, $ids) {
        $ids_str = implode(",", $ids);
        $sql = "SELECT * FROM paises WHERE idPais IN ($ids_str) ORDER BY pts DESC, GF DESC;";
        $result = $conexion->query($sql);

        $paises = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $pais = array(
                    'idPais' => $row['idPais'],
                    'nombrePais' => $row['nombrePais'],
                    'bandera' => $row['bandera'],
                    'PJ' => isset($row['PJ']) ? $row['PJ'] : null,
                    'G' => isset($row['G']) ? $row['G'] : null,
                    'E' => isset($row['E']) ? $row['E'] : null,
                    'P' => isset($row['P']) ? $row['P'] : null,
                    'GF' => isset($row['GF']) ? $row['GF'] : null,
                    'GC' => isset($row['GC']) ? $row['GC'] : null,
                    'DG' => isset($row['DG']) ? $row['DG'] : null,
                    'puntos' => isset($row['pts']) ? $row['pts'] : null
                );
                array_push($paises, $pais);
            }
        } else {
            echo "No se encontraron resultados para los IDs: $ids_str";
        }

        return $paises;
    }

    // Obtener datos para todos los países
    $paises = obtenerDatosPaises($conexion, range(1, 16));

    // Obtener datos de grupos específicos
    $paises1 = obtenerDatosPaises($conexion, range(1, 4));
    $paises2 = obtenerDatosPaises($conexion, range(5, 8));
    $paises3 = obtenerDatosPaises($conexion, range(9, 12));
    $paises4 = obtenerDatosPaises($conexion, range(13, 16));

    // Cerrar conexión
    $conexion->close();
?>
