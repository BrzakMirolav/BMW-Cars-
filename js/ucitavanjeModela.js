$(document).ready(function() {
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "ucitajModele.php",
        data: {},
        success: function(model) {
        } // Kraj izvrsavanja funkcije u AJAX-u
    }); // Kraj AJAX-a
});