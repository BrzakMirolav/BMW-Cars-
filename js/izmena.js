$(document).ready(function() {
    $("#ucitajSve").click(function() {
        $("#izmena").empty();
        $("#izmena").html("<option value='0'>-- Izaberite korisnika --</option>");
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "ajaxIzmena.php",
        data: {funkcija: 'ucitajImena'},
        success: function(response) {
        
       for(let i=0;i<response.length;i++){
            let opcija = "<option value=" + response[i]["korisnickoIme"] + ">" + response[i]["ime"] + " " + response[i]["prezime"] + "</option>";
            $("#izmena").append(opcija);  
        }
        }
   
        }); // kraj ajaxa
    }) // kraj funckije za ucitavanje imena


    $("#snimiLozinku").click(function() {
    let korisnickoIme = $("#izmena :selected").val(); // grabimo kom korisniku menjamo sifru
    let staraLozinka = $("#staraLozinka").val(); // grabimo staru sifru
    let lozinka = $("#lozinka").val(); // grabimo sifru
    let lozinka1 = $("#lozinka1").val();//potvrda lozinke
    if(lozinka === lozinka1){
        if(lozinka === "")
            alert("Lozinka ne sme biti prazan string.");
        else
        {
    $.ajax({
        type: "POST",
        dataType: "text",
        url: "ajaxIzmena.php",
        data: {funkcija: 'snimiLozinku', korisnickoIme: korisnickoIme, staraLozinka: staraLozinka, lozinka: lozinka},
        success: function(response) {
            if(response === 'Nije dobra stara lozinka')
            {
                alert("Nije dobra stara lozinka");
            }
            else if(response === "Uspesno")
            {
                alert("Uspesno promenjena lozinka.");
            }
    }
        }); // kraj ajaxa
        } // Kraj elsa za prazan string za sifru
    }
    else
        alert("Ne podudaraju se nove lozinke.");
    }); // kraj funckije za menjanje sifre

    $("#snimiLozinku2").click(function() {
        let korisnickoIme = $("#izmena :selected").val(); // grabimo kom korisniku menjamo sifru
        let novaLozinka = $("#novaLozinka").val(); // grabimo staru sifru
        if(novaLozinka != "") {
        $.ajax({
            type: "POST",
            dataType: "text",
            url: "ajaxIzmena.php",
            data: {funkcija: 'snimiLozinku2', korisnickoIme: korisnickoIme, novaLozinka: novaLozinka},
            success: function(response) {
                if(response === "Uspesno")
                {
                    alert("Uspesno promenjena lozinka.");
                }
        }
            }); // kraj ajaxa
        }
        else
            alert("Lozinka ne sme biti prazan string.");
        }); // kraj funckije za menjanje sifre
    

    $("#snimiEmail").click(function() {
        let korisnickoIme = $("#izmena :selected").val(); // grabimo kom korisniku menjamo sifru
        let email = $("#email").val(); // grabimo sifru
        if(korisnickoIme != 0)
        {
        $.ajax({
            type: "POST",
            dataType: "text",
            url: "ajaxIzmena.php",
            data: {funkcija: 'snimiEmail', korisnickoIme: korisnickoIme, email: email},
            success: function(response) {
                    if(response === "Uspesno")
                        alert("Uspesno promenjen email");
                    else
                        alert("Neuspesno promenjen email");
    
        }
            }); // kraj ajaxa
        }
        else
            alert("Izabrano ime nije validno.");
        }); // kraj funckije za menjanje emaila


        $("#obrisi").click(function() {
            let korisnickoIme = $("#izmena :selected").val(); // grabimo kom korisniku menjamo sifru
            if(confirm("Da li ste sigurni da želite da obrišete korisnika")){
            if(korisnickoIme != 0)
            {
            $.ajax({
                type: "POST",
                dataType: "text",
                url: "ajaxIzmena.php",
                data: {funkcija: 'obrisi', korisnickoIme: korisnickoIme},
                success: function(response) {

                        if(response === "Uspesno")
                            alert("Uspesno obrisan korisnik");
                        else
                            alert("Neuspesno obrisan korisnik");
        
            } 
                }); // kraj ajaxa
            }
            else
                alert("Izabrano ime nije validno."); }
        

            }); // kraj funckije za brisanje korisnika
    


});


