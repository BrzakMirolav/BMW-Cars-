<?php

session_start();
if (isset($_GET['odjava'])) {
  unset($_SESSION['korisnik']);
  session_destroy();
}

// Ako neko pokusa da sam udje na stranicu bez da pre toga odabere auto
// automatski ga vraca na modeli.php da izabere neki model
if (!isset($_POST['nazivModela']))
  header("Location: modeli.php");


$nazivModela = $_POST['nazivModela'];

$konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");
if (mysqli_connect_errno()) {
  die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
}

// Ispisivanje tenickih podataka
mysqli_query($konekcija, "SET NAMES UTF8");

$query = mysqli_query($konekcija, "SELECT * FROM podacimodela  WHERE nazivModela='$nazivModela' ");
$model = mysqli_fetch_assoc($query);

$query2 = mysqli_query($konekcija, "SELECT * FROM tezina  WHERE nazivModela='$nazivModela' ");
$tezina = mysqli_fetch_assoc($query2);

$query3 = mysqli_query($konekcija, "SELECT * FROM motor  WHERE nazivModela='$nazivModela' ");
$motor = mysqli_fetch_assoc($query3);

$query4 = mysqli_query($konekcija, "SELECT * FROM performanse  WHERE nazivModela='$nazivModela' ");
$performanse = mysqli_fetch_assoc($query4);

$query5 = mysqli_query($konekcija, "SELECT * FROM potrosnjagoriva  WHERE nazivModela='$nazivModela' ");
$potrosnja = mysqli_fetch_assoc($query5);

$query6 = mysqli_query($konekcija, "SELECT * FROM pneumatici  WHERE nazivModela='$nazivModela' ");
$pneumatici = mysqli_fetch_assoc($query6);


?>


