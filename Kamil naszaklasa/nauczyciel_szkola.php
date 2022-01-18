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
                var lista = document.getElementById('idnauczycielszkola');
                var option = lista.options[lista.selectedIndex];
                document.getElementById('id_nauczyciela').value = option.dataset.id_nauczyciela;
                document.getElementById('id_szkoly').value = option.dataset.id_szkoly;
            }
        </script>
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
                <h1>Nauczyciel-szkoła</h1>
            </div>
            <form method="post">
                <select id="idnauczycielszkola" name="id_nauczycielszkola" class="wygl" onchange="zmiana()">
                    <option value="0" selected disabled hidden>Uczeń-Klasa</option>
                    <?php
                    $sql = "SELECT * FROM `nauczyciel_szkola`";
                    if ($rezultat = $connection->query($sql))
                    {
                        while($row = $rezultat->fetch_assoc())
                        {
                            echo "<option value='".$row['id_ns']."' data-id_nauczyciela='".$row['id_nauczyciela']."' data-id_szkoly='".$row['id_szkoly']."' >".$row['id_nauczyciela'].' - '.$row['id_szkoly']."</option>";
                        }
                    }
                    ?>
                </select><br/><br/>
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
                </div>
            <div class="przycisk1">
                <input class="wygl1" type="submit" name="dodaj" value="Dodaj">
                <input class="wygl1" type="submit" name="usun" value="Usuń"><br/><br/>
                <input class="wygl1" type="submit" name="wyswietl" value="Wyświetl"><br/><br/>
                </form>
            <form method="post" action="index.php">
                <input class="wygl1" type="submit" name="menu" value="MENU"><br/><br/>
            </form>


            <?php
            if (isset($_POST['dodaj']))
            {
                if ((!empty($_POST['id_nauczyciela']))&&(!empty($_POST['id_szkoly'])))
                {
                    $connection->query("INSERT INTO `nauczyciel_szkola`(`id_ns`, `id_nauczyciela`, `id_szkoly`) VALUES (NULL,'".$_POST['id_nauczyciela']."','".$_POST['id_szkoly']."')");
                    echo "Dodano przypisanie";
                }
            }

            if(isset($_POST['usun']))
            {
                if(!empty($_POST['id_nauczycielszkola']))
                {
                    $connection->query("DELETE FROM nauczyciel_szkola WHERE id_ns='".$_POST['id_nauczycielszkola']."'");
                    echo "Przypisanie zostało usunięte";
                }
            }
            if(isset($_POST['wyswietl']))
            {
                $wyswietl=$connection->query("SELECT * FROM nauczyciel_szkola");
                while($row=$wyswietl->fetch_assoc())
                {

                    echo "<table>";
                    echo "<tr>
            <td><b>ID:</b> ".$row['id_ns']."<br/></td>
            <td><b>ID_nauczyciela:</b> ".$row['id_nauczyciela']." <br/></td>
            <td><b>ID_szkoly:</b> ".$row['id_szkoly']." <br/></td></tr>";
                    echo "</table>";

                }
            }
            ?>
        </div>  
    </body>

</html>