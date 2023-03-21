<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form method="POST">
	<input type="text" name="test" hidden>
	<input type="number" name="liczba1" placeholder="Pierwsza liczba"><br/>
	<input type="number" name="liczba2" placeholder="Druga liczba"><br/>
	<input type="submit" name="dodaj" value="+">
	<input type="submit" name="odejmij" value="-">
	<input type="submit" name="pomnoz" value="*">
	<input type="submit" name="podziel" value="/">
	<input type="submit" name="poteguj" value="^">
	<input type="submit" name="pierwiastkuj" value="√"><br/><br/>
	</form>
	<form method="POST">
	Funkcja kwadratowa<br/>
	<input type="number" name="a" placeholder="a"><br/>
	<input type="number" name="b" placeholder="b"><br/>
	<input type="number" name="c" placeholder="c"><br/>
	<input type="submit" name="oblicz" value="Oblicz">
	</form>
<?php
	@$liczba1 = $_POST['liczba1'];
	@$liczba2 = $_POST['liczba2'];
	if(isset($_POST['dodaj']) && !empty($_POST['liczba1']) && !empty($_POST['liczba2']))
		$wynik = $liczba1 + $liczba2;
	if(isset($_POST['odejmij']) && !empty($_POST['liczba1']) && !empty($_POST['liczba2']))
		$wynik = $liczba1 - $liczba2;
	if(isset($_POST['pomnoz']) && !empty($_POST['liczba1']) && !empty($_POST['liczba2']))
		$wynik = $liczba1 * $liczba2;
	if(isset($_POST['podziel']) && !empty($_POST['liczba1']) && !empty($_POST['liczba2']))
		$wynik = $liczba1 / $liczba2;
	if(isset($_POST['poteguj']) && !empty($_POST['liczba1']) && !empty($_POST['liczba2']))
		$wynik = pow($liczba1,$liczba2);
	if(isset($_POST['pierwiastkuj']) && !empty($_POST['liczba1']) && !empty($_POST['liczba2']) && $_POST['liczba1'] > 0 && $_POST['liczba2'] > 0)
		$wynik = pow($liczba1,1/$liczba2);
	if(isset($_POST['oblicz']) && is_numeric($_POST['a']) && is_numeric($_POST['b']) && is_numeric($_POST['c']))
	{
	$a = $_POST['a'];
	$b = $_POST['b'];
	$c = $_POST['c'];
	$delta = pow($b, 2) - (4 * $a * $c);
	echo "delta = ".$delta."<br/>";
	if($delta == 0 && $a != 0)
	{
		$x1 = (-$b - sqrt($delta)) / (2 * $a);
		echo "x = ".$x1."<br/>";
	}
	if($delta > 0)
	{
	$x1 = (-$b - sqrt($delta)) / (2 * $a);
	$x2 = (-$b + sqrt($delta)) / (2 * $a);
	echo "x1 = ".$x1."<br/>";
	echo "x2 = ".$x2;
	}
	if($delta < 0)
		echo "Delta mniejsza od zera";
	}
	if(isset($_POST['test']))
	echo "Wynik: ".@$wynik;
?>
</body>
</html>