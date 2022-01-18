<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<link rel="stylesheet" type="text/css" href="style.css">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<title>Wypożyczalnia kaset</title>
</head>
<body>
	<div class="text-center">
		<h1>Logowanie</h1>
	<form method="POST">
		<input type="text" name="login" placeholder="Login" required class="form-control col-10 col-sm-8 col-md-6 col-xl-4 m-auto text-center mt-3">
		<input type="password" name="haslo" placeholder="Hasło" required class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center mt-3">
		<input type="submit" name="wyslij" value="Zaloguj się" class="btn btn-dark mt-3">
	</form>
	</div>
<?php
require("connect.php");
session_start();
if (isset($_SESSION['log'])) {
	header("Location: sglowna.php");
}
	
	if (isset($_POST['wyslij']))
	{
		$llogin = $_POST['login'];
		$llogin = mysqli_real_escape_string($connect,$llogin);
		$lhaslo = $_POST['haslo'];
		$lhaslo = mysqli_real_escape_string($connect,$lhaslo);
		$sqll="SELECT * FROM `uzytkownik` WHERE `login`= '".$llogin."' OR `email`= '".$llogin."';";
		if ($rezultat = $connect->query($sqll)) 
		{
			$row = $rezultat->fetch_assoc();
			if (password_verify($lhaslo, $row['haslo']))
			{
				$_SESSION['log'] = true;
				$_SESSION['id_uzytkownika'] = $row['id_uzytkownika'];
				$_SESSION['login'] = $row['login'];
				$_SESSION['admin'] = $row['admin'];
				header("Location: sglowna.php");
			}
			else
			{
				session_destroy();
				echo 'Zły login lub hasło';
			}
		}
		else
		{
			echo 'Zły login lub hasło';
		}
	}
?>
</body>
</html>