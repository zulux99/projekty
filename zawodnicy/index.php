<!doctype html>

<html>
<?php
   require("connect.php");
?>

   <head>
      <title>Zawodnicy</title>
      <meta charset="UTF-8">
      <link rel="stylesheet" type="text/css" href="style.css">
      <script type="text/javascript">
         function aktywacja() {
            var checkBox = document.getElementById("check");
            if (checkBox.checked == true) {
               document.getElementById("styl2").disabled = false;
            } else {
               document.getElementById("styl2").disabled = true;
            }
         }

      </script>
   </head>

   <body>
       <div id="gorny">
           <a href="wynik.php">
               <input type="button" value="WYNIKI">
           </a>
       </div>
      <div id="form">
         <form method="POST">
            <div id="lewy">
               <select name="zawodnik" id="zawodnik">
        <?php
         $zawodnicy = $connect->query("SELECT * FROM zawodnik");
            echo '<option hidden selected>Nie wybrano</option>';
            while($row = $zawodnicy->fetch_assoc())
        {
               echo '<option data-id="'.$row['id_zawodnika'].'" data-imie="'.$row['imie'].'" data-nazwisko="'.$row['nazwisko'].'" data-plec="'.$row['plec'].'" data-szkola="'.$row['szkola'].'" data-druzyna="'.$row['druzyna'].'" data-styl1="'.$row['styl1'].'" data-styl2="'.$row['styl2'].'" value="'.$row['id_zawodnika'].'"><b>'.$row['imie'].'</b> '.$row['nazwisko'].'<br>';
        }
        ?>
     </select>
               <script>
                  var zawodnik = document.getElementById('zawodnik');
                  zawodnik.addEventListener('change', function() {
                     var option = zawodnik.options[zawodnik.selectedIndex];
                     document.getElementById('id').value = option.dataset.id;
                     document.getElementById('imie').value = option.dataset.imie;
                     document.getElementById('nazwisko').value = option.dataset.nazwisko;
                     if (option.dataset.plec == 'kobieta') {
                        document.getElementById('kobieta').checked = true;
                     } else {
                        document.getElementById('mezczyzna').checked = true;
                     }
                     document.getElementById('szkola').value = option.dataset.szkola;
                     document.getElementById('druzyna').value = option.dataset.druzyna;
                     document.getElementById('styl1').value = option.dataset.styl1;
                     if (option.dataset.styl2 != '') {
                        document.getElementById("check").checked = true;
                        document.getElementById('styl2').value = option.dataset.styl2;
                        aktywacja();
                     } else {
                        document.getElementById("check").checked = false;
                        document.getElementById("styl2").disabled = true;
                        document.getElementById('styl2').value = 'niewybrano';
                     }
                  });

               </script>
               <br/> Imię:
               <input type="text" name="id" id="id" hidden>
               <br/><input type="text" name="imie" id="imie"><br/> Nazwisko:
               <br/><input type="text" name="nazwisko" id="nazwisko"><br/> Płeć:
               <br/><input type="radio" name="plec" id="kobieta" value="kobieta"> Kobieta<br/>
               <input type="radio" name="plec" id="mezczyzna" value="mezczyzna"> Mężczyzna<br/> Szkoła:
               <br/><input type="text" name="szkola" id="szkola"><br/> Drużyna:
               <br/><input type="text" name="druzyna" id="druzyna"><br/> Styl pływacki 1:<br/>
               <select name="styl1" id="styl1">
            <option selected disabled hidden>Nie wybrano</option>
            <option value="kraul">Kraul</option>
            <option value="klasyczny">Klasyczny</option>
            <option value="grzbietowy">Grzbietowy</option>
            <option value="motylkowy">Motylkowy</option>
         </select><br/> Styl pływacki 2 (opcjonalny):<br/>
               <input type="checkbox" id="check" onclick="aktywacja()">
               <select name="styl2" disabled id="styl2" style="width: 205px;">
            <option selected disabled hidden value="niewybrano">Nie wybrano</option>
            <option value="kraul">Kraul</option>
            <option value="klasyczny">Klasyczny</option>
            <option value="grzbietowy">Grzbietowy</option>
            <option value="motylkowy">Motylkowy</option>
           </select>
            </div>
            <div id="prawy">
               <input type="submit" value="Wyczyść" class="przycisk"><br/>
               <input type="submit" name="dodaj" value="Dodaj zawodnika" class="przycisk"><br/>
               <input type="submit" name="usun" value="Usuń zawodnika" class="przycisk"><br/>
               <input type="submit" name="zmien" value="Zmień dane" class="przycisk"><br/>
               <input type="submit" name="wyswietl" value="Wyświetl zawodników" class="przycisk">
            </div>
         </form>
      </div>
   </body>
   <?php
      if(isset($_POST['dodaj']))
      {
         if(!empty($_POST['imie'])&&!empty($_POST['nazwisko'])&&isset($_POST['plec'])&&!empty($_POST['szkola'])&&!empty($_POST['druzyna'])&&isset($_POST['styl1']))
         {
            if(isset($_POST['styl2']))
               $styl2 = "'".$_POST['styl2']."'";
            else
               $styl2 = "NULL"; 
            $connect->query("INSERT INTO `zawodnik` (`id_zawodnika`, `imie`, `nazwisko`, `plec`, `szkola`, `druzyna`, `styl1`, `styl2`) VALUES (NULL, '".$_POST['imie']."', '".$_POST['nazwisko']."', '".$_POST['plec']."', '".$_POST['szkola']."', '".$_POST['druzyna']."', '".$_POST['styl1']."', $styl2);");
            echo "<div class='komunikat'>Dodano zawodnika</div>";
         }
         else
         {
            echo "<div class='komunikat'>Należy wypełnić wszystkie wymagane pola, aby dodać zawodnika</div>";
         }
      }
   if(isset($_POST['usun']))
   {
      if(!empty($_POST['id']))
      {
            $connect->query("DELETE FROM zawodnik WHERE id_zawodnika='".$_POST['id']."'");
         echo "<div class='komunikat'>Usunięto zawodnika</div>";
      }
      else
         echo "<div class='komunikat'>Należy wybrać zawodnika, którego chcemy usunąć</div>";
   }
   if(isset($_POST['zmien']))
   {
      if(!empty($_POST['id']))
      {
         if(!empty($_POST['imie']))
         {
            $connect->query("UPDATE zawodnik SET imie='".$_POST['imie']."' WHERE id_zawodnika='".$_POST['id']."'");
         }
         if(!empty($_POST['nazwisko']))
         {
            $connect->query("UPDATE zawodnik SET nazwisko='".$_POST['nazwisko']."' WHERE id_zawodnika='".$_POST['id']."'");
         }
         if(isset($_POST['plec']))
         {
            $connect->query("UPDATE zawodnik SET plec='".$_POST['plec']."' WHERE id_zawodnika='".$_POST['id']."'");
         }
         if(!empty($_POST['szkola']))
         {
            $connect->query("UPDATE zawodnik SET szkola='".$_POST['szkola']."' WHERE id_zawodnika='".$_POST['id']."'");
         }
         if(!empty($_POST['druzyna']))
         {
            $connect->query("UPDATE zawodnik SET druzyna='".$_POST['druzyna']."' WHERE id_zawodnika='".$_POST['id']."'");
         }
         if(!empty($_POST['styl1']))
         {
            $connect->query("UPDATE zawodnik SET styl1='".$_POST['styl1']."' WHERE id_zawodnika='".$_POST['id']."'");
         }
         if(!empty($_POST['styl2']))
         {
            $connect->query("UPDATE zawodnik SET styl2='".$_POST['styl2']."' WHERE id_zawodnika='".$_POST['id']."'");
         }
         echo "<div class='komunikat'>Zaktualizowano dane</div>";
      }
      else
      {
         echo "<div class='komunikat'>Należy wybrać zawodnika, aby zaktualizować dane</div>";
      }
   }
   if(isset($_POST['wyswietl']))
   {
      echo "<div id='wyswietlanie'>";
         $zawodnicy1 = $connect->query("SELECT * FROM zawodnik");
         echo "<table>";
         echo "<tr>
            <td style='text-align: center;'><b>Imię</b></td>
            <td style='text-align: center;'><b>Nazwisko</b></td>
            <td style='text-align: center;'><b>Płeć</b></td>
            <td style='text-align: center;'><b>Szkoła</b></td>
            <td style='text-align: center;'><b>Drużyna</b></td>
            <td style='text-align: center;'><b>Styl pływacki 1</b></td>
            <td style='text-align: center;'><b>Styl pływacki 2</b></td>
            </tr>";
         while($row = $zawodnicy1->fetch_assoc())
         {
            if($row['plec'] == 'mezczyzna')
               $row['plec'] = 'mężczyzna';
            echo "<tr>
            <td>".ucfirst($row['imie'])."</td>
            <td>".ucfirst($row['nazwisko'])."</td>
            <td>".ucfirst($row['plec'])."</td>
            <td>".ucfirst($row['szkola'])."</td>
            <td>".ucfirst($row['druzyna'])."</td>
            <td>".ucfirst($row['styl1'])."</td>
            <td>".ucfirst($row['styl2'])."</td>
            </tr>";
         }
         echo "</table>";
      echo "</div>";
   }
   ?>

</html>
