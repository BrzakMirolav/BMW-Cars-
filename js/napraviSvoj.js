$(document).ready(function() {
$("#biranjeOpcije").change(function() {
    let op = $("#biranjeOpcije :selected").val(); 
    if(op === "boja")
    {
        let nazivModela = $("#nazivModela").text();
        $.ajax({
            type: "POST",
            dataType: "text",
            url: "napraviSvoj.php",
            data: {nazivModela: nazivModela, kojaSlika: "prvaBoja"},
            success: function(response) {
                $('#slikaJedinstvenogModela').attr('src', response);
                $("#listaBoja li").removeClass("activeOpcija");
                $('#prvaBoja').attr('class', 'activeOpcija');
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
            } // Kraj izvrsavanja funkcije u AJAX-u
        }); // Kraj AJAX-a
        $("#listaPresvlake").css('display' ,'none');
        $("#listaFelne").css('display' ,'none');
        $("#listaBoja").css('display', 'block');
    }

    if(op === "presvlake")
    {
        let nazivModela = $("#nazivModela").text();
        $.ajax({
            type: "POST",
            dataType: "text",
            url: "napraviSvoj.php",
            data: {nazivModela: nazivModela, kojaSlika: "prvaPresvlaka"},
            success: function(response) {
                $('#slikaJedinstvenogModela').attr('src', response);
                $("#listaPresvlaka li").removeClass("activeOpcija");
                $('#prvaPresvlaka').attr('class', 'activeOpcija');
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
            } // Kraj izvrsavanja funkcije u AJAX-u
        }); // Kraj AJAX-a
        $("#listaFelne").css('display' ,'none');
        $("#listaBoja").css('display' ,'none');
        $("#listaPresvlake").css('display', 'block');
    }

    if(op === "felne")
    {
        let nazivModela = $("#nazivModela").text();
    $.ajax({
        type: "POST",
        dataType: "text",
        url: "napraviSvoj.php",
        data: { nazivModela: nazivModela, kojaSlika: "prveFelne"},
        success: function(response) {
            $('#slikaJedinstvenogModela').attr('src', response);
            $("#listaFelne li").removeClass("activeOpcija");
            $('#prveFelne').attr('class', 'activeOpcija');
        },
        error: function(xhr, ajaxOptions, thrownError){
            alert(xhr.status);
        } // Kraj izvrsavanja funkcije u AJAX-u
    }); // Kraj AJAX-a
        $("#listaPresvlake").css('display' ,'none');
        $("#listaBoja").css('display' ,'none');
        $("#listaFelne").css('display', 'block');
    }

});

    $("#prvaBoja").click(function() {
        let nazivModela = $("#nazivModela").text();
        $.ajax({
            type: "POST",
            dataType: "text",
            url: "napraviSvoj.php",
            data: {nazivModela: nazivModela, kojaSlika: "prvaBoja"},
            success: function(response) {
                $('#slikaJedinstvenogModela').attr('src', response);
                $("#listaBoja li").removeClass("activeOpcija");
                $('#prvaBoja').attr('class', 'activeOpcija');
                $('#slikaZaRezervaciju').attr('value', response);
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
            } // Kraj izvrsavanja funkcije u AJAX-u
        }); // Kraj AJAX-a
    });

    $("#drugaBoja").click(function() {
        let nazivModela = $("#nazivModela").text();
        $.ajax({
            type: "POST",
            dataType: "text",
            url: "napraviSvoj.php",
            data: {nazivModela: nazivModela, kojaSlika: "drugaBoja"},
            success: function(response) {
                $('#slikaJedinstvenogModela').attr('src', response);
                $("#listaBoja li").removeClass("activeOpcija");
                $('#drugaBoja').attr('class', 'activeOpcija');
                $('#slikaZaRezervaciju').attr('value', response);
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
            } // Kraj izvrsavanja funkcije u AJAX-u
        }); // Kraj AJAX-a
    });

    $("#trecaBoja").click(function() {
        let nazivModela = $("#nazivModela").text();
        $.ajax({
            type: "POST",
            dataType: "text",
            url: "napraviSvoj.php",
            data: {nazivModela: nazivModela, kojaSlika: "trecaBoja"},
            success: function(response) {
                $('#slikaJedinstvenogModela').attr('src', response);
                $("#listaBoja li").removeClass("activeOpcija");
                $('#trecaBoja').attr('class', 'activeOpcija');
                $('#slikaZaRezervaciju').attr('value', response);
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
            } // Kraj izvrsavanja funkcije u AJAX-u
        }); // Kraj AJAX-a
    });

    $("#cetvrtaBoja").click(function() {
        let nazivModela = $("#nazivModela").text();
        $.ajax({
            type: "POST",
            dataType: "text",
            url: "napraviSvoj.php",
            data: {nazivModela: nazivModela, kojaSlika: "cetvrtaBoja"},
            success: function(response) {
                $('#slikaJedinstvenogModela').attr('src', response);
                $("#listaBoja li").removeClass("activeOpcija");
                $('#cetvrtaBoja').attr('class', 'activeOpcija');
                $('#slikaZaRezervaciju').attr('value', response);
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
            } // Kraj izvrsavanja funkcije u AJAX-u
        }); // Kraj AJAX-a
    });
});



