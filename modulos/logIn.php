<?php
// Establecer conexión con la base de datos (asumiendo que ya tienes un archivo de configuración para la conexión)
include 'conexion.php';

// Recoger los datos del formulario
$dni = $_POST['data_dni'];

// Consultar la base de datos para verificar las credenciales
$sql = "SELECT * FROM usuarios WHERE dni = '$dni'";
$resultado = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($resultado);
if (mysqli_num_rows($resultado) > 0) {
    // Iniciar sesión y redirigir al usuario a la página de inicio
    session_start();
    $_SESSION['dni'] = $fila['dni'];
    echo "Éxito: Inicio de sesión exitoso";
} else {
    echo "Error: Ocurrió un error, revise los datos nuevamente.";
}

// Cerrar conexión
mysqli_close($conexion);
?>
