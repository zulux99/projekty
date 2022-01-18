<?php
if(isset($_POST['dodaj']))
{
   if(!empty($_POST['nazwa'])&&!empty($_POST['cena'])&&isset($_POST['id_pracownika'])&&isset($_POST['id_kontrahenta']))
   {
      $fp = fopen("usluga.txt", "a");
      fwrite($fp, $_POST['imie'].",".$_POST['nazwisko'].",".$_POST['adres_m'].",".$_POST['adres_ul'].",".$_POST['adres_nr'].",".$_POST['pesel'].",".$_POST['telefon']."
");
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
            Nazwa: <input type="text" name="nazwa" class="input"><br/>
            Cena: <input type="text" name="cena" class="input"><br/>
            Pracownik: <select name="id_pracownika"></select><br/>
            Kontrahent: <select name="id_kontrahenta"></select><br/>
            <input type="submit" name="dodaj" value="DODAJ" class="przycisk">
            <input type="submit" name="usun" value="USUŃ" class="przycisk">
            <input type="submit" name="zmien" value="ZMIEŃ" class="przycisk">
            <input type="submit" name="wyswietl" value="WYŚWIETL" class="przycisk">
        </form>
    </body>
</html>