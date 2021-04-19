<?php

$konekcija = mysqli_connect("sql306.epizy.com", "epiz_28113732", "RtEZ630f1aYz", "epiz_28113732_w316");

// Test da li se povezao sa bazom
if (mysqli_connect_errno()) {
  die("Neuspela konekcija sa bazom <br>Poruka o gresci:" . mysqli_connect_error());
}

mysqli_query($konekcija,"SET NAMES UTF8");


if(isset($_POST["funkcija"]) AND $_POST["funkcija"]!="")
{
    $funkcija=$_POST["funkcija"];

    switch($funkcija){

        case "ucitajImena":
            $upit="SELECT * FROM korisnici WHERE obrisan=0";
            $rez=mysqli_query($konekcija, $upit);
            $assoc = [];
            while($str=mysqli_fetch_assoc($rez))
        {
            array_push($assoc, $str);
        }
        echo JSON_encode($assoc);
        break;
    
        case 'snimiLozinku':
        $korisnik = $_POST["korisnickoIme"];
        $staraLozinka = hash('sha256', $_POST['staraLozinka']);
        $upitStaraLozinka = "SELECT lozinka FROM korisnici WHERE korisnickoIme = '" . $korisnik . "'";
        $staraLozinkaIzBaze = mysqli_fetch_assoc(mysqli_query($konekcija, $upitStaraLozinka));
        if ($staraLozinkaIzBaze['lozinka'] !== $staraLozinka)
            echo "Nije dobra stara lozinka";
        else
        {
        $lozinka = hash('sha256', $_POST["lozinka"]);
        $upit = "UPDATE korisnici SET lozinka='$lozinka' WHERE korisnickoIme='$korisnik'";
            if(mysqli_query($konekcija, $upit))
                echo "Uspesno";
            else
                echo "Ne"; 
            } // Kraj elsa
        break;

        case 'snimiEmail':
            $korisnik = $_POST["korisnickoIme"];
            $email = $_POST["email"];
            $upit = "UPDATE korisnici SET email='$email' WHERE korisnickoIme='$korisnik'";
                if(mysqli_query($konekcija, $upit))
                    echo "Uspesno";
                else
                    echo "Ne";
        break;

        case 'obrisi':
            $korisnik = $_POST["korisnickoIme"];
            $upit = "UPDATE korisnici SET obrisan=1 WHERE korisnickoIme='$korisnik'";
                if(mysqli_query($konekcija, $upit))
                    echo "Uspesno";
                else
                    echo "Ne";
        break;

        case 'snimiLozinku2':
            $korisnik = $_POST["korisnickoIme"];
            $novaLozinka = hash('sha256', $_POST['novaLozinka']);
            $upit = "UPDATE korisnici SET lozinka='$novaLozinka' WHERE korisnickoIme='$korisnik'";
                if(mysqli_query($konekcija, $upit))
                    echo "Uspesno";
                else
                    echo "Ne"; 
            break;
    

    }

}

mysqli_close($konekcija);


?>