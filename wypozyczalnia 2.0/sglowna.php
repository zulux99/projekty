<?php 
session_start();
if (!isset($_SESSION['log'])) {
	header("Location: index.php");
}
require("connect.php");

 ?>
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
if(!isset($_SESSION['sesja']) || (isset($_SESSION['sesja']) && @$_SESSION['sesja'] != @$_POST['sesja'])){
    @$_SESSION['sesja'] = @$_POST['sesja'];
    if (isset($_POST['kaseta'])&&isset($_POST['wypozycz'])) {
    	if (is_numeric( $_POST['kaseta'])) {
    		$kaseta = test_input($_POST['kaseta']);
    		
	                	
		                		$sql="INSERT INTO `uzytkownik_kaseta` (`id_uk`, `id_uzytkownika`, `id_kasety`, `data_wypozyczenia`, `data_oddania`) VALUES (NULL, '".$_SESSION['id_uzytkownika']."', '".$kaseta."', CURDATE() , NULL)";
		                    if ($rezultat = $connect->query($sql)) {
		                   echo "Ok";
		                		}else{
		                			echo "zle";
		                		}
	                	}
                    
                
    	
    }
    if (isset($_POST['oddaj'])) {
    	if (is_numeric( $_POST['id_uk'])) {
    		$id_uk = test_input($_POST['id_uk']);
    		
	                	
		                		$sql="UPDATE `uzytkownik_kaseta` SET `data_oddania` = CURDATE() WHERE `uzytkownik_kaseta`.`id_uk` = ".$id_uk;echo $sql;
		                    if ($rezultat = $connect->query($sql)) {
		                  		$odane="kaseta odana";
		                		}else{
		                			$odane="cos poszło nie tak";	
		                		}
	                	}
                    
                
    }
}


if ($_SESSION['admin']=='1'): ?>
	

	<form action="admin.php" class="text-center mt-3">
	<input type="submit" name="admin" value="Panel admina" class="btn btn-danger">
	</form>
	<?php endif ?>
<div class="container text-center">

	<a  class="btn btn-dark mt-3" name="wyloguj" href="logout.php" >Wyloguj</a>
	
<form method="POST">
	<input type="hidden" name="sesja" value="<?php echo rand(); ?>">
	<select name="kaseta" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center mt-3">

			<?php 
                $sql="SELECT * FROM `kaseta` WHERE `ilosc` != '0'";
                    if ($rezultat = $connect->query($sql)) {
                    while($row = $rezultat->fetch_assoc()){
                echo "<option value='".$row['id_kasety']."'>".$row['nazwa_filmu']." </option>";
                    }
                }
                ?>
	</select>

		<input type="submit" name="wypozycz" class="btn btn-dark mt-3" value="Wypożycz kasetę">
		<h2 class="mt-4">Filmy aktualnie wypożyczone:</h2>
		<?php 
		echo @$odane;
                $sql="SELECT * FROM uzytkownik_kaseta uk JOIN uzytkownik u INNER JOIN kaseta k WHERE uk.id_uzytkownika=u.id_uzytkownika && uk.id_kasety = k.id_kasety && uk.data_oddania IS NULL && u.id_uzytkownika = ".$_SESSION['id_uzytkownika'];
                    if ($rezultat = $connect->query($sql)) {
                    while($row = $rezultat->fetch_assoc()){
               echo $row['nazwa_filmu']." ".$row['data_wypozyczenia'].'<form method="post" ><input type="hidden" name="sesja" value="'.rand().'"><input type="hidden" name="id_uk" value="'.$row['id_uk'].'"><input type="submit" name="oddaj" value="oddaj"></form>';
                    }
                }
                ?>
		<h2 class="mt-5"><b>Raporty</b></h2>
		<div class="mt-4">
		<h4>Ilość wypożyczonych kaset: <?php 
                $sql="SELECT * FROM uzytkownik_kaseta uk INNER JOIN uzytkownik u INNER JOIN kaseta k INNER JOIN gatunek g INNER JOIN rezyser r WHERE uk.id_uzytkownika=u.id_uzytkownika && uk.id_kasety = k.id_kasety && g.id_gatunku = k.gatunek && r.id_rezysera = k.rezyser && u.id_uzytkownika = ".$_SESSION['id_uzytkownika'];
           
                    if ($rezultat = $connect->query($sql)) {
                    	$raportilosc=0;
                    	$raportjakie="";
                    	$raportokres=0;
                    while($row = $rezultat->fetch_assoc()){
             			
             			if ($row['data_oddania']==NULL) {
             				$raportilosc++;
             			}
             			$raportjakie = $raportjakie."<tr><td> ".$row['nazwa_filmu']."</td><td> ".$row['data_wypozyczenia']."</td><td> ".$row['data_oddania']."</td></tr>";
             			if ($row['data_oddania']!='') {
             				$data_wypozyczenia =$row['data_wypozyczenia'];
             				$data_oddania =$row['data_oddania'];
             				$dni =  (strtotime($data_oddania) - strtotime($data_wypozyczenia)) / (60*60*24);
             				$raportokres=$raportokres+$dni;
             			}
             			if (isset($gatunek[$row['id_gatunku']])) {
             				$gatunek[$row['id_gatunku']]['ilosc']++;
             			}else{
             				$gatunek[$row['id_gatunku']]['nazwa']=$row['nazwa'];
             				$gatunek[$row['id_gatunku']]['ilosc']=1;

             			}
             			if (isset($rezyser[$row['id_rezysera']])) {
             				$rezyser[$row['id_rezysera']]['ilosc']++;
             			}else{
             				$rezyser[$row['id_rezysera']]['imie']=$row['imie'];
             				$rezyser[$row['id_rezysera']]['nazwisko']=$row['nazwisko'];
             				$rezyser[$row['id_rezysera']]['ilosc']=1;

             			}
                    }
                    echo @$raportilosc;
                }
                ?></h4>
		<h4>Wypożyczone filmy:</h4><table class="table"><tr class="table-info"><td>Nazwa</td><td>data_wypozyczenia</td><td>data_oddania</td></tr> <?php 
               echo @$raportjakie;
                ?></table>
		<h4>Na ile dni wypożyczone:<?php echo @$raportokres; ?></h4>
		<h4>Najchętniej wypożyczany gatunek: <?php
		$najwieksze="";
		$iloscmax=0;
        if(!empty($gatunek))
        {
		 foreach ($gatunek as $key => $value) {
		 	if ($value['ilosc']>$iloscmax) {
		 		$iloscmax=$value['ilosc'];
		 		$najwieksze=$value['nazwa'];
		 	}elseif ($value['ilosc']==$iloscmax) {
		 		$najwieksze=$najwieksze." lub ".$value['nazwa'];
		 	}
		} echo $najwieksze;}else{echo "Brak";}?></h4>
		<h4>Reżyser, którego filmy najchętniej wypożyczasz: <?php 
		$najwieksze="";
		$iloscmax=0;
        if(!empty($rezyser))
        {
		 foreach ($rezyser as $key => $value) {
		 	if ($value['ilosc']>$iloscmax) {
		 		$iloscmax=$value['ilosc'];
		 		$najwieksze=$value['imie']." ".$value['nazwisko'];
		 	}elseif ($value['ilosc']==$iloscmax) {
		 		$najwieksze=$najwieksze." lub ".$value['imie']." ".$value['nazwisko'];
		 	}
		} echo $najwieksze;}else{echo "Brak";}?></h4>
	</div>
</div>

</body>
</html>