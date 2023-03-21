<?php
require ("connect.php");
?>
<!doctype html>
<html>

<head>
  <title>Panel</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <div class="a"><a href="index.php"><input type="submit" name="menu" value="MENU" class="przycisk"></a></div>
  <form method="POST"><br/>
   <div class="glowny">
    <div class="form">
     Klasa<br/>
     <select name="klasa" id="klasa">
        <option selected disabled hidden>Klasa</option>
        <?php
        $klasa = $connect->query("SELECT * , k.nazwa as knazwa,s.nazwa as snazwa FROM klasa k JOIN szkola s WHERE k.id_szkoly = s.id_szkoly");
        while ($row = $klasa->fetch_assoc())
        {
         echo '<option data-id_szkoly="'.$row['id_szkoly'].'" data-klasa_nazwa="'.$row['knazwa'].'" data-klasa_rocznik="'.$row['rocznik'].'" value="'.$row['id_klasy'].'">'.$row['knazwa'].' - '.$row['rocznik'].'</option>';
     }  
     ?>
 </select><br/>
 <input type="text" name="klasa_nazwa" placeholder="Nazwa" id="klasa_nazwa"><br/>
 <input type="text" name="klasa_rocznik" placeholder="Rocznik" id="klasa_rocznik" maxlength="4"><br/>
 <select name="szkola_obcy" id="szkola_obcy">
  <option selected disabled hidden>Szkoła</option>
  <?php
  $szkola = $connect->query("SELECT * FROM szkola ORDER BY nazwa");
  while ($row = $szkola->fetch_assoc())
  {
   echo '<option value="'.$row['id_szkoly'].'">'.$row['nazwa'].'</option>';
}  
?>
</select><br/>
</div>
<div class="form">
 Nauczyciel<br/>
 <select name="nauczyciel" id="nauczyciel">
  <option selected disabled hidden>Nauczyciel</option>
  <?php
  $nauczyciel = $connect->query("SELECT * FROM nauczyciel ORDER BY nazwisko");
  while ($row = $nauczyciel->fetch_assoc())
  {
   echo '<option data-nauczyciel_imie="'.$row['imie'].'" data-nauczyciel_nazwisko="'.$row['nazwisko'].'" data-nauczyciel_adres_m="'.$row['adres_m'].'" data-nauczyciel_telefon="'.$row['telefon'].'" data-nauczyciel_przedmiot="'.$row['przedmiot'].'" value="'.$row['id_nauczyciela'].'">'.$row['imie'].' '.$row['nazwisko'].'</option>';
}  
?>
</select><br/>
<input type="text" name="nauczyciel_imie" placeholder="Imię" id="nauczyciel_imie"><br/>
<input type="text" name="nauczyciel_nazwisko" placeholder="Nazwisko" id="nauczyciel_nazwisko"><br/>
<input type="text" name="nauczyciel_adres_m" placeholder="Miejscowość" id="nauczyciel_adres_m"><br/>
<input type="text" name="nauczyciel_telefon" placeholder="Telefon" id="nauczyciel_telefon" maxlength="9"><br/>
<input type="text" name="nauczyciel_przedmiot" placeholder="Przedmiot" id="nauczyciel_przedmiot"><br/>
</div>
<div class="form">
 Szkoła<br/>
 <select name="szkola" id="szkola">
  <option selected disabled hidden>Szkoła</option>
  <?php
  $szkola = $connect->query("SELECT * FROM szkola ORDER BY nazwa");
  while ($row = $szkola->fetch_assoc())
  {
   echo '<option data-szkola_nazwa="'.$row['nazwa'].'" data-szkola_adres_m="'.$row['adres_m'].'" data-szkola_adres_ul="'.$row['adres_ul'].'" data-szkola_adres_nr="'.$row['adres_nr'].'" value="'.$row['id_szkoly'].'">'.$row['nazwa'].' - '.$row['adres_m'].'</option>';
}  
?>
</select><br/>
<input type="text" name="szkola_nazwa" placeholder="Nazwa" id="szkola_nazwa"><br/>
<input type="text" name="szkola_adres_m" placeholder="Miejscowość" id="szkola_adres_m"><br/>
<input type="text" name="szkola_adres_ul" placeholder="Ulica" id="szkola_adres_ul"><br/>
<input type="text" name="szkola_adres_nr" placeholder="Numer" id="szkola_adres_nr">
</div>
<div class="form">
 Uczeń<br/>
 <select name="uczen" id="uczen">
  <option selected disabled hidden>Uczeń</option>
  <?php
  $uczen = $connect->query("SELECT * FROM uczen ORDER BY nazwisko");
  while ($row = $uczen->fetch_assoc())
  {
   echo '<option data-uczen_imie="'.$row['imie'].'" data-uczen_nazwisko="'.$row['nazwisko'].'" data-uczen_adres_m="'.$row['adres_m'].'" data-uczen_telefon="'.$row['telefon'].'" value="'.$row['id_ucznia'].'">'.$row['imie'].' '.$row['nazwisko'].' - '.$row['adres_m'].'</option>';
}  
?>
</select><br/>
<input type="text" name="uczen_imie" placeholder="Imię" id="uczen_imie"><br/>
<input type="text" name="uczen_nazwisko" placeholder="Nazwisko" id="uczen_nazwisko"><br/>
<input type="text" name="uczen_adres_m" placeholder="Miejscowość" id="uczen_adres_m"><br/>
<input type="text" name="uczen_telefon" placeholder="Telefon" id="uczen_telefon" maxlength="9">
</div>
<div class="form">
 Nauczyciel - Szkoła<br/>
 <select name="nauczyciel_szkola_nauczyciel" id="nauczyciel_szkola_nauczyciel">
    <option selected disabled hidden>Nauczyciel</option>
    <?php
    $nauczyciel = $connect->query("SELECT * FROM nauczyciel ORDER BY nazwisko");
    while ($row = $nauczyciel->fetch_assoc())
    {
     echo '<option value="'.$row['id_nauczyciela'].'">'.$row['imie'].' '.$row['nazwisko'].'</option>';
 }  
 ?>
