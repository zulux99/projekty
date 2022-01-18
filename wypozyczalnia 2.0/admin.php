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
	<?php 
	session_start();
	if (!isset($_SESSION['log'])) {
	header("Location: index.php");
}
if ($_SESSION['admin']!='1') {
	header("Location: sglowna.php");
}
require("connect.php");
	  if(!isset($_SESSION['sesja']) || (isset($_SESSION['sesja']) && @$_SESSION['sesja'] != @$_POST['sesja'])){
    @$_SESSION['sesja'] = @$_POST['sesja'];
   	if (isset($_POST['gatunek']) && isset($_POST['nazwa'])) {
   		$ok=true;
   		$blad ='';
   		if (!is_numeric( $_POST['gatunek'])) {
   			$blad = 'coś poszło nie tak w gatunku';
   			$ok = false;
   			echo "zle";
			}
		if (empty($_POST['nazwa'])) {
			$blad = $blad.'Brak nazwy';
   			$ok = false;
		}

			if ($ok && @$_POST['gatunek']=="0") {
				$nazwa = test_input($_POST['nazwa']);

				$sql="INSERT INTO `gatunek` (`id_gatunku`, `nazwa`) VALUES (NULL, '".$nazwa."')";


				if ($rezultat = $connect->query($sql)) {
					$blad = $blad.'Udało się ';
				}else
				{
				$blad = $blad. 'sprobuj ponownie :(';
				}
			}
			if (($ok && @$_POST['gatunek']!="0") && isset($_POST['zapisz']) ) {
				$gatunek = test_input($_POST['gatunek']);
				$nazwa = test_input($_POST['nazwa']);

				$sql="UPDATE `gatunek` SET `nazwa` = '".$nazwa."' WHERE `gatunek`.`id_gatunku` = ".$gatunek;


				if ($rezultat = $connect->query($sql)) {
					$blad = $blad.'Udało się ';
				}else
				{
				$blad = $blad. 'sprobuj ponownie :(';
				}
			}elseif (($ok && @$_POST['gatunek']!="0") && isset($_POST['usun']) ) {
				$gatunek = test_input($_POST['gatunek']);

				$sql="DELETE FROM `gatunek` WHERE `gatunek`.`id_gatunku` = ".$gatunek;


				if ($rezultat = $connect->query($sql)) {
					$blad = $blad.'Udało się ';
				}else
				{
				$blad = $blad. 'sprobuj ponownie :(';
				}
			}
   	}
   	//
   	if (isset($_POST['rezyser']) && ( isset($_POST['imie']) && isset($_POST['nazwisko']))) {
   		$ok=true;
   		$bladrezyser ='';
   		if (!is_numeric( $_POST['rezyser'])) {
   			$bladrezyser = $bladrezyser.'coś poszło nie tak w rezyser';
   			$ok = false;
			}
		if (empty($_POST['imie'])) {
			$bladrezyser = $bladrezyser.'Brak imie';
   			$ok = false;
		}
		if (empty($_POST['nazwisko'])) {
			$bladrezyser = $bladrezyser.'Brak nazwisko';
   			$ok = false;
		}

			if ($ok && @$_POST['rezyser']=="0") {
				$imie = test_input($_POST['imie']);
				$nazwisko = test_input($_POST['nazwisko']);

				$sql="INSERT INTO `rezyser` (`id_rezysera`, `imie`, `nazwisko`) VALUES (NULL, '".$imie."', '".$nazwisko."')";


				if ($rezultat = $connect->query($sql)) {
					$bladrezyser = $bladrezyser.'Udało się ';
				}else
				{
				$bladrezyser = $bladrezyser. 'sprobuj ponownie :(';
				}
			}
			if (($ok && @$_POST['rezyser']!="0") && isset($_POST['zapisz']) ) {
				$rezyser = test_input($_POST['rezyser']);
				$imie = test_input($_POST['imie']);
				$nazwisko = test_input($_POST['nazwisko']);

				$sql="UPDATE `rezyser` SET `imie` = '".$imie."', `nazwisko` = '".$nazwisko."' WHERE `rezyser`.`id_rezysera` = ".$rezyser;

				if ($rezultat = $connect->query($sql)) {
					$bladrezyser = $bladrezyser.'Udało się ';
				}else
				{
				$bladrezyser = $bladrezyser. 'sprobuj ponownie :(';
				}
			}elseif (($ok && @$_POST['rezyser']!="0") && isset($_POST['usun']) ) {
				$gatunek = test_input($_POST['rezyser']);

				$sql="DELETE FROM `rezyser` WHERE `rezyser`.`id_rezysera` = ".$gatunek;


				if ($rezultat = $connect->query($sql)) {
					$bladrezyser = $bladrezyser.'Udało się ';
				}else
				{
				$bladrezyser = $bladrezyser. 'sprobuj ponownie :(';
				}
			}
   	}
   	//
   		if (isset($_POST['kaseta']) && isset($_POST['nazwafilmu'])) {
   		$ok=true;
   		$bladkaseta ='';
   		if (!is_numeric( $_POST['kaseta'])) {
   			$bladkaseta = $bladkaseta. 'coś poszło nie tak w kaseta ';
   			$ok = false;
			}
			if (empty($_POST['gatunek'])) {
				$bladkaseta = $bladkaseta. 'Brak wybranego gatunku ';
   				$ok = false;
			}elseif(!is_numeric($_POST['gatunek'])) {
   			$bladkaseta = $bladkaseta. 'coś poszło nie tak w gatunku ';
   			$ok = false;
			}
			if (empty($_POST['rezyser'])) {
				$bladkaseta = $bladkaseta. 'Brak wybranego rezysera ';
   				$ok = false;
			}elseif (!is_numeric( $_POST['rezyser'])) {
   			$bladkaseta = $bladkaseta.'coś poszło nie tak w rezyser ';
   			$ok = false;
			}
			if (!is_numeric( $_POST['ilosc'])) {
   			$bladkaseta = $bladkaseta.'Ilość nie jest liczbą ';
   			$ok = false;
			}
			if (empty($_POST['nazwafilmu'])) {
				$bladkaseta = $bladkaseta.'brak nazwy filmu';
   			$ok = false;
			}

		if (empty($_POST['nazwafilmu'])) {
			$bladkaseta = $bladkaseta.'Brak nazwy filmu ';
   			$ok = false;
		}

			if ($ok && @$_POST['kaseta']=="0") {
				$nazwafilmu = test_input($_POST['nazwafilmu']);
				$gatunek = test_input($_POST['gatunek']);
				$rezyser = test_input($_POST['rezyser']);
				$ilosc = test_input($_POST['ilosc']);

				$sql="INSERT INTO `kaseta` (`id_kasety`, `nazwa_filmu`, `gatunek`, `rezyser`, `ilosc`) VALUES (NULL, '".$nazwafilmu."', '".$gatunek."', '".$rezyser."', '".$ilosc."')";


				if ($rezultat = $connect->query($sql)) {
					$bladkaseta = $bladkaseta.'Udało się ';
				}else
				{
				$bladkaseta = $bladkaseta. 'sprobuj ponownie :(';
				}
			}
			if (($ok && @$_POST['kaseta']!="0") && isset($_POST['zapisz']) ) {
				$kaseta = test_input($_POST['kaseta']);
				$nazwafilmu = test_input($_POST['nazwafilmu']);
				$gatunek = test_input($_POST['gatunek']);
				$rezyser = test_input($_POST['rezyser']);
				$ilosc = test_input($_POST['ilosc']);

				$sql="UPDATE `kaseta` SET `nazwa_filmu` = '".$nazwafilmu."', `gatunek` = '".$gatunek."', `rezyser` = '".$rezyser."', `ilosc` = '".$ilosc."' WHERE `kaseta`.`id_kasety` = ".$kaseta;

				if ($rezultat = $connect->query($sql)) {
					$bladkaseta = $bladkaseta.'Udało się ';
				}else
				{
				$bladkaseta = $bladkaseta. 'sprobuj ponownie :(';
				}
			}elseif (($ok && @$_POST['gatunek']!="0") && isset($_POST['usun']) ) {
				$kaseta = test_input($_POST['kaseta']);
				$sql="DELETE FROM `kaseta` WHERE `kaseta`.`id_kasety` = ".$kaseta;
				if ($rezultat = $connect->query($sql)) {
					$bladkaseta = $bladkaseta.'Udało się ';
				}else
				{
				$bladkaseta = $bladkaseta. 'sprobuj ponownie :(';
				}
			}
   	}
   }
	 ?>

