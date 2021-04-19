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
    <title>Logovi Pitanja</title>
</head>
<body>

    <h1>LOGOVI</h1>
    <br><br>

    <?php
    
    $pitanja=fopen("pitanja/pitanja.txt", "r");
    //echo fread($pitanja,filesize("pitanja/pitanja.txt"));
   
    while(!feof($pitanja)) {
        echo fgets($pitanja) . "<br>";
      }
    fclose($pitanja);

    
    ?>

</body>
</html>