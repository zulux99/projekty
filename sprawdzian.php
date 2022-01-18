<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Komis</title>
</head>
<body>
	<form method="POST">
		<input type="text" name="producent"><br/><br/>
		<input type="text" name="model"><br/><br/>
		<input type="submit" name="wyslij" value="Wstaw"><br/><br/>
		<input type="submit" name="wyswietl" value="Wyświetl"><br/><br/>
	</form>
	<?php
	$serwer = "localhost";
	$user = "root";
	$haslo = "";
	$baza = "komis";
	$connect = new mysqli($serwer,$user,$haslo,$baza);
	if(isset($_POST['wyslij']) && !empty($_POST['producent']) && !empty($_POST['model']))
	{
		$sql = "INSERT INTO `telefony` (`id_telefonu`, `producent`, `model`) VALUES (NULL, '".$_POST['producent']."', '".$_POST['model']."')";
		$connect->query($sql);
	}
	if(isset($_POST['wyswietl']))
	{
		$sql1 = $connect->query("SELECT * FROM telefony");
		while($row = mysqli_fetch_assoc($sql1))
		{
			echo $row['producent']." ".$row['model']."<br/>";
		}
	}
	$connect->close();
	?>
</body>
</html>