<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Salon pielęgnacji</title>
	<link rel="stylesheet" type="text/css" href="salon.css">
</head>
<body>
<div class="baner">
	<h1>SALON PIELĘGNACJI PSÓW I KOTÓW</h1>
</div>
<div class="lewy">
	<h3>SALON ZAPRASZA W DNIACH</h3>
	<ul>
		<li>Poniedziałek, 12:00 - 18:00</li>
		<li>Wtorek, 12:00 - 18:00</li>
	</ul>
	<a href="pies.png"><img src="pies-mini.png"></a>
	<p>Umów się telefonicznie na wizytę lub po prostu przyjdź!</p>
</div>
<div class="srodkowy">
	<h3>PRZYPOMNIENIE O NASTĘPNEJ WIZYCIE</h3>
	<?php
		$serwer='localhost';
		$user='root';
		$haslo='';
		$baza='salon';
		$connect = new mysqli($serwer,$user,$haslo,$baza);
		$sql = $connect->query("SELECT imie, rodzaj, nastepna_wizyta, telefon FROM zwierzeta WHERE nastepna_wizyta");
		while($row = mysqli_fetch_assoc($sql))
		{
			if($row['rodzaj'] == "1")
				echo "Pies :".$row['imie']."<br/>";
			if($row['rodzaj'] == "2")
				echo "Kot :".$row['imie']."<br/>";
			echo "Data następnej wizyty: ".$row['nastepna_wizyta'].", telefon właściciela: ".$row['telefon']."<br/>";
		}
	?>
</div>
<div class="prawy">
	<h3>USŁUGI</h3>
	<?php
		$sql = $connect->query("SELECT nazwa, cena FROM uslugi");
		while($row = mysqli_fetch_assoc($sql))
		{
				echo $row['nazwa'].", ".$row['cena']."<br/>";
		}
		$connect->close();
	?>
</div>
</body>
</html>