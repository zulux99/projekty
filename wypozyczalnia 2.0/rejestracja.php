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
		<h1>Rejestracja</h1>
	<form method="POST">
		<input type="hidden" name="sesja" value="<?php echo rand(); ?>">
		<input type="text" name="rlogin" placeholder="Login" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center mt-3">
		<input type="email" name="remail" placeholder="Email" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center mt-3">
		<input type="password" name="rhaslo" placeholder="Haslo" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center mt-3">
		<input type="password" name="rhaslop" placeholder="Haslo" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center mt-3">
		<input type="checkbox" name="rregulamin1" class="form-check ml-auto mr-auto mt-3" id="reg"><label for="reg">regulamin</label><br>
		<input type="submit" name="rrejestracja" value="Zarejestruj się" class="btn btn-dark mt-3">
	</form>
</div>
<div class="text-center">
<?php
session_start();
if (isset($_SESSION['log'])) {
	header("Location: sglowna.php");
}
require("connect.php");
	
if (isset($_POST['rrejestracja'])||isset($_POST['llogowanie'])) {
			  if(!isset($_SESSION['sesja']) || (isset($_SESSION['sesja']) && $_SESSION['sesja'] != $_POST['sesja'])){
    $_SESSION['sesja'] = $_POST['sesja'];
					

					if (isset($_POST['rrejestracja'])) {
					$ok = true;

					if (empty($_POST['rlogin'])) {
						$ok =false;
   					echo 'Wprowadz login1.';

					}else{
						$rlogin=$_POST['rlogin'];
						if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $rlogin)) {
   					echo 'Niedozwolone znaki w logine:/[\'^£$%&*()}{@#~?><>,|=_+¬-]/';
						}else{
							if (!(strlen($rlogin)>3 &&  strlen($rlogin)<15)) {
   					echo 'Login musi mieć od 3 do 15 znaków.';
							}else{
								$rlogin = mysqli_real_escape_string($connect,$rlogin);
								$sql="SELECT login FROM `konto` WHERE `login`='".$rlogin."'";
								if ($rezultat = $connect->query($sql)) {
									$ilosc =$rezultat->num_rows;
		                    if ($ilosc>=1) {
   					echo 'Login już użyty.';
						$ok =false;
		                   
		                }}
							}
						}
					}
				
					if (empty($_POST['remail'])) {
					$ok =false;
   					$_SESSION['b_reje']['email']='Wprowadz adres e-mail.';
					}else{
						@$remail=$_POST['remail'];
						if (!filter_var($remail, FILTER_VALIDATE_EMAIL)) {
						$ok =false;
   					$_SESSION['b_reje']['email']='Wprowadz prawidłowy e-mail.';
						}else{
							$remail = mysqli_real_escape_string($connect,$remail);
								$sql="SELECT email FROM `konto` WHERE `email`='".$remail."'";
								if ($rezultat = $connect->query($sql)) {
									$ilosc =$rezultat->num_rows;
		                    if ($ilosc>=1) {
   					echo 'Email już użyty.';
						$ok =false;
		                   
		                }}
						}
					}

					if(!empty($_POST["rhaslo"]) && ($_POST["rhaslo"] == $_POST["rhaslop"])) {
    $haslo = test_input($_POST["rhaslo"]);
    $haslop = test_input($_POST["rhaslop"]);
    if (strlen($_POST["rhaslo"]) < 5) {
       echo "Haslo musi mieć 6 znaków.";
        $ok =false;
    }
    elseif(!preg_match("#[0-9]+#",$haslo)) {
       echo "Twoje hasło musi posiadać jedną cyfrę";
        $ok =false;
    }
    elseif(!preg_match("#[A-Z]+#",$haslo)) {
       echo "Twoje hasło musi posiadać jedną DUŻĄ literę";
        $ok =false;
    }
    elseif(!preg_match("#[a-z]+#",$haslo)) {
       echo "Twoje hasło musi posiadać jedną małą literę";
        $ok =false;
    }
}
elseif(!empty($_POST["rhaslo"])) {
   echo "hasła nie są takie same.";
    $ok =false;
} else {
   					$_SESSION['b_reje']['haslo']='Wprowadz hasło.';
   					$ok =false;
}



					if (empty($_POST['rregulamin1'])) {
		   					echo 'Musisz zakceptować regulamin.';
		   					$ok =false;
					}

					if ($ok) {
						$haslo = password_hash($_POST['rhaslo'], PASSWORD_DEFAULT);
						if (isset($_POST['rregulaminnews'])) {
							$zgoda_news=1;
						}else{
							$zgoda_news=0;
						}		
								$sql="INSERT INTO `uzytkownik` (`id_uzytkownika`, `login`, `haslo`, `email`, `admin`, `imie`, `nazwisko`) VALUES (NULL, '".$_POST['rlogin']."', '".$haslo."', '".$remail."', '0', 'imie', 'nazwisko');";
								
								
		                    if ($rezultat = $connect->query($sql)) {
		                	header("Location: logowanie.php");
		                }else
		                {
		                	echo 'sprobuj ponownie :(';
		                }


							}	
							}
						}
					}
					$connect->close();
?></div>
</body>
</html>