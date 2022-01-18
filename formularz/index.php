<!doctype html>
<?php
require("connect.php");
session_start();
echo(date("Y-m-d"));
if(isset($_POST['wyslij']))
{
    if(!empty($_POST['imie'])&&!empty($_POST['nazwisko'])&&!empty($_POST['email'])&&isset($_POST['zgoda_zapytanie']))
    {
        if(isset($_POST['zgoda_handel']))
            $jb = "1";
        else
            $jb = "0";
        $connect->query("INSERT INTO `osoba` (`id_osoby`, `imie`, `nazwisko`, `email`, `data_w`, `data_m`, `zgoda_zapytanie`, `zgoda_handel`) VALUES (NULL, '".$_POST['imie']."', '".$_POST['nazwisko']."', '".$_POST['email']."', '".date("Y-m-d")."', '".date("Y-m-d")."', '1', '$jb');");
    }
}
?>
<html>
<head>
  <title>Formularz</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
    if(@!$_SESSION['zalogowany'])
    {
        echo '<div class="przycisk">
        <form action="logowanie.php"><input type="submit" value="ZALOGUJ"></form>
        </div><br/>';
    }
    if(@$_SESSION['zalogowany'])
    {
        echo '<div class="przycisk">
        <form method="POST"><input type="submit" value="WYLOGUJ" name="wyloguj"></form>
        </div><br/>';
    }
    if(isset($_POST['wyloguj']))
    {
        session_destroy();
        header("Location: index.php");
    }
    ?>
    <div class="przycisk">
        <form action="panel.php"><input type="submit" value="PANEL"></form>
    </div>
    <form method="POST">
        <h1>REJESTRACJA</h1>
        <input type="text" name="imie" placeholder="Imię"><br/>
        <input type="text" name="nazwisko" placeholder="Nazwisko"><br/>
        <input type="text" name="email" placeholder="Email"><br/>
        <input type="checkbox" name="zgoda_zapytanie">Zgoda na przetwarzanie danych osobowych w celu odpowiedzi na zapytanie<br/>
        <input type="checkbox" name="zgoda_handel">Zgoda na przetwarzanie danych osobowych w celach handlowych<br/>
        <div class="przycisk">
            <input type="submit" name="wyslij" value="Wyślij">
        </div>
    </form>
</body>
<?php 
require("login.php");
?>
</html>