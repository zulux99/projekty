<!DOCTYPE html>
<html>
<head>
	<title>raport3</title>
   <link rel="stylesheet" type="text/css" href="style.css"> 
   </head>
<body>
   <div class="raport">
      <?php 
require_once "dane_servera.php";
$polaczenie = @new mysqli($adreshostabd, $nazwauserbd, $haslobd, $nazwabd);
               
                if ($polaczenie->connect_errno!=0)
                {
                   exit("<span class='blad'>Error: ".$polaczenie->connect_errno.'</span>');
                    
                }
                else
                {
 $polaczenie->set_charset("utf8");
}

                $sql="SELECT * , COUNT(ns.id_ns) FROM nauczyciel_szkola ns INNER JOIN szkola s on ns.id_szkoly = s.id_szkoly GROUP BY ns.id_szkoly";
                    if ($rezultat = $polaczenie->query($sql)) {
                    	echo "<table border='1'><tr><th>szkoła</th><th>adres miasto</th><th>adres ul</th><th>adres nr</th><th>ilość w nauczycieli</th></tr>";
                    while($row = $rezultat->fetch_assoc()){
                    echo " <tr><td>".$row['nazwa']."</td><td>".$row['adres_m']."</td><td>".$row['adres_ul']."</td><td>".$row['adres_nr']."</td><td>".$row['COUNT(ns.id_ns)']."</td></tr>";
                    }
                    echo "</table>";
                }
                

?>
   </div>
</body>
</html>