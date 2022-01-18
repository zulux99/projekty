<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Rzut oszczepem</title>
	<link rel="stylesheet" type="text/css" href="styl_oszczep.css">
</head>
<body>
<div class="baner">
	<h1>Klub sportowy: rzut oszczepem</h1>
</div>
<div class="glowny">
	<h1>Nasz rekord: 
	<?php 
	$poloczenie = new mysqli('localhost','root','','sportowcy');
	$sql="SELECT MAX(wynik) FROM wyniki WHERE dyscyplina_id = '3'";
	$rezultat = $poloczenie->query($sql);
	while ($row=$rezultat->fetch_assoc()) {
		echo $row['MAX(wynik)']."m";
	}
echo "</h1>";
$sql="SELECT COUNT(id) FROM sportowiec";
	$rezultat = $poloczenie->query($sql);
	while ($row=$rezultat->fetch_assoc()) {
		$licznik=$row['COUNT(id)'];
	}
	$i=1;
	echo "<table>";
$wynik=0;
while ($i <= $licznik) {
	$sql="SELECT imie, nazwisko FROM sportowiec WHERE id = '".$i."'";
	$rezultat = $poloczenie->query($sql);
	while ($row=$rezultat->fetch_assoc()) {
		$sqla="SELECT AVG(wynik) FROM wyniki WHERE dyscyplina_id = '3' AND sportowiec_id = '".$i."'";
	$rezultata = $poloczenie->query($sqla);
	while ($rowa=$rezultata->fetch_assoc()) {
		$wynik=$rowa['AVG(wynik)'];
	}
		if ($i%2) {
			echo "<tr><td><h3>".$row['imie']." ".$row['nazwisko']. "</h3><p>średni wynik: ".$wynik."</p></td>";
			
		}else{
			echo "<td><h3>".$row['imie']." ".$row['nazwisko']. "</h3><p>średni wynik: ".$wynik."</p></td></tr>";
			
		}
		
	}
	$i++;
}

	$poloczenie->close();
	 ?>
	</table>
</div>
<div class="stopka">
	<p>Klub sportowy</p>
	Stronę opracował: PESEL
</div>
</body>
</html>