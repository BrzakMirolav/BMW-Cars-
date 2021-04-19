<?php
    session_start();


    if(!isset($_SESSION['korisnik'])){
      header("Location:prijava.php");
    }

    
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!--<link type="text/css" rel="stylesheet" href="css/stilovi.css">-->
  <link type="text/css" rel="stylesheet" href="css/stilovi.css?v=<?php echo time();?>"/> 

  <title>BMW - Rezervacija</title>


  <div class="container-fluid" style="width: 100%;">
    <!--Pocetak NAV kontejnera-->

    <div class="toggle"> <!--Pocetak toggle-->
       
       <i id="hm" class="fas fa-bars hmenu" onclick="hamburger()"></i> 
        
       </div> <!--kraj toggle-->
 
       <ul id="uhm" class="nav nav-pills justify-content-center" > <!--Navigacija-->

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
          <a class="nav-link" href="modeli.php">Modeli</a>
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
                 
                 if(isset($_SESSION['korisnik']))
                 {
                    if($_SESSION['status']=="Administrator" or $_SESSION['status']=="Korisnik")
                    echo "<a class='nav-link' href='promeniLozinku.php'>"."<i class='fas fa-cog'></i> ".$_SESSION['korisnik']." (".$_SESSION['status'].")"."</a>";
                  }
                 else echo "<a class='nav-link' href='prijava.php'>Prijavi se</a>";
                
                 ?>
            </li>

            <li class="nav-item ">
            <?php 
                 
                 if(isset($_SESSION['korisnik']))
                 {
                    if($_SESSION['status']=="Administrator" or $_SESSION['status']=="Korisnik")
                    echo "<a class='nav-link' href='odjava.php'>"."Odjavi se"."</a>";  
                 }

                else echo "<a class='nav-link' href='registracija.php'>Registruj se</a>";
                 
                 ?>
            </li>




    </ul>
    <!--Kraj navigacije-->


  </div>
  <!--Kraj NAV kontejnera-->



</head>

<body>
  <br>
  <div class="container-fluid " style="width: 100%;" >
    <!--Pocetak Body kontejnera-->
    <br>

    <h1 style="text-align:center">REZERVACIJA</h1> 

    
    <div class="row" >  <!--Pocetak row rezervacije-->
    
    <div class="col-md-6"  > <!--Pocetak forme rezervacije-->
    


    <div class="rez" style="padding:15px; text-align: center; width:100%; ">
      <!--Pocetak rezervacionog diva-->
      <br>
    

      <form action="rezervisan.php" method="post">

        <h5>* Podaci o korisniku</h5><br>
        <label for="ime"><i class="far fa-user"></i>Ime</label><br>
        <input type="text" id="ime" name="ime" placeholder="Unesite vaše ime" required> <br>

        <label for="prezime"><i class="far fa-user"></i>prezime</label><br>
        <input type="text" id="prezime" name="prezime" placeholder="Unesite vaše prezime" required> <br>

        <label for="email">Email</label><br>
        <input type="email" id="email" name="email" placeholder="Unesite vaš email" required> <br><br> 
        
        <label for="tel">Telefon: </label> <br>
        <input  type="tel" id="tel" name="tel" placeholder="Telefon..." required> <br> <br>


        <br><br><br>


        
        <h5>* Podaci o kartici <img src="slike/cards/cards.png" alt="kartice" id="card"> </h5><br>

        <label for="kartica"> Ime na kartici </label> <br>
        <input type="kartica" id="kartica" name="kartica" placeholder="Ime na kartici" required> <br><br>

        <label for="brkartice"> Broj kartice </label> <br>
        <input type="number" id="brkartice1" name="brkartice1" min="1000" max="9999" placeholder="XXXX" required> -
        <input type="number" id="brkartice2" name="brkartice2" min="1000" max="9999" placeholder="XXXX" required> -
        <input type="number" id="brkartice3" name="brkartice3" min="1000" max="9999" placeholder="XXXX" required> -
        <input type="number" id="brkartice4" name="brkartice4" min="1000" max="9999" placeholder="XXXX" required> <br><br>

        <label for="istek">Datum isteka kartice</label>
        <input type="number" id="mesecIsteka" name="mesecIsteka" placeholder="mm" min="1" max="12" required>  <input type="number" id="godinaIsteka" name="godinaIsteka" placeholder="yy" min="20" max="99" required >

        <br><br>

        <label for="bkod"> Bezbednosni kod </label>
        <input type="number" id="bkod" name="bkod" min="0" max="999" placeholder="kod" required> <br><br><br> 
        <h5>* Podaci o adresi</h5><br>

        <address>
                      <strong>Sedište BMW-a</strong><br>
                      Adresa: Radnička 8<br>
                      Poziv na broj: 11000 Beograd, Srbija<br>
                      Telefon: <a href="tel: 011 3539900">011 3539900</a>
                     
       </address>

        <input type="checkbox" id="uslovi" class="uslovi" required> Prihvatam uslove korišćenja <br><br>
        <input type="checkbox" id="kapara" class="uslovi" required> Slažem se sa kaparisanjem rezervacije<br><br>


        <input type="submit" value="Rezerviši" id="sub" class="sub btn-primary"> <br><br>

        <input type="hidden" name="imeModela" value="<?php echo $_POST['imeModela'] ?>" ><br><br>
        <input type="hidden" name="slikaModela" value="<?php echo $_POST['slikaModela']  ?>" ><br><br>
        <input type="hidden" name="cenaModela" value="<?php  echo $_POST['cenaModela'] ?>" ><br><br>


        

        

      </form>

    </div>
    <!--Kraj rezervacionog diva-->

    </div>  <!--Kraj forme rezervacije-->

    <!--Ovde se nalaze slika i ime modela koji zeli da se rezervise-->
    <div class="col-md-6"> <!--Pocetak diva za sliku i ime modela-->
      <div id="slikaModela" style="width: auto; height: auto;">
        <?php
         echo "<img src='".$_POST['slikaModela']."'>";
        ?>
        </div>
        <h3>Ime odabranog modela: <?php
            echo $_POST["imeModela"]; 
        ?></h3>
        <h3>
          Cena modela: <?php
            echo $_POST["cenaModela"];
          ?>
        </h3>
        <p>
          *Pre nego što rezervišete Vaš automobil, neophodno je
          da platite kaparu, koja iznosi 1% od ukupne cene automobila.
        </p>
        <?php
          $cena = floatval(substr($_POST["cenaModela"], 0, -1)) * 1000;
          echo "<h3>Kapara za ovaj model iznosi: " . $cena * 0.01 . "$</h3>";
        ?>
        <br>
        <a href="Ugovor.html" target="_blank" class="btn btn-success"> <i class="far fa-eye"></i> Pregled ugovora i uslova koriscenja</a> &nbsp;
        <a href="ugovorDownload.zip" class="btn btn-danger"> <i class="fas fa-arrow-down" ></i> Preuzmi ugovor i uslove koriscenja</a><br><br>
        
    </div> <!--Kraj diva za sliku i ime modela-->


    </div>  <!--Kraj row rezervacije--> 

    





  </div> <!--Kraj Body kontejnera-->

