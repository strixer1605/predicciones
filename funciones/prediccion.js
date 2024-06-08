$(document).ready(function() {
    $('.btn.btn-success').click(function(){
        var idBoton = $(this).attr('id');
        var partido = $(this).closest('.match');
        var gf1 = partido.find('.gf1').val();
        var gc1 = partido.find('.gc1').val();
        var gf2 = partido.find('.gf2').val();
        var gc2 = partido.find('.gc2').val();

        console.log("Valores de GF y GC para el botón " + idBoton + ":");
        console.log("GF1: " + gf1 + ", GC1: " + gc1);
        console.log("GF2: " + gf2 + ", GC2: " + gc2);

        alert("Valores de GF y GC para el botón " + idBoton + ":\n" + "GF1: " + gf1 + ", GC1: " + gc1 + "\nGF2: " + gf2 + ", GC2: " + gc2);
    });
});
