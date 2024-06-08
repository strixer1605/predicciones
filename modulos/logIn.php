<?php
// Establecer conexión con la base de datos (asumiendo que ya tienes un archivo de configuración para la conexión)
include 'conexion.php';

// Recoger los datos del formulario
$email = $_POST['data_email'];
$contraseña = $_POST['data_contraseña'];

// Consultar la base de datos para verificar las credenciales
$sql = "SELECT * FROM usuarios WHERE email = '$email' AND contraseña = '$contraseña'";
$resultado = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($resultado);
if (mysqli_num_rows($resultado) > 0) {
    // Iniciar sesión y redirigir al usuario a la página de inicio
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['dni'] = $fila['dni'];
    echo "Éxito: Inicio de sesión exitoso";
} else {
    echo "Error: Las credenciales son incorrectas";
}

// Cerrar conexión
mysqli_close($conexion);
?>
