-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql306.epizy.com
-- Generation Time: Mar 25, 2021 at 09:29 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_28113732_w316`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `ID` int(10) UNSIGNED NOT NULL,
  `korisnickoIme` varchar(20) NOT NULL,
  `lozinka` varchar(256) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Korisnik','Administrator') NOT NULL,
  `obrisan` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`ID`, `korisnickoIme`, `lozinka`, `ime`, `prezime`, `email`, `datum`, `status`, `obrisan`) VALUES
(0, 'miki', '38b2d03f3256502b1e9db02b2d12aa27a46033ffe6d8c0ef0f2cf6b1530be9d8', 'Miroslav', 'Brzak', 'miroslavrt2117@gmail.com', '2019-12-07 11:16:48', 'Administrator', 0),
(1, 'zip1916', '315dbb463a46caaeeef8be8d13e659295b4acb4e92df7c471210eeb823ceec30', 'Radomir', 'Stanisic', 'radomirrt2017@gs.viser.edu.rs', '2019-12-07 11:58:42', 'Administrator', 0),
(2, 'icagica', 'fb3f3c088a59fd3cfcd34094b18d81a9d9af6a6d946fd211398ea20aaa7560ef', 'Ivana', 'Kostic', 'Ivana@gmail.com', '2019-12-10 13:29:31', 'Korisnik', 0),
(3, 'Kida', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Danijel', 'Karapandza', 'danijelcar00@gmail.com', '2019-12-10 15:02:53', 'Korisnik', 0),
(10, 'bot', '4063dce4db42226ffac81a986b73f4ded38cc3481878a26839184891510f4b41', 'Bot', 'Botovski', 'bot@nob.com', '2020-02-14 15:29:03', 'Korisnik', 0),
(11, 'Marina', 'c81da3534e545a8cb811cb95b92fe60299745af9a2ee725833a52baaecb6d837', 'Marina', 'Brzak', 'maba965@gmail.com', '2021-03-19 22:33:24', 'Korisnik', 0),
(12, 'marko', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Marko', 'Brzak', 'test@gmail.com', '2021-03-19 23:55:04', 'Korisnik', 0),
(13, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'admin', 'admin', 'admin@gmail.com', '2021-03-24 13:59:04', 'Administrator', 0);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `ID` int(11) NOT NULL,
  `serijaModela` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `imeModela` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cena` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kratakOpis` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `naslovPrveSekcije` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `opisPrveSekcije` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `naslovKolaza` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `opisKolaza` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `naslovDrugeSekcije` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `opisDrugeSekcije` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `Obrisan` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`ID`, `serijaModela`, `imeModela`, `cena`, `kratakOpis`, `naslovPrveSekcije`, `opisPrveSekcije`, `naslovKolaza`, `opisKolaza`, `naslovDrugeSekcije`, `opisDrugeSekcije`, `Obrisan`) VALUES
(2, 'serijaCetiri', 'M4 440i', '90.000$', 'Sportski izvodjac stvoren kako bi impresionirao na cesti. Rezultat je zadivljujuci. Vise dinamičnosti, agilnosti i ugodnosti. Beskompromisno spreman za akciju nudeci dizajn, prisutnost i rukovanje koji su svi pažljivo optimizovani. Ukratko: prekrasan sportski coupe koji pruza uzivanje u voznji s novim znazenjem i zadovoljava najzahtevnije korisnike\r\n', 'Sportski izvođač stvoren kako bi impresionirao na cesti. Rezultat je zadivljujući. Više dinamičnosti', 'BMW Serije 4 Coupé razvija divnu dinamiku koja će vas odmah očarati. U savršenoj interakciji između motora visokog potiska s opcionim Prilagodljivim M vešanjem, promenjivog sportskog upravljača i opcijskog 8-brzinskog Steptronic prenosa, osigurava sportsko uživanje u vožnji u svakoj situaciji koja će dočarati samouvereni osmeh – i jamčiti poglede divljenja.', 'ELEGANTAN I SPORTSKI.', 'Ekskluzivna unutrašnjost novog BMW-a serije 4 Coupé kombinuje sportsku prirodu s modernom funkcionalnošću. Brojne informacijske i komunikacijske tehnologije i enterijer s visokokvalitetnim materijalima savršeno oblikovanim za potrebe vozača pružaju vrlo visok standard uživanja. Pored toga, ambijentalno osvetljenje stvara jedinstven doživljaj vožnje.\n', ' Uzbudljivo za gledati.', 'Ako postoji idealan oblik za sportski coupé, dizajn novog BMW-a Serije 4 Coupé je savršen predložak. Njegov sportski izgled zrači dinamičnom prisutnošću i sadrži nadahnutu interakciju fluidnog dizajna i profiliranih bočnih strana. Jedinstvena mešavina sportskog izgleda, agilnosti i estetike zadovoljava želju za istinski kompletnim automobilom.\n', 0),
(3, 'serijaOsam', 'M8 550i xDrive', '150.000$', 'Urođeno sportski: BMW M850i xDrive Gran Coupé otkriva svoje gene iz trkačkog sporta i pre nego se uopšte pokrene. Njegova estetika od koje zastaje dah sa impresivnim proporcijama sportskog automobila i M specifičnim akcentima dizajna prenosi beskompromisnu dinamičnost i demonstrira potencijal ovog luksuznog sportskog automobila sa četvoro vrata. A ovo je zaista impresivno: moćni BMW TwinPower Turbo 8-cilindarski motor pun je elemenata iz trkačkog sporta i dopušta da do četiri putnika nepogrešivo', 'ADRENALIN NA ČETVRTU POTENCIJU', 'Dizajn modela BMW M850i xDrive Gran Coupé definisan je vrhunskim estetskim standardima i inspiriše iz svakog ugla. Ova inspiracija nastavlja se za volanom. Najpre zbog sportskog i luksuznog enterijera koji zadovoljava i najekskluzivnije zahteve. I zatim, zahvaljujući impresivno atletskom karakteru zasnovanom na pogonskom sklopu i komponentama šasije iz trkačkog sporta koje su sposobne za maksimalne performanse i obezbeđuju nivo čistog zadovoljstva u vožnji bez premca.\n', 'INSPIRATIVNA ESTETIKA', 'Uzbudljiv sportski automobil za četvoro ljudi: dizajn modela BMW M850i xDrive Gran Coupé beskompromisno je sportski orijentisan i dinamičan. Čak i kada stoji u mestu, ne ostavlja mesto sumnji u to za kakve je sve performanse sposobno ovo izuzetno vozilo. Opremljen sa četvoro vrata i dugim međuosovinskim rastojanjem, raskošni sportski kupe ima proporcije pravog sportskog automobila i istovremeno nudi izuzetno velikodušnu količinu prostora za sve putnike – u ekskluzivnom ambijentu BMW-a luksuzne klase.\n', ' DOŽIVITE BUDUĆNOST SA SVAKIM KILOMETROM', 'Dok uživate u impresivno sportskom doživljaju vožnje modela BMW M850i xDrive Gran Coupé, imate podršku brojnih inovativnih tehnologija. Personalizovani operativni koncept najnovije generacije sa svestranim opcijama kontrole govorom, gestikulacijom, tačskrinom ili iDrive kontrolerom ubedljivo to demonstrira.\n', 0),
(4, 'serijaX', 'BMW x6 xDrive', '130.000$', 'Opis X6', 'ADRENALIN NA ČETVRTU POTENCIJU', 'Opis', 'ELEGANTAN I SPORTSKI.', 'Opis kolaza', ' Uzbudljivo za gledati.', 'Opis druge sekcije', 0);

-- --------------------------------------------------------

--
-- Table structure for table `motor`
--

CREATE TABLE `motor` (
  `ID` int(11) NOT NULL,
  `nazivModela` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `cilindri` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `zapremina` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `precnik` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `maksimalnaSnaga` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `maksimalniObrtniMoment` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `kompresija` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `motor`
--

INSERT INTO `motor` (`ID`, `nazivModela`, `cilindri`, `zapremina`, `precnik`, `maksimalnaSnaga`, `maksimalniObrtniMoment`, `kompresija`) VALUES
(2, 'M4 440i', '6/6', '4000', '60', '450', '9000', '/'),
(3, 'M8 550i xDrive', '1', '1', '1', '1', '1', '1'),
(4, 'BMW x6 xDrive', '6', '3400', '2222', '567', '8000', '/');

-- --------------------------------------------------------

--
-- Table structure for table `napravisvoj`
--

CREATE TABLE `napravisvoj` (
  `ID` int(11) NOT NULL,
  `nazivModela` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `prvaBoja` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `drugaBoja` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `trecaBoja` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `cetvrtaBoja` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `prvaPresvlaka` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `drugaPresvlaka` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `trecaPresvlaka` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `prveFelne` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `drugeFelne` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `napravisvoj`
--

INSERT INTO `napravisvoj` (`ID`, `nazivModela`, `prvaBoja`, `drugaBoja`, `trecaBoja`, `cetvrtaBoja`, `prvaPresvlaka`, `drugaPresvlaka`, `trecaPresvlaka`, `prveFelne`, `drugeFelne`) VALUES
(2, 'M4 440i', 'slikeModela/napraviSvoj/M4/boje/Boja.png', 'slikeModela/napraviSvoj/M4/boje/DrugaBoja.jpg', 'slikeModela/napraviSvoj/M4/boje/TrecaBoja.jpg', 'slikeModela/napraviSvoj/M4/boje/CetvrtaBoja.png', 'slikeModela/napraviSvoj/M4/enterijer/Presvlake.png', 'slikeModela/napraviSvoj/M4/enterijer/PresvlakeDva.png', 'slikeModela/napraviSvoj/M4/enterijer/PresvlakeTri.png', 'slikeModela/napraviSvoj/M4/felne/Felne.jpg', 'slikeModela/napraviSvoj/M4/felne/FelneDva.png'),
(3, 'M8 550i xDrive', 'slikeModela/napraviSvoj/M8/boje/prvaboja.png', 'slikeModela/napraviSvoj/M8/boje/prvaboja1.jpg', 'slikeModela/napraviSvoj/M8/boje/prvaboja2.jpg', 'slikeModela/napraviSvoj/M8/boje/prvaboja3.jpg', 'slikeModela/napraviSvoj/1329503922presvlake1.png', 'slikeModela/napraviSvoj/1162536743presvlake2.png', 'slikeModela/napraviSvoj/1735610428presvlake3.png', 'slikeModela/napraviSvoj/M8/felne/drugeFelne.png', 'slikeModela/napraviSvoj/M8/felne/drugeFelne1.jpg'),
(4, 'BMW x6 xDrive', 'slikeModela/napraviSvoj/X6/boje/drugaBoja.png', 'slikeModela/napraviSvoj/X6/boje/drugaBoja1.jpg', 'slikeModela/napraviSvoj/X6/boje/drugaBoja2.jpg', 'slikeModela/napraviSvoj/X6/boje/drugaBoja3.jpg', 'slikeModela/napraviSvoj/192974789presvlakeDva.png', 'slikeModela/napraviSvoj/1333686079presvlakeTri.png', 'slikeModela/napraviSvoj/1031532229presvlakePrva.png', 'slikeModela/napraviSvoj/X6/felne/felne.jpg', 'slikeModela/napraviSvoj/X6/felne/felne.png');

-- --------------------------------------------------------

--
-- Table structure for table `performanse`
--

CREATE TABLE `performanse` (
  `ID` int(11) NOT NULL,
  `nazivModela` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `maksimalnaBrzina` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `ubrzavanje` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `performanse`
--

INSERT INTO `performanse` (`ID`, `nazivModela`, `maksimalnaBrzina`, `ubrzavanje`) VALUES
(2, 'M4 440i', '249', '4.5'),
(3, 'M8 550i xDrive', '1', '1'),
(4, 'BMW x6 xDrive', '280', '5');

-- --------------------------------------------------------

--
-- Table structure for table `pneumatici`
--

CREATE TABLE `pneumatici` (
  `ID` int(11) NOT NULL,
  `nazivModela` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `dimenzijePrednjih` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `dimenzijeZadnjih` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `materijalPrednjih` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `materijalZadnjih` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pneumatici`
