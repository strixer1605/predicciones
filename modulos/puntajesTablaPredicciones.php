<?php
    include('traerPartidos.php');
    include('conexion.php'); // Asegúrate de que este archivo tenga la conexión a la base de datos
    $fechaActual = date('Y-m-d H:i:s');

    // Verificar si existe una conexión válida
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    echo '<center><h5>' . $partido['grupo1'] . '</h5></center><br>';
    foreach ($partidos as $partido) {
        echo '
        <div class="container">
            <div class="row row-container">
                <div class="group-container">
                    <div class="match row">
                        <div class="pais col-sm-3 col-12">
                            <img src="../' . $partido['bandera1'] . '" alt="">
                            <span>' . $partido['nombrePais1'] . '</span>
                        </div>
                        <div class="puntos col-sm-6 col-12">
                            <div class="GF1">';
                                
                                if ($partido['estado'] == 2) {
                                    echo '<label>' . ($partido['p1GF'] !== null ? $partido['p1GF'] : '') . '</label>';
                                } elseif ($partido['estado'] == 0) {
                                    echo '<label>' . $partido['p1GF'] . '</label>';
                                } elseif ($partido['estado'] == 1) {
                                    echo '<input type="number" class="score-input gf1"';
                                    if ($partido['dni'] === $dniUsuario) {
                                        echo ' value="' . $partido['GF1'] . '"';
                                    }
                                    echo '>';
                                }

                            echo '
                            </div>
                            <div class="fecha">
                                <span>';
                                
                                if ($partido['estado'] == 2) {
                                    echo 'Jugando';
                                } elseif ($partido['estado'] == 0) {
                                    echo 'Finalizado';
                                } elseif ($partido['estado'] == 1) {
                                    echo 'Próximo';
                                }
                                
                                echo '</span>
                                <span>' . $partido['fechaFormatted'] . '</span>
                                <span>' . $partido['horaFormatted'] . '</span>
                            </div>
                            <div class="GF2">';

                                if ($partido['estado'] == 2) {
                                    echo '<label>' . ($partido['p2GF'] !== null ? $partido['p2GF'] : '-') . '</label>';
                                } elseif ($partido['estado'] == 0) {
                                    echo '<label>' . $partido['p2GF'] . '</label>';
                                } elseif ($partido['estado'] == 1) {
                                    echo '<input type="number" class="score-input gf2"';
                                    if ($partido['dni'] === $dniUsuario) {
                                        echo ' value="' . $partido['GF2'] . '"';
                                    }
                                    echo '>';
                                }

                            echo '</div>
                        </div>
                        <div class="pais col-sm-3 col-12">
                            <img src="../' . $partido['bandera2'] . '" alt="">
                            <span>' . $partido['nombrePais2'] . '</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">';
                        
                        if ($partido['estado'] == 2) {
                            echo '<label>Este partido está en juego!</label>';
                        } elseif ($partido['estado'] == 0 && isset($_SESSION['dni'])) {
                            $GF1 = $partido['GF1'];
                            $GF2 = $partido['GF2'];
                            $p1GF = $partido['p1GF'];
                            $p2GF = $partido['p2GF'];

                            $puntos = 0;

                            $usuario_predijo = !is_null($GF1) && !is_null($GF2);

                            if ($usuario_predijo) {
                                if ($p1GF > $p2GF) {
                                    if ($GF1 > $GF2) {
                                        if ($GF1 == $p1GF && $GF2 == $p2GF) {
                                            $puntos = 10;
                                            echo '<label>Predicción Perfecta! (+10pts)</label>';
                                        } elseif ($GF1 == $p1GF || $GF2 == $p2GF) {
                                            $puntos = 8;
                                            echo '<label>Predijo Ganador y goles de un equipo. (+8pts)</label>';
                                        } else {
                                            $puntos = 3;
                                            echo '<label>Predijo Ganador. (+3pts)</label>';
                                        }
                                    } else {
                                        if ($GF1 == $p1GF || $GF2 == $p2GF) {
                                            $puntos = 1;
                                            echo '<label>Predicción fallida, acertó goles de un equipo. (+1pt)</label>';
                                        } else {
                                            $puntos = 0;
                                            echo '<label>Predicción fallida! (0pts)</label>';
                                        }
                                    }
                                } elseif ($p1GF < $p2GF) {
                                    if ($GF1 < $GF2) {
                                        if ($GF1 == $p1GF && $GF2 == $p2GF) {
                                            $puntos = 10;
                                            echo '<label>Predijo Ganador y goles de ambos equipos. Predicción Perfecta! (+10pts)</label>';
                                        } elseif ($GF1 == $p1GF || $GF2 == $p2GF) {
                                            $puntos = 8;
                                            echo '<label>Predijo Ganador y goles de un equipo. (+8pts)</label>';
                                        } else {
                                            $puntos = 3;
                                            echo '<label>Predijo Ganador. (+3pts)</label>';
                                        }
                                    } else {
                                        if ($GF1 == $p1GF || $GF2 == $p2GF) {
                                            $puntos = 1;
                                            echo '<label>Predicción fallida, pero acertó los goles de un equipo. (+1pt)</label>';
                                        } else {
                                            $puntos = 0;
                                            echo '<label>Predicción fallida! (0pts)</label>';
                                        }
                                    }
                                } elseif ($p1GF == $p2GF) {
                                    if ($GF1 == $GF2) {
                                        if ($GF1 == $p1GF) {
                                            $puntos = 8;
                                            echo '<label>Predijo Empate y goles. (+8pts)</label>';
                                        } else {
                                            $puntos = 3;
                                            echo '<label>Predijo Empate. (+3pts)</label>';
                                        }
                                    } else {
                                        if ($GF1 == $p1GF || $GF2 == $p2GF) {
                                            $puntos = 1;
                                            echo '<label>Predicción fallida, pero acertó los goles de un equipo. (+1pt)</label>';
                                        } else {
                                            $puntos = 0;
                                            echo '<label>Predicción fallida! (0pts)</label>';
                                        }
                                    }
                                }
                            }

                            // Verificar si ya se sumaron los puntos y si hay predicciones para el partido actual
                            $dniUsuario = $_SESSION['dni'];
                            $idPartido = $partido['idPartido'];

                            // Consulta para verificar si existe una predicción del usuario para este partido
                            $query_verificar_prediccion = "SELECT puntos_suma FROM predicciones WHERE dni = ? AND fkPartido = ?";
                            $stmt_verificar_prediccion = $conexion->prepare($query_verificar_prediccion);
                            $stmt_verificar_prediccion->bind_param("si", $dniUsuario, $idPartido);
                            $stmt_verificar_prediccion->execute();
                            $stmt_verificar_prediccion->store_result();

                            // Vincular el resultado de la consulta a una variable
                            $stmt_verificar_prediccion->bind_result($puntos_suma);
                            $stmt_verificar_prediccion->fetch(); // Fetch para obtener el resultado

                            // Verificar si el usuario ya ha sumado puntos para este partido
                            if ($stmt_verificar_prediccion->num_rows > 0 && $puntos_suma) {
                            } else {
                                if ($stmt_verificar_prediccion->num_rows == 0) {
                                    echo '<label>No hay predicciones para este partido.</label>';
                                } else {
                                    // Si hay predicciones pero los puntos no se han sumado aún
                                    if ($puntos > 0 && !$puntos_suma) {
                                        $query_actualizar_puntos = "UPDATE predicciones SET puntos = puntos + ?, puntos_suma = TRUE WHERE dni = ? AND fkPartido = ?";
                                        $stmt_actualizar_puntos = $conexion->prepare($query_actualizar_puntos);
                                        $stmt_actualizar_puntos->bind_param("isi", $puntos, $dniUsuario, $idPartido);
                                        
                                        if ($stmt_actualizar_puntos->execute()) {
                                            echo '<label>Puntos actualizados correctamente en la base de datos.</label>';
                                        } else {
                                            echo '<label>Error al actualizar los puntos en la base de datos.</label>';
                                        }

                                        $stmt_actualizar_puntos->close();
                                    }
                                }
                            }

                            // Cerrar la consulta
                            $stmt_verificar_prediccion->close();

                        } elseif ($partido['estado'] == 1) {
                            echo '<button type="button" class="btn btn-success predict-btn" data-partido="'. $partido['idPartido'] .'">Predecir</button>';
                        }

                    echo '</div>
                </div>
            </div>
        </div>
        ';
    }

    $conexion->close();
?>
