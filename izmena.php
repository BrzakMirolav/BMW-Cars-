<?php

session_start();
if(isset($_GET['odjava']))
{
    unset($_SESSION['korisnik']);
    session_destroy();
}

if( $_SESSION['status']!="Administrator"){
    header("Location: index.php");
  }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel | Izmena</title>
    <link type="text/css" rel="stylesheet" href="css/stilovi.css?v=<?php echo time();?>"/>
</head>
<body class="bodyIzmena" > 
   
   <h1>Izmena</h1>
    <button id="ucitajSve"  style="width:20%;  opacity: 0.9; background-color: rgb(0, 17, 248); color: white; border: 2px solid black;border-radius: 10px;text-align: center;">Ucitaj sva imena</button><br><br>
    <select name="izmena" id="izmena">
    </select>
    <br><br><br>
    <label for="novaLozinka">Postavi lozinku</label><br>
    <input id="novaLozinka" type="text"> <button id="snimiLozinku2" style="width:20%;  opacity: 0.9; background-color: rgb(0, 17, 248); color: white; border: 2px solid black;border-radius: 10px;text-align: center;">Snimi lozinku</button> <br><br>
    <label for="email">Postavi email</label> <br>
    <input id="email" type="text"> <button id="snimiEmail" style="width:20%;  opacity: 0.9; background-color: rgb(0, 17, 248); color: white; border: 2px solid black;border-radius: 10px;text-align: center;">Snimi email</button> <br><br>
        
    <br><br>

    <label for="obrisi">Obriši korisnika</label><br><br>
    <button id="obrisi" style="width:30%;  opacity: 0.9; background-color: rgb(0, 17, 248); color: white; border: 2px solid black;border-radius: 10px;text-align: center;">Obriši</button>

<br><br><br><br><br><br>


      <button style="width:30%;  opacity: 0.9; background-color: rgb(0, 17, 248); color: white; border: 2px solid black;border-radius: 10px;text-align: center;" >  <a href="index.php" style="text-decoration:none; color: white;"> Završi izmene </a>  </button> 

</body>
</html>
<script src="js/jquery-3.4.1.js"></script>
<script src="js/izmena.js"></script>
