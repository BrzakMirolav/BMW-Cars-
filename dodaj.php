
<?php
// Sesija
session_start();
if(isset($_GET['odjava']))
{
    unset($_SESSION['korisnik']);
    session_destroy();
}

if( $_SESSION['status']!="Administrator"){
    header("Location: index.php");
  }
?>

<?php

    if(isset($_FILES['slikaModela']) and
     isset($_FILES['glavnaSlika']) and 
     isset($_FILES['slikaPrveSekcijeJedan']) and 
     isset($_FILES['slikaPrveSekcijeDva']) and 
     isset($_FILES['slikaPrveSekcijeTri']) and 
     isset($_FILES['slikaPrveSekcijeCetiri']) and
     isset($_FILES['slikaKolazaJedan']) and
     isset($_FILES['slikaKolazaDva']) and
     isset($_FILES['slikaKolazaTri']) and
     isset($_FILES['skica']) and
     isset($_FILES['prvaBoja']) and
     isset($_FILES['drugaBoja']) and
     isset($_FILES['trecaBoja']) and
     isset($_FILES['cetvrtaBoja']) and
     isset($_FILES['prvaPresvlaka']) and
     isset($_FILES['drugaPresvlaka']) and
     isset($_FILES['trecaPresvlaka']) and
     isset($_FILES['prveFelne']) and
     isset($_FILES['drugeFelne']) and
     isset($_POST['imeModela']))
    {
        
        // Dodavanje ulaznog video ili slike
        $slikaModela =  rand() . $_FILES['slikaModela']['name'];
        move_uploaded_file($_FILES['slikaModela']['tmp_name'], "slikeModela/listanjeModela/". $slikaModela);
        //rename("slikeModela/listanjeModela/".$slikaModela,"slikeModela/listanjeModela/" . );

        $putanja = "slikeModela/modeli/";
        $putanja2 = "slikeModela/napraviSvoj/";
        // Dodavanje slika iz prve sekcije, kolaza i druge sekcije
        $glavnaSlika = rand() . $_FILES['glavnaSlika']['name'];
        $slikaPrveSekcijeJedan = rand() . $_FILES['slikaPrveSekcijeJedan']['name'];
        $slikaPrveSekcijeDva = rand() . $_FILES['slikaPrveSekcijeDva']['name'];
        $slikaPrveSekcijeTri = rand() . $_FILES['slikaPrveSekcijeTri']['name'];
        $slikaPrveSekcijeCetiri= rand() . $_FILES['slikaPrveSekcijeCetiri']['name'];
        $slikaKolazaJedan= rand() . $_FILES['slikaKolazaJedan']['name'];
        $slikaKolazaDva= rand() . $_FILES['slikaKolazaDva']['name'];
        $slikaKolazaTri= rand() . $_FILES['slikaKolazaTri']['name'];
        $prvaBoja= rand() . $_FILES['prvaBoja']['name'];
        $drugaBoja= rand() . $_FILES['drugaBoja']['name'];
        $trecaBoja= rand() . $_FILES['trecaBoja']['name'];
        $cetvrtaBoja= rand() . $_FILES['cetvrtaBoja']['name'];
        $prvaPresvlaka= rand() . $_FILES['prvaPresvlaka']['name'];
        $drugaPresvlaka= rand() . $_FILES['drugaPresvlaka']['name'];
        $trecaPresvlaka= rand() . $_FILES['trecaPresvlaka']['name'];
        $prveFelne= rand() . $_FILES['prveFelne']['name'];
        $drugeFelne= rand() . $_FILES['drugeFelne']['name'];
        $skica = rand() . $_FILES['skica']['name'];

        move_uploaded_file($_FILES['glavnaSlika']['tmp_name'], $putanja.$glavnaSlika);
        move_uploaded_file($_FILES['slikaPrveSekcijeJedan']['tmp_name'], $putanja.$slikaPrveSekcijeJedan);
        move_uploaded_file($_FILES['slikaPrveSekcijeDva']['tmp_name'], $putanja.$slikaPrveSekcijeDva);
        move_uploaded_file($_FILES['slikaPrveSekcijeTri']['tmp_name'], $putanja.$slikaPrveSekcijeTri);
        move_uploaded_file($_FILES['slikaPrveSekcijeCetiri']['tmp_name'], $putanja.$slikaPrveSekcijeCetiri);
        move_uploaded_file($_FILES['slikaKolazaJedan']['tmp_name'], $putanja.$slikaKolazaJedan);
        move_uploaded_file($_FILES['slikaKolazaDva']['tmp_name'], $putanja.$slikaKolazaDva);
        move_uploaded_file($_FILES['slikaKolazaTri']['tmp_name'], $putanja.$slikaKolazaTri);
        move_uploaded_file($_FILES['prvaBoja']['tmp_name'], $putanja2.$prvaBoja);
        move_uploaded_file($_FILES['drugaBoja']['tmp_name'], $putanja2.$drugaBoja);
        move_uploaded_file($_FILES['trecaBoja']['tmp_name'], $putanja2.$trecaBoja);
        move_uploaded_file($_FILES['cetvrtaBoja']['tmp_name'], $putanja2.$cetvrtaBoja);
        move_uploaded_file($_FILES['prvaPresvlaka']['tmp_name'], $putanja2.$prvaPresvlaka);
        move_uploaded_file($_FILES['drugaPresvlaka']['tmp_name'], $putanja2.$drugaPresvlaka);
        move_uploaded_file($_FILES['trecaPresvlaka']['tmp_name'], $putanja2.$trecaPresvlaka);
        move_uploaded_file($_FILES['prveFelne']['tmp_name'], $putanja2.$prveFelne);
        move_uploaded_file($_FILES['drugeFelne']['tmp_name'], $putanja2.$drugeFelne);
        move_uploaded_file($_FILES['skica']['tmp_name'], $putanja.$skica);

        $konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");
        // Test da li se povezao sa bazom
        if (mysqli_connect_errno())
        {
            die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
        }


        $upitPutanjeSlika = "INSERT INTO slike VALUES(null, '" . $_POST['imeModela'] . "','" . "slikeModela/listanjeModela/" . $slikaModela . "','" . $putanja . $glavnaSlika . "','" . 
        $putanja . $slikaPrveSekcijeJedan . "','" . $putanja . $slikaPrveSekcijeDva . "','" . $putanja . $slikaPrveSekcijeTri . "','" . $putanja . $slikaPrveSekcijeCetiri . "','" .
        $putanja . $slikaKolazaJedan . "','" . $putanja . $slikaKolazaDva . "','" . $putanja . $slikaKolazaTri . "','" . $putanja . $skica . "')";

        $upitNapraviSvoj = "INSERT INTO napravisvoj VALUES(null, '" . $_POST['imeModela'] . "','" . $putanja2 . $prvaBoja . "','" . $putanja2 . $drugaBoja . "','" . $putanja2 . $trecaBoja . "','" 
        . $putanja2 . $cetvrtaBoja . "','" . $putanja2 . $prvaPresvlaka . "','" . $putanja2 . $drugaPresvlaka . "','" .  $putanja2 . $trecaPresvlaka . "','" . $putanja2 . $prveFelne . "','" . $putanja2 . $drugeFelne . "')";
        //$upitNapraviSvoj = "INSERT INTO napravisvoj VALUES(null, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test')";
        if(mysqli_query($konekcija, $upitPutanjeSlika) and mysqli_query($konekcija, $upitNapraviSvoj))
            print("<script>alert('Putanje ubacene.');</script>");
        else
            print("<script>alert('Putanje nisu ubacene.');</script>");

        mysqli_close($konekcija);
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BMW - dodavanje modela</title>
    <link type="text/css" rel="stylesheet" href="css/stilovi.css?v=<?php echo time();?>"/> 



</head>
<body  style="color:white; background-image:url(slikeModela/wallpaper.jpg); background-repeat: no-repeat; background-color:black; background-size: 100%; background-attachment: fixed;" > 

    <div class="container-fluid" style="font-size: 20px;"> <!--Pocetak kontejnera-->

    <h1>Dodavanje novog modela</h1>
    <br>
    <form action="dodaj.php" method="POST" enctype="multipart/form-data">
        <select id="serija">
            <option value="0">-- Izaberite seriju modela --</option>
            <option value="serijaJedan">serijaJedan</option>
            <option value="serijaDva">serijaDva</option>
            <option value="serijaTri">serijaTri</option>
            <option value="serijaCetiri">serijaCetiri</option>
            <option value="serijaPet">serijaPet</option>
            <option value="serijaSest">serijaSest</option>
            <option value="serijaSedam">serijaSedam</option>
            <option value="serijaOsam">serijaOsam</option>
            <option value="serijaX">serijaX</option>
            <option value="serijaZ">serijaZ</option>
            <option value="serijaM">serijaM</option>
        </select><br><br><br>
        <label for="imeModela">Unesite ime modela: </label><br>
        <input type="text" name="imeModela" id="imeModela" placeholder="Ime modela"><br><br><br>

        <label for="slikaModela">Okacite sliku modela: </label><br>
        <input type="file" name="slikaModela" id="slikaModela" class="fajl"><br><br><br>

        <label for="glavnaSlika">Okacite glavnu sliku/video modela: </label><br>
        <input type="file" name="glavnaSlika" id="glavnaSlika" class="fajl"><br><br><br>

        <label for="cenaModela">Unesite cenu modela: </label><br>
        <input type="text" name="cenaModela" id="cenaModela" placeholder="Cena modela"><br><br><br>

        <label for="kratakOpis">Unesite kratak opis modela: </label><br>
        <textarea name="kratakOpis" id="kratakOpis" style="width: 500px; height: 100px;" placeholder="Kratak opis modela"></textarea><br><br><br>

        <br><hr>

        <label for="naslovPrveSekcije"><h3>Kreiranje prve sekcije: </h3></label><br>
    
        <input type="text" name="naslovPrveSekcije" id="naslovPrveSekcije" placeholder="Unesite naslov prve sekcije"><br><br><br>
        <textarea name="opisPrveSekcije" id="opisPrveSekcije" style="width: 500px; height: 100px;" placeholder="Unesite opis prve sekcije"></textarea><br><br><br>
        <label for="slikaPrveSekcijeJedan">Okacite slike za prvu sekciju: </label><br><br>
        <input type="file" name="slikaPrveSekcijeJedan" id="slikaPrveSekcijeJedan" class="fajl"><br><br>
        <input type="file" name="slikaPrveSekcijeDva" id="slikaPrveSekcijeDva" class="fajl"><br><br>
        <input type="file" name="slikaPrveSekcijeTri" id="slikaPrveSekcijeTri" class="fajl"><br><br>
        <input type="file" name="slikaPrveSekcijeCetiri" id="slikaPrveSekcijeCetiri" class="fajl"><br><br>

        <hr>
        <label for="naslovKolaza"><h3>Kreiranje kolaza: </h3></label><br>
    
        <input type="text" name="naslovKolaza" id="naslovKolaza" placeholder="Unesite naslov kolaza"><br><br><br>
        <textarea name="opisKolaza" id="opisKolaza" style="width: 500px; height: 100px;" placeholder="Unesite opis kolaza"></textarea><br><br><br>
        <label for="slikaKolazaJedan">Okacite slike kolaza: </label><br><br>
        <input type="file" name="slikaKolazaJedan" id="slikaKolazaJedan" class="fajl"><br><br>
        <input type="file" name="slikaKolazaDva" id="slikaKolazaDva" class="fajl"><br><br>
        <input type="file" name="slikaKolazaTri" id="slikaKolazaTri" class="fajl"><br><br>

        <hr>
        <label for="naslovDrugeSekcije"><h3>Kreiranje druge sekcije: </h3></label><br>
    
        <input type="text" name="naslovDrugeSekcije" id="naslovDrugeSekcije" placeholder="Unesite naslov druge sekcije"><br><br><br>
        <textarea name="opisDrugeSekcije" id="opisDrugeSekcije" style="width: 500px; height: 100px;" placeholder="Unesite opis druge sekcije"></textarea><br><br><br>
        <label for="prvaBoja">Okacite boje automobila: </label><br><br>
        <input type="file" name="prvaBoja" id="prvaBoja" class="fajl"><br><br>
        <input type="file" name="drugaBoja" id="drugaBoja" class="fajl"><br><br>
        <input type="file" name="trecaBoja" id="trecaBoja" class="fajl"><br><br>
        <input type="file" name="cetvrtaBoja" id="cetvrtaBoja" class="fajl"><br><br>
        <label for="prvaPresvlaka">Okacite boje enterijera: </label><br><br>
        <input type="file" name="prvaPresvlaka" id="prvaPresvlaka" class="fajl"><br><br>
        <input type="file" name="drugaPresvlaka" id="drugaPresvlaka" class="fajl"><br><br>
        <input type="file" name="trecaPresvlaka" id="trecaPresvlaka" class="fajl"><br><br>
        <label for="prveFelne">Okacite vrste felni: </label><br><br>
        <input type="file" name="prveFelne" id="prveFelne" class="fajl"><br><br>
        <input type="file" name="drugeFelne" id="drugeFelne" class="fajl"><br><br>


        <!--
        <label for="slikaGlavneAtrakcijeJedan">Unesite putanje do slika za glavnu atrakciju: </label>
        <input type="text" name="slikaGlavneAtrakcijeJedan" id="slikaGlavneAtrakcijeJedan" placeholder="Unesite putanju prve slike"> 
        <input type="text" name="slikaGlavneAtrakcijeDva" id="slikaGlavneAtrakcijeDva" placeholder="Unesite putanju druge slike"> 
        <input type="text" name="slikaGlavneAtrakcijeTri" id="slikaGlavneAtrakcijeTri" placeholder="Unesite putanju trece slike"> 
        <input type="text" name="slikaGlavneAtrakcijeCetiri" id="slikaGlavneAtrakcijeCetiri" placeholder="Unesite putanju cetvrte slike"><br><br><br>

        <label for="naslovPrveSekcije">Unesite prvu sekciju: </label><br><br>
        <input type="text" name="naslovPrveSekcije" id="naslovPrveSekcije" placeholder="Unesite naslov prve sekcije"><br><br><br>
        <textarea name="opisSekcijeJedan" id="opisSekcijeJedan" style="width: 500px; height: 100px;" placeholder="Unesite opis prve sekcije"></textarea><br><br><br>
        <input type="text" name="slikaPrveSekcijeJedan" id="slikaPrveSekcijeJedan" placeholder="Unesite putanju prve slike prve sekcije">
        <input type="text" name="slikaPrveSekcijeDva" id="slikaPrveSekcijeDva" placeholder="Unesite putanju druge slike prve sekcije"><br><br><br>

        <label for="kolazNaslov">Napravite kolaz: </label><br><br>  
        <input type="text" name="kolazNaslov" id="kolazNaslov" placeholder="Unesite naslov kolaza"><br><br><br>
        <input type="text" name="kolazOpis" id="kolazOpis" placeholder="Unesite opis kolaza"><br><br><br>
        <input type="text" name="kolazSlikaJedan" id="kolazSlikaJedan" placeholder="Unesite putanju prve slike kolaza">
        <input type="text" name="kolazSlikaDva" id="kolazSlikaDva" placeholder="Unesite putanju druge slike kolaza">
        <input type="text" name="kolazSlikaTri" id="kolazSlikaTri" placeholder="Unesite putanju trece slike kolaza"><br><br><br>
        -->
        <hr>
        <label for="skica"><h3>Unesite tehnicke podatke: </h3></label><br>
        <label for="">Okacite sliku skice automobila: </label><br><br>
        <input type="file" name="skica" id="skica" class="fajl"><br><br>
        <label for="cilindri">Podaci o motoru: </label><br><br>
        <input type="text" name="cilindri" id="cilindri" placeholder="Cilindri"> <br><br>
        <input type="text" name="zapremina" id="zapremina" placeholder="Zapremina"> <br><br>
        <input type="text" name="precnik" id="precnik" placeholder="Precnik"> <br><br>
        <input type="text" name="maksimalnaSnaga" id="maksimalnaSnaga" placeholder="Maksimalna snaga"> <br><br>
        <input type="text" name="maksimalniObrtniMoment" id="maksimalniObrtniMoment" placeholder="Maksimalni obrtni moment"> <br><br>
        <input type="text" name="kompresija" id="kompresija" placeholder="Kompresija"> <br><br><br>

        <label for="maksimalnaBrzina">Podaci o performansama: </label><br><br>
        <input type="text" name="maksimalnaBrzina" id="maksimalnaBrzina" placeholder="Maksimalna brzina"><br><br>
        <input type="text" name="ubrzavanje" id="ubrzavanje" placeholder="Ubrzavanje"><br><br><br>

        <label for="dimenzijePrednjih">Podaci o pneumaticima: </label><br><br>
        <input type="text" name="dimenzijePrednjih" id="dimenzijePrednjih" placeholder="Dimenzije prednjih"><br><br>
        <input type="text" name="dimenzijeZadnjih" id="dimenzijeZadnjih" placeholder="Dimenzije zadnjih"><br><br>
        <input type="text" name="materijalPrednjih" id="materijalPrednjih" placeholder="Materijal prednjih"><br><br>
        <input type="text" name="materijalZadnjih" id="materijalZadnjih" placeholder="Materijal zadnjih"><br><br><br>

        <label for="potrosnjaGrad">Podaci o potrosnji: </label><br><br>
        <input type="text" name="potrosnjaGrad" id="potrosnjaGrad" placeholder="Potrosnja u gradu"><br><br>
        <input type="text" name="potrosnjaOtvoreno" id="potrosnjaOtvoreno" placeholder="Potrosnja na otvorenom"><br><br>
        <input type="text" name="kombinovanaPotrosnja" id="kombinovanaPotrosnja" placeholder="Kombinovana potrosnja"><br><br>
        <input type="text" name="emisijaGasova" id="emisijaGasova" placeholder="Emisija gasova"><br><br>
        <input type="text" name="zapreminaRezervoara" id="zapreminaRezervoara" placeholder="Zapremina rezervoara"><br><br><br>


        <label for="uKilogramima">Podaci o tezini: </label><br><br>
        <input type="text" name="uKilogramima" id="uKilogramima" placeholder="Tezina u kilogramima"><br><br>
        <input type="text" name="maksimalnaTezina" id="maksimalnaTezina" placeholder="Maksimalna tezina"><br><br>
        <input type="text" name="nosivost" id="nosivost" placeholder="Nosivost"><br><br>
        <input type="text" name="osovinskoOpterecenje" id="osovinskoOpterecenje" placeholder="Osovinsko opterecenje"><br><br><br>



        <input type="submit" id="dodajModel" value="Dodaj model">
    </form>


<br><br><br><br><br><br>

<button style="width:30%;  opacity: 0.9; background-color: rgb(0, 17, 248); color: white; border: 2px solid black;border-radius: 10px;text-align: center;" >  <a href="index.php" style="text-decoration:none; color: white;"> Završi izmene </a>  </button> 

<br><br><br>
    </div> <!--Kraj kontejnera-->


</body>
</html>
<script src="js/jquery-3.4.1.js"></script>
<script src="js/dodajModel.js"></script>
