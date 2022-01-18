
<!doctype html>

<html>
<head>
	<title>Wyniki</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
	<div class="pkt">
		<?php 
		session_start();
		error_reporting(false);
		$t=time();
		$datad = date("Y-m-d",$t);
		$plik = "ranking.txt";
		echo "Twój wynik to: ";
		if (isset($_SESSION['punkty'])) {
			echo $_SESSION['punkty'];
			unset($_SESSION['licznik']);
			}
			if (isset($_POST['zapis'])) {
			
 if(!isset($_SESSION['sesja']) || (isset($_SESSION['sesja']) && $_SESSION['sesja'] != $_POST['sesja'])){
    $_SESSION['sesja'] = $_POST['sesja'];
				if (!empty($_POST['nazwa'])) {
					if (isset($_SESSION['punkty'])) {
						$punkty = $_SESSION['punkty'];
						if ($punkty!=0) {
							$fp = fopen( $plik , "a");
							fwrite($fp, time() ." || ".$_POST['nazwa']." || ".$punkty." || ".$datad." || "."
"); 
	header('Location: index.php');


						}else{
							echo "zero";
						}
					}

				}else{
					echo "brak nazwy";
				}
			}
		}
		?></div>
		<form method="post" action="index.php">
			<br/><input class="przycisk" type="submit" name="powrot" value="Zacznij od nowa"><br/><br/>

		</form>
		<form method="post">
		<?php	
if (!empty($_SESSION['punkty'])) {
		echo '<input class="przycisk" type="submit" name="zapis"><br/><br/>';
			}

			$dane = file($plik);
			for($i=0;$i<count($dane);$i++)
			{
				list($abc[$i]['id_uczestnika'], $abc[$i]['nickname'], $abc[$i]['wynik'], $abc[$i]['data']) = explode(" || ", $dane[$i]);
			}
			echo "<table>";
			?><tr><td><b>Nickname</b></td>
				<td><b>Wynik</b></td>
				<td><b>Data</b></td>

			</tr>
	<?php
	if (!empty($_SESSION['punkty'])) {
			
	echo '<tr>

				<td><input class="inpucik" type="text" name="nazwa"></td>
				<td>'. @$_SESSION['punkty'].'</td>
				<td><b>'.$datad.'</b></td>

			</tr>';
			}		

			
			function  porownaj_czas($a, $b)
 {
   if($a['wynik']==$b['wynik'] )
      return 0;
   else if ($a['wynik']<$b['wynik'])
      return 1;
   else
      return -1;
 }
 usort($abc, 'porownaj_czas');
			for($i=0;$i<@count($abc);$i++)
			{
				echo "<tr>".
				"<td>".$abc[$i]['nickname']."</td>".
				"<td>".$abc[$i]['wynik']."</td>".
				"<td>".$abc[$i]['data']."</td>".

				"</tr>";

			}
			echo "</table>";

			?>
		<input type="hidden" name="sesja" value="<?php echo rand(); ?>" /></form>
		</body>
		</html>