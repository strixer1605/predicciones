$(document).ready(function() {
    $('#enviar').click(function(){
        let email = $('#email').val();
        let contraseña = $('#contraseña').val();
        // Validar que todos los campos estén completos
        if (email === '' || contraseña === '') {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Por favor, complete todos los campos.'
            });
            return;
        }

        // Validar el formato del email utilizando una expresión regular simple
        let emailFormat = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailFormat.test(email)) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Por favor, ingrese un correo electrónico válido.'
            });
            return;
        }
        
        $.post('../modulos/logIn.php', {
            data_email: email,
            data_contraseña: contraseña
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
