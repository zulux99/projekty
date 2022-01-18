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
                var lista = document.getElementById('idszkoly');
                var option = lista.options[lista.selectedIndex];
                document.getElementById('nazwa').value = option.dataset.nazwa;
                document.getElementById('adres_m').value = option.dataset.adres_m;
                document.getElementById('adres_ul').value = option.dataset.adres_ul;
                document.getElementById('adres_nr').value = option.dataset.adres_nr;
            }
        </script>
    </head>

    <body>
        <div class="glowna">
            <div class="baner">
                <h1>Nasza Klasa</h1>
            </div><br/>
            <div>
                <h1>SzkoŁa</h1>
            </div>
        </div>
        <form method="post">
            <select id="idszkoly" name="id_szkoly" class="wygl" onchange="zmiana()">
            <option value="0" selected disabled hidden>Szkoła</option>
            <?php
            $sql = "SELECT * FROM `szkola`";
            if ($rezultat = $connection->query($sql))
            {
                while($row = $rezultat->fetch_assoc())
                {
                    echo "<option value='".$row['id_szkoly']."' data-nazwa='".$row['nazwa']."' data-adres_m='".$row['adres_m']."' data-adres_ul='".$row['adres_ul']."' data-adres_nr='".$row['adres_nr']."' >".$row['nazwa'].' - '.$row['adres_m'].' - '.$row['adres_ul'].' - '.$row['adres_nr']."</option>";
                }
            }
            ?>
        </select><br/><br/>

        <div class="przycisk1">
            
                <input hidden class="wygl" type=text name="id"><br/><br/>
                Nazwa:<br/><input id="nazwa" class="wygl" type=text name="nazwa"><br/><br/>
                Adres_m:<br/><input id="adres_m" class="wygl" type=text name="adres_m"><br/><br/>
                Adres_ul:<br/><input id="adres_ul" class="wygl" type=text name="adres_ul"><br/><br/>
                Adres_nr:<br/><input id="adres_nr" class="wygl" type=text name="adres_nr"><br/><br/>
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
                if ((!empty($_POST['nazwa']))&&(!empty($_POST['adres_m']))&&(!empty($_POST['adres_ul']))&&(!empty($_POST['adres_nr'])))
                {
                    $id = $_POST['id'];	
                    $nazwa = $_POST['nazwa'];
                    $adres_m = $_POST['adres_m'];
                    $adres_ul = $_POST['adres_ul'];
                    $adres_nr = $_POST['adres_nr'];
                    $connection->query("INSERT INTO `szkola`(`id_szkoly`, `nazwa`, `adres_m`, `adres_ul`, `adres_nr`) VALUES (NULL,'".$_POST['nazwa']."','".$_POST['adres_m']."','".$_POST['adres_ul']."','".$_POST['adres_nr']."')");
                    echo "Szkoła została dodana";

                }
            }

            if(isset($_POST['update']))
            {
                if(!empty($_POST['id_szkoly']))
                {
                    if(!empty($_POST['nazwa']))
                    {$connection->query("UPDATE szkola SET nazwa='".$_POST['nazwa']."' WHERE id_szkoly='".$_POST['id_szkoly']."'");}
                    if(!empty($_POST['adres_m']))
                    {$connection->query("UPDATE szkola SET adres_m='".$_POST['adres_m']."' WHERE id_szkoly='".$_POST['id_szkoly']."'");}
                    if(!empty($_POST['adres_ul']))
                    {$connection->query("UPDATE szkola SET adres_ul='".$_POST['adres_ul']."' WHERE id_szkoly='".$_POST['id_szkoly']."'");}
                    if(!empty($_POST['adres_nr']))
                    {$connection->query("UPDATE szkola SET adres_nr='".$_POST['adres_nr']."' WHERE id_szkoly='".$_POST['id_szkoly']."'");}
                    echo "Zaktualizowano";


                }
            }
            if(isset($_POST['usun']))
            {
                if(!empty($_POST['id_szkoly']))
                {
                    $connection->query("DELETE FROM nauczyciel_szkola WHERE id_szkoly='".$_POST['id_szkoly']."'");
                    $connection->query("DELETE FROM szkola WHERE id_szkoly='".$_POST['id_szkoly']."'");
                    echo "Szkoła została usunięta";
                }
            }
            if(isset($_POST['wyswietl']))
            {
                $wyswietl=$connection->query("SELECT * FROM szkola");
                while($row=$wyswietl->fetch_assoc())
                {

                    echo "<table>";
                    echo "<tr>
            <td><b>ID:</b> ".$row['id_szkoly']."<br/></td>
            <td><b>Nazwa:</b> ".$row['nazwa']." <br/></td>
            <td><b>Adres_m:</b> ".$row['adres_m']." <br/></td>
            <td><b>Adres_ul:</b> ".$row['adres_ul']." <br/></td>
            <td><b>Adres_nr:</b> ".$row['adres_nr']." <br/></td></tr>";
                    echo "</table>";

                }
            }
            ?>
        </div>  
    </body>

</html>