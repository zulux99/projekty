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
	<title>raport4</title>
   <link rel="stylesheet" type="text/css" href="style.css"> 
   </head>
<body><form method="post">
      <select id="uczen" name="uczen"  class="uczen"  onchange="osa()">
         <option selected disabled hidden>uczen do edycji/usunięcia</option>
          <option value="dodaj" data-imie='' data-nazwisko='' data-adres_m='' data-telefon='' >Dodaj uczen</option>
              <?php 
                $sql="SELECT * FROM `uczen`";
                    if ($rezultat = $polaczenie->query($sql)) {
                    while($row = $rezultat->fetch_assoc()){
                    
                echo "<option value='".$row['id_ucznia']."'>".$row['imie'].' - '.$row['nazwisko'].' - '.$row['adres_m']."</option>";
                    }
                }
                ?>
      </select>
<input type="submit" name="wysli">
  </form>
   <div class="raport">
      <?php 
if (isset($_POST['wysli'])) {
   if (isset($_POST['uczen'])) {
      
   

                $sql="SELECT * FROM uczen_klasa uk INNER JOIN uczen u on uk.id_ucznia = u.id_ucznia LEFT JOIN klasa k ON uk.id_klasy = k.id_klasy WHERE u.id_ucznia = ".$_POST['uczen'];
                    if ($rezultat = $polaczenie->query($sql)) {
                    	
                    while($row = $rezultat->fetch_assoc()){
                        echo "<br>".$row['nazwa']."<br>";
                   $sql2="SELECT * FROM zapisani_do_klasy zk INNER JOIN nauczyciel n on zk.id_nauczyciela = n.id_nauczyciela LEFT JOIN klasa k ON zk.id_klasy = k.id_klasy WHERE k.id_klasy = ".$row['id_klasy'];
                    if ($rezultat2 = $polaczenie->query($sql2)) {
                        echo "<table border='1'><tr><th>imie</th><th>nazwisko</th><th>adres miasto</th></tr>";
                    while($row2 = $rezultat2->fetch_assoc()){
                   echo " <tr><td>".$row2['imie']."</td><td>".$row2['nazwisko']."</td><td>".$row2['adres_m']."</td></tr>";

                   }
                   echo "</table>";
}


                    }
                }
         }else{
            echo "wybierz ucznia";
         }       
}
?>
   </div>
</body>
</html>