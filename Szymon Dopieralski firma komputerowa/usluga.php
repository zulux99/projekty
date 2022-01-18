<?php
$plik_u = 'usluga.txt';
$plik_k =  "kontrahent.txt";
$plik_p =  "pracownik.txt";
if(isset($_POST['zapisz']))
{
    $fpu = fopen( $plik_u , "w");
        ftruncate($fpu, 0);
        $i = 0;
        $fp = fopen( $plik_u , "a");
        if(!empty($_POST['nazwad'])&&!empty($_POST['cenad'])&&isset($_POST['id_pracownikd'])&&isset($_POST['id_kontrahentad']))
        {
          $a = 0;
          $iddod = 1;
          while (isset($_POST['id'.$a])) {
            $idtablica[$a] = $_POST['id'.$a];
            $a++;
            $iddod = max($idtablica)+1;
          }
         
            fwrite($fp, $iddod ." || ".$_POST['nazwad']." || ".$_POST['cenad']." || ".$_POST['id_kontrahentad']." || ".$_POST['id_pracownikd']." || "."
"); 

        }
        while(isset($_POST['id'.$i]))
        {
            $linie = 0;
            if(file_exists( $plik_u )&&file_get_contents( $plik_u ))
            {
            $handle = fopen($plik_u, "r");
            while(!feof($handle))
            {
              $line = fgets($handle);
              $linie++;
            }
            fclose($handle);
            }
            $idz = $_POST['id'.$i];
            $nazwaz = $_POST['nazwa'.$i];
            $cenaz = $_POST['cena'.$i];
            $id_kontrahentaz = $_POST['id_kontrahenta'.$i];
            $id_pracownikaz = $_POST['id_pracownika'.$i];
            if(!isset($_POST['usun'.$i]))
            {
                fwrite($fp, $idz." || ".$nazwaz." || ".$cenaz." || ".$id_kontrahentaz." || ".$id_pracownikaz." || "."
");
            }

            $i++;
        }
        fclose($fp);
   }

if (!file_exists($plik_p)) {
$fpt = fopen( $plik_p , "a");
fclose($fpt);

        }
        $dane_p = file($plik_p); 
        for($i=0;$i<count($dane_p);$i++)
        {
         list($idp[$i],$imiep[$i], $nazwiskop[$i], $adres_mp[$i], $adres_ulp[$i], $adres_nrp[$i], $peselp[$i], $telefonp[$i]) = explode(" || ", $dane_p[$i]); 

     }
      $pracownikop="";
if(file_exists( $plik_p )&&file_get_contents( $plik_p ))
    {
        
        for($i=0;$i<count($idp);$i++)
        {
            $pracownikop = $pracownikop."<option value='".$idp[$i]."'>".$imiep[$i]." ".$nazwiskop[$i]."</option> ";
        }
}
if (!file_exists($plik_k)) {
$fpt = fopen( $plik_k , "a");
fclose($fpt);

        }
        $dane_k = file($plik_k); 
        for($i=0;$i<count($dane_k);$i++)
        {
         list($id_k[$i],$imiek[$i], $nazwiskok[$i], $adres_mk[$i], $adres_ulk[$i], $adres_nrk[$i], $peselk[$i], $telefonk[$i]) = explode(" || ", $dane_k[$i]); 

     }
      $kontrahentop="";
if(file_exists( $plik_k )&&file_get_contents( $plik_k ))
    {
        
        for($i=0;$i<count($id_k);$i++)
        {
            $kontrahentop = $kontrahentop."<option value='".$id_k[$i]."'>".$imiek[$i]." ".$nazwiskok[$i]."</option> ";
        }
}

?>
<!doctype html>
<html>
    <head>
        <title>Usługa</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <form action="index.php">
            <input type="submit" name="menu" value="MENU" class="przycisk">
        </form>
        <h1>USŁUGA</h1>
    <form method="POST">
        <input type="submit" name="zapisz" value="ZAPISZ" class="przycisk">
        <?php
         
        if (!file_exists($plik_u)) {
$fpt = fopen( $plik_u , "a");
fclose($fpt);
        }
        $dane_u = file($plik_u); 
        for($i=0;$i<count($dane_u);$i++)
        {
         list($id_u[$i],$nazwa[$i], $cena[$i], $id_kontrahenta[$i], $id_pracownika[$i]) = explode(" || ", $dane_u[$i]); 

     } 
     ?>
     <div class="srodek">
     <?php
     echo "<table>";

     ?>
     <tr>
        <td class="tabela"><b>Nazwa</b></td>
        <td class="tabela"><b>Cena</b></td>
        <td class="tabela"><b>Pracownik</b></td>
        <td class="tabela"><b>Kontrahent</b></td>
        <td class="tabela"><b>Usuń</b></td>
        <tr>
          <td><input type='text' class='tabela' value='' name='nazwad' placeholder='Dodaj nazwa'></td>
          <td><input type='text' class='tabela' value='' name='cenad' placeholder='Dodaj cena'></td>
    <td><select name='id_pracownikd'  ><option selected disabled hidden>Pracownik</option><?php echo $pracownikop; ?></select></td>
    <td><select name='id_kontrahentad'  ><option selected disabled hidden>kontrahent</option><?php echo  $kontrahentop ; ?></select></td>
    <td></td>
    </tr>
    <?php
    if(file_exists( $plik_u )&&file_get_contents( $plik_u ))
    {
        for($i=0;$i<count($id_u);$i++)
        {
          echo 
          "<tr>
          <td><input type='text' class='tabela' value='$nazwa[$i]' name='nazwa$i'></td>
          <td><input type='hidden' class='tabela' value='$id_u[$i]' name='id$i'><input type='text' class='tabela' value='$cena[$i]' name='cena$i'></td>
          <td><select name='id_pracownika$i' id='id_pracownika$i'  >".  $pracownikop ." </select><script> 
          document.getElementById('id_pracownika$i').value = ".$id_pracownika[$i]." </script>  </td>
          <td><select name='id_kontrahenta$i' id='id_kontrahenta$i'  >".  $kontrahentop ." </select><script> 
          document.getElementById('id_kontrahenta$i').value = ".$id_kontrahenta[$i]." </script></td>
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