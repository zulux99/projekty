<!DOCTYPE html>
<html>
<head>
    <title>Pracownicy</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
        table
        {
            width: 666px;
            background-color: white;
            margin: 0;
        }
        td
        {
            padding: 5px;
            width: 222px;
            border: 0;
            border-bottom: 1px solid black;
        }
    </style>
</head>
<body>
    <form action="index.php">
        <input type="submit" name="menu" value="MENU" class="przycisk">
    </form>
<h1>Pracownicy</h1>
<?php 
$plik_u = 'usluga.txt';
$plik_k =  "pracownik.txt";
if (!file_exists($plik_u)) {
$fpt = fopen( $plik_u , "a");
fclose($fpt);
        }
        $dane_u = file($plik_u);
        $raport1[0]=0;
        $id_k = 0; 
        for($i=0;$i<count($dane_u);$i++)
        {
         list($id_u[$i],$nazwa[$i],$cena[$i], $id_kontrahenta[$i], $id_pracownika[$i]) = explode(" || ", $dane_u[$i]); 
         $id_k = $id_pracownika[$i];
         if (!isset($raport1[$id_k])) {
             $raport1[$id_k]= 0;
         }
         $raport1[$id_k] = $raport1[$id_k]+$cena[$i];
     } 




        $dane_k = file($plik_k);
        for($i=0;$i<count($dane_k);$i++)
        {
         list($id_k[$i],$imiek[$i], $nazwiskok[$i], $adres_mk[$i], $adres_ulk[$i], $adres_nrk[$i], $peselk[$i], $telefonk[$i]) = explode(" || ", $dane_k[$i]); 
$id=$id_k[$i];
if (isset($raport1[$id])) {
    ?>
    <div style="width: 666px; margin: auto;">
    <?php
    echo "<table>";
    echo "<tr><td>".$imiek[$i]."</td><td>". $nazwiskok[$i].'</td><td>'. $raport1[$id].' zł </td></tr> ';
    echo "</table>";
    ?>
    <div style="width: 666px; margin: auto;">
    <?php
}
     }











 ?>
 </body>
</html>