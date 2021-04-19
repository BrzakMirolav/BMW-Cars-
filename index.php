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

    <link rel="icon" href="favicon.ico" type="image/gif">

    <title>BMW - Početna</title>


    <div class="container-fluid" style="width: 100%;">  <!--Pocetak NAV kontejnera-->


      <div class="toggle"> <!--Pocetak toggle-->
       
      <i id="hm" class="fas fa-bars hmenu" onclick="hamburger()"></i> 
       
      </div> <!--kraj toggle-->

      <ul id="uhm" class="nav nav-pills justify-content-center" > <!--Navigacija-->

  
      

     <li class="nav-item">
       <a class="nav-link active" href="index.php">Početna</a>
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

      

        <!-- slajder -->

        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="false">
  <ol class="carousel-indicators">
   <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>  
    <li data-target="#carouselExampleCaptions" data-slide-to="1" ></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    
    
    <!-- <div class="carousel-item active">
      <video src="Video/4k.mkv" class="w-100" id="videoPocetna" onmouseover="videoPlay(this)" onmouseout="videoPause(this)"></video>
      <div class="carousel-caption d-none d-md-block">
        <h2>Novi, moćni BMW serije 8</h2>
        <p>Stavite kurosr na video kako biste ga pustili</p>
      </div> -->

      <div class="carousel-item active">
       <img src="slike/m8/m8.jpg" class="w-100" alt="m8">
      <div class="carousel-caption d-none d-md-block">
        <h2>Novi, moćni BMW serije 8</h2>
        
      </div>
    
    
    </div>
    <div class="carousel-item ">
      <img src="slike/m5/m5.jpeg" class="d-block w-100" alt="m5">
      <div class="carousel-caption d-none d-md-block">
        <h2>BMW serije 5</h2>
        <p><a href="modeli.php" style="text-decoration:none; color: white;" > Pogledajte još modela</a>  </p>  
      </div>
    </div>
    <div class="carousel-item">
      <img src="slike/i8/i8.jpg" class="d-block w-100" alt="i8">
      <div class="carousel-caption d-none d-md-block">
        <h2>Moderni, električni BMW i8</h2>
        <p>Ne želite da plaćate gorivo? Pravi auto za vas!</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



<div class="cointainer-fluid" style="width: 100%;"> <!--Pocetak kontejnera za grid pocetna-->


<div class="row grid1"> <!-------------------Pocetak prvog grida------------------------>


<div class="col-md-6 gridpadding"> <!--Pocetak prvog dela grida-->
<a href="https://www.bmw.com/en/innovation/5-trends-of-urban-mobility.html"><video src="slike/pocetna/1video.mp4"  id="1video" onmouseover="videoPlay(this)" onmouseout="videoPause(this)"></video> </a>
<div class="gridabs"> <!--Apsolutna pozicija teksta na slike/videe-->
<p>Urbana mobilnost</p>
<h2>5 Trendova budućnosti</h2> <br>
<a href="https://www.bmw.com/en/innovation/5-trends-of-urban-mobility.html" class="btn dugmepoc" >Pročitaj više</a>
</div> <!--Kraj Apsolutna pozicija teksta na slike/videe-->

</div>  <!--Kraj prvog dela grida-->

<div class="col-md-6 gridpadding"> <!--Pocetak drugog dela grida-->
<a href="https://www.bmw.com/en/innovation/ebook-self-driving-cars-opportunities-for-sustainable-mobility.html"><img src="slike/pocetna/1slika.jpg"  id="1slika" alt="prva slika u gridu"></a>
<div class="gridabs"> <!--Apsolutna pozicija teksta na slike/videe-->
<p>E-knjiga</p>
<h2>Samokontrolni i kooperativni <br> automobili</h2> <br>
<a href="https://www.bmw.com/en/innovation/ebook-self-driving-cars-opportunities-for-sustainable-mobility.html" class="btn dugmepoc" >Pročitaj više</a>
</div> <!--Kraj Apsolutna pozicija teksta na slike/videe-->

</div>  <!--Kraj drugog dela grida-->


</div>  <!--------------------------------------Kraj prvog grida------------------------->

