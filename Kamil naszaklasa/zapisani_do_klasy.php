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
                var lista = document.getElementById('idzapisani');
                var option = lista.options[lista.selectedIndex];
                document.getElementById('id_nauczyciela').value = option.dataset.id_nauczyciela;
                document.getElementById('id_klasy').value = option.dataset.id_klasy;
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
                var lista = document.getElementById('idklasy');
                var option = lista.options[lista.selectedIndex];
                document.getElementById('nazwa').value = option.dataset.nazwa;
                document.getElementById('rocznik').value = option.dataset.rocznik;
            }
        </script>
    </head>

    <body>

        <div class="glowna">
            <div class="baner">
                <h1>Nasza Klasa</h1>

            </div><br/>
            <div>
                <h1>Zapisani do klasy</h1>
            </div>
            <form method="post">
                <select id="idzapisani" name="id_zapisani" class="wygl" onchange="zmiana()">
                    <option value="0" selected disabled hidden>Zapisani</option>
                    <?php
                    $sql = "SELECT * FROM `zapisani_do_klasy`";
                    if ($rezultat = $connection->query($sql))
                    {
                        while($row = $rezultat->fetch_assoc())
                        {
                            echo "<option value='".$row['id_wpisu']."' data-id_nauczyciela='".$row['id_nauczyciela']."' data-id_klasy='".$row['id_klasy']."' >".$row['id_nauczyciela'].' - '.$row['id_klasy']."</option>";
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
                <select id="idklasy" name="id_klasy" class="wygl" onchange="zmiana()">
                    <option value="0" selected disabled hidden>klasa</option>
                    <?php
                    $sql = "SELECT * FROM `klasa`";
                    if ($rezultat = $connection->query($sql))
                    {
                        while($row = $rezultat->fetch_assoc())
                        {
                            echo "<option value='".$row['id_klasy']."' data-nazwa='".$row['nazwa']."' data-rocznik='".$row['rocznik']."' >".$row['nazwa'].' - '.$row['rocznik']."</option>";
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
                if ((!empty($_POST['id_nauczyciela']))&&(!empty($_POST['id_klasy'])))
                {
                    $connection->query("INSERT INTO `zapisani_do_klasy`(`id_wpisu`, `id_nauczyciela`, `id_klasy`) VALUES (NULL,'".$_POST['id_nauczyciela']."','".$_POST['id_klasy']."')");
                    echo "Dodano przypisanie";
                }
            }

            if(isset($_POST['usun']))
            {
                if(!empty($_POST['id_zapisani']))
                {
                    $connection->query("DELETE FROM zapisani_do_klasy WHERE id_wpisu='".$_POST['id_zapisani']."'");
                    echo "Przypisanie zostało usunięte";
                }
            }
            if(isset($_POST['wyswietl']))
            {
                $wyswietl=$connection->query("SELECT * FROM zapisani_do_klasy");
                while($row=$wyswietl->fetch_assoc())
                {

                    echo "<table>";
                    echo "<tr>
            <td><b>ID:</b> ".$row['id_wpisu']."<br/></td>
            <td><b>ID_nauczyciela:</b> ".$row['id_nauczyciela']." <br/></td>
            <td><b>ID_klasy:</b> ".$row['id_klasy']." <br/></td></tr>";
                    echo "</table>";

                }
            }
            ?>
        </div>  
    </body>

</html>