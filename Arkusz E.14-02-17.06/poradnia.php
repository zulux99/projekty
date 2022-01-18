<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Poradnia</title>
	<link rel="stylesheet" type="text/css" href="poradnia.css">
</head>
<body>
<div class="baner"><h1>PORADNIA SPECJALISTYCZNA</h1></div>
<div class="lewy">	
<h3>LEKARZE SPECJALIŚCI</h3>
<table border="1">
	<tr><td colspan="2">Poniedziałek</td>
	<tr><td>Anna Kowalska</td>
		<td>otolaryngolog</td></tr>
	<tr><td colspan="2">Wtorek</td>
	<tr><td>Jan Nowak</td>
		<td>Kardiolog</td></tr>
</table>
<h3>LISTA PACJENTÓW</h3>
<?php
$serwer='localhost';
	$user='root';
	$haslo='';
	$baza='przychodnia_abd';
	$polaczenie = new mysqli($serwer,$user,$haslo,$baza);
	$polaczenie->query("SET NAMES 'utf8'");
	$sql="SELECT id, imie, nazwisko, choroba FROM pacjenci";
		 if ($rezultat = $polaczenie->query($sql)) {
                    while($row = $rezultat->fetch_assoc()){
                echo $row['id'].". ".$row['imie']." ".$row['nazwisko']." ".$row['choroba']."<br>";
                    }
                }
	$polaczenie->close();
?>
<br/><br/>
<form action="pacjent.php" method="POST">
	Podaj id:<br/>
	<input type="number" name="id"><br/>
	<input type="submit" value="Pokaż szczegóły" name="wyslij">
</form>
</div>
<div class="prawy">
	<h2>KARTA PACJENTA</h2>
	<p>Nie wybrano pacjenta</p>
</div>
<div class="stopka">
 	<p>utworzone przez: nas</p>
 	<a href="kwerendy.txt">Kwerendy do pobrania</a>
</div>
</body>
</html>