</select><br/>
<select name="nauczyciel_szkola_szkola" id="nauczyciel_szkola_szkola">
    <option selected disabled hidden>Szkoła</option>
    <?php
    $szkola = $connect->query("SELECT * FROM szkola ORDER BY nazwa");
    while ($row = $szkola->fetch_assoc())
    {
     echo '<option value="'.$row['id_szkoly'].'">'.$row['nazwa'].' - '.$row['adres_m'].'</option>';
 }  
 ?>
</select>
</div>
<div class="form">
 Uczeń - Klasa<br/>
 <select name="uczen_klasa_uczen" id="uczen_klasa_uczen">
    <option selected disabled hidden>Uczeń</option>
    <?php
    $uczen = $connect->query("SELECT * FROM uczen ORDER BY nazwisko");
    while ($row = $uczen->fetch_assoc())
    {
      echo '<option value="'.$row['id_ucznia'].'">'.$row['imie'].' '.$row['nazwisko'].' - '.$row['adres_m'].'</option>';
  }  
  ?>
</select><br/>
<select name="uczen_klasa_klasa" id="uczen_klasa_klasa">
    <option selected disabled hidden>Klasa</option>
    <?php
    $klasa = $connect->query("SELECT * FROM klasa ORDER BY nazwa");
    while ($row = $klasa->fetch_assoc())
    {
      echo '<option value="'.$row['id_klasy'].'">'.$row['nazwa'].' - '.$row['rocznik'].'</option>';
  }  
  ?>
</select>
</div>
<div class="form">
 Nauczyciel - Klasa<br/>
 <select name="nauczyciel_klasa_nauczyciel" id="nauczyciel_klasa_nauczyciel">
    <option selected disabled hidden>Nauczyciel</option>
    <?php
    $nauczyciel = $connect->query("SELECT * FROM nauczyciel ORDER BY nazwisko");
    while ($row = $nauczyciel->fetch_assoc())
    {
      echo '<option value="'.$row['id_nauczyciela'].'">'.$row['imie'].' '.$row['nazwisko'].'</option>';
  }  
  ?>
</select><br/>
<select name="nauczyciel_klasa_klasa" id="nauczyciel_klasa_klasa">
    <option selected disabled hidden>Klasa</option>
    <?php
    $klasa = $connect->query("SELECT * FROM klasa ORDER BY nazwa");
    while ($row = $klasa->fetch_assoc())
    {
      echo '<option value="'.$row['id_klasy'].'">'.$row['nazwa'].' - '.$row['rocznik'].'</option>';
  }  
  ?>
</select>
</div>
<div class="usun3">
 Połączenia<br/>
 <select name="nauczyciel_szkola" id="nauczyciel_szkola">
    <option selected disabled hidden>Nauczyciel - Szkoła</option>
    <?php
    $nauczyciel_szkola = $connect->query("SELECT * FROM nauczyciel_szkola n INNER JOIN nauczyciel p ON n.id_nauczyciela = p.id_nauczyciela LEFT JOIN szkola s ON n.id_szkoly = s.id_szkoly ORDER BY nazwa");
    while ($row = $nauczyciel_szkola->fetch_assoc())
    {
     echo '<option value="'.$row['id_ns'].'">'.$row['imie'].' '.$row['nazwisko'].' - '.$row['nazwa'].'</option>';
 }  
 ?>
