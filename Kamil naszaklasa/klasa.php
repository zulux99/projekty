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
                <h1>Klasa</h1>
            </div>
            <form method="post">
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
            
                <input hidden class="wygl" type=text name="id">
                Nazwa:<br/><input class="wygl" type=text name="nazwa" id="nazwa"><br/><br/>
                Rocznik:<br/><input class="wygl" type=text name="rocznik" id="rocznik"><br/><br/><br/>
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
        if ((!empty($_POST['nazwa']))&&(!empty($_POST['rocznik'])))
        {
        $id = $_POST['id'];	
        $nazwa = $_POST['nazwa'];
        $rocznik = $_POST['rocznik'];
            $connection->query("INSERT INTO `klasa`(`id_klasy`, `nazwa`, `rocznik`) VALUES (NULL,'".$_POST['nazwa']."','".$_POST['rocznik']."')");
            echo "Dodano klasę";
        }
        }

        if(isset($_POST['update']))
        {
            if(!empty($_POST['id_klasy']))
            {
                if(!empty($_POST['nazwa']))
                {$connection->query("UPDATE klasa SET nazwa='".$_POST['nazwa']."' WHERE id_klasy='".$_POST['id_klasy']."'");}
                if(!empty($_POST['rocznik']))
                {$connection->query("UPDATE klasa SET rocznik='".$_POST['rocznik']."' WHERE id_klasy='".$_POST['id_klasy']."'");}
                echo "Zaktualizowano";
      
            }
        }
            if(isset($_POST['usun']))
            {
                if(!empty($_POST['id_klasy']))
                {
                    $connection->query("DELETE FROM uczen_klasa WHERE id_klasy='".$_POST['id_klasy']."'");
                    $connection->query("DELETE FROM zapisani_do_klasy WHERE id_klasy='".$_POST['id_klasy']."'");
                    $connection->query("DELETE FROM klasa WHERE id_klasy='".$_POST['id_klasy']."'");
                    echo "Klasa została usunięta";
                }
            }
        if(isset($_POST['wyswietl']))
        {
            $wyswietl=$connection->query("SELECT * FROM klasa");
            while($row=$wyswietl->fetch_assoc())
            {

                echo "<table>";
                echo "<tr>
            <td><b>ID:</b> ".$row['id_klasy']."<br/></td>
            <td><b>Nazwa:</b> ".$row['nazwa']." <br/></td>
            <td><b>Rocznik:</b> ".$row['rocznik']." <br/></td></tr>";
                echo "</table>";

            }
        }
?>
        </div>  
    </body>

</html>
