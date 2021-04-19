<?php
$konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");
if (mysqli_connect_errno()) {
  die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
}

$nazivModela = trim($_POST['nazivModela']);
$kojaSlika = $_POST['kojaSlika'];

//$funkcija=$_POST["funkcija"];

$upitSlika = "SELECT * FROM napravisvoj WHERE nazivModela='" . $nazivModela . "'";
$rez = mysqli_fetch_assoc(mysqli_query($konekcija, $upitSlika));
    echo $rez[$kojaSlika];
    /*
switch($funkcija){

    case 'boja'
    $rez = mysqli_fetch_assoc(mysqli_query($konekcija, $upitSlika));
    echo $rez[$kojaSlika];

    mysqli_close($konekcija);
    break;

    case 'presvlake'
    $rez = mysqli_fetch_assoc(mysqli_query($konekcija, $upitSlika));
    echo $rez[$kojaPresvlaka];

    mysqli_close($konekcija);
    break;

    case 'felne'
    $rez = mysqli_fetch_assoc(mysqli_query($konekcija, $upitSlika));
    echo $rez[$kojaFelna];

    mysqli_close($konekcija);
    break;

}
*/

?>