<?php

session_start();
if(isset($_GET['odjava']))
{
    unset($_SESSION['korisnik']);
    session_destroy();
}

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
    <link type="text/css" rel="stylesheet" href="css/stilovi.css?v=<?php echo time();?>"/> 

    <title>BMW - O nama</title>


    <div class="container-fluid" style="width: 100%;">  <!--Pocetak NAV kontejnera-->


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
       <a class="nav-link active" href="onama.php">O nama</a>
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
                    "<div class='dropdown-divider'></div>"."<a class='dropdown-item' href='izmenaModela.php'>"."Izmena modela"."</a>";

                  }
                
                 ?>
                   </li>   


                        </li>  

                       <li class="nav-item auto">
                 <?php 
                 //
                 // OVO JE ZA REZERVISANA VOZILA
                 
                 $konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");
                 // Test da li se povezao sa bazom
                 if (mysqli_connect_errno())
                  {
                    die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
                 }
                 if(isset($_SESSION['korisnik']))
                 {
                    if($_SESSION['status']=="Administrator" or $_SESSION['status']=="Korisnik")
                    {
                    echo "<a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>"
                    ."<i class='fas fa-car'></i>"."</a>"."<div class='dropdown-menu'>"."<a class='dropdown-item' href='#'>"."Rezervisana vozila"."</a>".
                    "<div class='dropdown-divider'></div>";
                   

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

          
          
          
   </ul> <!--Kraj navigacije-->


    </div> <!--Kraj NAV kontejnera-->



  </head>
  
  <body>
      <div class="container-fluid" style="width: 100%;">  <!--Pocetak Body kontejnera-->
                 <br>
                
                 <h1 style="margin: 3vh;">O nama</h1><hr>
                 <div class="row" style="margin: 3vh;">  <!-- O nama Grid 1 -->
                
                 <div class="col-sm-6"> <!-- Prva kolona g1-->
                 BMW AG (Bayerische Motoren Werke) je multinacionalna kompanija koja trenutno proizvodi luksuzne automobile i motocikle,
                 a tađe je proizvodila i avionske motore do 1945. godine. <br>
                 Kompanija je osnovana 1916. godine, a sedište joj je u Minhenu.
                 <br>
                 <br>
                 <br>
                 <address>
                      <strong>Sedište BMW-a</strong><br>
                      Adresa: Am Olympiapark 1<br>
                      Poziv na broj: 80809 München, Nemačka<br>
                      Telefon: <a href="tel: +49 89 125016001">+49 89 125016001</a>
                     
                 </address>
                 <br>
                 <br>
                 
                 <p>Odštampajte stranicu "O nama" ili da preuzmete tekst klikom na:</p> </blockquote>
                    <a href="stampanje.html" class="btn btn-danger"  target="_blank"> <i class="fas fa-print">
                    </i> Stampaj </a>
                    
                  
                 </div> <!-- Kraj prve kolona g1-->

                 <div class="col-sm-6"> <!-- Druga kolona g1-->
                
                 <img src="slike/sediste/sediste.jpg" alt="BMW sediste" style="width: 100%;"><br><br>
               <!--  <iframe src="https://www.360cities.net/embed_iframe/bmw-welt-museum-munich" width="850" height="630" frameborder="0" bgcolor="#000000" target="_blank" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe><br/><a title="Panorama photos of Bmw Welt &amp; Museum on 360cities.net" href="https://www.360cities.net/image/bmw-welt-museum-munich">Bmw Welt &amp; Museum</a> -->
                 </div> <!-- Kraj druge kolona g1-->
                 </div>  <!-- Kraj o nama Grid 1 -->

                

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
                 <li class="ml">Brzak Miroslav, Stanišić Radomir</li>
                 </ul>


                </footer>


      </div> <!-- Kraj footera -->


      </div> <!--Kraj Body kontejnera-->




    <!-- Optional JavaScript -->
    <script src="js/hamburger.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
  </body>
</html>