<br><br><br>

<div class="container-fluid" style="width: 100%;">  <!-- Pocetak footera -->

<footer>

<div class="row">  <!-- Futer Grid -->
<div class="col-sm-3"> <!--Prva kolona-->
<h5> Brzi linkovi </h5><div class="h_line"></div><br>
<ul>
  <li><a href="index.php">Početna</a></li>
  <li><a href="modeli.php">Modeli</a></li>
  <li><a href="prijava.php">Prijava</a></li>
</ul>

</div> <!--Kraj prve kolona-->



<div class="col-sm-3"> <!--Druga kolona-->
<h5> Drugi BMW sajtovi </h5><div class="h_line"></div><br>
<ul>
  <li><a href="https://www.bmw-m.com/en/index.html">BMW M</a></li>
  <li><a href="https://www.bmw-motorsport.com/en/index.html">BMW Motorsport</a></li>
  <li><a href="https://bmw-mountains.com/">BMW Mountines</a></li>
  <li><a href="https://www.bmw-yachtsport.com/en/index.html">BMW Yachtsport</a></li>
  <li><a href="https://www.bmw-drivingexperience.com/en.html">BMW Driving Expirience</a></li>

</ul>

</div>  <!--Kraj druge kolona-->



<div class="col-sm-3"> <!--Treca kolona-->
<h5> Sajt </h5><div class="h_line"></div><br>
<ul>
  <li><a href="kontakt.php">Kontakt</a></li>
  <li><a href="onama.php">O nama</a></li>
  <li><a href="stampanje.html">Štampanje</a></li>
  <li><a href="#">Kolačići</a></li>
  <li><a href="mapa.html">Mapa</a></li>
</ul>

</div>  <!--Kraj trece kolona-->


<div class="col-sm-3"> <!--Cetvrta kolona-->
<h5> Pogledajte nas na </h5><div class="h_line"></div><br>
<ul>
  <li><a href="https://www.instagram.com/bmw/"><i class="fab fa-instagram"></i> Instagram</a></li>
  <li><a href="https://www.facebook.com/BMW/"><i class="fab fa-facebook-f"></i> Facebook</a></li>
  <li><a href="https://twitter.com/bmw"><i class="fab fa-twitter"></i> Twitter</a></li>
  <li><a href="https://plus.google.com/+BMW/posts"><i class="fab fa-google"></i> Google+</a></li>
  <li><a href="https://www.youtube.com/user/BMW"><i class="fab fa-youtube"></i> Youtube</a></li>
</ul>

</div>  <!--Kraj Cetvrte kolona-->


</div>   <!-- Kraj Futer Grid -->

<ul>
<li >&copy; BMW 2019 &nbsp;</li>
<li class="m1">Brzak Miroslav, Stanišić Radomir</li>
</ul>


</footer>


</div> <!-- Kraj footera -->


  

  

  <!-- Optional JavaScript -->  
  <script src="js/jquery-3.4.1.js"></script>
  <script src="js/required.js"></script>
  <script src="js/hamburger.js"></script>
  
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
</body>

</html>