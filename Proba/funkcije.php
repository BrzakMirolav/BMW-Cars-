<?php
function odjava()
{
//Ako se korisnik odjavljuje, uništavaju se promenljive sesije, sesija i kolačići
setcookie("id", "", time()-1);
setcookie("korime", "", time()-1);
setcookie("status", "", time()-1);
unset($_SESSION['id']);
unset($_SESSION['korime']);
unset($_SESSION['status']);
session_destroy();
}
function prijava()
{
//Ako korisnik nije prijavljen odmah se prosleđuje na stranicu za logovanje
if(!isset($_SESSION['id'])) header("Location: login.php");
}
function proveraKolacica()
{
//Ako kolačići postoje generišu se promenljive sesije za dalji rad
if(isset($_COOKIE['id']) and isset($_COOKIE['korime']) and isset($_COOKIE['status']))
{
$_SESSION['id']=$_COOKIE['id'];
$_SESSION['korime']=$_COOKIE['korime'];
$_SESSION['status']=$_COOKIE['status'];
}
}

?>