<!doctype html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="BMW se trudi da kreira sjajne proizvode za svoje klijente. Ponosni smo na nasu reputaciju inovativnog dizajna i performansi u svetu automobilske industrije.">
  <meta name="keywords" content="BMW, automobil, M, Car, Motor, dizajn automobila, lifestyle">
  <meta name="author" content="Brzak Miroslav miroslavrt2117@gs.viser.edu.rs , Stanišić Radomir radomirrt2017@gs.viser.edu.rs">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!--<link type="text/css" rel="stylesheet" href="css/stilovi.css">-->
  <link type="text/css" rel="stylesheet" href="css/stilovi.css?v=<?php echo time(); ?>" />
  <link type="text/css" rel="stylesheet" href="css/model.css?v=<?php echo time(); ?>" />
  <link type="text/css" rel="stylesheet" href="css/napraviSvoj.css?v=<?php echo time(); ?>" />
  

  <title><?php echo $_POST['nazivModela']?></title>


  <div class="container-fluid" style="width: 100%;">
    <!--Pocetak NAV kontejnera-->


    <div class="toggle">
      <!--Pocetak toggle-->

      <i id="hm" class="fas fa-bars hmenu" onclick="hamburger()"></i>

    </div>
    <!--kraj toggle-->

    <ul id="uhm" class="nav nav-pills justify-content-center">
      <!--Navigacija-->




      <li class="nav-item">
        <a class="nav-link" href="index.php">Početna</a>
      </li>
      <!-- <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
       <div class="dropdown-menu">
         <a class="dropdown-item" href="m8.html">M8</a>
         <a class="dropdown-item" href="#">Another action</a>
         <a class="dropdown-item" href="#">Something else here</a>
         <div class="dropdown-divider"></div>
         <a class="dropdown-item" href="#">Separated link</a>
       </div>
     </li>-->
     <li class="nav-item">
       <a class="nav-link" href="onama.php">O nama</a>
     </li>
     <!----------------------
    <li class="nav-item">
        <a class="nav-link" href="#">Dizajn</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="#">Inovacije</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Performanse</a>
          </li> -->
      <li class="nav-item">
          <a class="nav-link active" href="modeli.php">Modeli</a>
        </li>
        

                <!-- M Logo -->
                 <img class="logo" src="slike/logo/logo.png" alt="logo">
                 
                 

                 <li class="nav-item ml-auto">
                 <?php 
                 
                 if(isset($_SESSION['korisnik']))
                 {
                    if($_SESSION['status']=="Administrator")
                    echo "<a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>"
                    ."Admin Panel"."</a>"."<div class='dropdown-menu'>"."<a class='dropdown-item' href='izmena.php'>"."Izmena naloga"."</a>".
                    "<div class='dropdown-divider'></div>"."<a class='dropdown-item' href='dodaj.php'>"."Dodavanje modela"."</a>".
                    "<div class='dropdown-divider'></div>"."<a class='dropdown-item' href='otkazivanjeRezervacijaAdmin.php'>"."Otkazivanje rezervacija"."</a>".
                    "<div class='dropdown-divider'></div>"."<a class='dropdown-item' href='brisanjeModela.php'>"."Brisanje modela"."</a>". 
                    "<div class='dropdown-divider'></div>"."<a class='dropdown-item' href='izmenaModela.php'>"."Izmena modela"."</a>";

                  }
                
                 ?>
                   </li>   


      <li class="nav-item auto">
                 <?php 
                 //
                 // OVO JE ZA REZERVISANA VOZILA
                 
                 if(isset($_SESSION['korisnik']))
                 {
                    if($_SESSION['status']=="Administrator" or $_SESSION['status']=="Korisnik")
                    {
                    echo "<a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>"
                    ."<i class='fas fa-car'></i>"."</a>"."<div class='dropdown-menu'>"."<a class='dropdown-item' href='#'>"."Rezervisana vozila"."</a>".
                    "<div class='dropdown-divider'></div>";
                    $konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");
                    // Test da li se povezao sa bazom
                    if (mysqli_connect_errno())
                     {
                       die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
                    }

                    $upitZaRezervacije = "SELECT * FROM rezervacije WHERE korisnickoIme='" . $_SESSION['korisnik'] . "'";
                    if($rezultat = mysqli_query($konekcija, $upitZaRezervacije)) {
                    if(mysqli_num_rows($rezultat) === 0)
                      echo "<a class='dropdown-item' href='#'>Nema rezervacija.</a>";
                    else
                    {
                    
                    // Citanje reda pojedinacno
                     while ($row = mysqli_fetch_assoc($rezultat)) {
                      echo "<a class='dropdown-item' href='pregledRezervacije.php?nazivModela=" .$row['nazivModela']. "'>". $row['nazivModela'] ."</a>";
                  }
                  } // Kraj else ako ima rezervacije u bazi
                    } // Kraj drugog ifa
                  } // Kraj prvog ifa
                }

                mysqli_close($konekcija);
                 ?>
            </li>     

      <li class="nav-item auto">
        <?php

        if (isset($_SESSION['korisnik'])) {
          if ($_SESSION['status'] == "Administrator" or $_SESSION['status'] == "Korisnik")
            echo "<a class='nav-link' href='promeniLozinku.php'>"."<i class='fas fa-cog'></i> ". $_SESSION['korisnik'] . " (" . $_SESSION['status'] . ")" . "</a>";
        } else echo "<a class='nav-link' href='prijava.php'>Prijavi se</a>";

        ?>
      </li>

      <li class="nav-item ">
        <?php

        if (isset($_SESSION['korisnik'])) {
          if ($_SESSION['status'] == "Administrator" or $_SESSION['status'] == "Korisnik")
            echo "<a class='nav-link' href='odjava.php'>" . "Odjavi se" . "</a>";
        } else echo "<a class='nav-link' href='registracija.php'>Registruj se</a>";

        ?>
      </li>




    </ul>
    <!--Kraj navigacije-->


  </div>
  <!--Kraj NAV kontejnera-->

</head>

