<?php
require("connect.php");
?>
<!doctype html>
<html>
	<head>
		<title>Ilość uczniów w danej klasie</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
   <body>
      <div class="a"><a href="index.php"><input type="submit" name="menu" value="MENU" class="przycisk"></a></div>
      <div class="raport">
      <?php
      $polecenie = $connect->query("SELECT k.nazwa , COUNT(uk.id_uk) FROM uczen_klasa uk INNER JOIN uczen u on uk.id_ucznia = u.id_ucznia LEFT JOIN klasa k ON uk.id_klasy = k.id_klasy GROUP BY uk.id_klasy");
      echo "<table><tr>
      <td><b>Klasa</b></td>
      <td><b>Ilość uczniów</b></td>
      </tr>";
      while($row = $polecenie->fetch_assoc()){
         echo " <tr><td>".$row['nazwa']."</td><td>".$row['COUNT(uk.id_uk)']."</td></tr>";           
      }
      echo "</table>";
      ?>
      </div>
	</body>
</html>