<div class="container text-center">
	<form action="index.php">
	<input type="submit" value="Strona główna" class="btn btn-dark mt-3">
	<a   class="btn btn-dark mt-3" name="wyloguj" href="logout.php" >Wyloguj</a>
	</form>
<h1>Panel Admina</h1>
<form method="POST">
	<input type="hidden" name="sesja" value="<?php echo rand(); ?>">
	<select name="gatunek" id="gatunek" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center mt-3 mb-3" onchange="osagatunek()">
		<option selected value="0" data-nazwa="" >Dodaj gatunek</option>

			<?php 
			$gatunek ="";
                $sql="SELECT * FROM `gatunek`";
                    if ($rezultat = $connect->query($sql)) {
                    while($row = $rezultat->fetch_assoc()){
                $gatunek = $gatunek. "<option data-nazwa='".$row['nazwa']."' value='".$row['id_gatunku']."'>".$row['nazwa']."</option>";
                    }
                }
                echo $gatunek;
                ?>
		</option>
	</select>
	<input type="text" placeholder="Nazwa gatunku" id="nazwa" name="nazwa" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center mt-1">
	<?php echo @$blad; ?>
	<input type="submit" name="zapisz" value="Zapisz gatunek" class="btn btn-dark mt-3">
	<input type="submit" name="usun" value="Usuń gatunek" class="btn btn-dark mt-3">
