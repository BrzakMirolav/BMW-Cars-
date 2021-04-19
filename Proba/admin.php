<?php
session_start();
require_once ("funkcije.php");
proveraKolacica();
prijava();
echo "Dobro došao, ".$_SESSION['korime'].", (".$_SESSION['status'].")<br>";
echo "<a href='login.php?odjava'>Odjava</a><br>";
echo "<h1>Administrativni deo</h1>";