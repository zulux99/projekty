<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
<form method="POST">
	<input type="number" name="liczba1" placeholder="Pierwsza liczba"><br/><br/>
	<input type="number" name="liczba2" placeholder="Druga liczba"><br/><br/>
	<input type="text" name="znak" placeholder="Znak"><br/><br/>
	<input type="submit" name="wyslij" value="Wynik"><br/><br/>
	<?php
	if(!empty($_POST['liczba1']) && !empty($_POST['liczba2']) && !empty($_POST['znak']) && isset($_POST['wyslij']))
	{
		$liczba1 = $_POST['liczba1'];
		$liczba2 = $_POST['liczba2'];
		$znak = $_POST['znak'];
		if($znak == "/")
			$wynik = $liczba1/$liczba2;
		if($znak == "*")
			$wynik = $liczba1*$liczba2;
		if($znak == "+")
			$wynik = $liczba1+$liczba2;
		if($znak == "-")
			$wynik = $liczba1-$liczba2;
		echo $wynik;
	}
	?>
</form>
</body>
</html>