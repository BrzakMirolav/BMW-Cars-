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
    <title>Logovi</title>
</head>
<body>

    <h1>LOGOVI Rezervacija</h1>
    <br><br>

    <?php
    
    $rezervacije=fopen("rezervacije/rezervacije.txt", "r");
    //echo fread($pitanja,filesize("pitanja/pitanja.txt"));
   
    while(!feof($rezervacije)) {
        echo fgets($rezervacije) . "<br>";
      }
    fclose($rezervacije);

    
    ?>

</body>
</html>