<br>
<div class="story">  <!--Pocetak story diva--> 
<br>
<h1>Otkrijte BMW priče</h1>
<br>
<a href="https://www.bmw.com/en/stories/automotive-life/eckart-foodlab-culinary-guide-vienna.amp.html"> <img src="slike/pocetna/story/story1.jpg" alt="story1"></a> 
<a href="https://www.bmw.com/en/stories/automotive-life/grand-tour-of-switzerland.amp.html"> <img src="slike/pocetna/story/story2.jpg" alt="story2"> </a>
<a href="https://www.bmw.com/en/stories/innovation/nextgen-mobility-of-tomorrow.amp.html"> <img src="slike/pocetna/story/story3.jpg" alt="story3"> </a>
<a href="https://www.bmw.com/en/stories/automotive-life/spain-road-trip-the-best-scenic-routes.amp.html"> <img src="slike/pocetna/story/story4.jpg" alt="story4"> </a>
<a href="https://www.bmw.com/en/stories/design/car-design-in-7-steps.amp.html"> <img src="slike/pocetna/story/story5.jpg" alt="story5"> </a>
<a href="https://www.bmw.com/en/stories/automotive-life/autonomous-driving.amp.html"> <img src="slike/pocetna/story/story6.jpg" alt="story6"> </a>
 <br>
 <br>
 

</div> <!--Kraj story diva-->
 <br><br><br>
<div style="text-align:center;">
 <h4>BMW u tvojoj zemlji</h4>
 <h1 style="font-size: 5vh; ">SVI BMW MODELI</h1>
 <h4> <a href="modeli.php" style="text-decoration:none; color: black;  font-weight: bold;" > <i class="fas fa-angle-right"></i> Pronađi BMW u tvojoj zemlji </a></h4>
</div>

<br><br>

<div class="row grid2" > <!-------------------Pocetak drugog grida------------------------>


<div class="col-md-8 gridpadding"> <!--Pocetak prvog dela grida-->
<a href="https://www.bmw.com/en/innovation/how-hydrogen-fuel-cell-cars-work.html"><video src="slike/pocetna/2video.mp4" class="w-100" id="2video" onmouseover="videoPlay(this)" onmouseout="videoPause(this)" ></video></a>
<div class="mgridabs"> <!--Apsolutna pozicija teksta na slike/videe-->
<p style="font-weight: bold;">Vodič <br>
<span style=" font-size: 25px; font-weight: normal;">Sve što treba da znate o automobilima sa vodoničnim rezervoarnim ćelijama</span> </p>
</div> <!--Kraj Apsolutna pozicija teksta na slike/videe-->

</div>  <!--Kraj prvog dela grida-->

<div class="col-md-4 gridpadding"> <!--Pocetak drugog dela grida-->
<a href="https://www.bmw.com/en/automotive-life/bucket-list-for-car-enthusiasts.html"><img src="slike/pocetna/2slika2.jpg"  class="2slika" alt="druga slika u gridu"></a>
<div class="gmgridabs"> <!--Apsolutna pozicija teksta na slike/videe-->
<p style="font-weight: bold;">Za ljubitelje automobila <br>
<span style="font-size: 25px; font-weight: normal;">Ultimativni spisak za entuzijaste</span> </p>
</div> <!--Kraj Apsolutna pozicija teksta na slike/videe-->

<a href="https://www.bmw.com/en/innovation/connected-car.html"><img src="slike/pocetna/2slika.jpg"  class="2slika" alt="prva slika u gridu"></a>
<div class="mgridabs"> <!--Apsolutna pozicija teksta na slike/videe-->
<p style="font-weight: bold; color: black;">Povezani automobili <br>
<span style="color: black; font-size: 20px; font-weight: normal;"> Doživite sutrašnju komunikaciju sa povezanim automobilom</span> </p>
</div> <!--Kraj Apsolutna pozicija teksta na slike/videe-->

</div>  <!--Kraj drugog dela grida-->


</div>   <!--------------------------------------Kraj drugog grida------------------------->


<div class="row grid3" > <!-------------------Pocetak treceg grida------------------------>


<div class="col-md-4 gridpadding"> <!--Pocetak prvog dela grida-->
<a href="https://www.bmw.com/en/automotive-life/safe-driving-on-snow.html"><img src="slike/pocetna/3slika.jpg"  class="3slika" alt="prva slika u gridu"></a>
<div class="mgridabs"> <!--Apsolutna pozicija teksta na slike/videe-->
<p style="font-weight: bold; color: black;"> Saveti o zimskoj vožnji <br>
<span style="color: black; font-size: 20px; font-weight: normal;"> Kako voziti bezbedno po snegu i ledu</span> </p>
</div> <!--Kraj Apsolutna pozicija teksta na slike/videe-->