</select><br/>
<select name="uczen_klasa" id="uczen_klasa">
    <option selected disabled hidden>Uczeń - Klasa</option>
    <?php
    $uczen_klasa = $connect->query("SELECT * FROM uczen_klasa p INNER JOIN uczen u ON p.id_ucznia = u.id_ucznia LEFT JOIN klasa k ON p.id_klasy = k.id_klasy ORDER BY nazwa");
    while ($row = $uczen_klasa->fetch_assoc())
    {
     echo '<option value="'.$row['id_uk'].'">'.$row['imie'].' '.$row['nazwisko'].' - '.$row['nazwa'].'</option>';
 }  
 ?>
</select><br/>
<select name="nauczyciel_klasa" id="nauczyciel_klasa">
    <option selected disabled hidden>Nauczyciel - Klasa</option>
    <?php
    $nauczyciel_klasa = $connect->query("SELECT * FROM zapisani_do_klasy x INNER JOIN nauczyciel u ON x.id_nauczyciela = u.id_nauczyciela LEFT JOIN klasa k ON x.id_klasy = k.id_klasy ORDER BY nazwa");
    while ($row = $nauczyciel_klasa->fetch_assoc())
    {
     echo '<option value="'.$row['id_wpisu'].'">'.$row['imie'].' '.$row['nazwisko'].' - '.$row['nazwa'].'</option>';
 }  
 ?>
</select><br/>
</div><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
</div>
<div class="dolne">
    <div class="dolny_przycisk"><input type="submit" value="Wyczyść"></div>
    <div class="dolny_przycisk"><input type="submit" name="dodaj" value="Dodaj"></div>
    <div class="dolny_przycisk"><input type="submit" name="zmien" value="Zmień wybrane"></div>
    <div class="dolny_przycisk"><input type="submit" name="usun" value="Usuń wybrane" id="usun"></div>
</div>
<div class="wyswietl">
    <select id="wyswietl">
        <option selected disabled hidden>Wyświetl</option>
        <option value="wyswietl_klasa">Klasa</option>
        <option value="wyswietl_nauczyciel">Nauczyciel</option>
        <option value="wyswietl_szkola">Szkoła</option>
        <option value="wyswietl_uczen">Uczeń</option>
        <option value="wyswietl_nauczyciel_szkola">Nauczyciel - Szkoła</option>
        <option value="wyswietl_uczen_klasa">Uczeń - Klasa</option>
        <option value="wyswietl_nauczyciel_klasa">Nauczyciel - Klasa</option>
    </select>
</div>
</form>
<div id="wyswietl_klasa">
   <table class="wyswietl_klasa">
    <tr>
     <td><b>Nazwa</b></td>
     <td><b>Rocznik</b></td>
 </tr>
 <?php
 $klasa = $connect->query("SELECT * FROM klasa ORDER BY nazwa");
 while($row = $klasa->fetch_assoc())
 {
  echo "<tr><td>".$row['nazwa']."</td>
  <td>".$row['rocznik']."</td></tr>";
}
?>
</table>
</div>
<div id="wyswietl_nauczyciel">
   <table class="wyswietl_nauczyciel">
    <tr>
     <td><b>Imię</b></td>
     <td><b>Nazwisko</b></td>
     <td><b>Miejscowość</b></td>
     <td><b>Telefon</b></td>
     <td><b>Przedmiot</b></td>
 </tr>
 <?php
 $nauczyciel = $connect->query("SELECT * FROM nauczyciel ORDER BY nazwisko");
 while($row = $nauczyciel->fetch_assoc())
 {
     echo "<tr><td>".$row['imie']."</td>
     <td>".$row['nazwisko']."</td>
     <td>".$row['adres_m']."</td>
     <td>".$row['telefon']."</td>
     <td>".$row['przedmiot']."</td></tr>";
 }
 ?>
</table>
</div>
<div id="wyswietl_szkola">
   <table class="wyswietl_szkola">
    <tr>
     <td><b>Nazwa</b></td>
     <td><b>Miejscowość</b></td>
     <td><b>Ulica</b></td>
     <td><b>Numer</b></td>
 </tr>
 <?php
 $szkola = $connect->query("SELECT * FROM szkola ORDER BY nazwa");
 while($row = $szkola->fetch_assoc())
 {
     echo "<tr><td>".$row['nazwa']."</td>
     <td>".$row['adres_m']."</td>
     <td>".$row['adres_ul']."</td>
     <td>".$row['adres_nr']."</td></tr>";
 }
 ?>
