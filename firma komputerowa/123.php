<?php
if(isset($_POST['dodaj']))
{
    $baza = fopen("kontrahent.txt", "a");
    fwrite($baza, $_POST['imie']." ".$_POST['nazwisko']." ".$_POST['adres_m']." ".$_POST['adres_ul']." ".$_POST['adres_nr']." ".$_POST['pesel']." ".$_POST['telefon'].", ");
}
if(isset($_POST['usun']))
{
    $baza1 = fopen("kontrahent.txt", "w");
    fwrite($baza1, $_POST['imie']." ".$_POST['nazwisko']." ".$_POST['adres_m']." ".$_POST['adres_ul']." ".$_POST['adres_nr']." ".$_POST['pesel']." ".$_POST['telefon']."
");
}


?>
<!doctype html>

<html>
    <head>
        <title>Firma</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <div class="menu">
    <div class="formularz">
        <a>KONTRAHENT</a><br/><br/><br/>
        <form method="post">
            Imię:<br/><input class="wygladform" type="text" name="imie"><br/>
            Nazwisko:<br/><input class="wygladform" type="text" name="nazwisko"><br/>
            Adres_m:<br/><input class="wygladform" type="text" name="adres_m"><br/>
            Adres_ul:<br/><input class="wygladform" type="text" name="adres_ul"><br/>
            Adres_nr:<br/><input class="wygladform" type="text" name="adres_nr"><br/>
            Pesel:<br/><input class="wygladform" type="text" name="pesel"><br/>
            Telefon:<br/><input class="wygladform" type="text" name="telefon"><br/>
            <input class="przyciski1" type="submit" name="dodaj"  value="Dodaj"><br/>
            <input class="przyciski1" type="submit" name="usun"  value="Usuń">
            <input class="przyciski1" type="submit" name="update"  value="Update"><br/>
            <input class="przyciski1" type="submit" name="wyswietl"  value="Wyświetl"><br/>
        </form>
        <form class="meni" action="index.php">
            <input class="przyciski1" type="submit" name="menu" value="MENU"><br/><br/>
        </form>
    </div>
    <?php
        if(isset($_POST['wyswietl']))
        {
            $result = file("kontrahent.txt");
            print_r($result);
        }
    ?>
    </div>
    <body>

    </body>
</html>