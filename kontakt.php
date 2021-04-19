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

    <title>BMW - Kontakt</title>

    <style>
    
            
        input{
               opacity: 1;
               color: black;
               border: 2px solid black;
               border-radius: 5px;
               text-align: center;
               width: 70%;
               height: 40px;
               box-shadow: 3px 3px 5px grey;
              }

        select{
               opacity: 1; 
               color: black;
               border: 2px solid black;
               border-radius: 5px;
               text-align-last: center;
               width: 70%;
               height: 40px;
               box-shadow: 3px 3px 5px grey;
              }

         textarea{

               opacity: 1;
               color: black;
               border: 2px solid black;
               border-radius: 5px;
               text-align-last: left;
               width: 70%;
               height: 100px;
               box-shadow: 3px 3px 5px grey;
               overflow-y: scroll;

              }
              #cb{
               box-shadow: none;
               width: 17px;
               height: 15px;
            }
               
            span{
                text-align: right;
                right: 0;
                
            }

    </style>

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
                 <div style="margin: 3vh;" class="row">  <!-- Pocetak kontakt grida -->
                 <div class="col-sm-6">  <!-- Pocetak prve kolone -->
                 <h1>KONTAKTIRAJTE NAS.</h1><br>
                 <h3>Ocekujemo Vaša pitanja i komentare.</h3> <br>

                 <form action="kontakt.php" method="post" >
                 <label for="pol">  Oslovljavanje: <span style="color:red">*</span></label> 
                 <select class="float-right" name="pol" id="pol" required class="text-right">
                 <!--<option value="0">--Izaberite--</option>-->
                 <option value="G">G</option>
                 <option value="Gđa">Gđa</option>
                 </select> <br> <br>

                 <label for="ime"> Ime: <span style="color:red">*</span>  </label>
                 <input class="float-right" type="text" id="ime" name="ime" placeholder="Ime..." required><br> <br>
                 
                 <label for="prezime"> Prezime: <span style="color:red">*</span> </label>
                 <input class="float-right" type="text" id="prezime" name="prezime" placeholder="prezime..." required> <br> <br>

                 <label for="tel"> Mobilni telefon: <span style="color:red">*</span> </label>
                 <input  class="float-right" type="tel" id="tel" name="tel" placeholder="Telefon..." required> <br> <br>

                 <label for="email"> Email: <span style="color:red">*</span> </label>
                 <input class="float-right" type="email" id="email" name="email" placeholder="Email..." required> <br> <br> <br>

                 <label for="tarea"> Pitanja i komentari: <span style="color:red">*</span> </label> <br>
                 <textarea name="tarea" id="tarea" cols="30" rows="10" minlength="15" maxlength="256" placeholder="..." required></textarea>
                 <br>
                 <br>
                 <input type="checkbox" name="cb" id="cb" required> Upoznat sam i saglasan da se podaci o ličnosti koje sam dao prikupljaju, 
                 obrađuju i koriste u cilju ispunjavanja prava/obaveza vezanih za kupoprodaju proizvoda i pružanje servisnih usluga,
                  za komunikaciju o tehničkim i kampanjama za bezbednost vozila, komunikaciju o marketinškim i promotivnim aktivnostima,
                   istraživanje zadovoljstva proizvodima/uslugama, i sl. i unapređivanje tih aktivnosti, a sve u skladu sa važećim propisima o zaštiti podataka o ličnosti i obaveštenjem na internet strani Podaci o ličnosti.
                   <br>  Ova saglasnost važi sve do mog pismenog opoziva koji mogu dati u bilo kom trenutku.
                 <br><br>
                 <input type="submit" value="Pošaljite poruku" id="sub" class="sub"> <br>

                 </form>

                </div> <!-- Kraj prve kolone -->
                
                 

                 <div class="col-sm-6"> <!-- Pocetak druge kolone -->
                 <h3>Pronađite nas na mapi!</h3>
                 <iframe width=100% height=50% src="https://maps.google.com/maps?hl=en&amp;q=Radnicka 8 Beograd+(bmw)&amp;ie=UTF8&amp;t=&amp;z=10&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                 <br>
                 <br>
                 <h3>Kontakt telefoni</h3> <hr>
                 Delta Motors - Beograd
                 <p><a href="tel:+381 11 353 99 00">+381 11 353 99 00</a></p>
                 <p><a href="tel:+381 11 353 99 28">+381 11 353 99 28</a></p>
                 <p><a href="tel:+381 11 353 99 23">+381 11 353 99 23</a></p>

                 Viber broj za zakazivanje servisa:
                 <p><a href="tel:+381 65 889 54 24">+381 65 889 54 24</a></p>

                 BMW Servis 6+ Novi Beograd:
                 <p><a href="tel:++381 11 20 10 911">+381 11 20 10 911</a></p>
                 </div> <!-- Kraj druge kolone -->

                 </div> <!-- Kraj kontakt grida -->
                 

                 <?php
                 
                 if(isset($_POST["pol"]) and $_POST["pol"] != "" and
                   (isset($_POST["ime"]) and $_POST["ime"] != "") and
                   (isset($_POST["prezime"]) and $_POST["prezime"] != "") and
                   (isset($_POST["tel"]) and $_POST["tel"] != "") and
                   (isset($_POST["email"]) and $_POST["email"] != "") and
                   (isset($_POST["tarea"]) and $_POST["tarea"] != "") and
                   (isset($_POST["cb"]) and $_POST["cb"] != ""))
                  {
                    
                   $pol= $_POST["pol"]; 
                   $ime= $_POST["ime"];
                   $prezime= $_POST["prezime"];
                   $tel= $_POST["tel"];
                   $email= $_POST["email"];
                   $tarea= $_POST["tarea"];
                   $timestamp=(date("d-m-Y H:i:s",time()));
                   
                   echo $pol." ".$ime." ".$prezime.", <br> 
                   Uspešno ste postavili pitanje/komentar! <br>
                   Očekujte povratne informacije putem telefona: ".$tel." Ili emaila: ".$email;

                   $kom="Timestamp: ".$timestamp."\n"."Ime: ".$ime." Prezime: ".$prezime." Telefon: ".$tel." Email: ".$email."\n"." Pitanje/Komentar: ".$tarea."\n\n"; 

                   $pitanja=fopen("pitanja/pitanja.txt", "a");

                   fwrite($pitanja, $kom );

                   fclose($pitanja);
                    
                  }
                  

                  else echo " ";
                 
                 ?>

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
    <script src="js/required.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
  </body>
</html>
