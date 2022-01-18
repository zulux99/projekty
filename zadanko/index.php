<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Clicker</title>
</head>
<body>
<form method="POST">
	<input type="submit" name="zwieksz">
</form>
	<?php
			$file = fopen("plik.txt", "r");
			$i = fgets($file, 4096);
			fclose($file);
		if(isset($_POST['zwieksz']))
		{
			$i++;
			$file = fopen("plik.txt", "w");
			fwrite($file, $i);
			fclose($file);
		}
			echo $i;
	?>
</body>
</html>