</table>
</div>
<div id="wyswietl_uczen">
   <table class="wyswietl_uczen">
    <tr>
     <td><b>Imię</b></td>
     <td><b>Nazwisko</b></td>
     <td><b>Miejscowość</b></td>
     <td><b>Telefon</b></td>
 </tr>
 <?php
 $uczen = $connect->query("SELECT * FROM uczen ORDER BY nazwisko");
 while($row = $uczen->fetch_assoc())
 {
     echo "<tr><td>".$row['imie']."</td>
     <td>".$row['nazwisko']."</td>
     <td>".$row['adres_m']."</td>
     <td>".$row['telefon']."</td></tr>";
 }
 ?>
</table>
</div>
<div id="wyswietl_nauczyciel_szkola">
   <table class="wyswietl_nauczyciel_szkola">
    <tr>
     <td><b>Imię</b></td>
     <td><b>Nazwisko</b></td>
     <td><b>Nazwa szkoły</b></td>
 </tr>
 <?php
 $nauczyciel_szkola = $connect->query("SELECT * FROM nauczyciel_szkola n INNER JOIN nauczyciel p ON n.id_nauczyciela = p.id_nauczyciela LEFT JOIN szkola s ON n.id_szkoly = s.id_szkoly ORDER BY nazwisko");
 while($row = $nauczyciel_szkola->fetch_assoc())
 {
     echo "<tr><td>".$row['imie']."</td>
     <td>".$row['nazwisko']."</td>
     <td>".$row['nazwa']."</td></tr>";
 }
 ?>
</table>
</div>
<div id="wyswietl_uczen_klasa">
   <table class="wyswietl_uczen_klasa">
    <tr>
     <td><b>Imię</b></td>
     <td><b>Nazwisko</b></td>
     <td><b>Nazwa klasy</b></td>
 </tr>
 <?php
 $uczen_klasa = $connect->query("SELECT * FROM uczen_klasa p INNER JOIN uczen u ON p.id_ucznia = u.id_ucznia LEFT JOIN klasa k ON p.id_klasy = k.id_klasy ORDER BY nazwisko");
 while($row = $uczen_klasa->fetch_assoc())
 {
     echo "<tr><td>".$row['imie']."</td>
     <td>".$row['nazwisko']."</td>
     <td>".$row['nazwa']."</td></tr>";
 }
 ?>
</table>
</div>
<div id="wyswietl_nauczyciel_klasa">
   <table class="wyswietl_nauczyciel_klasa">
    <tr>
     <td><b>Imię</b></td>
     <td><b>Nazwisko</b></td>
     <td><b>Nazwa klasy</b></td>
 </tr>
 <?php
 $nauczyciel_klasa = $connect->query("SELECT * FROM zapisani_do_klasy x INNER JOIN nauczyciel u ON x.id_nauczyciela = u.id_nauczyciela LEFT JOIN klasa k ON x.id_klasy = k.id_klasy ORDER BY nazwisko");
 while($row = $nauczyciel_klasa->fetch_assoc())
 {
     echo "<tr><td>".$row['imie']."</td>
     <td>".$row['nazwisko']."</td>
     <td>".$row['nazwa']."</td></tr>";
 }
 ?>
