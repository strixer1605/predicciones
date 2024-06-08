$(document).ready(function() {
    $('#enviar').click(function(){
        let dni = $('#dni').val();
        // Validar que todos los campos estén completos
        if (dni === '') {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Por favor, complete todos los campos.'
            });
            return;
        }
        
        $.post('../modulos/logIn.php', {
            data_dni: dni
        })
        .done(function(response) {
            // Este código se ejecuta si la solicitud AJAX se completa correctamente
            // El parámetro 'response' contiene la respuesta del servidor
            
            if (response.startsWith("Error")) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response
                });
            } else {
                // Redirigir al usuario a la página de inicio después de iniciar sesión
                window.location.href = '../index.php';
            }
        })
        .fail(function() {
            // Este código se ejecuta si la solicitud AJAX falla
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Ocurrió un error, revise los datos nuevamente.'
            });
        });
    });
});
