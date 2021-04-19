<?php
    session_start();
    if(isset($_GET['odjava']))
    {
        unset($_SESSION['korisnik']);
        session_destroy();
    }
    if(isset($_SESSION['korisnik']))
    header("location:odjava.php");
   

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

    <title>BMW - Odjava</title>


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
          <a class="nav-link" href="modeli.php">Modeli</a>
        </li>
        

         <!-- M Logo -->
         <img class="logo" src="slike/logo/logo.png" alt="">
     


            
            <li class="nav-item ml-auto">
                <a class='nav-link' href='prijava.php'>Prijavi se</a>
            </li>

            <li class="nav-item ">
             <a class='nav-link' href='registracija.php'>Registruj se</a>
            </li> 
          
          
          
   </ul> <!--Kraj navigacije-->


    </div> <!--Kraj NAV kontejnera-->

  </head>

  <body>

      <div class="container-fluid" style="width: 100%;">  <!--Pocetak Body kontejnera-->
      <br><br><br><br>  

      

       <div style="text-align: center;">
      <h2 >Morate biti prijavljeni da biste videli ovu stranicu.</h2><br>
      <a href='prijava.php'>Prijavite se</a>
      </div>
  


<br><br><br>

<div class="container-fluid" style="width: 100%;">  <!-- Pocetak footera -->

<footer>

<div class="row">  <!-- Futer Grid -->
<div class="col-sm-3"> <!--Prva kolona-->
<h5> Brzi linkovi </h5><div class="h_line"></div><br>
<ul>
  <li><a href="index.php">Početna</a></li>
  <li><a href="#">Modeli</a></li>
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