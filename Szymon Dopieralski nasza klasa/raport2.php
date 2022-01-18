<?php
require("connect.php");
?>
<!doctype html>
<html>
   <head>
      <title>Ilość klas w danej szkole</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="style.css">
   </head>
   <body>
      <div class="a"><a href="index.php"><input type="submit" name="menu" value="MENU" class="przycisk"></a></div>
      <div class="raport">
         <?php
      $polecenie = $connect->query("SELECT * , k.nazwa as knazwa,s.nazwa as snazwa , COUNT(id_klasy) FROM klasa k JOIN szkola s WHERE k.id_szkoly = s.id_szkoly GROUP BY k.id_szkoly");
      echo "<table><tr>
      <td><b>Szkoła</b></td>
      <td><b>Ilość klas</b></td>
      </tr>";
      while($row = $polecenie->fetch_assoc()){
         echo " <tr><td>".$row['snazwa']."</td><td>".$row['COUNT(id_klasy)']."</td></tr>";           
      }
      echo "</table>";
      ?>
      </div>
   </body>
</html>