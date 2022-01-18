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
                var lista = document.getElementById('iduczenklasa');
                var option = lista.options[lista.selectedIndex];
                document.getElementById('id_ucznia').value = option.dataset.id_ucznia;
                document.getElementById('id_klasy').value = option.dataset.id_klasy;
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
            <div>
                <h1>Uczeń-Klasa</h1>
            </div>
            <form method="post">
                <select id="iduczenklasa" name="id_uczenklasa" class="wygl" onchange="zmiana()">
                    <option value="0" selected disabled hidden>Uczeń-Klasa</option>
                    <?php
                    $sql = "SELECT * FROM `uczen_klasa`";
                    if ($rezultat = $connection->query($sql))
                    {
                        while($row = $rezultat->fetch_assoc())
                        {
                            echo "<option value='".$row['id_uk']."' data-id_ucznia='".$row['id_ucznia']."' data-id_klasy='".$row['id_klasy']."' >".$row['id_ucznia'].' - '.$row['id_klasy']."</option>";
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
                if ((!empty($_POST['id_ucznia']))&&(!empty($_POST['id_klasy'])))
                {
                    $connection->query("INSERT INTO `uczen_klasa`(`id_uk`, `id_ucznia`, `id_klasy`) VALUES (NULL,'".$_POST['id_ucznia']."','".$_POST['id_klasy']."')");
                    echo "Dodano przypisanie";
                }
            }

            if(isset($_POST['usun']))
            {
                if(!empty($_POST['id_uczenklasa']))
                {
                    $connection->query("DELETE FROM uczen_klasa WHERE id_uk='".$_POST['id_uczenklasa']."'");
                    echo "Przypisanie zostało usunięte";
                }
            }
            if(isset($_POST['wyswietl']))
            {
                $wyswietl=$connection->query("SELECT * FROM uczen_klasa");
                while($row=$wyswietl->fetch_assoc())
                {

                    echo "<table>";
                    echo "<tr>
            <td><b>ID:</b> ".$row['id_uk']."<br/></td>
            <td><b>ID_ucznia:</b> ".$row['id_ucznia']." <br/></td>
            <td><b>ID_klasy:</b> ".$row['id_klasy']." <br/></td></tr>";
                    echo "</table>";

                }
            }
            ?>
        </div>  
    </body>

</html>
