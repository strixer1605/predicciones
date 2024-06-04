$(document).ready(function() {
    $('#enviar').click(function(){
        let dni = $('#dni').val();
        let nombre = $('#nombre').val();
        let apellido = $('#apellido').val();
        let email = $('#email').val();
        let contraseña = $('#contraseña').val();
        // Validar que todos los campos estén completos
        if (dni === '' || nombre === '' || apellido === '' || email === '' || contraseña === '') {
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
        
        $.post('../modulos/register.php', {
            data_dni: dni,
            data_nombre: nombre,
            data_apellido: apellido,
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
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Datos insertados correctamente!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../main/logIn.php'; // Redirigir al usuario a main/logIn.php
                    }
                });
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