<body>
  <div class="container-fluid" style="width: 100%;">
    <!--Pocetak Body kontejnera-->


    <div style="text-align: center; width: 100%;" class="container-fluid modeli">
      <!--Pocetak kontejnera model-->

      <!--  echo $model["ulazniVideo"]; ?>-->
      <?php
     $konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");
      if (mysqli_connect_errno()) {
        die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
      }
      // Uzimamo glavni video ili sliku iz baze
      $upitGlavnaSlika = "SELECT glavnaSlika FROM slike WHERE nazivModela='" . $_POST['nazivModela'] . "'";
      $rez = mysqli_fetch_assoc(mysqli_query($konekcija, $upitGlavnaSlika));
      $ekstenzija = substr($rez['glavnaSlika'], -3);
      // Ako je admin uploadovao sliku
      if ($ekstenzija == 'jpg' or $ekstenzija == 'png' or $ekstenzija == 'jpeg')
        echo " <img src='" . $rez['glavnaSlika'] . "' alt='" . $_POST['nazivModela'] . "' style=' width:100%; ' > ";
      // Ako je admin uploadovao video
      else
        echo "<video id='videoModeli' src='" . $rez['glavnaSlika'] . "' autoplay " . "onmouseover='videoPlay()'" . "onmouseout='videoPause()'" . "></video>";
      mysqli_close($konekcija);
      ?>


      <div  id="opis" style="margin: 10vh;">
        <?php
       $konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");
        if (mysqli_connect_errno()) {
          die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
        }
        mysqli_query($konekcija, "SET NAMES UTF8");

        // Ovo je kratak opis koji ide ispod ulaznog videa/slike
        $upitOpis = "SELECT kratakOpis FROM model WHERE imeModela='" . $_POST['nazivModela'] . "'";
        $rez = mysqli_fetch_assoc(mysqli_query($konekcija, $upitOpis));
        echo $rez['kratakOpis'];
        mysqli_close($konekcija);
        ?>

      </div>

      <div id="model">
        <h2 id="nazivModela">
          <?php
          echo $_POST['nazivModela'];
          ?> </h2>

        <p class="par">Cena:
          <?php
          $konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");
          if (mysqli_connect_errno()) {
            die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
          }

          // Ispis cene
          $upitCena = "SELECT cena FROM model WHERE imeModela='" . $_POST['nazivModela'] . "'";
          $rez = mysqli_fetch_assoc(mysqli_query($konekcija, $upitCena));
          echo $rez['cena'];


          mysqli_close($konekcija);

          ?></p>
      </div>

      <?php
      $konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");
      if (mysqli_connect_errno()) {
        die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
      }

      // Ispis pojedinosti
      $upitSlikePrveSekcije = "SELECT slikaPrveSekcijeJedan, slikaPrveSekcijeDva, slikaPrveSekcijeTri, slikaPrveSekcijeCetiri FROM
          slike WHERE nazivModela='" . $_POST['nazivModela'] . "'";
      $rez = mysqli_fetch_assoc(mysqli_query($konekcija, $upitSlikePrveSekcije));
      // Upis za prvu sekciju
      mysqli_query($konekcija, "SET NAMES UTF8");

      $upitPrvaSekcija = "SELECT naslovPrveSekcije, opisPrveSekcije FROM model WHERE imeModela='" . $_POST['nazivModela'] . "'";
      $rez2 = mysqli_fetch_assoc(mysqli_query($konekcija, $upitPrvaSekcija));
      echo '
            <div id="pojedinosti">
        <h3>' . $rez2['naslovPrveSekcije'] . '</h3>
        <p>' . $rez2['opisPrveSekcije'] . '</p>
        <img class="mala" src="' . $rez['slikaPrveSekcijeJedan'] . '" alt="Dizajn bmw model 118i" id="prvaPojedinost">
        <img src="' . $rez['slikaPrveSekcijeJedan'] . '" alt="Dizajn bmw model 118i" id="prvaVelika">
        <img class="mala" src="' . $rez['slikaPrveSekcijeDva'] . '" alt="Enterijer bmw model 118i" id="drugaPojedinost">
        <img  src="' . $rez['slikaPrveSekcijeDva'] . '" alt="Enterijer bmw model 118i" id="drugaVelika">
        <img class="mala" src="' . $rez['slikaPrveSekcijeTri'] . '" alt="Dinamika voznje bmw model 118i" id="trecaPojedinost">
        <img  src="' . $rez['slikaPrveSekcijeTri'] . '" alt="Dinamika bmw model 118i" id="trecaVelika">
        <img class="mala" src="' . $rez['slikaPrveSekcijeCetiri'] . '" alt="Inovativno parkiranje bmw model 118i" id="cetvrtaPojedinost">
        <img  src="' . $rez['slikaPrveSekcijeCetiri'] . '" alt="Parkiranje bmw model 118i" id="cetvrtaVelika">
        </div>
          ';
      mysqli_close($konekcija);
      ?>
  </div> <!--Kraj kontejnera-->

      <div class="container-fluid width:100%;">
        <!--Pocetak kontejnera-->
        <br><br>
        <div class="row" style="text-align: center;">
          <!--Kolaz Pocetak-->
          <?php
          $konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");
          if (mysqli_connect_errno()) {
            die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
          }
          mysqli_query($konekcija, "SET NAMES UTF8");

          $upitSlikeKolaza = "SELECT slikaKolazaJedan, slikaKolazaDva, slikaKolazaTri FROM slike WHERE nazivModela='" . $_POST['nazivModela'] . "'";
          $upitKolaz = "SELECT naslovKolaza, opisKolaza FROM model WHERE imeModela='" . $_POST['nazivModela'] . "'";

          $rez = mysqli_fetch_assoc(mysqli_query($konekcija, $upitSlikeKolaza));
          $rez2 = mysqli_fetch_assoc(mysqli_query($konekcija, $upitKolaz));

          echo "
          <div class='row' style='text-align: center; width:100%;'> <!-- Pocetak kolaza -->
          <div class='col-md-6' style='width:100%'> <!--div za tekst kolaz-->
          <div id='kolazTekst' style='text-align: left; margin-left: 20vw;'>
          <br><br><br>
          <h3>" . $rez2['naslovKolaza'] . "</h3>
          " . $rez2['opisKolaza'] . "
          </div> <!-- Kraj teksta za kolaz -->
          <br><br>
          <img src='" . $rez['slikaKolazaDva'] . "' style='height: auto; width: auto;' align='right' margin-top:35px>
          </div>
          <div class='col-md-6'>
          <img src='" . $rez['slikaKolazaJedan'] . "' style='height: 65%; width: 65%;' align='left' margin-top:35px;>
          <br><br><br>
          <img src='" . $rez['slikaKolazaTri'] . "' style='height: auto; width: auto; margin-top: 25px;' align='left'>
          </div>
          </div> <!-- Kraj kolaza -->
          <br>
          ";


          mysqli_close($konekcija);
          ?>
        </div>

        
        <!--Kolaz Kraj--> <br>

        <br><br><br>
        <br><br><br>
        <hr>

        <?php
        //
        // *** DRUGA SEKCIJA ****
        
     $konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");
      if (mysqli_connect_errno()) {
        die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
       }
       mysqli_query($konekcija, "SET NAMES UTF8");

      // Ispis pojedinosti
      // Upis za drugu sekciju
      $upitPrvaSekcija = "SELECT naslovDrugeSekcije, opisDrugeSekcije FROM model WHERE imeModela='" . $_POST['nazivModela'] . "'";
      $rez2 = mysqli_fetch_assoc(mysqli_query($konekcija, $upitPrvaSekcija));
      echo '
            <div id="drugaSekcija" class="container-fluid" style="width:100%;">
        <h3>' . $rez2['naslovDrugeSekcije'] . '</h3>
        <p>' . $rez2['opisDrugeSekcije'] . '</p>
          </div>
          ';
      mysqli_close($konekcija);
      ?>


