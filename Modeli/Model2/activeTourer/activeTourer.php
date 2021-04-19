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
$query = mysqli_query($konekcija, "SELECT * FROM podacimodela  WHERE nazivModela='BMW 2 Active Tourer' ");
$model = mysqli_fetch_assoc($query);

$query2 = mysqli_query($konekcija, "SELECT * FROM tezina  WHERE nazivModela='BMW 2 Active Tourer' ");
$tezina = mysqli_fetch_assoc($query2);

$query3 = mysqli_query($konekcija, "SELECT * FROM motor  WHERE nazivModela='BMW 2 Active Tourer' ");
$motor = mysqli_fetch_assoc($query3);

$query4 = mysqli_query($konekcija, "SELECT * FROM performanse  WHERE nazivModela='BMW 2 Active Tourer' ");
$performanse = mysqli_fetch_assoc($query4);

$query5 = mysqli_query($konekcija, "SELECT * FROM potrosnjagoriva  WHERE nazivModela='BMW 2 Active Tourer' ");
$potrosnja = mysqli_fetch_assoc($query5);

$query6 = mysqli_query($konekcija, "SELECT * FROM pneumatici  WHERE nazivModela='BMW 2 Active Tourer' ");
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
  <link type="text/css" rel="stylesheet" href="../../../css/stilovi.css?v=<?php echo time(); ?>" />
  <link type="text/css" rel="stylesheet" href="../../../css/model.css?v=<?php echo time(); ?>" />
  <link type="text/css" rel="stylesheet" href="../../../css/napraviSvoj.css?v=<?php echo time(); ?>" />

  <title>BMW - Model 2</title>


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
        <a class="nav-link " href="../../../index.php">Početna</a>
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
        <a class="nav-link active" href="../../../modeli.php">Modeli</a>
      </li>
      

      <!-- M Logo -->
      <img class="logo" src="../../../slike/logo/logo.png" alt="">

      
      <li class="nav-item ml-auto">
                 <?php 
                 
                 if(isset($_SESSION['korisnik']))
                 {
                    if($_SESSION['status']=="Administrator")
                    echo "<a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>"
                    ."Admin Panel"."</a>"."<div class='dropdown-menu'>"."<a class='dropdown-item' href='../../../izmena.php'>"."Izmena naloga"."</a>".
                    "<div class='dropdown-divider'></div>"."<a class='dropdown-item' href='../../../dodaj.php'>"."Dodavanje modela"."</a>";

                  }
                
                 ?>
                   </li>    

      <li class="nav-item auto">
        <?php

        if (isset($_SESSION['korisnik'])) {
          if ($_SESSION['status'] == "Administrator" or $_SESSION['status'] == "Korisnik")
            echo "<a class='nav-link' href='#'>" . $_SESSION['korisnik'] . " (" . $_SESSION['status'] . ")" . "</a>";
        } else echo "<a class='nav-link' href='../../../prijava.php'>Prijavi se</a>";

        ?>
      </li>

      <li class="nav-item ">
        <?php

        if (isset($_SESSION['korisnik'])) {
          if ($_SESSION['status'] == "Administrator" or $_SESSION['status'] == "Korisnik")
            echo "<a class='nav-link' href='../../../odjava.php'>" . "Odjavi se" . "</a>";
        } else echo "<a class='nav-link' href='../../../registracija.php'>Registruj se</a>";

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


      <div id="opis" style="margin: 0 auto; width: 500px;">
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
      <div id="pojedinosti" class="row">
        <div class="col-md-12">
        <h3>PRIZOR ZA PROLAZNIKE.</h3>
        <p>Ne privlači samo pažnju na prvi pogled: novi BMW Serije 2 Active Tourer zadivljuje iz svakog ugla – i 
          sa svakim detaljom. Velika prednja rešetka i kontinuelni otvori za vazduh napred predočavaju njegovu žeđ 
          za akcijom dok LED farovi naglašavaju upadljivu pojavu. A dinamična silueta sa horizontalnim 
          bočnim naborima i upadljivo oblikovanim obrubima daje modelima BMW Serije 2 sportski i moderan karakter.</p>
        <!--Prvi slajder-->
        <div id="prviSlajder" class="carousel slide slajder" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="slike/prviSlajder/slika1.jpg" alt="BMW 2 Series Active Tourer kidney grille">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="slike/prviSlajder/slika2.jpg" alt="BMW 2 Series Active Tourer wheel">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="slike/prviSlajder/slika3.jpg" alt="BMW 2 Series Active Tourer exhaust pipes">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="slike/prviSlajder/slika4.jpg" alt="BMW 2 Series Active Tourer windows">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="slike/prviSlajder/slika5.jpg" alt="BMW 2 Series Active Tourer roof">
            </div>
          </div>
          <a class="carousel-control-prev" href="#prviSlajder" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#prviSlajder" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

      </div> <!--Kraj prvog slajdera-->
      <div class="container-fluid width:100%;">
        <!--Pocetak kontejnera-->
        <div id="opis2">
          <h2>„Za mene, BMW Serije 2 Active Tourer je najfunkcionalniji BMW i iznova tumači čisto zadovoljstvo u vožnji.“</h2>
          <p>- Dr Norbert Rajthofer, predsednik nadzornog odbora BMW AG</p>
        </div>
        <br><br>
        <hr>
      </div>
      <!--Kraj kontejnera-->

      <div id="pojedinosti" class="row">
        <div class="col-md-12">
        <h3>SVAKO MESTO POSTAJE KRAJ U TRENDU.</h3>
        <p>Mnogo prostora u gradu? Ništa lakše kad se vozite modelom BMW Serije 2 Active Tourer. 
          On nudi mnogo prostora i fleksibilnosti. Sa do 1.510 l varijabilnog prostora za prtljag,
          uvek je spreman za nove aktivnosti. Istovremeno, ekstremno je zavodljiv: 
          velika vrata omogućavaju komotan ulazak i izlazak, opcionalno beskontaktno otvaranje i zatvaranje
          poklopca prtljažnika olakšava utovar i nudi maksimalnu udobnost. 
          Za sve ono što imate na spisku aktivnosti.</p>
        <!--Drugi slajder-->
        <div id="drugiSlajder" class="carousel slide slajder" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="slike/drugiSlajder/slika1.jpg" alt="BMW Model 2 Active Tourer">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="slike/drugiSlajder/slika2.jpg" alt="BMW 2 Series Active Tourer">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="slike/drugiSlajder/slika3.jpg" alt="BMW 2 Series Active Tourer">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="slike/drugiSlajder/slika4.jpg" alt="BMW 2 Series Active Tourers">
            </div>
          </div>
          <a class="carousel-control-prev" href="#drugiSlajder" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#drugiSlajder" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      </div> <!--Kraj drugog slajdera-->
        <br><br><br><br>
      <div class="row" id="pojedinosti">
        <div class="col-md-12">
          <h3>Potpuno novo dizajnirani motor sa unutrasnjim sagorevanjem.</h3>
          <img src="slike/slika1.jpg" alt="BMW 2 Series Active Tourer">
          <img src="slike/motor.jpg" alt="BMW 2 Series Active Tourer Engine">
        </div>
      </div>
      <br><br><br><br>
      <div id="pojedinosti" class="row">
        <div class="col-md-12">
        <h3>OPREMLJEN ZA SVAKU PRILIKU.</h3>
        <p>Širok asortiman opcija opreme omogućava vam da indiviualizujete svoj BMW Serije 2 Active Tourer u potpunosti u skladu sa vašim ličnim preferencijalima. 
          Bilo da su posredi dodatni aksesoari enterijeta za još veći prtljažni prostor ili stilski aksesoari za to specijalno nešto.</p>
        <!--Treci slajder-->
        <div id="treciSlajder" class="carousel slide slajder" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="slike/treciSlajder/slika1.jpg" alt="BMW 2 Series Active Tourer">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="slike/treciSlajder/slika2.jpg" alt="BMW 2 Series Active Tourer">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="slike/treciSlajder/slika3.jpg" alt="BMW 2 Series Active Tourer">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="slike/treciSlajder/slika4.jpg" alt="BMW 2 Series Active Tourer">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="slike/treciSlajder/slika5.jpg" alt="BMW 2 Series Active Tourer">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="slike/treciSlajder/slika6.jpg" alt="BMW 2 Series Active Tourer">
            </div>
          </div>
          <a class="carousel-control-prev" href="#treciSlajder" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#treciSlajder" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      </div> <!--Kraj Treceg slajdera-->
      <hr>
      <div id="tpodaci" style="text-align:left; margin-left: 10vw; margin-right: 10vh;">
        <!--Pocetak diva o tehnickim podacima-->
        <h2>Tehnički podaci</h2>
        <p>Izaberite model:</p>
        <select name="tehnickiPodaci" id="tehnickiPodaci">
          <option value="BMW 2 Active Tourer">BMW 2 Active Tourer</option>
          <option value="BMW 216i Active Tourer">BMW 216i Active Tourer</option>
          <option value="BMW 218i Active Tourer">BMW 218i Active Tourer</option>
          <option value="BMW 220i Active Tourer">BMW 220i Active Tourer</option>
          <option value="BMW 225i Active Tourer">BMW 225i Active Tourer</option>
          <option value="BMW 225i xDrive Active Tourer">BMW 225i xDrive Active Tourer</option>
          <option value="BMW 216d Active Tourer">BMW 216d Active Tourer</option>
          <option value="BMW 218d Active Tourer">BMW 218d Active Tourer</option>
          <option value="BMW 218d xDrive Active Tourer">BMW 218d xDrive Active Tourer</option>
          <option value="BMW 220d Active Tourer">BMW 220d Active Tourer</option>
          <option value="BMW 218d xDrive Active Tourer">BMW 218d xDrive Active Tourer</option>
          <option value="BMW 220xe iPerformance Active Tourer">BMW 220xe iPerformance Active Tourer</option>
        </select>
        <br> <br>

        <!--Ovo je skica (sematicki plan modela)-->
        <div class="row">
          <div class="col-md-12">
            <img src="slike/skica.jpg" alt="Sematski plan izrade BMW Model 2 serije" id="skica">

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

      <br><br>

      <form action="../../../rezervacija.php" method="POST" id="rezervacija">
        <input type='hidden' name='imeModela' value=<?php echo "'" . $model['nazivModela'] . "'" ?> />
        <input type='hidden' name='cenaModela' value=<?php echo "'" . $model['cena'] . "'" ?> />
        <input type='hidden' name='slikaModela' value='modeli/Model2/activeTourer/slike/activeTourer.jpg'>
        <button class="btn btn-primary"> <i class="far fa-bookmark"></i> Rezerviši</button>
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
              <li><a href="../../../index.php">Početna</a></li>
              <li><a href="../../../modeli.php">Modeli</a></li>
              <li><a href="../../../prijava.php">Prijava</a></li>
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
              <li><a href="../../../kontakt.php">Kontakt</a></li>
              <li><a href="../../../onama.php">O nama</a></li>
              <li><a href="../../../stampanje.html">Štampanje</a></li>
              <li><a href="#">Kolačići</a></li>
              <li><a href="../../../mapa.html">Mapa</a></li>
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

  <script src="../../../js/jquery-3.4.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>

  <!-- Optional JavaScript -->
  <script src="../../../js/hamburger.js"></script>
  <script src="../../../js/video.js"></script>
  <script src="../../../js/otvaranjeSlikaModela.js"></script>
  <script src="../../../js/tehnickiPodaci.js"></script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

</body>

</html>