</table>
</div>
<script type="text/javascript">
   var klasa = document.getElementById('klasa');
   klasa.addEventListener('change', function() {
    var option = klasa.options[klasa.selectedIndex];
    document.getElementById('klasa_nazwa').value = option.dataset.klasa_nazwa;
    document.getElementById('klasa_rocznik').value = option.dataset.klasa_rocznik;
    document.getElementById('szkola_obcy').value = option.dataset.id_szkoly;
    document.getElementById('klasa').style.backgroundColor = 'yellow';
});
   var nauczyciel = document.getElementById('nauczyciel');
   nauczyciel.addEventListener('change', function() {
    var option = nauczyciel.options[nauczyciel.selectedIndex];
    document.getElementById('nauczyciel_imie').value = option.dataset.nauczyciel_imie;
    document.getElementById('nauczyciel_nazwisko').value = option.dataset.nauczyciel_nazwisko;
    document.getElementById('nauczyciel_adres_m').value = option.dataset.nauczyciel_adres_m;
    document.getElementById('nauczyciel_telefon').value = option.dataset.nauczyciel_telefon;
    document.getElementById('nauczyciel_przedmiot').value = option.dataset.nauczyciel_przedmiot;
    document.getElementById('nauczyciel').style.backgroundColor = 'yellow';
});
   var szkola = document.getElementById('szkola');
   szkola.addEventListener('change', function() {
    var option = szkola.options[szkola.selectedIndex];
    document.getElementById('szkola_nazwa').value = option.dataset.szkola_nazwa;
    document.getElementById('szkola_adres_m').value = option.dataset.szkola_adres_m;
    document.getElementById('szkola_adres_ul').value = option.dataset.szkola_adres_ul;
    document.getElementById('szkola_adres_nr').value = option.dataset.szkola_adres_nr;
    document.getElementById('szkola').style.backgroundColor = 'yellow';
});
   var uczen = document.getElementById('uczen');
   uczen.addEventListener('change', function() {
    var option = uczen.options[uczen.selectedIndex];
    document.getElementById('uczen_imie').value = option.dataset.uczen_imie;
    document.getElementById('uczen_nazwisko').value = option.dataset.uczen_nazwisko;
    document.getElementById('uczen_adres_m').value = option.dataset.uczen_adres_m;
    document.getElementById('uczen_telefon').value = option.dataset.uczen_telefon;
    document.getElementById('uczen').style.backgroundColor = 'yellow';
});
   var podswietl_nauczyciel_szkola = document.getElementById('nauczyciel_szkola');
   podswietl_nauczyciel_szkola.addEventListener('change', function() {
    document.getElementById('nauczyciel_szkola').style.backgroundColor = 'yellow';
});
   var podswietl_uczen_klasa = document.getElementById('uczen_klasa');
   podswietl_uczen_klasa.addEventListener('change', function() {
    document.getElementById('uczen_klasa').style.backgroundColor = 'yellow';
});
   var podswietl_nauczyciel_klasa = document.getElementById('nauczyciel_klasa');
   podswietl_nauczyciel_klasa.addEventListener('change', function() {
    document.getElementById('nauczyciel_klasa').style.backgroundColor = 'yellow';
});
   var podswietl_nauczyciel_szkola_nauczyciel = document.getElementById('nauczyciel_szkola_nauczyciel');
   podswietl_nauczyciel_szkola_nauczyciel.addEventListener('change', function() {
    document.getElementById('nauczyciel_szkola_nauczyciel').style.backgroundColor = 'yellow';
});
   var podswietl_nauczyciel_szkola_szkola = document.getElementById('nauczyciel_szkola_szkola');
   podswietl_nauczyciel_szkola_szkola.addEventListener('change', function() {
    document.getElementById('nauczyciel_szkola_szkola').style.backgroundColor = 'yellow';
});
   var podswietl_nauczyciel_klasa_nauczyciel = document.getElementById('nauczyciel_klasa_nauczyciel');
   podswietl_nauczyciel_klasa_nauczyciel.addEventListener('change', function() {
    document.getElementById('nauczyciel_klasa_nauczyciel').style.backgroundColor = 'yellow';
});
   var podswietl_nauczyciel_klasa_klasa = document.getElementById('nauczyciel_klasa_klasa');
   podswietl_nauczyciel_klasa_klasa.addEventListener('change', function() {
    document.getElementById('nauczyciel_klasa_klasa').style.backgroundColor = 'yellow';
});
   var podswietl_uczen_klasa_uczen = document.getElementById('uczen_klasa_uczen');
   podswietl_uczen_klasa_uczen.addEventListener('change', function() {
    document.getElementById('uczen_klasa_uczen').style.backgroundColor = 'yellow';
});
   var podswietl_uczen_klasa_klasa = document.getElementById('uczen_klasa_klasa');
   podswietl_uczen_klasa_klasa.addEventListener('change', function() {
    document.getElementById('uczen_klasa_klasa').style.backgroundColor = 'yellow';
});
   var wyswietl_klasa = document.getElementById('wyswietl');
   wyswietl_klasa.addEventListener('change', function() {
    wartosc = document.getElementById('wyswietl').value
    console.log(wartosc);
    if (wartosc == "wyswietl_klasa") {
     document.getElementById('wyswietl_klasa').style.display = "block";
     document.getElementById('wyswietl_nauczyciel').style.display = "none";
     document.getElementById('wyswietl_szkola').style.display = "none";
     document.getElementById('wyswietl_uczen').style.display = "none";
     document.getElementById('wyswietl_nauczyciel_szkola').style.display = "none";
     document.getElementById('wyswietl_uczen_klasa').style.display = "none";
     document.getElementById('wyswietl_nauczyciel_klasa').style.display = "none";
 }
 if (wartosc == "wyswietl_nauczyciel") {
     document.getElementById('wyswietl_klasa').style.display = "none";
     document.getElementById('wyswietl_nauczyciel').style.display = "block";
     document.getElementById('wyswietl_szkola').style.display = "none";
     document.getElementById('wyswietl_uczen').style.display = "none";
     document.getElementById('wyswietl_nauczyciel_szkola').style.display = "none";
     document.getElementById('wyswietl_uczen_klasa').style.display = "none";
     document.getElementById('wyswietl_nauczyciel_klasa').style.display = "none";
 }
 if (wartosc == "wyswietl_szkola") {
     document.getElementById('wyswietl_klasa').style.display = "none";
     document.getElementById('wyswietl_nauczyciel').style.display = "none";
     document.getElementById('wyswietl_szkola').style.display = "block";
     document.getElementById('wyswietl_uczen').style.display = "none";
     document.getElementById('wyswietl_nauczyciel_szkola').style.display = "none";
     document.getElementById('wyswietl_uczen_klasa').style.display = "none";
     document.getElementById('wyswietl_nauczyciel_klasa').style.display = "none";
 }
 if (wartosc == "wyswietl_uczen") {
     document.getElementById('wyswietl_klasa').style.display = "none";
     document.getElementById('wyswietl_nauczyciel').style.display = "none";
     document.getElementById('wyswietl_szkola').style.display = "none";
     document.getElementById('wyswietl_uczen').style.display = "block";
     document.getElementById('wyswietl_nauczyciel_szkola').style.display = "none";
     document.getElementById('wyswietl_uczen_klasa').style.display = "none";
     document.getElementById('wyswietl_nauczyciel_klasa').style.display = "none";
 }
 if (wartosc == "wyswietl_nauczyciel_szkola") {
     document.getElementById('wyswietl_klasa').style.display = "none";
     document.getElementById('wyswietl_nauczyciel').style.display = "none";
     document.getElementById('wyswietl_szkola').style.display = "none";
     document.getElementById('wyswietl_uczen').style.display = "none";
     document.getElementById('wyswietl_nauczyciel_szkola').style.display = "block";
     document.getElementById('wyswietl_uczen_klasa').style.display = "none";
     document.getElementById('wyswietl_nauczyciel_klasa').style.display = "none";
 }
 if (wartosc == "wyswietl_uczen_klasa") {
     document.getElementById('wyswietl_klasa').style.display = "none";
     document.getElementById('wyswietl_nauczyciel').style.display = "none";
     document.getElementById('wyswietl_szkola').style.display = "none";
     document.getElementById('wyswietl_uczen').style.display = "none";
     document.getElementById('wyswietl_nauczyciel_szkola').style.display = "none";
     document.getElementById('wyswietl_uczen_klasa').style.display = "block";
     document.getElementById('wyswietl_nauczyciel_klasa').style.display = "none";
 }
 if (wartosc == "wyswietl_nauczyciel_klasa") {
     document.getElementById('wyswietl_klasa').style.display = "none";
     document.getElementById('wyswietl_nauczyciel').style.display = "none";
     document.getElementById('wyswietl_szkola').style.display = "none";
     document.getElementById('wyswietl_uczen').style.display = "none";
     document.getElementById('wyswietl_nauczyciel_szkola').style.display = "none";
     document.getElementById('wyswietl_uczen_klasa').style.display = "none";
     document.getElementById('wyswietl_nauczyciel_klasa').style.display = "block";
 }
});

