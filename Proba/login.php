<?php
session_start();
require_once ("funkcije.php");
//Ako se korisnik odjavljuje
if(isset($_GET['odjava'])) odjava();
//Ako je korisnik već ulogovan, nema potrebe da dolazi na stranicu za logovanje već ga odmah prosleđujem dalje
proveraKolacica();
if(isset($_SESSION['id']) and isset($_SESSION['korime']) and isset($_SESSION['status'])) header("Location:admin.php");
//Ako korisnik pokušava da se prijavi
if(isset($_POST['korime'])and isset($_POST['lozinka']))
{
//Provera poslatih podataka
if($_POST['korime']=="test" and $_POST['lozinka']=="test")
{
//Generisanje sesije, ako je korime i lozinka u redu, i prosleđivanje na stranicu
$_SESSION['id']=1;
$_SESSION['korime']="Test user";
$_SESSION['status']="Administrator";
//Provera da li korisnik želi da se zapamti na ovom računaru
if(isset($_POST['prijava']))
{
//Ako želi, generišu se kolačići
setcookie("id", 1, time()+60*60*24*30);
setcookie("korime", "Test user", time()+60*60*24*30);
setcookie("status", "Administrator", time()+60*60*24*30);
}
header("Location: admin.php");
}
}
?>


<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Login</title>
</head>

<body>

<form action="login.php" method="post">
<input type="text" name="korime" id="korime" placeholder="Unesite korisničko ime" /><br><br>
<input type="password" name="lozinka" id="lozinka" placeholder="Unesite lozinku" /><br><br>
<input type="checkbox" value="1" name="prijava" id="prijava">Zapamti me na ovom računaru<br><br>
<input type="submit" value="Prijavi me">
</form>




</body>
</html>