</form><form method="POST"><input type="hidden" name="sesja" value="<?php echo rand(); ?>">
	<select name="kaseta" id="kaseta" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center  mt-3 mb-3" onchange="osakaseta()">
		<option selected data-nazwafilmu='' data-gatunek='0' data-rezyser='0' data-ilosc=''   value="0">Dodaj kaseta</option>
			
			<?php 
                $sql="SELECT * FROM `kaseta`";
                    if ($rezultat = $connect->query($sql)) {
                    while($row = $rezultat->fetch_assoc()){
                echo "<option data-nazwafilmu='".$row['nazwa_filmu']."' data-gatunek='".$row['gatunek']."' data-rezyser='".$row['rezyser']."' data-ilosc='".$row['ilosc']."'  value='".$row['id_kasety']."'>".$row['nazwa_filmu']." </option>";
                    }
                }
                ?>
	</select>
	<input type="text" placeholder="Tytuł filmu" name="nazwafilmu" id="nazwafilmu" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center mt-1">
	<select name="gatunek" id="gatunekkaseta" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center mt-3">
		<option selected disabled hidden value="0">Gatunek</option>
			<?php echo $gatunek; ?>
		</option>
	</select>
	<select name="rezyser" id="rezyserkaseta" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center mt-3" >
		<option selected  value="0" >Reżyser</option>
			<?php 
			$rezyser ="";
                $sql="SELECT * FROM `rezyser`";
                    if ($rezultat = $connect->query($sql)) {
                    while($row = $rezultat->fetch_assoc()){
                $rezyser = $rezyser. "<option data-imie='".$row['imie']."' data-nazwisko='".$row['nazwisko']."' value='".$row['id_rezysera']."'>".$row['imie']." ".$row['nazwisko']."</option>";
                    }
                }
                echo $rezyser;
                ?>
		</option>
	<input type="number" id="ilosc" name="ilosc" placeholder="Ilość kaset" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center mt-3">
	</select>
	<?php echo @$bladkaseta; ?>
	<input type="submit" name="zapisz" value="Zapisz kasetę" class="btn btn-dark mt-3">
	<input type="submit" name="usun" value="Usuń kasetę" class="btn btn-dark mt-3">
	</form><form method="POST"><input type="hidden" name="sesja" value="<?php echo rand(); ?>">
	<select name="rezyser" id="rezyser" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center mt-3" onchange="osarezyser()">
		<option selected  data-imie='' data-nazwisko='' value="0">Dodaj rezyser</option>
			<?php echo $rezyser; ?>
		</option>
	</select>
	<input type="text" name="imie" id="imie" placeholder="Imię" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center mt-3">
	<input type="text" name="nazwisko" id="nazwisko" placeholder="Nazwisko" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center mt-3">
	<?php echo @$bladrezyser ?>
	<input type="submit" name="zapisz" value="Zapisz reżysera" class="btn btn-dark mt-3">
	<input type="submit" name="usun" value="Usuń reżysera" class="btn btn-dark mt-3">
</form>
</div>
<script type="text/javascript">
	function osagatunek(){
  var namelist = document.getElementById('gatunek');
var option = namelist.options[namelist.selectedIndex];
  document.getElementById('nazwa').value = option.dataset.nazwa;

}
function osakaseta(){
  var namelist = document.getElementById('kaseta');
var option = namelist.options[namelist.selectedIndex];
  document.getElementById('nazwafilmu').value = option.dataset.nazwafilmu;
  document.getElementById('gatunekkaseta').value = option.dataset.gatunek;
    document.getElementById('rezyserkaseta').value = option.dataset.rezyser;
      document.getElementById('ilosc').value = option.dataset.ilosc;

}
function osarezyser(){
  var namelist = document.getElementById('rezyser');
var option = namelist.options[namelist.selectedIndex];
  document.getElementById('imie').value = option.dataset.imie;
  document.getElementById('nazwisko').value = option.dataset.nazwisko;

}

</script>
</body>
</html>