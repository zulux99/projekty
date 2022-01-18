<!DOCTYPE html>
<?php 
session_start();
require("login.php");
?>
<html>
<head>
	<title>Logowanie</title>
	<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="initial-scale=1">
</head>
<body>
	<h1>Logowanie</h1>
	<form method="POST">
		<input type="text" name="login" placeholder="Login"><br/>
		<input type="password" name="password" placeholder="Hasło"><br/>
        <div class="przycisk">
		<input type="submit" name="zaloguj" value="Zaloguj">
		</div>
	</form>
</body>
</html>