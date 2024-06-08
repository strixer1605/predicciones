<?php
// Establecer conexión con la base de datos (asumiendo que ya tienes un archivo de configuración para la conexión)
include 'conexion.php';

// Recoger los datos del formulario
$dni = $_POST['data_dni'];
$nombre = $_POST['data_nombre'];
$apellido = $_POST['data_apellido'];


// Verificar que el DNI no esté registrado
$sql_dni = "SELECT * FROM usuarios WHERE dni = '$dni'";
$result_dni = mysqli_query($conexion, $sql_dni);

if (mysqli_num_rows($result_dni) > 0) {
    http_response_code(400); // Código de estado HTTP 400 para indicar un error de solicitud
    echo "Error: El DNI ya está registrado";
}
else {
    // Insertar los datos en la tabla si no hay duplicados
    $sql_insert = "INSERT INTO usuarios (dni, nombre, apellido) VALUES ('$dni', '$nombre', '$apellido')";
    
    if (mysqli_query($conexion, $sql_insert)) {
        http_response_code(200); // Código de estado HTTP 200 para indicar éxito
        echo "Éxito: Datos insertados correctamente";
    } else {
        http_response_code(500); // Código de estado HTTP 500 para indicar un error interno del servidor
        echo "Error: " . $sql_insert . "<br>" . mysqli_error($conexion);
    }
}

// Cerrar conexión
mysqli_close($conexion);
?>
