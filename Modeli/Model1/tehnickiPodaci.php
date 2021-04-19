<?php
$konekcija = mysqli_connect("localhost", "root", "", "BMW");
if(mysqli_connect_errno())
{
     die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
} 
mysqli_query($konekcija, "SET NAMES UTF8");
$tezina = "SELECT * FROM tezina  WHERE nazivModela='" .$_POST['opcija'] . "'";
$pneumatici = "SELECT * FROM pneumatici  WHERE nazivModela='" .$_POST['opcija'] . "'";
$motor = "SELECT * FROM motor  WHERE nazivModela='" .$_POST['opcija'] . "'";
$performanse = "SELECT * FROM performanse  WHERE nazivModela='" .$_POST['opcija'] . "'";
$potrosnjaGoriva = "SELECT * FROM potrosnjaGoriva  WHERE nazivModela='" .$_POST['opcija'] . "'";
$upit1 = mysqli_query($konekcija, $tezina);
$upit2 = mysqli_query($konekcija, $pneumatici);
$upit3 = mysqli_query($konekcija, $motor);
$upit4 = mysqli_query($konekcija, $performanse);
$upit5 = mysqli_query($konekcija, $potrosnjaGoriva);
$tez = mysqli_fetch_assoc($upit1);
$pne = mysqli_fetch_assoc($upit2);
$mot = mysqli_fetch_assoc($upit3);
$per = mysqli_fetch_assoc($upit4);
$pot = mysqli_fetch_assoc($upit5);
echo json_encode($tez + $pne + $per + $pot + $mot);
?>