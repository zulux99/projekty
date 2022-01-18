
<!DOCTYPE html>
<html>
<head>
	<title>raport1</title>
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

                $sql="SELECT * , k.nazwa as knazwa,s.nazwa as snazwa , COUNT(id_klasy) FROM klasa k JOIN szkola s WHERE k.idszkoly = s.id_szkoly GROUP BY idszkoly";
                    if ($rezultat = $polaczenie->query($sql)) {
                    	echo "<table border='1'><tr><th>szkoła</th><th>adres miasto</th><th>ilość  klas</th></tr>";
                    while($row = $rezultat->fetch_assoc()){
                    echo " <tr><td>".$row['snazwa']."</td><td>".$row['adres_m']."</td><td>".$row['COUNT(id_klasy)']."</td></tr>";           
                    }
                    echo "</table>";
                }
                

?>
   </div>
</body>
</html>