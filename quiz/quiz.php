
<!doctype html>

<html>
<head>
	<title>Quiz</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">



	<?php 
	session_start();
	error_reporting(false);
	$nplik =  "stolice.txt";

	if (!file_exists($nplik)) {
		echo "Brak pliku";
		exit();
	}
	$dane = file($nplik); 
	for($i=0;$i<count($dane);$i++)
	{
		list($plik[$i]['id'],$plik[$i]['nazwa'], $plik[$i]['stolica'], $plik[$i]['zdj']) = explode(" || ", $dane[$i]); 
	} 
	if (!isset($_SESSION['licznik'])) {
		$_SESSION['licznik']=0;
	}
	if (!isset($_SESSION['punkty'])) {
		$_SESSION['punkty']=0;
	}
	if ($_SESSION['licznik']=='9') {
		header('Location: wynik.php');
	}
	if (isset($_POST['stolica'])) {

		if ($_POST['stolica']==$plik[$_SESSION['licznik']]['stolica']) {
			$_SESSION['punkty']=$_SESSION['punkty']+1;
			$wyswietl = true;
		}
		else
			$wyswietl = false;
		$_SESSION['licznik']=$_SESSION['licznik']+1;
	}


	?>

</head>

<body>
	<div class="tytul">
		<h1>Quiz o stolicach państw</h1>
	</div><br/>
	<div class="pytanie">
		<h2><i>Stolicą <?php echo $plik[$_SESSION['licznik']]['nazwa']; ?> jest:</i></h2>
		<img src="Flagi/<?php echo $plik[$_SESSION['licznik']]['zdj']; ?>">			  <ul id="countdown">
			<li><span class="seconds" id="licznik">15</span>
			</li>
		</ul>
	</div>
	<div class="odpowiedz">
		<?php 
		if (isset($_POST['stolica'])) {
		if($wyswietl)
			echo '<a style="color: green;">Prawidłowa odpowiedź</a><br/>';
		else
			echo '<a style="color: red;">Zła odpowiedź</a><br/>';
	}
		?>
	</div><br/>
	<div class="glowna">
		<form method="post" id="formularz">
			<br/><input class="tekst" id="stolica" type="text" name="stolica" placeholder="Stolica"><br/><br/>

			<input class="przycisk" id="next" type="submit" name="next" value="Następne"><br/>
		</form>

		<script>

			function test() {

				document.getElementById("formularz").submit();
				console.log('abc');
			}
			var res = document.getElementById('licznik'),
			i = 15;

			(function countDown(i)
			{
				setInterval(function()
				{
					if (i >= 1)
					{
						document.getElementById("licznik").innerHTML = i;
						i--;
						countDown(i);
					}
				}, 1000);

			}(i));
			setTimeout('test()', 15000);

		</script>

	</body>
	</html>