$("#prvaPresvlaka").click(function() {
    let nazivModela = $("#nazivModela").text();
    $.ajax({
        type: "POST",
        dataType: "text",
        url: "napraviSvoj.php",
        data: {nazivModela: nazivModela, kojaSlika: "prvaPresvlaka"},
        success: function(response) {
            $('#slikaJedinstvenogModela').attr('src', response);
            $("#listaPresvlake li").removeClass("activeOpcija");
            $('#prvaPresvlaka').attr('class', 'activeOpcija');
        },
        error: function(xhr, ajaxOptions, thrownError){
            alert(xhr.status);
        } // Kraj izvrsavanja funkcije u AJAX-u
    }); // Kraj AJAX-a
});

$("#drugaPresvlaka").click(function() {
    let nazivModela = $("#nazivModela").text();
    $.ajax({
        type: "POST",
        dataType: "text",
        url: "napraviSvoj.php",
        data: { nazivModela: nazivModela, kojaSlika: "drugaPresvlaka"},
        success: function(response) {
            $('#slikaJedinstvenogModela').attr('src', response);
            $("#listaPresvlake li").removeClass("activeOpcija");
            $('#drugaPresvlaka').attr('class', 'activeOpcija');
        },
        error: function(xhr, ajaxOptions, thrownError){
            alert(xhr.status);
        } // Kraj izvrsavanja funkcije u AJAX-u
    }); // Kraj AJAX-a
});

$("#trecaPresvlaka").click(function() {
    let nazivModela = $("#nazivModela").text();
    $.ajax({
        type: "POST",
        dataType: "text",
        url: "napraviSvoj.php",
        data: {nazivModela: nazivModela, kojaSlika: "trecaPresvlaka"},
        success: function(response) {
            $('#slikaJedinstvenogModela').attr('src', response);
            $("#listaPresvlake li").removeClass("activeOpcija");
            $('#trecaPresvlaka').attr('class', 'activeOpcija');
        },
        error: function(xhr, ajaxOptions, thrownError){
            alert(xhr.status);
        } // Kraj izvrsavanja funkcije u AJAX-u
    }); // Kraj AJAX-a
});



$("#prveFelne").click(function() {
    let nazivModela = $("#nazivModela").text();
    $.ajax({
        type: "POST",
        dataType: "text",
        url: "napraviSvoj.php",
        data: { nazivModela: nazivModela, kojaSlika: "prveFelne"},
        success: function(response) {
            $('#slikaJedinstvenogModela').attr('src', response);
            $("#listaFelne li").removeClass("activeOpcija");
            $('#prveFelne').attr('class', 'activeOpcija');
        },
        error: function(xhr, ajaxOptions, thrownError){
            alert(xhr.status);
        } // Kraj izvrsavanja funkcije u AJAX-u
    }); // Kraj AJAX-a
});

$("#drugeFelne").click(function() {
    let nazivModela = $("#nazivModela").text();
    $.ajax({
        type: "POST",
        dataType: "text",
        url: "napraviSvoj.php",
        data: {nazivModela: nazivModela, kojaSlika: "drugeFelne"},
        success: function(response) {
            $('#slikaJedinstvenogModela').attr('src', response);
            $("#listaFelne li").removeClass("activeOpcija");
            $('#drugeFelne').attr('class', 'activeOpcija');
        },
        error: function(xhr, ajaxOptions, thrownError){
            alert(xhr.status);
        } // Kraj izvrsavanja funkcije u AJAX-u
    }); // Kraj AJAX-a
});



