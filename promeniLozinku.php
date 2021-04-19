<?php

session_start();
if(isset($_GET['odjava']))
{
    unset($_SESSION['korisnik']);
    session_destroy();
}

if($_SESSION['status']!="Korisnik" and $_SESSION['status']!="Administrator")
    header("Location: index.php");


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BMW - Promena lozinke</title>

    <link type="text/css" rel="stylesheet" href="css/stilovi.css?v=<?php echo time();?>"/>
</head>
<body style="background-color:black; color:white;"  > 
   
   <h1>Izmeni Lozinku</h1>
    
   <div style="visibility: hidden; position:absolute;"> 
    Vaše korisničko ime:  <br>
    <select id="izmena">
    <option value='<?php echo $_SESSION['korisnik'];?>'> <?php echo $_SESSION['korisnik'];?>  </option>
    </select> 
    </div>
    
    <br><br>
    <label for="staraLozinka">Unesite staru lozinku: </label> <br>
    <input id="staraLozinka" type="text"> <br><br>

    <label for="lozinka">Unesite novu lozinku: </label><br>
    <input id="lozinka" type="text"> <br><br>

   <label for="lozinka1">Potvrdi novu lozinku: </label><br>
    <input id="lozinka1" type="text">
    <br><br>
    <button type="submit" id="snimiLozinku" style="width:30%;  opacity: 0.9; background-color: rgb(0, 17, 248); color: white; border: 2px solid black;border-radius: 10px;text-align: center;">Snimi lozinku</button>

    <br><br> <br><br>

    <button style="width:30%;  opacity: 0.9; background-color: rgb(0, 17, 248); color: white; border: 2px solid black;border-radius: 10px;text-align: center;" >  <a href="index.php" style="text-decoration:none; color: white;"> Završi izmene </a>  </button> 

 
       

</body>
</html>
<script src="js/jquery-3.4.1.js"></script>
<script src="js/izmena.js"></script>
