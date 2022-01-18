<?php
require ('connect.php');
?>
<!doctype html>

<html>

    <head>
        <title>Nasza Klasa</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta name="viewport" content="initial-scale=1">
        <script>
            function zmiana(){
                var lista = document.getElementById('iducznia');
                var option = lista.options[lista.selectedIndex];
                document.getElementById('imie').value = option.dataset.imie;
                document.getElementById('nazwisko').value = option.dataset.nazwisko;
                document.getElementById('adres_m').value = option.dataset.adres_m;
                document.getElementById('telefon').value = option.dataset.telefon;
            }
        </script>
    </head>

    <body>
        <div class="glowna">
            <div class="baner">
                <h1>Nasza Klasa</h1>
            </div><br/>
        </div>
        <div>
            <h1>Uczeń</h1>
        </div>
        <form method="post">
            <select id="iducznia" name="id_ucznia" class="wygl" onchange="zmiana()">
                <option value="0" selected disabled hidden>Uczeń</option>
                <?php
                $sql = "SELECT * FROM `uczen`";
                if ($rezultat = $connection->query($sql))
                {
                    while($row = $rezultat->fetch_assoc())
                    {
                        echo "<option value='".$row['id_ucznia']."' data-imie='".$row['imie']."' data-nazwisko='".$row['nazwisko']."' data-adres_m='".$row['adres_m']."' data-telefon='".$row['telefon']."' >".$row['imie'].' - '.$row['nazwisko'].' - '.$row['adres_m'].' - '.$row['telefon']."</option>";
                    }
                }
                ?>
            </select><br/><br/>
        <div class="przycisk1">
            
                <input hidden class="wygl" type=text name="id"><br/><br/>
                Imię:<br/><input id="imie" class="wygl" type=text name="imie"><br/><br/>
                Nazwisko:<br/><input id="nazwisko" class="wygl" type=text name="nazwisko"><br/><br/>
                Adres_m:<br/><input id="adres_m" class="wygl" type=text name="adres_m"><br/><br/>
                Telefon:<br/><input id="telefon" class="wygl" type=text name="telefon"><br/><br/>
                <input class="wygl1" type="submit" name="dodaj" value="Dodaj">
                <input class="wygl1" type="submit" name="usun" value="Usuń"><br/><br/>
                <input class="wygl1" type="submit" name="update" value="Update">
                <input class="wygl1" type="submit" name="wyswietl" value="Wyświetl"><br/><br/>
            </form>
            <form method="post" action="index.php">
                <input class="wygl1" type="submit" name="menu" value="MENU"><br/><br/>
            </form>


            <?php
            if (isset($_POST['dodaj']))
            {
                if ((!empty($_POST['imie']))&&(!empty($_POST['nazwisko']))&&(!empty($_POST['adres_m']))&&(!empty($_POST['telefon'])))
                {
                    $id = $_POST['id'];	
                    $imie = $_POST['imie'];
                    $nazwisko = $_POST['nazwisko'];
                    $adres_m = $_POST['adres_m'];
                    $telefon = $_POST['telefon'];
                    $connection->query("INSERT INTO `uczen`(`id_ucznia`, `imie`, `nazwisko`, `adres_m`, `telefon`) VALUES (NULL,'".$_POST['imie']."','".$_POST['nazwisko']."','".$_POST['adres_m']."','".$_POST['telefon']."')");
                    echo "Dodano ucznia";

                }
            }

            if(isset($_POST['update']))
            {
                if(!empty($_POST['id_ucznia']))
                {
                    if(!empty($_POST['imie']))
                    {$connection->query("UPDATE uczen SET imie='".$_POST['imie']."' WHERE id_ucznia='".$_POST['id_ucznia']."'");}
                    if(!empty($_POST['nazwisko']))
                    {$connection->query("UPDATE uczen SET nazwisko='".$_POST['nazwisko']."' WHERE id_ucznia='".$_POST['id_ucznia']."'");}
                    if(!empty($_POST['adres_m']))
                    {$connection->query("UPDATE uczen SET adres_m='".$_POST['adres_m']."' WHERE id_ucznia='".$_POST['id_ucznia']."'");}
                    if(!empty($_POST['telefon']))
                    {$connection->query("UPDATE uczen SET telefon='".$_POST['telefon']."' WHERE id_ucznia='".$_POST['id_ucznia']."'");}
                    echo "Zaktualizowano";


                }
            }
            if(isset($_POST['usun']))
            {
                if(!empty($_POST['id_ucznia']))
                {
                    $connection->query("DELETE FROM uczen_klasa WHERE id_ucznia='".$_POST['id_ucznia']."'");
                    $connection->query("DELETE FROM uczen WHERE id_ucznia='".$_POST['id_ucznia']."'");
                    echo "Uczeń został usunięty";
                }
            }
            if(isset($_POST['wyswietl']))
            {
                $wyswietl=$connection->query("SELECT * FROM uczen");
                while($row=$wyswietl->fetch_assoc())
                {

                    echo "<table>";
                    echo "<tr>
            <td><b>ID:</b> ".$row['id_ucznia']."<br/></td>
            <td><b>Imię:</b> ".$row['imie']." <br/></td>
            <td><b>Nazwisko:</b> ".$row['nazwisko']." <br/></td>
            <td><b>Adres_m:</b> ".$row['adres_m']." <br/></td>
            <td><b>Telefon:</b> ".$row['telefon']." <br/></td></tr>";
                    echo "</table>";

                }
            }
            ?>
        </div>  
    </body>

</html>