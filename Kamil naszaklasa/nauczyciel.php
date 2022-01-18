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
                var lista = document.getElementById('idnauczyciela');
                var option = lista.options[lista.selectedIndex];
                document.getElementById('imie').value = option.dataset.imie;
                document.getElementById('nazwisko').value = option.dataset.nazwisko;
                document.getElementById('adres_m').value = option.dataset.adres_m;
                document.getElementById('telefon').value = option.dataset.telefon;
                document.getElementById('przedmiot').value = option.dataset.przedmiot;
            }
        </script>
    </head>
    <body>
        <div class="glowna">
            <div class="baner">
                <h1>Nasza Klasa</h1>
            </div><br/>
            <div>
                <h1>Nauczyciel</h1>
            </div>
            <form method="post">
                <select id="idnauczyciela" name="id_nauczyciela" class="wygl" onchange="zmiana()">
                <option value="0" selected disabled hidden>Nauczyciel</option>
                <?php
                $sql = "SELECT * FROM `nauczyciel`";
                if ($rezultat = $connection->query($sql))
                {
                    while($row = $rezultat->fetch_assoc())
                    {
                        echo "<option value='".$row['id_nauczyciela']."' data-imie='".$row['imie']."' data-nazwisko='".$row['nazwisko']."'  data-adres_m='".$row['adres_m']."'  data-telefon='".$row['telefon']."'  data-przedmiot='".$row['przedmiot']."' >".$row['imie'].' - '.$row['nazwisko'].' - '.$row['adres_m'].' - '.$row['telefon'].' - '.$row['przedmiot']."</option>";
                    }
                }
                ?>
            </select><br/><br/>
        </div>
        <div class="przycisk1">
            
                <input hidden class="wygl" type=text name="id"><br/><br/>
                Imię:<br/><input id="imie" class="wygl" type=text name="imie"><br/><br/>
                Nazwisko:<br/><input id="nazwisko" class="wygl" type=text name="nazwisko"><br/><br/>
                Adres_m:<br/><input id="adres_m" class="wygl" type=text name="adres_m"><br/><br/>
                Telefon:<br/><input id="telefon" class="wygl" type=text name="telefon"><br/><br/>
                Przedmiot:<br/><input id="przedmiot" class="wygl" type=text name="przedmiot"><br/><br/>
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
                if ((!empty($_POST['imie']))&&(!empty($_POST['nazwisko']))&&(!empty($_POST['adres_m']))&&(!empty($_POST['telefon']))&&(!empty($_POST['przedmiot'])))
                {
                    $id = $_POST['id'];	
                    $imie = $_POST['imie'];
                    $nazwisko = $_POST['nazwisko'];
                    $adres_m = $_POST['adres_m'];
                    $telefon = $_POST['telefon'];
                    $przedmiot = $_POST['przedmiot'];
                    $connection->query("INSERT INTO `nauczyciel`(`id_nauczyciela`, `imie`, `nazwisko`, `adres_m`, `telefon`, `przedmiot`) VALUES (NULL,'".$_POST['imie']."','".$_POST['nazwisko']."','".$_POST['adres_m']."','".$_POST['telefon']."','".$_POST['przedmiot']."')");
                    echo "Dodano nauczyciela";
                    
                }
            }

            if(isset($_POST['update']))
            {
                if(!empty($_POST['id_nauczyciela']))
                {
                    if(!empty($_POST['imie']))
                    {$connection->query("UPDATE nauczyciel SET imie='".$_POST['imie']."' WHERE id_nauczyciela='".$_POST['id_nauczyciela']."'");}
                    if(!empty($_POST['nazwisko']))
                    {$connection->query("UPDATE nauczyciel SET nazwisko='".$_POST['nazwisko']."' WHERE id_nauczyciela='".$_POST['id_nauczyciela']."'");}
                    if(!empty($_POST['adres_m']))
                    {$connection->query("UPDATE nauczyciel SET adres_m='".$_POST['adres_m']."' WHERE id_nauczyciela='".$_POST['id_nauczyciela']."'");}
                    if(!empty($_POST['telefon']))
                    {$connection->query("UPDATE nauczyciel SET telefon='".$_POST['telefon']."' WHERE id_nauczyciela='".$_POST['id_nauczyciela']."'");}
                    if(!empty($_POST['przedmiot']))
                    {$connection->query("UPDATE nauczyciel SET przedmiot='".$_POST['przedmiot']."' WHERE id_nauczyciela='".$_POST['id_nauczyciela']."'");}
                    echo "Zaktualizowano";

                }
            }
            if(isset($_POST['usun']))
            {
                if(!empty($_POST['id_nauczyciela']))
                {
                    $connection->query("DELETE FROM zapisani_do_klasy WHERE id_nauczyciela='".$_POST['id_nauczyciela']."'");
                    $connection->query("DELETE FROM nauczyciel_szkola WHERE id_nauczyciela='".$_POST['id_nauczyciela']."'");
                    $connection->query("DELETE FROM nauczyciel WHERE id_nauczyciela='".$_POST['id_nauczyciela']."'");
                    echo "Nauczyciel został usunięty";
                }
            }
            if(isset($_POST['wyswietl']))
            {
                $wyswietl=$connection->query("SELECT * FROM nauczyciel");
                while($row=$wyswietl->fetch_assoc())
                {

                    echo "<table>";
                    echo "<tr>
            <td><b>ID:</b> ".$row['id_nauczyciela']."<br/></td>
            <td><b>Imię:</b> ".$row['imie']." <br/></td>
            <td><b>Nazwisko:</b> ".$row['nazwisko']." <br/></td>
            <td><b>Adres_m:</b> ".$row['adres_m']." <br/></td>
            <td><b>Telefon:</b> ".$row['telefon']." <br/></td>
            <td><b>Przedmiot:</b> ".$row['przedmiot']." <br/></td></tr>";
                    echo "</table>";

                }
            }
            ?>
        </div>  
    </body>

</html>
