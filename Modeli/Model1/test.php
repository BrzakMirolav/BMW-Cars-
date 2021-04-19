<?php

session_start();
if (isset($_GET['odjava'])) {
  unset($_SESSION['korisnik']);
  session_destroy();
}

$konekcija = mysqli_connect("localhost", "root", "", "BMW");
if (mysqli_connect_errno()) {
  die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
}

mysqli_query($konekcija, "SET NAMES UTF8");
$query = mysqli_query($konekcija, "SELECT * FROM podacimodela  WHERE nazivModela='bmw 118i' ");
$model = mysqli_fetch_assoc($query);

$query2 = mysqli_query($konekcija, "SELECT * FROM tezina  WHERE nazivModela='bmw 118i' ");
$tezina = mysqli_fetch_assoc($query2);

$query3 = mysqli_query($konekcija, "SELECT * FROM motor  WHERE nazivModela='bmw 118i' ");
$motor = mysqli_fetch_assoc($query3);

$query4 = mysqli_query($konekcija, "SELECT * FROM performanse  WHERE nazivModela='bmw 118i' ");
$performanse = mysqli_fetch_assoc($query4);

$query5 = mysqli_query($konekcija, "SELECT * FROM potrosnjagoriva  WHERE nazivModela='bmw 118i' ");
$potrosnja = mysqli_fetch_assoc($query5);

$query6 = mysqli_query($konekcija, "SELECT * FROM pneumatici  WHERE nazivModela='bmw 118i' ");
$pneumatici = mysqli_fetch_assoc($query6);


?>