--

INSERT INTO `pneumatici` (`ID`, `nazivModela`, `dimenzijePrednjih`, `dimenzijeZadnjih`, `materijalPrednjih`, `materijalZadnjih`) VALUES
(2, 'M4 440i', '225/45 R17', '225/45 R17', 'Aluminijum', 'Aluminijum'),
(3, 'M8 550i xDrive', '1', '1', '1', '1'),
(4, 'BMW x6 xDrive', '19', '19', 'Aluminijum', 'Aluminijum');

-- --------------------------------------------------------

--
-- Table structure for table `podacimodela`
--

CREATE TABLE `podacimodela` (
  `ID` int(11) NOT NULL,
  `nazivModela` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `cena` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ulazniVideo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `potrosnjagoriva`
--

CREATE TABLE `potrosnjagoriva` (
  `ID` int(11) NOT NULL,
  `nazivModela` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `potrosnjaGrad` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `potrosnjaOtvoreno` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `kombinovanaPotrosnja` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `emisijaGasova` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `zapreminaRezervoara` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `potrosnjagoriva`
--

INSERT INTO `potrosnjagoriva` (`ID`, `nazivModela`, `potrosnjaGrad`, `potrosnjaOtvoreno`, `kombinovanaPotrosnja`, `emisijaGasova`, `zapreminaRezervoara`) VALUES
(2, 'M4 440i', '12', '7', '9', '140', '60'),
(3, 'M8 550i xDrive', '17', '10', '13', '1', '1'),
(4, 'BMW x6 xDrive', '8', '5', '6', '24', '65');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacije`
--

CREATE TABLE `rezervacije` (
  `ID` int(11) NOT NULL,
  `korisnickoIme` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `nazivModela` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `datumRezervacije` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slikaModela` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `cena` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rezervacije`
--

INSERT INTO `rezervacije` (`ID`, `korisnickoIme`, `nazivModela`, `datumRezervacije`, `slikaModela`, `cena`) VALUES
(7, 'Marina', 'M4 440i', '2021-03-19 22:43:02', '\r\n        slikeModela/napraviSvoj/1013434198prvaBoja.png        ', '90.000$'),
(8, 'Miki', 'M4 440i', '2021-03-25 00:55:48', 'slikeModela/napraviSvoj/M4/boje/DrugaBoja.jpg', '90.000$');

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

CREATE TABLE `slike` (
  `ID` int(11) NOT NULL,
  `nazivModela` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slikaModela` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `glavnaSlika` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slikaPrveSekcijeJedan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slikaPrveSekcijeDva` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slikaPrveSekcijeTri` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slikaPrveSekcijeCetiri` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slikaKolazaJedan` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `slikaKolazaDva` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `slikaKolazaTri` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `skica` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slike`
--

INSERT INTO `slike` (`ID`, `nazivModela`, `slikaModela`, `glavnaSlika`, `slikaPrveSekcijeJedan`, `slikaPrveSekcijeDva`, `slikaPrveSekcijeTri`, `slikaPrveSekcijeCetiri`, `slikaKolazaJedan`, `slikaKolazaDva`, `slikaKolazaTri`, `skica`) VALUES
(2, 'M4 440i', 'slikeModela/listanjeModela/899838763model4.png', 'slikeModela/modeli/227066350glavnaSlika.jpg', 'slikeModela/modeli/795853601prvaSekcija1.png', 'slikeModela/modeli/858823816prvaSekcija2.png', 'slikeModela/modeli/59089902prvaSekcija3.png', 'slikeModela/modeli/1886685143prvaSekcija4.png', 'slikeModela/modeli/438019721kolaz1.jpg', 'slikeModela/modeli/1275069359kolaz2.jpg', 'slikeModela/modeli/246642353kolaz3.jpg', 'slikeModela/modeli/712703647skica.jpg'),
(3, 'M8 550i xDrive', 'slikeModela/listanjeModela/1309633368slikaModela.png', 'slikeModela/modeli/837676962glavnaslika.jpg', 'slikeModela/modeli/1828466056Screenshot_5.png', 'slikeModela/modeli/588107405Screenshot_1.png', 'slikeModela/modeli/1719654018Screenshot_2.png', 'slikeModela/modeli/904960696Screenshot_3.png', 'slikeModela/modeli/42852257koalaz1.jpg', 'slikeModela/modeli/1656767803kolaz2.jpg', 'slikeModela/modeli/116262155kolaz3.jpg', 'slikeModela/modeli/1411975023skica.jpg'),
(4, 'BMW x6 xDrive', 'slikeModela/listanjeModela/1187096407slikaModelaX6.png', 'slikeModela/modeli/171824029bmw-x6-m-inspire-next-page-teaser.jpg', 'slikeModela/modeli/824889132prvaSekcija1.png', 'slikeModela/modeli/1230697504prvaSekcija2.png', 'slikeModela/modeli/366595948prvaSekcija3.png', 'slikeModela/modeli/1290336487prvaSekcija4.png', 'slikeModela/modeli/2110714619kolaz1.jpg', 'slikeModela/modeli/1602137511kolaz2.jpg', 'slikeModela/modeli/700652729kolaz3.jpg', 'slikeModela/modeli/219654933skicax6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tezina`
--

CREATE TABLE `tezina` (
  `ID` int(11) NOT NULL,
  `nazivModela` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `uKilogramima` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `maksimalnaTezina` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `nosivost` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `osovinskoOpterecenje` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tezina`
--

INSERT INTO `tezina` (`ID`, `nazivModela`, `uKilogramima`, `maksimalnaTezina`, `nosivost`, `osovinskoOpterecenje`) VALUES
(2, 'M4 440i', '1600', '2100', '500', '1200'),
(3, 'M8 550i xDrive', '1400', '1700', '300', '1000'),
(4, 'BMW x6 xDrive', '2200', '2500', '500', '1300');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `korisnickoIme` (`korisnickoIme`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `napravisvoj`
--
ALTER TABLE `napravisvoj`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `performanse`
--
ALTER TABLE `performanse`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pneumatici`
--
ALTER TABLE `pneumatici`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `podacimodela`
--
ALTER TABLE `podacimodela`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `potrosnjagoriva`
--
ALTER TABLE `potrosnjagoriva`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rezervacije`
--
ALTER TABLE `rezervacije`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `slike`
--
ALTER TABLE `slike`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tezina`
--
ALTER TABLE `tezina`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `motor`
--
ALTER TABLE `motor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `napravisvoj`
--
ALTER TABLE `napravisvoj`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `performanse`
--
ALTER TABLE `performanse`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pneumatici`
--
ALTER TABLE `pneumatici`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `podacimodela`
--
ALTER TABLE `podacimodela`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `potrosnjagoriva`
--
ALTER TABLE `potrosnjagoriva`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rezervacije`
--
ALTER TABLE `rezervacije`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slike`
--
ALTER TABLE `slike`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tezina`
--
ALTER TABLE `tezina`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