<br><br>
        
        <div id="napraviSvojModel" style="text-align: center;">
          <img src="<?php 
          
          
          $konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");
          if (mysqli_connect_errno()) {
            die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
           }
    
          // Ispis pojedinosti
          $upitSlikaPrvaBoja = "SELECT prvaBoja FROM napravisvoj WHERE nazivModela='" . $_POST['nazivModela'] . "'";
          $rez = mysqli_fetch_assoc(mysqli_query($konekcija, $upitSlikaPrvaBoja));
          // Upis za prvu sekciju
        

          echo $rez['prvaBoja'] ;
          mysqli_close($konekcija);

           ?>" alt="Plava Boja" id="slikaJedinstvenogModela" style="width: 100%; ">
          <br><br>
          <select name="biranjeOpcije" id="biranjeOpcije">
            <option value="#">--Pogledajte neke od mogućih opcija--</option>
            <option value="boja">Boja</option>
            <option value="presvlake">Presvlake</option>
            <option value="felne">Felne</option>
          </select>
          <br><br>
          <ul id="listaBoja">
            <?php
            $konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");
            if (mysqli_connect_errno()) {
              die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
             }

             $upitSlikePrveSekcije = "SELECT * FROM napravisvoj WHERE nazivModela='" . $_POST['nazivModela'] . "'";
            $rez = mysqli_fetch_assoc(mysqli_query($konekcija, $upitSlikePrveSekcije));

             echo "<li id='prvaBoja' class='activeOpcija'><img src='" . $rez['prvaBoja']. "' style='object-fit: cover; width: 70px; height: 70px;'></li>";
             echo "<li id='drugaBoja'><img src='" . $rez['drugaBoja']. "' style='width: 70px; height: 70px;'></li>";
             echo "<li id='trecaBoja'><img src='" . $rez['trecaBoja']. "' style='width: 70px; height: 70px;'></li>";
             echo "<li id='cetvrtaBoja'><img src='" . $rez['cetvrtaBoja']. "' style='width: 70px; height: 70px;'></li>";

             mysqli_close($konekcija);
            ?>
          </ul>
          <ul id="listaPresvlake" style="display: none;">
          <?php
            $konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");
            if (mysqli_connect_errno()) {
              die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
             }

             $upitSlikePrveSekcije = "SELECT * FROM napravisvoj WHERE nazivModela='" . $_POST['nazivModela'] . "'";
            $rez = mysqli_fetch_assoc(mysqli_query($konekcija, $upitSlikePrveSekcije));

             echo "<li id='prvaPresvlaka' class='activeOpcija'><img src='" . $rez['prvaPresvlaka']. "' style='object-fit: cover; width: 90px; height: 90px;'></li>";
             echo "<li id='drugaPresvlaka'><img src='" . $rez['drugaPresvlaka']. "' style='width: 90px; height: 90px;'></li>";
             echo "<li id='trecaPresvlaka'><img src='" . $rez['trecaPresvlaka']. "' style='width: 90px; height: 90px;'></li>";
             mysqli_close($konekcija);
            ?>
          </ul>
          <ul id="listaFelne" style="display: none;">
          <?php
            $konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");
            if (mysqli_connect_errno()) {
              die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
             }

             $upitSlikePrveSekcije = "SELECT * FROM napravisvoj WHERE nazivModela='" . $_POST['nazivModela'] . "'";
            $rez = mysqli_fetch_assoc(mysqli_query($konekcija, $upitSlikePrveSekcije));

             echo "<li id='prveFelne' class='activeOpcija'><img src='" . $rez['prveFelne']. "' style=' width: 90px; height: 90px;'></li>";
             echo "<li id='drugeFelne'><img src='" . $rez['drugeFelne']. "' style='width: 90px; height: 90px;'></li>";

             mysqli_close($konekcija);
            ?>
          </ul>
        </div>
       
      </div>
      <!--Kraj kontejnera-->

      <hr>
      <!--Kraj kolaza slika-->
      <div id="tpodaci" style="text-align:left; margin-left: 10vw; margin-right: 10vh;">
        <!--Pocetak diva o tehnickim podacima-->
        <h2>Tehnički podaci</h2>
       
        <!--Ovo je skica (sematicki plan modela)-->
        <div class="row">
          <div class="col-md-12">
            <?php 
            $konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");
              if (mysqli_connect_errno()) {
                die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
              }

              $upitSkica = "SELECT skica FROM slike WHERE nazivModela='". $_POST['nazivModela'] . "'";
              $rez = mysqli_fetch_assoc(mysqli_query($konekcija, $upitSkica));
              echo "<img src='" . $rez['skica'] . "' alt='Skica modela" . $_POST['nazivModela'] . "' id='skica'>";

              mysqli_close($konekcija);
            ?>

          </div>
        </div>

        <div class="row">
          <!--Pocetak 1 row diva-->
          <div class="col-md-6">
            <!--Pocetak 1 md diva-->

            <h3>Težina</h3>
            <hr>

            <div id="uKilogramima">Težina vozila u kg (EU) <span class="float-right"><?php echo $tezina["uKilogramima"]; ?></span></div>
            <hr>
            <div id="maksimalnaTezina">Maksimalna dozvoljena težina<span class="float-right"><?php echo $tezina["maksimalnaTezina"]; ?></span></div>
            <hr>
            <div id="nosivost">Nosivost u kg <span class="float-right"><?php echo $tezina["nosivost"]; ?></span></div>
            <hr>
            <div id="osovinskoOpterecenje">Osovinsko opterećenje u kg<span class="float-right"><?php echo $tezina["osovinskoOpterecenje"]; ?></span></div>
            <hr>


          </div>
          <!--Kraj 1 md diva-->




          <div class="col-md-6">
            <!--Pocetak 2 md diva-->

            <h3>Motor</h3>
            <hr>

            <div id="cilindri">Cilindri/ventili <span class="float-right"><?php echo $motor["cilindri"]; ?></span></div>
            <hr>
            <div id="zapremina">Zapremina u kubnim cm <span class="float-right"><?php echo $motor["zapremina"]; ?></span></div>
            <hr>
            <div id="precnik">Prečnik i hod klipa u mm <span class="float-right"><?php echo $motor["precnik"]; ?></span></div>
            <hr>
            <div id="maksimalnaSnaga">Maks. snaga u kW (ks) pri 1/min<span class="float-right"><?php echo $motor["maksimalnaSnaga"]; ?></span></div>
            <hr>
            <div id="maksimalniObrtniMoment">Maks. obrtni momenat Nm/min<span class="float-right"><?php echo $motor["maksimalniObrtniMoment"]; ?></span></div>
            <hr>
            <div id="kompresija">Kompresija: 1<span class="float-right"><?php echo $motor["kompresija"]; ?></span></div>
            <hr>

          </div>
          <!--Kraj 2 md diva-->


        </div>
        <!--Kraj 1 row diva--> <br><br>



        <div class="row ">
          <!--Pocetak 2 row diva-->
          <div class="col-md-6">
            <!--Pocetak 1 md diva-->

            <h3>Performanse</h3>
            <hr>

            <div id="maksimalnaBrzina">Maksimalna brzina u km/h<span class="float-right"><?php echo $performanse["maksimalnaBrzina"]; ?></span></div>
            <hr>
            <div id="ubrzavanje">Ubrzanje 0-100 km/h u sek <span class="float-right"><?php echo $performanse["ubrzavanje"]; ?></span></div>
            <hr>

          </div>
          <!--Kraj 1 md diva-->

          <div class="col-md-6">
            <!--Pocetak 2 md diva-->

            <h3>Potrošnja goriva</h3>
            <hr>

            <div id="potrosnjaGrad">Pros. potrošnja u gradu u l/100km <span class="float-right"><?php echo $potrosnja["potrosnjaGrad"]; ?></span></div>
            <hr>
            <div id="potrosnjaOtvoreno">Pros. potrošnja van grada l/100km <span class="float-right"><?php echo $potrosnja["potrosnjaOtvoreno"]; ?></span></div>
            <hr>
            <div id="kombinovanaPotrosnja">Komb. potrošnja goriva l/100km <span class="float-right"><?php echo $potrosnja["kombinovanaPotrosnja"]; ?></span></div>
            <hr>
            <div id="emisijaGasova">Emisija CO2 gasova u g/km <span class="float-right"><?php echo $potrosnja["emisijaGasova"]; ?></span></div>
            <hr>
            <div id="zapreminaRezervoara">Zapremina rezervoara za gorivo<span class="float-right"><?php echo $potrosnja["zapreminaRezervoara"]; ?></span></div>
            <hr>


          </div>
          <!--Kraj 2 md diva-->


        </div>
        <!--Kraj 2 row diva--> <br> <br>

        <div class="row ">
          <!--Pocetak 3 row diva-->
          <div class="col-md-6">
            <!--Pocetak 1 md diva-->

            <h3>Felne, pneumatici</h3>
            <hr>

            <div id="dimenzijePrednjih">Dimen. prednjih pneum. <span class="float-right"><?php echo $pneumatici["dimenzijePrednjih"]; ?></span></div>
            <hr>
            <div id="dimenzijeZandjih">Dimen. zadnjih pneum. <span class="float-right"><?php echo $pneumatici["dimenzijeZadnjih"]; ?></span></div>
            <hr>
            <div id="materijalPrednjih">Materijal prednjih felni <span class="float-right"><?php echo $pneumatici["materijalPrednjih"]; ?></span></div>
            <hr>
            <div id="materijalZadnjih">Materijal zadnjih felni <span class="float-right"> <?php echo $pneumatici["materijalZadnjih"]; ?></span></div>
            <hr>

          </div>
          <!--Kraj 1 md diva-->

        </div>
        <!--Kraj 3 row diva-->




      </div>
      <!--Kraj diva o tehnickim podacima-->

      <br><br>

      <form action="rezervacija.php" method="POST" id="rezervacija">
        <input type='hidden' name='imeModela' value=<?php echo "'" . $_POST['nazivModela'] . "'" ?> />
        <input type='hidden' name='cenaModela' value=<?php
       $konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");
          if (mysqli_connect_errno()) {
            die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
          }
          $upitCena = "SELECT cena FROM model WHERE imeModela='" . $_POST['nazivModela'] . "'";
          $rez = mysqli_fetch_assoc(mysqli_query($konekcija, $upitCena));
          echo $rez['cena'];

          mysqli_close($konekcija);
          ?> />
        <input type='hidden' name='slikaModela' id='slikaZaRezervaciju' value='
        <?php
           $konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");
            if (mysqli_connect_errno()) {
              die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
             }

             $upitSlikePrveSekcije = "SELECT * FROM napravisvoj WHERE nazivModela='" . $_POST['nazivModela'] . "'";
            $rez = mysqli_fetch_assoc(mysqli_query($konekcija, $upitSlikePrveSekcije));
            echo $rez['prvaBoja'];
             mysqli_close($konekcija);
             ?>
        '>
        <button class="btn btn-primary" style="margin-left: 50vw;" > <i class="far fa-bookmark"></i> Rezerviši</button>
      </form>

    </div>
    <!--Kraj kontejnera model-->

    <br><br>


    <div class="container-fluid" style="width: 100%;">
      <!-- Pocetak footera -->

      <footer>

        <div class="row">
          <!-- Futer Grid -->
          <div class="col-sm-3">
            <!--Prva kolona-->
            <h5> Brzi linkovi </h5>
            <div class="h_line"></div><br>
            <ul>
              <li><a href="index.php">Početna</a></li>
              <li><a href="modeli.php">Modeli</a></li>
              <li><a href="prijava.php">Prijava</a></li>
            </ul>

          </div>
          <!--Kraj prve kolona-->



          <div class="col-sm-3">
            <!--Druga kolona-->
            <h5> Drugi BMW sajtovi </h5>
            <div class="h_line"></div><br>
            <ul>
              <li><a href="https://www.bmw-m.com/en/index.html">BMW M</a></li>
              <li><a href="https://www.bmw-motorsport.com/en/index.html">BMW Motorsport</a></li>
              <li><a href="https://bmw-mountains.com/">BMW Mountines</a></li>
              <li><a href="https://www.bmw-yachtsport.com/en/index.html">BMW Yachtsport</a></li>
              <li><a href="https://www.bmw-drivingexperience.com/en.html">BMW Driving Expirience</a></li>

            </ul>

          </div>
          <!--Kraj druge kolona-->



          <div class="col-sm-3">
            <!--Treca kolona-->
            <h5> Sajt </h5>
            <div class="h_line"></div><br>
            <ul>
              <li><a href="kontakt.php">Kontakt</a></li>
              <li><a href="onama.php">O nama</a></li>
              <li><a href="stampanje.html">Štampanje</a></li>
              <li><a href="#">Kolačići</a></li>
              <li><a href="#">Mapa</a></li>
            </ul>

          </div>
          <!--Kraj trece kolona-->


          <div class="col-sm-3">
            <!--Cetvrta kolona-->
            <h5> Pogledajte nas na </h5>
            <div class="h_line"></div><br>
            <ul>
              <li><a href="https://www.instagram.com/bmw/"><i class="fab fa-instagram"></i> Instagram</a></li>
              <li><a href="https://www.facebook.com/BMW/"><i class="fab fa-facebook-f"></i> Facebook</a></li>
              <li><a href="https://twitter.com/bmw"><i class="fab fa-twitter"></i> Twitter</a></li>
              <li><a href="https://plus.google.com/+BMW/posts"><i class="fab fa-google"></i> Google+</a></li>
              <li><a href="https://www.youtube.com/user/BMW"><i class="fab fa-youtube"></i> Youtube</a></li>
            </ul>

          </div>
          <!--Kraj Cetvrte kolona-->



        </div> <!-- Kraj Futer Grid -->

        <ul>
          <li>&copy; BMW 2019 &nbsp;</li>
          <li class="ml">Brzak Miroslav, Stanišić Radomir</li>
        </ul>


      </footer>


    </div> <!-- Kraj footera -->
  </div>
  <!--Kraj Body kontejnera-->

  <script src="js/jquery-3.4.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>

  <!-- Optional JavaScript -->
  <script src="js/hamburger.js"></script>
  <script src="js/video.js"></script>
  <script src="js/otvaranjeSlikaModela.js"></script>
  <script src="js/napraviSvoj.js"></script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

</body>

</html>