</div>  <!--Kraj prvog dela grida-->

<div class="col-md-4 gridpadding"> <!--Pocetak drugog dela grida-->
<a href="https://www.bmw.com/en/automotive-life/christmas-traditions-around-the-world.html"><video src="slike/pocetna/3video.mp4" class="w-100" id="2video" onmouseover="videoPlay(this)" onmouseout="videoPause(this)"></video></a>
<div class="mgridabs"> <!--Apsolutna pozicija teksta na slike/videe-->
<p style="font-weight: bold; color: black;"> Stil života <br>
<span style="color: black; font-size: 20px; font-weight: normal;"> Strane ali realne Božićne tradicije - jesu li?</span> </p>
</div> <!--Kraj Apsolutna pozicija teksta na slike/videe-->

</div>  <!--Kraj drugog dela grida-->

<div class="col-md-4 gridpadding"> <!--Pocetak treceg dela grida-->
<a href="https://www.bmw.com/en/design/how-to-wrap-a-car.html"><video src="slike/pocetna/3video2.mp4" class="w-100" id="2video" onmouseover="videoPlay(this)" onmouseout="videoPause(this)" ></video></a>
<div class="mgridabs"> <!--Apsolutna pozicija teksta na slike/videe-->
<p style="font-weight: bold; color: white;"> Vodič korak-po-korak <br>
<span style="color: white; font-size: 20px; font-weight: normal;"> Kako zamotati auto najipresivnije moguće </span> </p>
</div> <!--Kraj Apsolutna pozicija teksta na slike/videe-->

</div>  <!--Kraj treceg dela grida-->


</div>  <!--------------------------------------Kraj treceg grida------------------------->



<div class="row grid4" > <!-------------------Pocetak cetvrtog grida------------------------>


<div class="col-md-4 gridpadding"> <!--Pocetak prvog dela grida-->
<a href="https://www.bmw.com/en/innovation/Plug-in-hybrid-and-other-kinds-of-electric-cars.html"><video src="slike/pocetna/4video.mp4" class="w-100"  onmouseover="videoPlay(this)" onmouseout="videoPause(this)" ></video></a>
<div class="gmgridabs"> <!--Apsolutna pozicija teksta na slike/videe-->
<p style="font-weight: bold; color: white;">Vodič <br>
<span style="color: white; font-size: 20px; font-weight: normal;"> Tipovi električnih automobila koje trebate znati</span> </p>
</div> <!--Kraj Apsolutna pozicija teksta na slike/videe-->

<a href="https://www.bmw.com/en/automotive-life/wheels-and-tires.html"><video src="slike/pocetna/4video2.mp4" class="w-100" id="4video" onmouseover="videoPlay(this)" onmouseout="videoPause(this)" ></video></a>
<div class="mgridabs"> <!--Apsolutna pozicija teksta na slike/videe-->
<p style="font-weight: bold; color: black;">Vodič <br>
<span style="color: black; font-size: 20px; font-weight: normal;">10 stvari koje trebate znati o vašim gumama</span> </p>
</div> <!--Kraj Apsolutna pozicija teksta na slike/videe-->
</div>  <!--Kraj prvog dela grida-->

<div class="col-md-8 gridpadding"> <!--Pocetak drugog dela grida-->
<a href="https://www.bmw.com/en/automotive-life/car-cake-made-from-easy-gingerbread-recipe-Christmas-baking.html"><img src="slike/pocetna/4slika.jpg"  class="4slika" alt="prva slika u gridu"></a>
<div class="mgridabs"> <!--Apsolutna pozicija teksta na slike/videe-->
<p style="font-weight: bold; color: white;">BMW torta <br>
<span style="color: white; font-size: 25px; font-weight: normal;"> Ljubitelji automobila - ovo je sezona Božićnih recepata</span> </p>
</div> <!--Kraj Apsolutna pozicija teksta na slike/videe-->

</div>  <!--Kraj drugog dela grida-->



</div>  <!--------------------------------------Kraj cetvrtog grida------------------------->



<div class="row grid5" > <!-------------------Pocetak petog grida------------------------>


