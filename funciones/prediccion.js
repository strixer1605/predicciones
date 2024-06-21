$(document).ready(function() {
    $('.btn.btn-success').click(function() {
        var matchContainer = $(this).closest('.match-container');
        
        var idPartido = $(this).data('partido');
        var gf1 = matchContainer.find('.gf1').val();
        var gf2 = matchContainer.find('.gf2').val();

        if (gf1 == '' || gf2 == '' || idPartido == '') {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Por favor, complete todos los campos.'
            });
            return;
        }
        $.post('../modulos/procesarPrediccion.php', {
            gf1,
            gf2,
            idPartido
        })
        .done(function(response) {
            console.log(response);
            var responseData = JSON.parse(response);
        
            if (responseData.error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: responseData.error
                });
            } else if (responseData.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: responseData.success
                })
            } else {
                // Si la respuesta no contiene 'error' ni 'success', muestra un mensaje de error genérico
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error desconocido, por favor, inténtelo de nuevo más tarde.'
                });
            }
        })
        
        .fail(function(xhr, status, error) {
            console.log(xhr.responseText); // Imprime la respuesta del servidor en la consola
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Ocurrió un error, revise los datos nuevamente.'
            });
        });
        
    });
});
