<!DOCTYPE html>
<html>
<head>
	<title></title>
<meta charset="utf-8">
</head>
<body>
<form method="POST">
	<input type="text" name="A" size="10" required><br/><br/>
	<input type="text" name="B" size="10" required><br/><br/>
	<input type="text" name="C" size="10" required><br/><br/>
	<input type="submit" name="wyslij" value="Oblicz równanie kwadratowe"><br/><br/>
	<?php
	if(isset($_POST['wyslij']) && is_numeric($_POST['A']) && is_numeric($_POST['B']) && is_numeric($_POST['C']))
	{
	$a = $_POST['A'];
	$b = $_POST['B'];
	$c = $_POST['C'];
	$delta = pow($b, 2) - (4 * $a * $c);
	echo "delta = ".$delta."<br/>";
	if($delta == 0)
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
	else
		echo "Wpisz liczby";
	?>
</form>
</body>
</html>