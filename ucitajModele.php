<?php
$konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");

// Test da li se povezao sa bazom
if (mysqli_connect_errno()) {
  die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
}

mysqli_query($konekcija,"SET NAMES UTF8");

$upit = "SELECT ";


mysqli_close($konekcija); // Zatvaranje konekcije
?>