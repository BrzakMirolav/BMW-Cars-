<?php
$konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");

// Test da li se povezao sa bazom
if (mysqli_connect_errno()) {
  die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
}

mysqli_query($konekcija,"SET NAMES UTF8");
$serijaModela = $_POST['serijaModela'];
$imeModela = $_POST['imeModela'];
$kratakOpis = $_POST['kratakOpis'];
$cenaModela = $_POST['cenaModela'];
$naslovPrveSekcije = $_POST['naslovPrveSekcije'];
$opisPrveSekcije = $_POST['opisPrveSekcije'];
$naslovKolaza = $_POST['naslovKolaza'];
$opisKolaza = $_POST['opisKolaza'];
$naslovDrugeSekcije = $_POST['naslovDrugeSekcije'];
$opisDrugeSekcije = $_POST['opisDrugeSekcije'];
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

// Upit za podatke o modelu
$modelUpit = "INSERT INTO model VALUES(null, '" . $serijaModela . "','" . $imeModela . "','" . $cenaModela . "','" . $kratakOpis . "','" . $naslovPrveSekcije . "','" . $opisPrveSekcije . "','" . $naslovKolaza . "','" . $opisKolaza . "','" . $naslovDrugeSekcije . "','" . $opisDrugeSekcije . "')"; 

// Upiti za tehnicke podatke
$motorUpit = "INSERT INTO motor VALUES(null,'" . $imeModela . "','" . $cilindri . "','" . $zapremina . "','" . $precnik . "','" . $maksimalnaSnaga . "','" . $maksimalniObrtniMoment . "','" . $kompresija . "')";  
$pneumaticiUpit = "INSERT INTO pneumatici VALUES(null,'" . $imeModela . "','" . $dimenzijePrednjih . "','" . $dimenzijeZadnjih . "','" . $materijalPrednjih . "','" . $materijalZadnjih . "')";
$performanseUpit = "INSERT INTO performanse VALUES(null,'" . $imeModela . "','" . $maksimalnaBrzina . "','" . $ubrzavanje . "')";
$tezinaUpit = "INSERT INTO tezina VALUES(null,'" . $imeModela . "','" . $uKilogramima . "','" . $maksimalnaTezina . "','" . $nosivost . "','" . $osovinskoOpterecenje . "')";
$potrosnjaUpit = "INSERT INTO potrosnjaGoriva VALUES(null,'" . $imeModela . "','" . $potrosnjaGrad . "','" . $potrosnjaOtvoreno . "','" . $kombinovanaPotrosnja . "','" . $emisijaGasova . "','" . $zapreminaRezervoara . "')";

/*
if (!mysqli_query($konekcija, $unosTehnickihPodataka)) {
  echo("Error description: " . mysqli_error($konekcija));
  echo $serijaModela;
}
*/
if(mysqli_query($konekcija, $motorUpit) and mysqli_query($konekcija, $pneumaticiUpit) and mysqli_query($konekcija, $performanseUpit) and mysqli_query($konekcija, $tezinaUpit) and mysqli_query($konekcija, $potrosnjaUpit) and mysqli_query($konekcija, $modelUpit))
  echo "Uspesno";
else
  echo "0";
    

mysqli_close($konekcija); // Zatvaranje konekcije
?>