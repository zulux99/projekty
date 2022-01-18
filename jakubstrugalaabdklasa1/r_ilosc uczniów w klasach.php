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


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>raport1</title>
</head>
<body>
<?php 
                $sql="SELECT k.nazwa , COUNT(uk.id_uk) FROM uczen_klasa uk INNER JOIN uczen u on uk.id_ucznia = u.id_ucznia LEFT JOIN klasa k ON uk.id_klasy = k.id_klasy GROUP BY uk.id_klasy";
                    if ($rezultat = $polaczenie->query($sql)) {
                    	echo "<table border='1'>";
                    while($row = $rezultat->fetch_assoc()){
                    
               print_r($row);
                    }
                    echo "</table>";
                }
                

?>
</body>
</html>
 