$(document).ready(function() {
     $("#dodajModel").click(function() {
        let serijaModela = $("#serija :selected").val(); // Cuvamo o kojoj se seriji radi
        let imeModela = $("#imeModela").val(); // Cuvamo ime modela
        let kratakOpis = $("#kratakOpis").val(); // Cuvamo kratak opis modela
        let cenaModela = $("#cenaModela").val(); // Cuvamo cenu modela
        let naslovPrveSekcije = $("#naslovPrveSekcije").val(); // Cuvamo naslov prve sekcije modela
        let opisPrveSekcije = $("#opisPrveSekcije").val(); // Cuvamo opis prve sekcije modela
        let naslovKolaza= $("#naslovKolaza").val(); // Cuvamo naslov kolaza
        let opisKolaza= $("#opisKolaza").val(); // Cuvamo opis kolaza
        let naslovDrugeSekcije = $("#naslovDrugeSekcije").val(); // Cuvamo naslov druge sekcije
        let opisDrugeSekcije = $("#opisDrugeSekcije").val(); // Cuvamo opis druge sekcije
        let cilindri= $("#cilindri").val(); // Cuvamo naslov kolaza
        let zapremina= $("#zapremina").val(); // Cuvamo naslov kolaza
        let precnik= $("#precnik").val(); // Cuvamo naslov kolaza
        let maksimalnaSnaga= $("#maksimalnaSnaga").val(); // Cuvamo naslov kolaza
        let maksimalniObrtniMoment = $("#maksimalniObrtniMoment").val(); // Cuvamo naslov kolaza
        let kompresija= $("#kompresija").val(); // Cuvamo naslov kolaza
        let maksimalnaBrzina= $("#maksimalnaBrzina").val(); // Cuvamo naslov kolaza
        let ubrzavanje= $("#ubrzavanje").val(); // Cuvamo naslov kolaza
        let dimenzijePrednjih= $("#dimenzijePrednjih").val(); // Cuvamo naslov kolaza
        let dimenzijeZadnjih= $("#dimenzijeZadnjih").val(); // Cuvamo naslov kolaza
        let materijalPrednjih= $("#materijalPrednjih").val(); // Cuvamo naslov kolaza
        let materijalZadnjih= $("#materijalZadnjih").val(); // Cuvamo naslov kolaza
        let potrosnjaGrad= $("#potrosnjaGrad").val(); // Cuvamo naslov kolaza
        let potrosnjaOtvoreno= $("#potrosnjaOtvoreno").val(); // Cuvamo naslov kolaza
        let kombinovanaPotrosnja= $("#kombinovanaPotrosnja").val(); // Cuvamo naslov kolaza
        let emisijaGasova= $("#emisijaGasova").val(); // Cuvamo naslov kolaza
        let zapreminaRezervoara= $("#zapreminaRezervoara").val(); // Cuvamo naslov kolaza
        let uKilogramima= $("#uKilogramima").val(); // Cuvamo naslov kolaza
        let maksimalnaTezina= $("#maksimalnaTezina").val(); // Cuvamo naslov kolaza
        let nosivost= $("#nosivost").val(); // Cuvamo naslov kolaza
        let osovinskoOpterecenje= $("#osovinskoOpterecenje").val(); // Cuvamo naslov kolaza
    $.ajax({
        type: "POST",
        dataType: "text",
        url: "dodajModel.php",
        data: {serijaModela: serijaModela, imeModela: imeModela, kratakOpis: kratakOpis, cenaModela: cenaModela, 
        naslovPrveSekcije: naslovPrveSekcije, opisPrveSekcije: opisPrveSekcije, naslovKolaza: naslovKolaza, opisKolaza: opisKolaza, 
        naslovDrugeSekcije: naslovDrugeSekcije, opisDrugeSekcije: opisDrugeSekcije,
        cilindri: cilindri, zapremina: zapremina, precnik: precnik, maksimalnaSnaga: maksimalnaSnaga, maksimalniObrtniMoment: maksimalniObrtniMoment,
        kompresija: kompresija, maksimalnaBrzina: maksimalnaBrzina, ubrzavanje: ubrzavanje, dimenzijePrednjih: dimenzijePrednjih, dimenzijeZadnjih: dimenzijeZadnjih,
        materijalPrednjih: materijalPrednjih, materijalZadnjih: materijalZadnjih, potrosnjaGrad: potrosnjaGrad, potrosnjaOtvoreno: potrosnjaOtvoreno,
        kombinovanaPotrosnja: kombinovanaPotrosnja, emisijaGasova: emisijaGasova, zapreminaRezervoara: zapreminaRezervoara, uKilogramima: uKilogramima,
        maksimalnaTezina: maksimalnaTezina, nosivost: nosivost, osovinskoOpterecenje: osovinskoOpterecenje},
        success: function(response) {
            console.log(response)
            
            if(response === "Uspesno")
                alert("Uspesno sacuvan model");
            else
                alert("Nije uspesno unet model");
                
        },
        error: function(xhr, ajaxOptions, thrownError){
            alert(xhr.status);
        } // Kraj izvrsavanja funkcije u AJAX-u
    }); // Kraj AJAX-a
    });
});
/*
$(document).ready(function() {
    alert("Hi");
    // Ovde se na klik dugmeta poziva funkcija za ubacivanje podataka u bazu
    $("#dodajModel").click(function() {
        // Uzimamo podatke iz input formi i smestamo ih u promenljive
        let serijaModela = $("#serija :selected").val(); // Cuvamo o kojoj se seriji radi
        let imeModela = $("#imeModela").val(); // Cuvamo ime modela
        let slikaModela = $("#slikaModela"); // Cuvamo sliku modela
        alert(slikaModela);
        $.ajax({
            type: "POST",
            dataType: "text",
            url: "dodajModel.php",
            data: {}
        });
    });
});
*/  