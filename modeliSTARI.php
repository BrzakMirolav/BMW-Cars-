<?php

session_start();
if (isset($_GET['odjava'])) {
  unset($_SESSION['korisnik']);
  session_destroy();
}

?>


<!doctype html>
<html lang="en">

<head>
  <style>
    html,
    body {
      overflow-x: hidden;
    }
  </style>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="BMW se trudi da kreira sjajne proizvode za svoje klijente. Ponosni smo na nasu reputaciju inovativnog dizajna i performansi u svetu automobilske industrije.">
  <meta name="keywords" content="BMW, automobil, M, Car, Motor, dizajn automobila, lifestyle">
  <meta name="author" content="Brzak Miroslav miroslavrt2117@gs.viser.edu.rs , Stanišić Radomir radomirrt2017@gs.viser.edu.rs">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!--<link type="text/css" rel="stylesheet" href="css/stilovi.css">-->
  <link type="text/css" rel="stylesheet" href="css/stilovi.css?v=<?php echo time(); ?>" />

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
        <a class="nav-link " href="index.php">Početna</a>
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
      
      <!-- M Logo -->
      <img class="logo" src="slike/logo/logo.png" alt="">



      <img class="logo" src="slike/logo/logo.png" alt="">
                 

                
      <li class="nav-item ml-auto">
                 <?php 
                 
                 if(isset($_SESSION['korisnik']))
                 {
                    if($_SESSION['status']=="Administrator")
                    echo "<a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>"
                    ."Admin Panel"."</a>"."<div class='dropdown-menu'>"."<a class='dropdown-item' href='izmena.php'>"."Izmena naloga"."</a>".
                    "<div class='dropdown-divider'></div>"."<a class='dropdown-item' href='dodaj.php'>"."Dodavanje modela"."</a>";

                  }
                
                 ?>
                   </li>    

      <li class="nav-item auto">
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
  <!--Pocetak Body kontejnera-->
  <div class="container-fluid" style="width: 100%;">
    <br><br><br>
    <h3 style="text-align:center;">Pronađite svoj BMW</h3>
    <h1 style="text-align:center;">Svi modeli</h1>

    <div class="container-fluid model">
      <!--Model kontejner pocetak-->

      <!--Model row pocetak-->
      <div class="row">
          <!--Model 1 -->
        <div class="col-md-4">
          <a href="modeli/model1/model1.php"><img class="slikeModela" src="slike/modeli/model1/model1.png" alt="model 1"></a>
        </div>
        <!--Kraj prvog modela-->
      </div>
      <!--Model row kraj--> <br>

      <!--Model row pocetak-->
      <div class="row">
        <!--Model 2-->
        <div class="col-md-4">
          <a href="modeli/model2/activeTourer.php"><img class="slikeModela" src="slike/modeli/model2/m21.png" alt="model 2"></a>
        </div>

        <!--Model 2-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/model2/m22.png" alt="model 2"></a>
        </div>

        <!--Model 2-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/model2/m23.png" alt="model 2"></a>
        </div>
      </div>
      <!--Model row kraj--> <br>


      <!--Model row pocetak-->
      <div class="row">
        <!--Model 2-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/model2/m24.png" alt="model 2"></a>
        </div>

        <!--Model 2-->
        <div class="col-md-4">
          <a href="modeli/model2/activeTourer/activeTourer.php"><img class="slikeModela" src="slike/modeli/model2/m25.png" alt="model 2"></a>
        </div>
        <!--Kraj modela 2-->
      </div>
      <!--Model row kraj--> <br>


      <div class="row">
        <!--Model row pocetak-->
        <div class="col-md-4">
          <!--Model 3-->
          <a href="#"><img class="slikeModela" src="slike/modeli/model3/m31.png" alt="model 3"></a>
        </div>

        <!--Model 3-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/model3/m32.png" alt="model 3"></a>
        </div>

        <!--Model 3-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/model3/m33.png" alt="model 3"></a>
        </div>
        <!--Kraj modela 3-->
      </div>
      <!--Model row kraj--> <br>

       <!--Model row pocetak-->
       <div class="row">
        <!--Model 4-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/model4/model41.png" alt="model 4"></a>
        </div>

        <!--Model 4-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/model4/model42.png" alt="model 4"></a>
        </div>

        <!--Model 4-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/model4/model43.png" alt="model 4"></a>
        </div>
        <!--Kraj modela 4-->
      </div>
      <!--Model row kraj--> <br>
 
       <!--Model row pocetak-->
       <div class="row">
        <!--Model 5-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/model5/model51.png" alt="model 5"></a>
        </div>

        <!--Model 5-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/model5/model52.png" alt="model 5"></a>
        </div>
        <!--Kraj modela 5-->
      </div>
      <!--Model row kraj--> <br>

       <!--Model row pocetak-->
       <div class="row">
        <!--Model 6-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/model6/model61.png" alt="model 6"></a>
        </div>
        <!--Kraj modela 6-->
      </div>
      <!--Model row kraj--> <br>

       <!--Model row pocetak-->
       <div class="row">
        <!--Model 7-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/model7/model71.png" alt="model 7"></a>
        </div>
        <!--Kraj modela 7-->
      </div>
      <!--Model row kraj--> <br>

       <!--Model row pocetak-->
       <div class="row">
        <!--Model 8-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/model8/model81.png" alt="model 8"></a>
        </div>

        <!--Model 8-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/model8/model82.png" alt="model 8"></a>
        </div>

        <!--Model 8-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/model8/model83.png" alt="model 8"></a>
        </div>
        <!--Kraj modela 8-->
      </div>
      <!--Model row kraj--> <br>

       <!--Model row pocetak-->
       <div class="row">
        <!--Model M-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/modelM/modelM1.png" alt="model M"></a>
        </div>

        <!--Model M-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/modelM/modelM2.png" alt="model M"></a>
        </div>

        <!--Model M-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/modelM/modelM3.png" alt="model M"></a>
        </div>
        <!--Kraj modela M-->

      </div>
      <!--Model row kraj--> <br>

       <!--Model row pocetak-->
       <div class="row">
        <!--Model M-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/modelM/modelM4.png" alt="model M"></a>
        </div>

        <!--Model M-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/modelM/modelM5.png" alt="model M"></a>
        </div>

        <!--Model M-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/modelM/modelM6.png" alt="model M"></a>
        </div>
        <!--Kraj modela M-->

      </div>
      <!--Model row kraj--> <br>

       <!--Model row pocetak-->
       <div class="row">
        <!--Model M-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/modelM/modelM7.png" alt="model M"></a>
        </div>

        <!--Model M-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/modelM/modelM8.png" alt="model M"></a>
        </div>

        <!--Model M-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/modelM/modelM9.png" alt="model M"></a>
        </div>
        <!--Kraj modela M-->

      </div>
      <!--Model row kraj--> <br>

       <!--Model row pocetak-->
       <div class="row">
        <!--Model M-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/modelM/modelM10.png" alt="model M"></a>
        </div>

        <!--Model M-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/modelM/modelM11.png" alt="model M"></a>
        </div>

        <!--Model M-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/modelM/modelM12.png" alt="model M"></a>
        </div>
        <!--Kraj modela M-->

      </div>
      <!--Model row kraj--> <br>

      <!--Model row pocetak-->
      <div class="row">
        <!--Model M-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/modelM/modelM13.png" alt="model M"></a>
        </div>
        <!--Kraj modela M-->
      </div>
      <!--Model row kraj--> <br>

      <!--Model row pocetak-->
      <div class="row">
        <!--Model X-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/modelX/modelX1.png" alt="model X"></a>
        </div>

        <!--Model X-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/modelX/modelX2.png" alt="model X"></a>
        </div>

        <!--Model X-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/modelX/modelX3.png" alt="model X"></a>
        </div>
        <!--Kraj modela X-->
      </div>

      <!--Model row pocetak-->
      <div class="row">
        <!--Model X-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/modelX/modelX4.png" alt="model X"></a>
        </div>

        <!--Model X-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/modelX/modelX5.png" alt="model X"></a>
        </div>

        <!--Model X-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/modelX/modelX6.png" alt="model X"></a>
        </div>
        <!--Kraj modela X-->
      </div>
      <!--Model row kraj--> <br>

       <!--Model row pocetak-->
      <div class="row">
        <!--Model X-->
        <div class="col-md-4">
          <a href="#"><img class="slikeModela" src="slike/modeli/modelX/modelX7.png" alt="model X"></a>
        </div>
      </div>
      <!--Model row kraj--> <br>

    </div>
    <!--Model kontejner kraj-->


    <br><br><br>





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
              <li><a href="mapa.html">Mapa</a></li>
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




  <!-- Optional JavaScript -->
  <script src="js/hamburger.js"></script>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
</body>

</html>