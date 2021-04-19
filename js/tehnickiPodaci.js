// AJAX

$(document).ready(function() {

    $("#tehnickiPodaci").change(function() {
        // Grabimo vrednost iz padajuceg menija
        let opcija = $("#tehnickiPodaci :selected").val();
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "tehnickiPodaci.php",
            data: {opcija:opcija},
            success: function(model) {
                // Asinhrono ucitavanje tezine
                $('#uKilogramima span').html(model['uKilogramima']);
                $('#maksimalnaTezina span').html(model['maksimalnaTezina']);
                $('#nosivost span').html(model['nosivost']);
                $('#osovinskoOpterecenje span').html(model['osovinskoOpterecenje']);

                // Asinhrono ucitavanje motora
                $('#cilindri span').html(model['cilindri']);
                $('#zapremina span').html(model['zapremina']);
                $('#prencnik span').html(model['prencnik']);
                $('#maksimalnaSnaga span').html(model['maksimalnaSnaga']);
                $('#maksimalniObrtniMoment span').html(model['maksimalniObrtniMoment']);
                $('#kompresija span').html(model['kompresija']);

                // Asinhrono ucitavanje performansi
                $('#maksimalnaBrzina span').html(model['maksimalnaBrzina']);
                $('#ubrzavanje span').html(model['ubrzavanje']);

                // Asinhrono ucitavanje potrosnje goriva
                $('#potrosnjaGrad span').html(model['potrosnjaGrad']);
                $('#potrosnjaOtvoreno span').html(model['potrosnjaOtvoreno']);
                $('#kombinovanaPotrosnja span').html(model['kombinovanaPotrosnja']);
                $('#emisijaGasova span').html(model['emisijaGasova']);
                $('#zapreminaRezervoara span').html(model['zapreminaRezervoara']);

                // Asinhrono ucitavanje pneumatika
                $('#dimenzijePrednjih span').html(model['dimenzijePrednjih']);
                $('#dimenzijeZadnjih span').html(model['dimenzijeZadnjih']);
                $('#materijalPrednjih span').html(model['materijalPrednjih']);
                $('#materijalZadnjih span').html(model['materijalZadnjih']);

            }
        });
    });

});