<?php
session_start();
    if(isset($_POST['zapisz']))
    {
        $fpu = fopen("pracownik.txt", "w");
        ftruncate($fpu, 0);
        $i = 0;
        $fp = fopen("pracownik.txt", "a");
        if(!empty($_POST['imied'])&&!empty($_POST['nazwiskod'])&&!empty($_POST['adres_md'])&&!empty($_POST['adres_nrd'])&&!empty($_POST['peseld'])&&!empty($_POST['telefond']))
        {
        	$a = 0;
        	$iddod = 1;
          while (isset($_POST['imie'.$a])) {
            $idtablica[$a] = $_POST['id'.$a];
            $a++;
            $iddod = max($idtablica)+1;
          }
         
            fwrite($fp, $iddod ." || ".$_POST['imied']." || ".$_POST['nazwiskod']." || ".$_POST['adres_md']." || ".$_POST['adres_uld']." || ".$_POST['adres_nrd']." || ".$_POST['peseld']." || ".$_POST['telefond']." || "."
"); 


        }
        while(isset($_POST['id'.$i]))
        {
            $file="pracownik.txt";
            $linie = 0;
            if(file_exists("pracownik.txt")&&file_get_contents("pracownik.txt"))
            {
            $handle = fopen($file, "r");
            while(!feof($handle))
            {
              $line = fgets($handle);
              $linie++;
            }
            fclose($handle);
            }
            $idz = $_POST['id'.$i];
            $imiez = $_POST['imie'.$i];
            $nazwiskoz = $_POST['nazwisko'.$i];
            $adres_mz = $_POST['adres_m'.$i];
            $adres_ulz = $_POST['adres_ul'.$i];
            $adres_nrz = $_POST['adres_nr'.$i];
            $peselz = $_POST['pesel'.$i];
            $telefonz = $_POST['telefon'.$i];
            if(!isset($_POST['usun'.$i]))
            {
                fwrite($fp, $idz." || ".$imiez." || ".$nazwiskoz." || ".$adres_mz." || ".$adres_ulz." || ".$adres_nrz." || ".$peselz." || ".$telefonz." || "."
");
            }

            $i++;
        }
        fclose($fp);
    }
?>
<!doctype html>
<html>
<head>
  <title>Pracownik</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="index.php">
        <input type="submit" name="menu" value="MENU" class="przycisk">
    </form>
    <h1>PRACOWNIK</h1>
    <form method="POST">
        <input type="submit" name="zapisz" value="ZAPISZ" class="przycisk">
        <?php
        
        $plik = "pracownik.txt";
        if (!file_exists($plik)) {
$fpt = fopen("pracownik.txt", "a");
fclose($fpt);
        }
        $dane = file($plik); 
        for($i=0;$i<count($dane);$i++)
        {
         list($id[$i],$imie[$i], $nazwisko[$i], $adres_m[$i], $adres_ul[$i], $adres_nr[$i], $pesel[$i], $telefon[$i]) = explode(" || ", $dane[$i]); 

     } 
     ?>
     <div class="srodek">
     <?php
     echo "<table>";

     ?>
     <tr>
        <td class="tabela"><b>Imię</b></td>
        <td class="tabela"><b>Nazwisko</b></td>
        <td class="tabela"><b>Miasto</b></td>
        <td class="tabela"><b>Ulica</b></td>
        <td class="tabela"><b>Numer domu</b></td>
        <td class="tabela"><b>Pesel</b></td>
        <td class="tabela"><b>Telefon</b></td>
        <td class="tabela"><b>Usuń</b></td>
        <tr>
        	<td><input type='text' class='tabela' value='' name='imied' placeholder='Dodaj imię'></td>
    <td><input type='text' class='tabela' value='' name='nazwiskod' placeholder='Dodaj nazwisko'></td>
    <td><input type='text' class='tabela' value='' name='adres_md' placeholder='Dodaj miasto'></td>
    <td><input type='text' class='tabela' value='' name='adres_uld' placeholder='Dodaj ulica'></td>
    <td><input type='text' class='tabela' value=''  name='adres_nrd' placeholder='Dodaj numer domu'></td>
    <td><input type='text' class='tabela' value='' name='peseld' placeholder='Dodaj pesel'></td>
    <td><input type='text' class='tabela' value='' name='telefond' placeholder='Dodaj telefon'></td>
    <td></td>
    </tr>
    <?php
    if(file_exists("pracownik.txt")&&file_get_contents("pracownik.txt"))
    {
        for($i=0;$i<count($id);$i++)
        {
          echo 
          "<tr><td><input type='hidden' class='tabela' value='$id[$i]' name='id$i'><input type='text' class='tabela' value='$imie[$i]' name='imie$i'></td>
          <td><input type='text' class='tabela' value='$nazwisko[$i]' name='nazwisko$i'></td>
          <td><input type='text' class='tabela' value='$adres_m[$i]' name='adres_m$i'></td>
          <td><input type='text' class='tabela' value='$adres_ul[$i]' name='adres_ul$i'></td>
          <td><input type='text' class='tabela' value='$adres_nr[$i]' name='adres_nr$i'></td>
          <td><input type='text' class='tabela' value='$pesel[$i]' name='pesel$i'></td>
          <td><input type='text' class='tabela' value='$telefon[$i]' name='telefon$i'></td>
          <td><input type='checkbox' name='usun$i'></td>".
          "</tr>";

      }
  }
  echo "</table>";
  echo "</div>";
  ?>
</form>
</body>
</html>