<!doctype html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="BMW se trudi da kreira sjajne proizvode za svoje klijente. Ponosni smo na nasu reputaciju inovativnog dizajna i performansi u svetu automobilske industrije.">
  <meta name="keywords" content="BMW, automobil, M, Car, Motor, dizajn automobila, lifestyle">
  <meta name="author" content="Brzak Miroslav miroslavrt2117@gs.viser.edu.rs , Stanišić Radomir radomirrt2017@gs.viser.edu.rs">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!--<link type="text/css" rel="stylesheet" href="css/stilovi.css">-->
  <link type="text/css" rel="stylesheet" href="../../css/stilovi.css?v=<?php echo time(); ?>" />
  <link type="text/css" rel="stylesheet" href="../../css/model.css?v=<?php echo time(); ?>" />
  <link type="text/css" rel="stylesheet" href="../../css/napraviSvoj.css?v=<?php echo time(); ?>" />

  <title>BMW - Modeli</title>


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
        <a class="nav-link " href="../../index.php">Početna</a>
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
        <a class="nav-link" href="#">Saveti</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Dizajn</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Inovacije</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Performanse</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="modeli.php">Modeli</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="m8.html">M8</a>
      </li>

      <!-- M Logo -->
      <img class="logo" src="../../slike/logo/logo.png" alt="">


      <li class="nav-item ml-auto">
        <?php

        if (isset($_SESSION['korisnik'])) {
          if ($_SESSION['status'] == "Administrator" or $_SESSION['status'] == "Korisnik")
            echo "<a class='nav-link' href='#'>" . $_SESSION['korisnik'] . " (" . $_SESSION['status'] . ")" . "</a>";
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
      <video id="videoModeli" src="<?php echo $model["ulazniVideo"]; ?>" autoplay onmouseover="videoPlay()" onmouseout="videoPause()">
      </video>


      <div id="opis" style="margin: 10vh;">
        <?php echo $model["opis"] . "<br><br>"; ?>

      </div>

      <div id="model">
        <h2>
          <?php
          echo $model["nazivModela"];

          ?> </h2>

        <p class="par">Cena: <?php

                              echo $model["cena"];
                              ?></p>


      </div>

      <div id="pojedinosti">
        <h3>OVE POJEDINOSTI PREVAZILAZE SVA OČKEIVANJA.</h3>
        <p>Istražite dizajn, dinamiku vožnje i tehničke pojedinosti modela BMW serije 1.</p>
        <img src="slike/dizajn.png" alt="Dizajn bmw model 118i" id="prvaPojedinost">
        <img src="slike/dizajnVelika.png" alt="Dizajn bmw model 118i" id="prvaVelika">
        <img src="slike/enterijer.png" alt="Enterijer bmw model 118i" id="drugaPojedinost">
        <img src="slike/enterijerVelika.png" alt="Enterijer bmw model 118i" id="drugaVelika">
        <img src="slike/dinamika.png" alt="Dinamika voznje bmw model 118i" id="trecaPojedinost">
        <img src="slike/dinamikaVelika.png" alt="Dinamika bmw model 118i" id="trecaVelika">
        <img src="slike/parkiranje.png" alt="Inovativno parkiranje bmw model 118i" id="cetvrtaPojedinost">
        <img src="slike/parkiranjeVelika.png" alt="Parkiranje bmw model 118i" id="cetvrtaVelika">
      </div>

      <div class="container-fluid width:100%;"> <!--Pocetak kontejnera-->
      <div id="opis2">
        <h2>Potpuno novi BMW serije 1 je mlad, gotivan i urban. Kompaktne proporcije, tečna linija krova i upečatljive,
          dinamične linije obećavaju agilinost i zadovoljstvo vožnje na prvi pogled. Enterijer je moderan i precizno strukturiran.
          On nudi putnicima više prostora nego ikada pre.</h2>
        <p>Domagoj Dukec, Šef odseka za dizajn, BMW.</p>
      </div>
        <br><br>
    
        
        <div class="row" style="text-align: center;"  > <!--Kolaz Pocetak-->

        <div class="col-md-6" > <!--div za tekst kolaz-->
        <div class="sportskidizajn" style="text-align: left; " >
        <h3>Sportski dizajn eksterijera i enterijera modela BMW serije 1.</h3>
                Autoritet koji se smjesta prepoznaje: dizajn potpuno novog modela BMW serije 1 ostavlja moćan utisak kako unutra tako i spolja. 
                Počevši od dinamičnog prednjeg dijela sa velikom dvostrukom rešetkom i širokim prednjim panelom. 
                Jasno definisane konture pružaju se paralelno sa tečnom linijom krova sve do upadljivog zadnjeg dijela. 
                Vrhunski karakter modela BMW serije 1 nastavlja se i u enterijeru. Ovdje putnici mogu da uživaju u velikodušnim proporcijama i otvorenoj atmosferi dobrobiti. 
                Kabina impresionira ergonomski optimalizovanim elementima opreme i sistematski primenjenom orijentacijom prema vozaču.</td>
        </div> <!--kraj div za tekst kolaz-->
            <br><br>
            <div style="text-align: right"> <!-- div za leve slike kolaz-->
            <img src="slike/tabela2.jpg" alt="BMW 118i" id="drugaSlikaUTabeli" style="width: 550px; height: 470px;">
            <br><br>
            <img src="slike/tabela4.jpg" alt="BMW 118i" id="" style="width:  470px; height:  470px;">
            </div> <!--kraj div za leve slike kolaz-->
            <br> <br>
            
        </div>


        <div class="col-md-6" style="text-align: left">
      
        <img src="slike/tabela1.jpg" alt="BMW 118i" id="prvaSlikaUTabeli" style="width: 100vh; heigth:"> 
        <br><br>
        <img src="slike/tabela3.jpg" alt="BMW 118i" id="trecaSlikaUTabeli" style=" height: 350px; width: 600px;"> <br><br> 
       
        <img src="slike/tabela5.jpg" alt="BMW 118i" id="petaSlikaUTabeli" style="width: 300px; height: 350px;">
        <img src="slike/tabela6.jpg" alt="BMW 118i" id="sestaSlikaUTabeli" style="width: 300px; height: 300px;">
       

        </div>
        
        
        </div> <!--Kolaz Kraj--> <br>

       
        
        <hr>

        
        <div class="container-fluid" style="width: 100%;">
       
        <div id="napraviSvojModel">
          <img src="slike/napraviSvoj/plavaBoja.jpg" alt="BMW M 135i" id="slikaJedinstvenogModela">
          <br><br>
          <select name="biranjeOpcije" id="biranjeOpcije">
            <option value="#">--Pogledajte neke od mogucih opcija--</option>
            <option value="boja">Sve mi boje lepo stoje</option>
            <option value="presvlake">Presvlake</option>
            <option value="tabla">Tabla</option>
            <option value="felne">Felne</option>
          </select>
          <br><br>
          <ul id="lista">

          </ul>
        </div>
        
        </div>

        </div>  <!--Kraj kontejnera--> 
        

        <hr>


      
      <div id="tpodaci" style="text-align:left; margin-left: 10vw; margin-right: 10vh;">
        <!--Pocetak diva o tehnickim podacima-->
        <h2>Tehnički podaci</h2>
        <p>Izaberite model:</p>
        <select name="tehnickiPodaci" id="tehnickiPodaci">
          <option value="BMW 118i">BMW 118i</option>
          <option value="BMW 116d">BMW 116d</option>
          <option value="BMW 118d">BMW 118d</option>
          <option value="BMW 120d xDrive">BMW 120d</option>
          <option value="BMW M 135i xDrive">BMW M135i</option>
        </select>
        <br> <br>

        <!--Ovo je skica (sematicki plan modela)-->
        <div class="row">
          <div class="col-md-12">
            <img src="slike/skica.jpg" alt="Sematski plan izrade BMW Model 1 serije" id="skica">

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
            <div id="maksimalnaTezina">Maksimalno dozvoljena težina u kg <span class="float-right"><?php echo $tezina["maksimalnaTezina"]; ?></span></div>
            <hr>
            <div id="nosivost"> Nosivost u kg <span class="float-right"><?php echo $tezina["nosivost"]; ?></span></div>
            <hr>
            <div id="osovinskoOpterecenje"> Dozvoljeno osovinsko opterećenje napred/nazad u kg <span class="float-right"><?php echo $tezina["osovinskoOpterecenje"]; ?></span></div>
            <hr>


          </div>
          <!--Kraj 1 md diva-->

          
         

          <div class="col-md-6">
            <!--Pocetak 2 md diva-->

            <h3>Motor</h3>
            <hr>

            <div id="cilindri">Cilindri/ventili <span class="float-right"><?php echo $motor["cilindri"]; ?></span></div>
            <hr>
            <div id="zapremina">Zapremina u kubnim centimetrima <span class="float-right"><?php echo $motor["zapremina"]; ?></span></div>
            <hr>
            <div id="precnik">Prečnik i hod klipa u mm <span class="float-right"><?php echo $motor["precnik"]; ?></span></div>
            <hr>
            <div id="maksimalnaSnaga">Maks. snaga u kW (ks) pri 1/min <span class="float-right"><?php echo $motor["maksimalnaSnaga"]; ?></span></div>
            <hr>
            <div id="maksimalniObrtniMoment">Maks. obrtni momenat u Nm pri 1/min <span class="float-right"><?php echo $motor["maksimalniObrtniMoment"]; ?></span></div>
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

            <div id="maksimalnaBrzina">Maksimalna brzina u km/h <span class="float-right"><?php echo $performanse["maksimalnaBrzina"]; ?></span></div>
            <hr>
            <div id="ubrzavanje">Ubrzanje od 0-100 km/h u sekundama <span class="float-right"><?php echo $performanse["ubrzavanje"]; ?></span></div>
            <hr>

          </div>
          <!--Kraj 1 md diva-->

          <div class="col-md-6">
            <!--Pocetak 2 md diva-->

            <h3>Potrošnja goriva</h3>
            <hr>

            <div id="potrosnjaGrad">Prosečna potrošnja u gradu u l/100 km <span class="float-right"><?php echo $potrosnja["potrosnjaGrad"]; ?></span></div>
            <hr>
            <div id="potrosnjaOtvoreno">Prosečna potrošnja van grada u l/100 km <span class="float-right"><?php echo $potrosnja["potrosnjaOtvoreno"]; ?></span></div>
            <hr>
            <div id="kombinovanaPotrosnja">Kombinovana potrošnja goriva u l/100 km <span class="float-right"><?php echo $potrosnja["kombinovanaPotrosnja"]; ?></span></div>
            <hr>
            <div id="emisijaGasova">Emisija CO2 gasova u g/km <span class="float-right"><?php echo $potrosnja["emisijaGasova"]; ?></span></div>
            <hr>
            <div id="zapreminaRezervoara">Zapremina rezervoara za gorivo u l <span class="float-right"><?php echo $potrosnja["zapreminaRezervoara"]; ?></span></div>
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

            <div id="dimenzijePrednjih">Dimenzije prednjih pneumatika <span class="float-right"><?php echo $pneumatici["dimenzijePrednjih"]; ?></span></div>
            <hr>
            <div id="dimenzijeZandjih">Dimenzije zadnjih pneumatika <span class="float-right"><?php echo $pneumatici["dimenzijeZadnjih"]; ?></span></div>
            <hr>
            <div id="materijalPrednjih">Dimenzije i materijal prednjih felni <span class="float-right"><?php echo $pneumatici["materijalPrednjih"]; ?></span></div>
            <hr>
            <div id="materijalZadnjih">Dimenzije i materijal zadnjih felni <span class="float-right"> <?php echo $pneumatici["materijalZadnjih"]; ?></span></div>
            <hr>

          </div>
          <!--Kraj 1 md diva-->

        </div>
        <!--Kraj 3 row diva-->




      </div>
      <!--Kraj diva o tehnickim podacima-->


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
              <li><a href="#">Modeli</a></li>
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

  <script src="../../js/jquery-3.4.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>

  <!-- Optional JavaScript -->
  <script src="../../js/hamburger.js"></script>
  <script src="../../js/video.js"></script>
  <script src="../../js/otvaranjeSlikaModela.js"></script>
  <script src="../../js/model1.js"></script>
  <script src="../../js/napraviSvoj.js"></script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->i

</body>

</html>