/*
$("#biranjeOpcije").change(function() {
        // Ovde uzimamo izabranu opciju
        let op = $("#biranjeOpcije :selected").val(); 

        if(op == 'boja')
        {
            // Ubacjemo adekvatnu sliku
            $("#slikaJedinstvenogModela").attr({
                "src" : "slike/napraviSvoj/plavaBoja.jpg"
            });
            // Ubacujemo listu za izbor tj menjanje 
            $("#lista").html(
                '<li id="plava" class="activeOpcija"><img src="slike/napraviSvoj/plava.jpg" alt="plava boja za kola"></li> \
                <li id="crvena"><img src="slike/napraviSvoj/crvena.jpg" alt="crvena boja za kola"></li> \
                <li id="crna"><img src="slike/napraviSvoj/crna.jpg" alt="crna boja za kola"></li> \
                <li id="siva"><img src="slike/napraviSvoj/siva.jpg" alt="siva boja za kola"></li> \
                <li id="bela"><img src="slike/napraviSvoj/bela.jpg" alt="bela boja za kola"></li> \
                <li id="svetloSiva"><img src="slike/napraviSvoj/svetloSiva.jpg" alt="svetlo siva boja za kola"></li>'
            );
            $("#plava img").click(function() {
                // Brisemo klasu active za sve elemente
                $("#lista li").removeClass("activeOpcija");
                $("#plava").addClass("activeOpcija");
                $("#slikaJedinstvenogModela").attr({
                    "src": "slike/napraviSvoj/plavaBoja.jpg"
                });
                $("input[name=slikaModela]").attr('value', 'modeli/Model1/slike/napraviSvoj/plavaBoja.jpg');
            });

            $("#crvena img").click(function() {
                // Brisemo klasu active za sve elemente
                $("#lista li").removeClass("activeOpcija");
                $("#crvena").addClass("activeOpcija");
                $("#slikaJedinstvenogModela").attr({
                    "src": "slike/napraviSvoj/crvenaBoja.jpg"
                });
                $("input[name=slikaModela]").attr('value', 'modeli/Model1/slike/napraviSvoj/crvenaBoja.jpg');
            });

            $("#siva img").click(function() {
                // Brisemo klasu active za sve elemente
                $("#lista li").removeClass("activeOpcija");
                $("#siva").addClass("activeOpcija");
                $("#slikaJedinstvenogModela").attr({
                    "src": "slike/napraviSvoj/sivaBoja.jpg"
                });
                $("input[name=slikaModela]").attr('value', 'modeli/Model1/slike/napraviSvoj/sivaBoja.jpg');
            });

            $("#crna img").click(function() {
                // Brisemo klasu active za sve elemente
                $("#lista li").removeClass("activeOpcija");
                $("#crna").addClass("activeOpcija");
                $("#slikaJedinstvenogModela").attr({
                    "src": "slike/napraviSvoj/crnaBoja.jpg"
                });
                $("input[name=slikaModela]").attr('value', 'modeli/Model1/slike/napraviSvoj/crnaBoja.jpg');
            });

            $("#svetloSiva img").click(function() {
                // Brisemo klasu active za sve elemente
                $("#lista li").removeClass("activeOpcija");
                $("#svetloSiva").addClass("activeOpcija");
                $("#slikaJedinstvenogModela").attr({
                    "src": "slike/napraviSvoj/svetloSivaBoja.jpg"
                });
                $("input[name=slikaModela]").attr('value', 'modeli/Model1/slike/napraviSvoj/svetloSivaBoja.jpg');
            });

            $("#bela img").click(function() {
                // Brisemo klasu active za sve elemente
                $("#lista li").removeClass("activeOpcija");
                $("#bela").addClass("activeOpcija");
                $("#slikaJedinstvenogModela").attr({
                    "src": "slike/napraviSvoj/belaBoja.jpg"
                });
                $("input[name=slikaModela]").attr('value', 'modeli/Model1/slike/napraviSvoj/belaBoja.jpg');
            });
        }

        if(op == 'presvlake')
        {
            // Ubacjemo adekvatnu sliku
            $("#slikaJedinstvenogModela").attr({
                "src" : "slike/napraviSvoj/enterijerM.jpg"
            });
            // Ubacujemo listu za izbor tj menjanje 
            $("#lista").html(
                '<li id="mPresvlaka" class="activeOpcija"><img src="slike/napraviSvoj/mPresvlake.jpg" alt="M kozne presvlake"></li> \
                <li id="sportskaPresvlaka"><img src="slike/napraviSvoj/sportskaPresvlake.jpg" alt="M sportske presvlake"></li> \
                <li id="matPresvlaka"><img src="slike/napraviSvoj/matPresvlake.jpg" alt="M mat presvlake"></li>'
            );

             $("#mPresvlaka img").click(function() {
                // Brisemo klasu active za sve elemente
                $("#lista li").removeClass("activeOpcija");
                $("#mPresvlaka").addClass("activeOpcija");
                $("#slikaJedinstvenogModela").attr({
                    "src": "slike/napraviSvoj/enterijerM.jpg"
                });
            });

            $("#sportskaPresvlaka img").click(function() {
                // Brisemo klasu active za sve elemente
                $("#lista li").removeClass("actactiveOpcijaive");
                $("#sportskaPresvlaka").addClass("activeOpcija");
                $("#slikaJedinstvenogModela").attr({
                    "src": "slike/napraviSvoj/enterijerSport.png"
                });
            });

            $("#matPresvlaka img").click(function() {
                // Brisemo klasu active za sve elemente
                $("#lista li").removeClass("activeOpcija");
                $("#matPresvlaka").addClass("activeOpcija");
                $("#slikaJedinstvenogModela").attr({
                    "src": "slike/napraviSvoj/enterijerMat.png"
                });
            });
        }

        if(op == 'tabla')
        {
            // Ubacjemo adekvatnu sliku
            $("#slikaJedinstvenogModela").attr({
                "src" : "slike/napraviSvoj/tablaObicna.jpg"
            });
            // Ubacujemo listu za izbor tj menjanje 
            $("#lista").html(
                '<li id="tablaObicna" class="activeOpcija"><img src="slike/napraviSvoj/obicnaTabla.jpg" alt="obicna tabla" style="padding: 15px;"></li> \
                <li id="tablaCarbon"><img src="slike/napraviSvoj/carbonTabla.jpg" alt="carbon fiber tabla"></li>'
            );
            $("#tablaObicna img").click(function() {
                // Brisemo klasu active za sve elemente
                $("#lista li").removeClass("activeOpcija");
                $("#tablaObicna").addClass("activeOpcija");
                $("#slikaJedinstvenogModela").attr({
                    "src": "slike/napraviSvoj/tablaObicna.jpg"
                });
            });
            $("#tablaCarbon img").click(function() {
                // Brisemo klasu active za sve elemente
                $("#lista li").removeClass("activeOpcija");
                $("#tablaCarbon").addClass("activeOpcija");
                $("#slikaJedinstvenogModela").attr({
                    "src": "slike/napraviSvoj/tablaCarbon.jpg"
                });
            });
        }

        if(op == 'felne')
        {
            // Ubacjemo adekvatnu sliku
            $("#slikaJedinstvenogModela").attr({
                "src" : "slike/napraviSvoj/prveFelne.jpg"
            });
            // Ubacujemo listu za izbor tj menjanje 
             $("#lista").html(
                '<li id="felneJedan" class="activeOpcija"><img src="slike/napraviSvoj/felneJedan.png" alt="BMW felne tip 1" style="padding: 25px;"></li> \
                <li id="felneDva"><img src="slike/napraviSvoj/felneDva.png" alt="BMW felne tip 2"></li>' 
            );

            $("#felneJedan img").click(function() {
                // Brisemo klasu active za sve elemente
                $("#lista li").removeClass("activeOpcija");
                $("#felneJedan").addClass("activeOpcija");
                $("#slikaJedinstvenogModela").attr({
                    "src": "slike/napraviSvoj/prveFelne.jpg"
                });
            });

            $("#felneDva img").click(function() {
                // Brisemo klasu active za sve elemente
                $("#lista li").removeClass("activeOpcija");
                $("#felneDva").addClass("activeOpcija");
                $("#slikaJedinstvenogModela").attr({
                    "src": "slike/napraviSvoj/drugeFelne.jpg"
                });
            });
        }
    })
    */