$(document).ready(function() {
    var fechaActual = new Date().getFullYear();

    $('.main.btn.btn-primary').click(function(){

        var idPartido = $(this).data('partido');

        if (idPartido === '') {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Ocurrió un error inesperado.'
            });
            return;
        }
        Swal.fire({
            title: "Estas seguro de empezar el partido?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#0056b3",
            cancelButtonColor: "#003282",
            confirmButtonText: "Empezar partido",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('../modulos/partidoEstado.php', {
                    idPartido: idPartido
                })
                .done(function(response) {
                    if (response === "0") {
                        Swal.fire({
                            title: "Partido iniciado!",
                            icon: "success",
                            customClass: {
                                confirmButton: 'my-confirm-button-class'
                            },
                            buttonsStyling: false
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response === "2" ? 'El partido ya está en curso.' : 'Ocurrió un error, intentelo nuevamente.'
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
        });
        
    })

    $('.main2.btn.btn-primary').click(function(){
        var main = $(this).closest('.main');
        
        var idPartido = $(this).data('partido');
        var gf1 = main.find('.gf1').val();
        var gf2 = main.find('.gf2').val();
        var fkPais1 = main.find('.fkPais1').val();
        var fkPais2 = main.find('.fkPais2').val();

        if (isNaN(gf1) || isNaN(gf2) || idPartido === '') {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Por favor, complete todos los campos correctamente.'
            });
            return;
        }
    
        Swal.fire({
            title: "¿Estás seguro de terminar el partido?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#0056b3",
            cancelButtonColor: "#003282",
            confirmButtonText: "Terminar partido",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('../modulos/finalizarPartido.php', {
                    idPartido: idPartido,
                    gf1: gf1,
                    gf2: gf2,
                    fkPais1: fkPais1,
                    fkPais2: fkPais2
                    
                })
                .done(function(response) {
                    if (response === "0") {
                        Swal.fire({
                            title: "Partido finalizado!",
                            icon: "success",
                            customClass: {
                                confirmButton: 'my-confirm-button-class'
                            },
                            buttonsStyling: false
                        });
                    } else if (response === "1") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'El partido ya terminó.'
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
        });
    });
    
    
    // Establecer el año actual como valor por defecto en el campo 'fecha'
    $('#fecha').val(fechaActual + '-01-01'); 

    $('#crear').click(function() {
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
    $('#descalificar').click(function() {
        var idPais= $(this).data('idpais');
        $.post('../modulos/descalificarPais.php', {
            idPais
        })
        .done(function(response) {
            if (response === "0") {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: 'Pais descalificado.'
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
    });
});