<div class="col-md-4 gridpadding"> <!--Pocetak prvog dela grida-->
<a href="https://www.bmw.com/en/automotive-life/checklist-winterize-your-car.html"><img src="slike/pocetna/5slika.jpg"  class="5slika" alt="prva slika u gridu"></a>
<div class="mgridabs"> <!--Apsolutna pozicija teksta na slike/videe-->
<p style="font-weight: bold; color: white;">Vodič <br>
<span style="color: white; font-size: 20px; font-weight: normal;"> 13 saveta kako da pripremite vaš auto za zimu</span> </p>
</div> <!--Kraj Apsolutna pozicija teksta na slike/videe-->

</div>  <!--Kraj prvog dela grida-->

<div class="col-md-4 gridpadding"> <!--Pocetak drugog dela grida-->
<a href="https://www.bmw.com/en/innovation/bmw-vision-m-next.html"><img src="slike/pocetna/5slika2.jpg"  class="5slika" alt="druga slika u gridu"></a>
<div class="mgridabs"> <!--Apsolutna pozicija teksta na slike/videe-->
<p style="font-weight: bold; color: white;">Pregledno vozilo <br>
<span style="color: white; font-size: 20px; font-weight: normal;"> Kako iskusiti BMW Vision M NEXT</span> </p>
</div> <!--Kraj Apsolutna pozicija teksta na slike/videe-->

</div>  <!--Kraj drugog dela grida-->

<div class="col-md-4 gridpadding"> <!--Pocetak treceg dela grida-->
<a href="https://www.bmw.com/en/innovation/car-of-the-future.html"><img src="slike/pocetna/5slika3.jpg"  class="5slika" alt="treca slika u gridu"></a>
<div class="mgridabs"> <!--Apsolutna pozicija teksta na slike/videe-->
<p style="font-weight: bold; color: white;">Inovacije <br>
<span style="color: white; font-size: 20px; font-weight: normal;"> Više od vozila: Otkrijte automobil sutrašnjice</span> </p>
</div> <!--Kraj Apsolutna pozicija teksta na slike/videe-->

</div>  <!--Kraj treceg dela grida-->


</div>  <!--------------------------------------Kraj petog grida------------------------->


<div class="row grid6" > <!-------------------Pocetak sestog grida------------------------>


<div class="col-md-4 gridpadding"> <!--Pocetak prvog dela grida-->
<a href="https://www.bmw.com/en/automotive-life/how-to-stay-awake-while-driving.html"><img src="slike/pocetna/6slika.jpg"  class="6slika" alt="prva slika u gridu"></a>
<div class="mgridabs"> <!--Apsolutna pozicija teksta na slike/videe-->
<p style="font-weight: bold; color: white;">Vodič <br>
<span style="color: white; font-size: 20px; font-weight: normal;"> Top saveti kako ostati budan tokom vožnje </span> </p>
</div> <!--Kraj Apsolutna pozicija teksta na slike/videe-->
</div>  <!--Kraj prvog dela grida-->

<div class="col-md-4 gridpadding"> <!--Pocetak drugog dela grida-->
<a href="https://www.bmw.com/en/performance/how-to-find-the-racing-line.html"><video src="slike/pocetna/6video.mp4" class="w-100" id="6video" onmouseover="videoPlay(this)" onmouseout="videoPause(this)"></video></a>
<div class="mgridabs"> <!--Apsolutna pozicija teksta na slike/videe-->
<p style="font-weight: bold; color: black;">Uslovi za trkanje <br>
<span style="color: black; font-size: 20px; font-weight: normal;"> Kako zahvatiti perfektan ugao: 12 pro trkačkih saveta</span> </p>
</div> <!--Kraj Apsolutna pozicija teksta na slike/videe-->
</div>  <!--Kraj drugog dela grida-->

<div class="col-md-4 gridpadding"> <!--Pocetak treceg dela grida-->
<a href="https://www.bmw.com/en/innovation/the-development-of-self-driving-cars.html"><video src="slike/pocetna/6video2.mp4" class="w-100" id="6video2" onmouseover="videoPlay(this)" onmouseout="videoPause(this)" ></video></a>
<div class="mgridabs"> <!--Apsolutna pozicija teksta na slike/videe-->
<p style="font-weight: bold; color: black;"> Self-driving cars <br>
<span style="color: black; font-size: 20px; font-weight: normal;"> Put ka autonomnom vožnjom</span> </p>
</div> <!--Kraj Apsolutna pozicija teksta na slike/videe-->
</div>  <!--Kraj treceg dela grida-->


</div>  <!--------------------------------------Kraj sestog grida------------------------->



</div> <!--Kraj kontejnera za grid pocetna-->


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
    <script src="js/video.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
  </body>
</html>