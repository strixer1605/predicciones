$(document).ready(function() {
    // Obtener el año actual
    var fechaActual = new Date().getFullYear();

    // Establecer el año actual como valor por defecto en el campo 'fecha'
    $('#fecha').val(fechaActual + '-01-01'); // Establece el primer día del año actual
    
    // Resto del código ...

    $('#crear').click(function() {
        // Función para crear el partido
        function crearPartido() {
            let nombrePais = $('#nombrePais1').text();
            let fecha = $('#fecha').val();
            let hora = $('#hora').val();
            let paisRival = $('#paisRival').val();

            if (fecha === '' || hora === '' || paisRival == null) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Por favor, complete todos los campos.'
                });
                return;
            }

            $.post('../modulos/nuevoPartido.php', {
                nombrePais,
                fecha,
                hora,
                paisRival,
            })
            .done(function(response) {
                if (response === "0") {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        text: 'Partido creado correctamente.'
                    }).then((result) => {
                        if (result.isConfirmed || result.isDismissed) {
                            // Redireccionar a la página anterior
                            window.location.href = document.referrer;
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ocurrió un error, intentelo nuevamente.'
                    });
                }
            })
            .fail(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error, intentelo nuevamente.'
                });
            });
        }

        // Detectar presión de la tecla "Enter" en los campos de entrada
        $('#fecha, #hora, #paisRival').keypress(function(event) {
            if (event.which === 13) { // 13 es el código de la tecla "Enter"
                event.preventDefault();
                crearPartido();
            }
        });

        // Manejar clic en el botón "Crear Partido"
        $('#crear').click(function() {
            crearPartido();
        });
    });
});
