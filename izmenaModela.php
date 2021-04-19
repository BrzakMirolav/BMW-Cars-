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
     isset($_POST['cenaModela']) and $_POST['cenaModela'] != "" and
     isset($_POST['kratakOpis']) and $_POST['kratakOpis'] != "" and
     isset($_POST['imeModela']))
    {
        $konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");
     
        // Test da li se povezao sa bazom
        if (mysqli_connect_errno())
        {
            die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
        }

        mysqli_query($konekcija, "SET NAMES UTF8");
        $cenaModela = $_POST['cenaModela'];
        $kratakOpis = $_POST['kratakOpis'];
        $imeModela = $_POST['imeModela'];

        $slikaModela =  rand() . $_FILES['slikaModela']['name'];
        move_uploaded_file($_FILES['slikaModela']['tmp_name'], "slikeModela/listanjeModela/". $slikaModela);
        
        $putanja = "slikeModela/modeli/";
        $glavnaSlika = rand() . $_FILES['glavnaSlika']['name'];
        move_uploaded_file($_FILES['glavnaSlika']['tmp_name'], $putanja.$glavnaSlika);

        $upitOsnovnoJedan = "UPDATE model SET cena='" . $cenaModela . "', kratakOpis='" . $kratakOpis . "' WHERE imeModela='" . $imeModela . "'";
        $upitOsnovnoDva = "UPDATE slike SET slikaModela='" . "slikeModela/listanjeModela/" . $slikaModela . "', glavnaSlika='" . $putanja . $glavnaSlika . "' WHERE nazivModela='" . $imeModela . "'";
        if(mysqli_query($konekcija, $upitOsnovnoJedan) and mysqli_query($konekcija, $upitOsnovnoDva))
        {
            echo "<script>alert('Uspesno izmenjena osnovna sekcija modela.')</script>";
        }

        mysqli_close($konekcija);
    }
    
    else if(isset($_POST['naslovPrveSekcije']) and $_POST['naslovPrveSekcije'] != "" and
     isset($_POST['opisPrveSekcije']) and $_POST['opisPrveSekcije'] != "" and
     isset($_FILES['slikaPrveSekcijeJedan']) and 
     isset($_FILES['slikaPrveSekcijeDva']) and 
     isset($_FILES['slikaPrveSekcijeTri']) and 
     isset($_FILES['slikaPrveSekcijeCetiri']) and
     isset($_POST['imeModela']))
    {
        $konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");
        // Test da li se povezao sa bazom
        if (mysqli_connect_errno())
        {
            die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
        }

        $naslovPrveSekcije = $_POST['naslovPrveSekcije'];
        $opisPrveSekcije = $_POST['opisPrveSekcije'];
        $imeModela = $_POST['imeModela'];

        $putanja = "slikeModela/modeli/";

        $slikaPrveSekcijeJedan = rand() . $_FILES['slikaPrveSekcijeJedan']['name'];
        $slikaPrveSekcijeDva = rand() . $_FILES['slikaPrveSekcijeDva']['name'];
        $slikaPrveSekcijeTri = rand() . $_FILES['slikaPrveSekcijeTri']['name'];
        $slikaPrveSekcijeCetiri= rand() . $_FILES['slikaPrveSekcijeCetiri']['name'];

        move_uploaded_file($_FILES['slikaPrveSekcijeJedan']['tmp_name'], $putanja.$slikaPrveSekcijeJedan);
        move_uploaded_file($_FILES['slikaPrveSekcijeDva']['tmp_name'], $putanja.$slikaPrveSekcijeDva);
        move_uploaded_file($_FILES['slikaPrveSekcijeTri']['tmp_name'], $putanja.$slikaPrveSekcijeTri);
        move_uploaded_file($_FILES['slikaPrveSekcijeCetiri']['tmp_name'], $putanja.$slikaPrveSekcijeCetiri);

        $upitOsnovnoJedan = "UPDATE model SET naslovPrveSekcije='" . $naslovPrveSekcije . "', opisPrveSekcije='" . $opisPrveSekcije . "' WHERE imeModela='" . $imeModela . "'";
        $upitOsnovnoDva = "UPDATE slike SET slikaPrveSekcijeJedan='" . $putanja . $slikaPrveSekcijeJedan . "', slikaPrveSekcijeDva='" . $putanja . $slikaPrveSekcijeDva . "',slikaPrveSekcijeTri='" . $putanja . $slikaPrveSekcijeTri . "',slikaPrveSekcijeCetiri='" . $putanja . $slikaPrveSekcijeCetiri . "' WHERE nazivModela='" . $imeModela . "'";
        if(mysqli_query($konekcija, $upitOsnovnoJedan) and mysqli_query($konekcija, $upitOsnovnoDva))
        {
            echo "<script>alert('Uspesno izmenjena prva sekcija modela.')</script>";
        }

        mysqli_close($konekcija);
    }
    
    else if(isset($_POST['naslovKolaza']) and $_POST['naslovKolaza'] != "" and
     isset($_POST['opisKolaza']) and $_POST['opisKolaza'] != "" and
     isset($_FILES['slikaKolazaJedan']) and
     isset($_FILES['slikaKolazaDva']) and
     isset($_FILES['slikaKolazaTri']) and
     isset($_POST['imeModela']))
    {
        // Kolaz
        $konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");
        // Test da li se povezao sa bazom
        if (mysqli_connect_errno())
        {
            die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
        }

        $naslovKolaza = $_POST['naslovKolaza'];
        $opisKolaza = $_POST['opisKolaza'];
        $imeModela = $_POST['imeModela'];

        $putanja = "slikeModela/modeli/";


        $slikaKolazaJedan= rand() . $_FILES['slikaKolazaJedan']['name'];
        $slikaKolazaDva= rand() . $_FILES['slikaKolazaDva']['name'];
        $slikaKolazaTri= rand() . $_FILES['slikaKolazaTri']['name'];


        move_uploaded_file($_FILES['slikaKolazaJedan']['tmp_name'], $putanja.$slikaKolazaJedan);
        move_uploaded_file($_FILES['slikaKolazaDva']['tmp_name'], $putanja.$slikaKolazaDva);
        move_uploaded_file($_FILES['slikaKolazaTri']['tmp_name'], $putanja.$slikaKolazaTri);


        $upitOsnovnoJedan = "UPDATE model SET naslovKolaza='" . $naslovKolaza . "', opisKolaza='" . $opisKolaza . "' WHERE imeModela='" . $imeModela . "'";
        $upitOsnovnoDva = "UPDATE slike SET slikaKolazaJedan='" . $putanja . $slikaKolazaJedan . "', slikaKolazaDva='" . $putanja . $slikaKolazaDva . "',slikaKolazaTri='" . $putanja . $slikaKolazaTri . "' WHERE nazivModela='" . $imeModela . "'";
        if(mysqli_query($konekcija, $upitOsnovnoJedan) and mysqli_query($konekcija, $upitOsnovnoDva))
        {
            echo "<script>alert('Uspesno izmenjena Kolaz sekcija modela.')</script>";
        }


        mysqli_close($konekcija);
    }
    
    
    
    else if(isset($_POST['naslovDrugeSekcije']) and $_POST['naslovDrugeSekcije'] != "" and
    isset($_POST['opisDrugeSekcije']) and $_POST['opisDrugeSekcije'] != "" and
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
        //Druga sekcija
        $konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");
        // Test da li se povezao sa bazom
        if (mysqli_connect_errno())
        {
            die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
        }

        $naslovDrugeSekcije = $_POST['naslovDrugeSekcije'];
        $opisDrugeSekcije = $_POST['opisDrugeSekcije'];
        $imeModela = $_POST['imeModela'];

        $putanja2 = "slikeModela/napraviSvoj/";


        $prvaBoja= rand() . $_FILES['prvaBoja']['name'];
        $drugaBoja= rand() . $_FILES['drugaBoja']['name'];
        $trecaBoja= rand() . $_FILES['trecaBoja']['name'];
        $cetvrtaBoja= rand() . $_FILES['cetvrtaBoja']['name'];
        $prvaPresvlaka= rand() . $_FILES['prvaPresvlaka']['name'];
        $drugaPresvlaka= rand() . $_FILES['drugaPresvlaka']['name'];
        $trecaPresvlaka= rand() . $_FILES['trecaPresvlaka']['name'];
        $prveFelne= rand() . $_FILES['prveFelne']['name'];
        $drugeFelne= rand() . $_FILES['drugeFelne']['name'];


        move_uploaded_file($_FILES['prvaBoja']['tmp_name'], $putanja2.$prvaBoja);
        move_uploaded_file($_FILES['drugaBoja']['tmp_name'], $putanja2.$drugaBoja);
        move_uploaded_file($_FILES['trecaBoja']['tmp_name'], $putanja2.$trecaBoja);
        move_uploaded_file($_FILES['cetvrtaBoja']['tmp_name'], $putanja2.$cetvrtaBoja);
        move_uploaded_file($_FILES['prvaPresvlaka']['tmp_name'], $putanja2.$prvaPresvlaka);
        move_uploaded_file($_FILES['drugaPresvlaka']['tmp_name'], $putanja2.$drugaPresvlaka);
        move_uploaded_file($_FILES['trecaPresvlaka']['tmp_name'], $putanja2.$trecaPresvlaka);
        move_uploaded_file($_FILES['prveFelne']['tmp_name'], $putanja2.$prveFelne);
        move_uploaded_file($_FILES['drugeFelne']['tmp_name'], $putanja2.$drugeFelne);


        
        $upitOsnovnoJedan = "UPDATE model SET naslovDrugeSekcije='" . $naslovDrugeSekcije . "', opisDrugeSekcije='" . $opisDrugeSekcije . "' WHERE imeModela='" . $imeModela . "'";
        $upitOsnovnoDva = "UPDATE napravisvoj SET prvaBoja='" . $putanja2 . $prvaBoja . "', drugaBoja='" . $putanja2 . $drugaBoja . "',trecaBoja='" . $putanja2 . $trecaBoja . "', cetvrtaBoja='" . $putanja2 . $cetvrtaBoja . "', prvaPresvlaka='" . $putanja2 . $prvaPresvlaka . "', drugaPresvlaka='" . $putanja2 . $drugaPresvlaka . "', trecaPresvlaka='" . $putanja2 . $trecaPresvlaka . "', prveFelne='" . $putanja2 . $prveFelne . "', drugeFelne='" . $putanja2 . $drugeFelne . "' WHERE nazivModela='" . $imeModela . "'";
        if(mysqli_query($konekcija, $upitOsnovnoJedan) and mysqli_query($konekcija, $upitOsnovnoDva))
        {
            echo "<script>alert('Uspesno izmenjena Druga sekcija modela.')</script>";
        }


        mysqli_close($konekcija);

    }
    else if(/*(isset($_POST['cilindri']) and $_POST['cilindri'] != "" and
    isset($_POST['zapremina']) and $_POST['zapremina'] != ""  and
    isset($_POST['precnik']) and $_POST['precnik'] != ""  and
    isset($_POST['maksimalnaSnaga']) and $_POST['maksimalnaSnaga'] != ""  and
    isset($_POST['maksimalniObrtniMoment']) and $_POST['maksimalniObrtniMoment'] != ""  and
    isset($_POST['kompresija']) and $_POST['kompresija'] != ""  and
    isset($_POST['maksimalnaBrzina']) and $_POST['maksimalnaBrzina'] != ""  and
    isset($_POST['ubrzavanje']) and $_POST['ubrzavanje'] != ""  and
    isset($_POST['dimenzijePrednjih']) and $_POST['dimenzijePrednjih'] != "" and
    isset($_POST['dimenzijeZadnjih']) and $_POST['dimenzijeZadnjih'] != ""  and
    isset($_POST['materijalPrednjih']) and $_POST['materijalPrednjih'] != ""  and
    isset($_POST['materijalZadnjih']) and $_POST['materijalZadnjih'] != ""  and
    isset($_POST['potrosnjaGrad']) and $_POST['potrosnjaGrad'] != ""  and
    isset($_POST['potrosnjaOtvoreno']) and $_POST['potrosnjaOtvoreno'] != ""  and
    isset($_POST['kombinovanaPotrosnja']) and $_POST['kombinovanaPotrosnja'] != ""  and
    isset($_POST['emisijaGasova']) and $_POST['emisijaGasova'] != ""  and
    isset($_POST['zapreminaRezervoara']) and $_POST['zapreminaRezervoara'] != ""  and
    isset($_POST['uKilogramima']) and $_POST['uKilogramima'] != ""  and
    isset($_POST['maksimalnaTezina']) and $_POST['maksimalnaTezina'] != ""  and
    isset($_POST['nosivost']) and $_POST['nosivost'] != ""  and
    isset($_POST['osovinskoOpterecenje']) and $_POST['osovinskoOpterecenje'] != ""  and
    isset($_FILE['skica'])and
     */
    isset($_POST['imeModela']))
    {
        //Druga sekcija
        $konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");
        // Test da li se povezao sa bazom
        if (mysqli_connect_errno())
        {
            die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
        }

        
        $cilindri = $_POST['cilindri'];
        $zapremina = $_POST['zapremina'];
        $precnik = $_POST['precnik'];
        $maksimalnaSnaga = $_POST['maksimalnaSnaga'];
        $maksimalniObrtniMoment = $_POST['maksimalniObrtniMoment'];
        $kompresija = $_POST['kompresija'];
        $maksimalnaBrzina = $_POST['maksimalnaBrzina'];
        $ubrzavanje = $_POST['ubrzavanje'];
        $dimenzijePrednjih = $_POST['dimenzijePrednjih'];
        $dimenzijeZadnjih = $_POST['dimenzijeZadnjih'];
        $materijalPrednjih = $_POST['materijalPrednjih'];
        $materijalZadnjih= $_POST['materijalZadnjih'];
        $potrosnjaGrad = $_POST['potrosnjaGrad'];
        $potrosnjaOtvoreno = $_POST['potrosnjaOtvoreno'];
        $kombinovanaPotrosnja = $_POST['kombinovanaPotrosnja'];
        $emisijaGasova = $_POST['emisijaGasova'];
        $zapreminaRezervoara = $_POST['zapreminaRezervoara'];   
        $uKilogramima = $_POST['uKilogramima'];
        $maksimalnaTezina = $_POST['maksimalnaTezina'];
        $nosivost = $_POST['nosivost'];
        $osovinskoOpterecenje = $_POST['osovinskoOpterecenje'];

        $imeModela = $_POST['imeModela'];

        $putanja = "slikeModela/modeli/";

        $skica = rand() . $_FILES['skica']['name'];
        move_uploaded_file($_FILES['skica']['tmp_name'], $putanja.$skica);

        $upitSkica = "UPDATE slike SET skica='" . $putanja . $skica ."' WHERE nazivModela='" . $imeModela . "'";
        $upitMotor = "UPDATE motor SET cilindri='" . $cilindri . "', zapremina='" . $zapremina. "',precnik='" . $precnik . "', maksimalnaSnaga='" . $maksimalnaSnaga . "', maksimalniObrtniMoment='" . $maksimalniObrtniMoment . "', kompresija='" . $kompresija . "' WHERE nazivModela='" . $imeModela . "'";
        $upitPerformanse = "UPDATE performanse SET maksimalnaBrzina='" . $maksimalnaBrzina . "', ubrzavanje='" . $ubrzavanje . "' WHERE nazivModela='" . $imeModela . "'";
        $upitPneumatici = "UPDATE pneumatici SET dimenzijePrednjih='" . $dimenzijePrednjih . "', dimenzijeZadnjih='" . $dimenzijeZadnjih. "',materijalPrednjih='" . $materijalPrednjih . "', materijalZadnjih='" . $materijalZadnjih . "' WHERE nazivModela='" . $imeModela . "'";
        $upitPotrosnja = "UPDATE potrosnjagoriva SET potrosnjaGrad='" . $potrosnjaGrad . "', potrosnjaOtvoreno='" . $potrosnjaOtvoreno. "',kombinovanaPotrosnja='" . $kombinovanaPotrosnja . "', emisijaGasova='" . $emisijaGasova . "', zapreminaRezervoara='" . $zapreminaRezervoara . "' WHERE nazivModela='" . $imeModela . "'";
        $upitTezina = "UPDATE tezina SET uKilogramima='" . $uKilogramima . "', maksimalnaTezina='" . $maksimalnaTezina. "',nosivost='" . $nosivost . "', osovinskoOpterecenje='" . $osovinskoOpterecenje . "' WHERE nazivModela='" . $imeModela . "'";

        
        if(mysqli_query($konekcija, $upitSkica) and mysqli_query($konekcija, $upitMotor) and mysqli_query($konekcija, $upitPerformanse) and mysqli_query($konekcija, $upitPneumatici) and mysqli_query($konekcija, $upitPotrosnja) and mysqli_query($konekcija, $upitTezina))
        {
            echo "<script>alert('Uspesno izmenjena TEHNICKI PODACI sekcija modela.')</script>";
        }

        mysqli_close($konekcija);

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BMW - izmena modela</title>
    <link type="text/css" rel="stylesheet" href="css/stilovi.css?v=<?php echo time();?>"/> 

</head>
<body style="color:white; background-image:url(slikeModela/wallpaper.jpg); background-repeat: no-repeat; background-size: 100%; background-attachment: fixed; background-color:black;" > 

    <h1>Izmena modela</h1>
    <br>
    
    <form action="izmenaModela.php" method="POST" enctype="multipart/form-data">
    <?php
       $konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");
        // Test da li se povezao sa bazom
        if (mysqli_connect_errno())
        {
            die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
        }


        $upitZaListanjeModela = "SELECT * FROM model";
        echo "<select name='listaModela' id='listaModela'>
                <option value='0'>--- Izaberite model ---</option>";
        if($rezultat = mysqli_query($konekcija, $upitZaListanjeModela)) {
            // Citanje reda pojedinacno
            
            while ($row = mysqli_fetch_assoc($rezultat)) {
                echo "<option value='" . $row['imeModela'] . "'>" . $row['imeModela'] . "</option>";
               
            }
        } // Kraj if-a


        echo "</select>";

        mysqli_close($konekcija);
        ?>
       <br><br><br>

       <select name='listaSekcija' id='listaSekcija'>
        <option value='0'>--- Izaberite sekciju za menjanje---</option>
        <option value='osnovno'>Osnovno</option>
        <option value='prvaSekcija'>Prva sekcija</option>
        <option value='kolaz'>Kolaz</option>
        <option value='drugaSekcija'>Druga sekcija</option>
        <option value='tehnickiPodaci'>Tehnicki podaci</option>

        </select>
        <br><br><br>
        <label for="imeModela">Ime modela(ne moze da se promeni): </label><br>
        <input type="text" name="imeModela" id="imeModela" readonly><br><br><br>
        <div id="osnovno" style="display: none;">

        <label for="slikaModela">Okacite sliku modela: </label><br>
        <input type="file" name="slikaModela" id="slikaModela" class='fajl'><br><br><br>

        <label for="glavnaSlika">Okacite glavnu sliku/video modela: </label><br>
        <input type="file" name="glavnaSlika" id="glavnaSlika" class='fajl'><br><br><br>

        <label for="cenaModela">Unesite cenu modela: </label><br>
        <input type="text" name="cenaModela" id="cenaModela"><br><br><br>

        <label for="kratakOpis">Unesite kratak opis modela: </label><br>
        <textarea name="kratakOpis" id="kratakOpis" style="width: 500px; height: 100px;"></textarea><br><br><br>
        </div> <!--Kraj osnovnog diva-->

        <div id="prvaSekcija" style="display: none;">
        <label for="naslovPrveSekcije"><h3>Menjanje prve sekcije: </h3></label><br>
    
        <input type="text" name="naslovPrveSekcije" id="naslovPrveSekcije" placeholder="Unesite naslov prve sekcije"><br><br><br>
        <textarea name="opisPrveSekcije" id="opisPrveSekcije" style="width: 500px; height: 100px;" placeholder="Unesite opis prve sekcije"></textarea><br><br><br>
        <label for="slikaPrveSekcijeJedan">Okacite slike za prvu sekciju: </label><br><br>
        <input type="file" name="slikaPrveSekcijeJedan" id="slikaPrveSekcijeJedan" class='fajl'><br><br>
        <input type="file" name="slikaPrveSekcijeDva" id="slikaPrveSekcijeDva" class='fajl'><br><br>
        <input type="file" name="slikaPrveSekcijeTri" id="slikaPrveSekcijeTri" class='fajl'><br><br>
        <input type="file" name="slikaPrveSekcijeCetiri" id="slikaPrveSekcijeCetiri" class='fajl'><br><br>

        </div> <!--Kraj diva prve sekcije-->

        <div id="kolaz" style="display: none;">
        <label for="naslovKolaza"><h3>Izmeni kolaza: </h3></label><br>
    
        <input type="text" name="naslovKolaza" id="naslovKolaza" placeholder="Unesite naslov kolaza"><br><br><br>
        <textarea name="opisKolaza" id="opisKolaza" style="width: 500px; height: 100px;" placeholder="Unesite opis kolaza"></textarea><br><br><br>
        <label for="slikaKolazaJedan">Okacite slike kolaza: </label><br><br>
        <input type="file" name="slikaKolazaJedan" id="slikaKolazaJedan" class='fajl'><br><br>
        <input type="file" name="slikaKolazaDva" id="slikaKolazaDva" class='fajl'><br><br>
        <input type="file" name="slikaKolazaTri" id="slikaKolazaTri" class='fajl'><br><br>
        </div> <!--Kraj diva kolaza-->

        <div id="drugaSekcija" style="display: none;">
        <label for="naslovDrugeSekcije"><h3>Menjanje druge sekcije: </h3></label><br>
    
        <input type="text" name="naslovDrugeSekcije" id="naslovDrugeSekcije" placeholder="Unesite naslov druge sekcije"><br><br><br>
        <textarea name="opisDrugeSekcije" id="opisDrugeSekcije" style="width: 500px; height: 100px;" placeholder="Unesite opis druge sekcije"></textarea><br><br><br>
        <label for="prvaBoja">Okacite boje automobila: </label><br><br>
        <input type="file" name="prvaBoja" id="prvaBoja" class='fajl'><br><br>
        <input type="file" name="drugaBoja" id="drugaBoja" class='fajl'><br><br>
        <input type="file" name="trecaBoja" id="trecaBoja" class='fajl'><br><br>
        <input type="file" name="cetvrtaBoja" id="cetvrtaBoja" class='fajl'><br><br>
        <label for="prvaPresvlaka">Okacite boje enterijera: </label><br><br>
        <input type="file" name="prvaPresvlaka" id="prvaPresvlaka" class='fajl'><br><br>
        <input type="file" name="drugaPresvlaka" id="drugaPresvlaka" class='fajl'><br><br>
        <input type="file" name="trecaPresvlaka" id="trecaPresvlaka" class='fajl'><br><br>
        <label for="prveFelne">Okacite vrste felni: </label><br><br>
        <input type="file" name="prveFelne" id="prveFelne" class='fajl'><br><br>
        <input type="file" name="drugeFelne" id="drugeFelne" class='fajl'><br><br>
        </div> <!--Kraj diva druge sekcije-->


        
        <div id="tehnickiPodaci" style="display: none;">

        <label for="skica"><h3>Izmenite tehnicke podatke: </h3></label><br>
        <label for="">Okacite sliku skice automobila: </label><br><br>
        <input type="file" name="skica" id="skica"><br><br>
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
        </div> <!--Kraj diva tehnickih podataka-->


        <input type="submit" id="dodajModel" value="Izmeni model">
    </form>

<br><br><br>
<button style="width:30%;  opacity: 0.9; background-color: rgb(0, 17, 248); color: white; border: 2px solid black;border-radius: 10px;text-align: center;" >  <a href="index.php" style="text-decoration:none; color: white;"> Završi izmene </a>  </button> 
<br><br>

</body>
</html>
<script src="js/jquery-3.4.1.js"></script>
<script>
    $(document).ready(function() {
        $("#listaModela").change(function() {
            let ime = $("#listaModela :selected").val();
            $("#imeModela").val(ime);
        });

        $("#listaSekcija").change(function() {
            let sekcija = $("#listaSekcija :selected").val();
            if(sekcija === 'osnovno')
            {
                $("#osnovno").css("display", "");
                $("#prvaSekcija").css("display", "none");
                $("#kolaz").css("display", "none");
                $("#drugaSekcija").css("display", "none");
                $("#tehnickiPodaci").css("display", "none");
            }

            if(sekcija === 'prvaSekcija')
            {
                $("#osnovno").css("display", "none");
                $("#prvaSekcija").css("display", "");
                $("#kolaz").css("display", "none");
                $("#drugaSekcija").css("display", "none");
                $("#tehnickiPodaci").css("display", "none");
            }

            if(sekcija === 'kolaz')
            {
                $("#osnovno").css("display", "none");
                $("#prvaSekcija").css("display", "none");
                $("#kolaz").css("display", "");
                $("#drugaSekcija").css("display", "none");
                $("#tehnickiPodaci").css("display", "none");
            }

            if(sekcija === 'drugaSekcija')
            {
                $("#osnovno").css("display", "none");
                $("#prvaSekcija").css("display", "none");
                $("#kolaz").css("display", "none");
                $("#drugaSekcija").css("display", "");
                $("#tehnickiPodaci").css("display", "none");
            }

            if(sekcija === 'tehnickiPodaci')
            {
                $("#osnovno").css("display", "none");
                $("#prvaSekcija").css("display", "none");
                $("#kolaz").css("display", "none");
                $("#drugaSekcija").css("display", "none");
                $("#tehnickiPodaci").css("display", "");
            }
        });
    });
</script>