</script>
</body>
<div class="komunikat" id="komunikat">
  <?php
  if(isset($_POST['dodaj'])||isset($_POST['zmien'])||isset($_POST['usun']))
  {
   echo "<script>
   document.getElementById('komunikat').style.display = 'block';
   </script>";
}
if(isset($_POST['dodaj']))
{
   if(!empty($_POST['klasa_nazwa'])&&!empty($_POST['klasa_rocznik'])&&!isset($_POST['klasa']))
   {
    $connect->query("INSERT INTO `klasa` (`id_klasy`, `nazwa`, `rocznik`) VALUES (NULL, '".$_POST['klasa_nazwa']."', '".$_POST['klasa_rocznik']."');");
    echo "Dodano klasę. ";
}
if(!empty($_POST['nauczyciel_imie'])&&!empty($_POST['nauczyciel_nazwisko'])&&!empty($_POST['nauczyciel_adres_m'])&&!empty($_POST['nauczyciel_telefon'])&&!empty($_POST['nauczyciel_przedmiot'])&&!isset($_POST['nauczyciel']))
{
    $connect->query("INSERT INTO `nauczyciel` (`id_nauczyciela`, `imie`, `nazwisko`, `adres_m`, `telefon`, `przedmiot`) VALUES (NULL, '".$_POST['nauczyciel_imie']."', '".$_POST['nauczyciel_nazwisko']."', '".$_POST['nauczyciel_adres_m']."', '".$_POST['nauczyciel_telefon']."', '".$_POST['nauczyciel_przedmiot']."');");
    echo "Dodano nauczyciela. ";
}

if(!empty($_POST['szkola_nazwa'])&&!empty($_POST['szkola_adres_m'])&&!empty($_POST['szkola_adres_ul'])&&!empty($_POST['szkola_adres_nr'])&&!isset($_POST['szkola']))
{
    $connect->query("INSERT INTO `szkola` (`id_szkoly`, `nazwa`, `adres_m`, `adres_ul`, `adres_nr`) VALUES (NULL, '".$_POST['szkola_nazwa']."', '".$_POST['szkola_adres_m']."', '".$_POST['szkola_adres_ul']."', '".$_POST['szkola_adres_nr']."');");
    echo "Dodano szkołę. ";
}

if(!empty($_POST['uczen_imie'])&&!empty($_POST['uczen_nazwisko'])&&!empty($_POST['uczen_adres_m'])&&!empty($_POST['uczen_telefon'])&&!isset($_POST['uczen']))
{
    $connect->query("INSERT INTO `uczen` (`id_ucznia`, `imie`, `nazwisko`, `adres_m`, `telefon`) VALUES (NULL, '".$_POST['uczen_imie']."', '".$_POST['uczen_nazwisko']."', '".$_POST['uczen_adres_m']."', '".$_POST['uczen_telefon']."');");
    echo "Dodano ucznia. ";
}

if(isset($_POST['nauczyciel_szkola_nauczyciel'])&&isset($_POST['nauczyciel_szkola_szkola']))
{
    $connect->query("INSERT INTO `nauczyciel_szkola` (`id_ns`, `id_nauczyciela`, `id_szkoly`) VALUES (NULL, '".$_POST['nauczyciel_szkola_nauczyciel']."', '".$_POST['nauczyciel_szkola_szkola']."');");
    echo "Przypisano nauczyciel - szkoła. ";
}
if(isset($_POST['nauczyciel_klasa_nauczyciel'])&&isset($_POST['nauczyciel_klasa_klasa']))
{
    $connect->query("INSERT INTO `zapisani_do_klasy` (`id_wpisu`, `id_nauczyciela`, `id_klasy`) VALUES (NULL, '".$_POST['nauczyciel_klasa_nauczyciel']."', '".$_POST['nauczyciel_klasa_klasa']."');");
    echo "Przypisano nauczyciel - klasa. ";
}

if(isset($_POST['uczen_klasa_uczen'])&&isset($_POST['uczen_klasa_klasa']))
{
    $connect->query("INSERT INTO `uczen_klasa` (`id_uk`, `id_ucznia`, `id_klasy`) VALUES (NULL, '".$_POST['uczen_klasa_uczen']."', '".$_POST['uczen_klasa_klasa']."');");
    echo "Przypisano uczeń - klasa. ";
}
}
if(isset($_POST['zmien']))
{
   if(isset($_POST['klasa']))
   {
    if(!empty($_POST['klasa_nazwa']))
     $connect->query("UPDATE klasa SET nazwa='".$_POST['klasa_nazwa']."' WHERE id_klasy='".$_POST['klasa']."'");

 if(!empty($_POST['klasa_rocznik']))
     $connect->query("UPDATE klasa SET rocznik='".$_POST['klasa_rocznik']."' WHERE id_klasy='".$_POST['klasa']."'");

 echo "Zmieniono dane klasy. ";
}
if(isset($_POST['nauczyciel']))
{
    if(!empty($_POST['nauczyciel_imie']))    
     $connect->query("UPDATE nauczyciel SET imie='".$_POST['nauczyciel_imie']."' WHERE id_nauczyciela='".$_POST['nauczyciel']."'");

 if(!empty($_POST['nauczyciel_nazwisko']))    
     $connect->query("UPDATE nauczyciel SET nazwisko='".$_POST['nauczyciel_nazwisko']."' WHERE id_nauczyciela='".$_POST['nauczyciel']."'");

 if(!empty($_POST['nauczyciel_adres_m']))    
     $connect->query("UPDATE nauczyciel SET adres_m='".$_POST['nauczyciel_adres_m']."' WHERE id_nauczyciela='".$_POST['nauczyciel']."'");

 if(!empty($_POST['nauczyciel_telefon']))    
     $connect->query("UPDATE nauczyciel SET telefon='".$_POST['nauczyciel_telefon']."' WHERE id_nauczyciela='".$_POST['nauczyciel']."'");

 if(!empty($_POST['nauczyciel_przedmiot']))    
     $connect->query("UPDATE nauczyciel SET przedmiot='".$_POST['nauczyciel_przedmiot']."' WHERE id_nauczyciela='".$_POST['nauczyciel']."'");

 echo "Zmieniono dane nauczyciela. ";
}
if(isset($_POST['szkola']))
{
    if(!empty($_POST['szkola_nazwa']))
     $connect->query("UPDATE szkola SET nazwa='".$_POST['szkola_nazwa']."' WHERE id_szkoly='".$_POST['szkola']."'");

 if(!empty($_POST['szkola_adres_m']))
     $connect->query("UPDATE szkola SET adres_m='".$_POST['szkola_adres_m']."' WHERE id_szkoly='".$_POST['szkola']."'");

 if(!empty($_POST['szkola_adres_ul']))
     $connect->query("UPDATE szkola SET adres_ul='".$_POST['szkola_adres_ul']."' WHERE id_szkoly='".$_POST['szkola']."'");

 if(!empty($_POST['szkola_adres_nr']))
     $connect->query("UPDATE szkola SET adres_nr='".$_POST['szkola_adres_nr']."' WHERE id_szkoly='".$_POST['szkola']."'");

 echo "Zmieniono dane szkoły. ";
}
if(isset($_POST['uczen']))
{
    if(!empty($_POST['uczen_imie']))    
     $connect->query("UPDATE uczen SET imie='".$_POST['uczen_imie']."' WHERE id_ucznia='".$_POST['uczen']."'");
 if(!empty($_POST['uczen_nazwisko']))    
     $connect->query("UPDATE uczen SET nazwisko='".$_POST['uczen_nazwisko']."' WHERE id_ucznia='".$_POST['uczen']."'");
 if(!empty($_POST['uczen_adres_m']))    
     $connect->query("UPDATE uczen SET adres_m='".$_POST['uczen_adres_m']."' WHERE id_ucznia='".$_POST['uczen']."'");
 if(!empty($_POST['uczen_telefon']))    
     $connect->query("UPDATE uczen SET telefon='".$_POST['uczen_telefon']."' WHERE id_ucznia='".$_POST['uczen']."'");

 echo "Zmieniono dane ucznia. ";
}
if(!isset($_POST['klasa'])&&!isset($_POST['nauczyciel'])&&!isset($_POST['szkola'])&&!isset($_POST['uczen']))
    echo "Należy wybrać pozycję do zmiany";
}
if(isset($_POST['usun']))
{
   if(isset($_POST['klasa']))
   {
    $connect->query("DELETE FROM `uczen_klasa` WHERE `uczen_klasa`.`id_klasy` = '".$_POST['klasa']."';");

    $connect->query("DELETE FROM `zapisani_do_klasy` WHERE `zapisani_do_klasy`.`id_klasy` = '".$_POST['klasa']."';");

    $connect->query("DELETE FROM `klasa` WHERE `klasa`.`id_klasy` = '".$_POST['klasa']."';");

    echo "Usunięto klasę. ";
}
if(isset($_POST['nauczyciel']))
{
    $connect->query("DELETE FROM `nauczyciel_szkola` WHERE `nauczyciel_szkola`.`id_nauczyciela` = '".$_POST['nauczyciel']."';");

    $connect->query("DELETE FROM `zapisani_do_klasy` WHERE `zapisani_do_klasy`.`id_nauczyciela` = '".$_POST['nauczyciel']."';");

    $connect->query("DELETE FROM `nauczyciel` WHERE `nauczyciel`.`id_nauczyciela` = '".$_POST['nauczyciel']."';");

    echo "Usunięto nauczyciela. ";
}
if(isset($_POST['szkola']))
{
    $connect->query("DELETE FROM `nauczyciel_szkola` WHERE `nauczyciel_szkola`.`id_szkoly` = '".$_POST['szkola']."';");

    $connect->query("DELETE FROM `szkola` WHERE `szkola`.`id_szkoly` = '".$_POST['szkola']."';");

    echo "Usunięto szkołę. ";
}
if(isset($_POST['uczen']))
{
    $connect->query("DELETE FROM `uczen_klasa` WHERE `uczen_klasa`.`id_ucznia` = '".$_POST['uczen']."';");

    $connect->query("DELETE FROM `uczen` WHERE `uczen`.`id_ucznia` = '".$_POST['uczen']."';");

    echo "Usunięto ucznia. ";
}
if(isset($_POST['nauczyciel_szkola']))
{
    $connect->query("DELETE FROM `nauczyciel_szkola` WHERE `nauczyciel_szkola`.`id_ns` = '".$_POST['nauczyciel_szkola']."';");

    echo "Usunięto nauczyciel - szkoła. ";
}
if(isset($_POST['uczen_klasa']))
{
    $connect->query("DELETE FROM `uczen_klasa` WHERE `uczen_klasa`.`id_uk` = '".$_POST['uczen_klasa']."';");

    echo "Usunięto uczeń - klasa. ";
}
if(isset($_POST['nauczyciel_klasa']))
{
    $connect->query("DELETE FROM `zapisani_do_klasy` WHERE `zapisani_do_klasy`.`id_wpisu` = '".$_POST['nauczyciel_klasa']."';");

    echo "Usunięto nauczyciel - klasa. ";
}
if(!isset($_POST['klasa'])&&!isset($_POST['nauczyciel'])&&!isset($_POST['szkola'])&&!isset($_POST['uczen'])&&!isset($_POST['nauczyciel_szkola'])&&!isset($_POST['uczen_klasa'])&&!isset($_POST['nauczyciel_klasa']))
    echo "Należy wybrać pozycję do usunięcia";
}
?>
</div>

</html>
