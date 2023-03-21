<?php
require("connect.php");
?>
<!doctype html>
<html>
   <head>
      <title>Ilość nauczycieli pracujących w danej szkole</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="style.css">
   </head>
   <body>
      <div class="a"><a href="index.php"><input type="submit" name="menu" value="MENU" class="przycisk"></a></div>
      <div class="raport">
         <?php
      $polecenie = $connect->query("SELECT * , COUNT(ns.id_ns) FROM nauczyciel_szkola ns INNER JOIN szkola s on ns.id_szkoly = s.id_szkoly GROUP BY ns.id_szkoly");
      echo "<table><tr>
      <td><b>Szkoła</b></td>
      <td><b>Ilość nauczycieli</b></td>
      </tr>";
      while($row = $polecenie->fetch_assoc()){
         echo " <tr><td>".$row['nazwa']."</td><td>".$row['COUNT(ns.id_ns)']."</td></tr>";           
      }
      echo "</table>";
      ?>
      </div>
   </body>
</html>