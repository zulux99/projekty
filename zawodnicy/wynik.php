<!doctype html>
<html>
<?php
   require("connect.php");
?>

   <head>
      <title>Wyniki</title>
      <meta charset="UTF-8">
      <link rel="stylesheet" type="text/css" href="style.css">
   </head>

   <body>
      <div id="gorny">
         <a href="index.php">
               <input type="button" value="GŁÓWNA">
           </a>
      </div>
      <div id="wynik1">
         <form method="POST">
            <div id="lewyw">
               <select name="wynik" id="wynik">
         <option selected disabled hidden>Wybierz wynik</option>
            <?php
            $sql = "SELECT * FROM wynik w JOIN zawodnik z WHERE w.id_zawodnika=z.id_zawodnika
            ORDER BY czas";
            $wyniki = $connect->query($sql);

            while ($row=$wyniki->fetch_assoc()) {
               echo '<option value="'.$row['id_wyniku'].'" data-czas="'.$row['czas'].'" data-zawodnik="'.$row['id_zawodnika'].'" data-styl="'.$row['styl'].'" >'.$row['imie'].' - '.$row['nazwisko'].' - '.$row['czas'].' - '.$row['styl'].'</option>';
            }
            ?>
            <script>
               var zawodnik = document.getElementById('wynik');
               zawodnik.addEventListener('change', function() {
                  var option = zawodnik.options[wynik.selectedIndex];
                  document.getElementById('czas').value = option.dataset.czas;
                  document.getElementById('zawodnik').value = option.dataset.zawodnik;
                  document.getElementById('styl').value = option.dataset.styl;
                  document.getElementById('id_zawodnika').value = option.dataset.id_zawodnika;
               });
            </script>
         </select><br/> Czas
               <br/>
               <input type="text" name="czas" id="czas"><br/> Zawodnik
               <br/>
               <select name="zawodnik" id="zawodnik">
            <?php
            $zawodnicy = $connect->query("SELECT * FROM zawodnik ORDER BY nazwisko");
            echo '<option hidden selected>Nie wybrano</option>';
            while($row = $zawodnicy->fetch_assoc())
            {
               echo '<option value="'.$row['id_zawodnika'].'"><b>'.$row['imie'].'</b> '.$row['nazwisko'].'<br>';
            }
            ?>
         </select><br/> Styl
               <br/>
               <select name="styl" id="styl">
            <option selected disabled hidden>Nie wybrano</option>
            <option value="kraul">Kraul</option>
            <option value="klasyczny">Klasyczny</option>
            <option value="grzbietowy">Grzbietowy</option>
            <option value="motylkowy">Motylkowy</option>
         </select>
            </div>
            <div id="prawyw">
               <input type="submit" value="Wyczyść"><br/>
               <input type="submit" name="dodaj" value="Dodaj"><br/>
               <input type="submit" name="zmien" value="Zmień"><br/>
               <input type="submit" name="usun" value="Usuń"><br/>
            </div>
            <div id="dolny">
               <input type="submit" name="kraul" id="wyswietl" value="Kraul">
               <input type="submit" name="klasyczny" id="wyswietl" value="Klasyczny">
               <input type="submit" name="grzbietowy" id="wyswietl" value="Grzbietowy">
               <input type="submit" name="motylkowy" id="wyswietl" value="Motylkowy">
            </div>
         </form>
      </div>
   </body>
   <?php
   if(isset($_POST['dodaj']))
   {
      if(!empty($_POST['czas'])&&isset($_POST['zawodnik'])&&isset($_POST['styl']))
      {
         $connect->query("INSERT INTO `wynik` (`id_wyniku`, `czas`, `styl`, `id_zawodnika`) VALUES (NULL, '".$_POST['czas']."', '".$_POST['styl']."', '".$_POST['zawodnik']."');");
         echo "<div class='komunikat'>Dodano wynik</div>";
      }
      else
      {
         echo "<div class='komunikat'>Należy wypełnić wszystkie wymagane pola, aby dodać wynik</div>";
      }
   }
   if(isset($_POST['zmien']))
   {
      if(isset($_POST['wynik']))
      {
         if(!empty($_POST['czas']))
         {
            $connect->query("UPDATE wynik SET czas='".$_POST['czas']."' WHERE id_wyniku='".$_POST['wynik']."'");
         }
         if(!empty($_POST['nazwisko']))
         {
            $connect->query("UPDATE wynik SET id_zawodnika='".$_POST['zawodnik']."' WHERE id_wyniku='".$_POST['wynik']."'");
         }
         if(isset($_POST['styl']))
         {
            $connect->query("UPDATE wynik SET styl='".$_POST['styl']."' WHERE id_wyniku='".$_POST['wynik']."'");
         }
         echo "<div class='komunikat'>Zaktualizowano dane</div>";
      }
      else
      {
         echo "<div class='komunikat'>Należy wybrać wynik, aby zaktualizować dane</div>";
      }
   }
   if(isset($_POST['usun']))
   {
      if(isset($_POST['wynik']))
      {
         $connect->query("DELETE FROM wynik WHERE id_wyniku='".$_POST['wynik']."'");
         echo "<div class='komunikat'>Usunięto wynik</div>";
      }
      else
         echo "<div class='komunikat'>Należy wybrać wynik, który chcemy usunąć</div>";
   }
    $wyniki1 = $connect->query('SELECT * FROM wynik w JOIN zawodnik z WHERE w.id_zawodnika=z.id_zawodnika ORDER BY czas');
   $licznik = 0;
   $powt = 0;
   $czas = 0;
    if(isset($_POST['kraul']))
    {
       echo "<div id='wyswietlanie'>";
       echo "<table>";
       echo "<tr>
            <td style='text-align: center;'><b>Miejsce</b></td>
            <td style='text-align: center;'><b>Czas</b></td>
            <td style='text-align: center;'><b>Styl</b></td>
            <td style='text-align: center;'><b>Imię</b></td>
            <td style='text-align: center;'><b>Nazwisko</b></td>
            <td style='text-align: center;'><b>Szkoła</b></td>
            <td style='text-align: center;'><b>Drużyna</b></td>
            </tr>";
       while($row = $wyniki1->fetch_assoc())
       {
          if($row['styl'] == "kraul")
          {
             if($row['czas']!=$czas)
             { 
                $licznik++;
                $licznik = $licznik + $powt;
                $powt = 0;
             }
             else
                $powt++;
             if($row['plec'] == 'mezczyzna')
                $row['plec'] = 'mężczyzna';
             echo "<tr>
            <td>$licznik</td>
            <td>".$row['czas'].' '.'s'."</td>
            <td>".ucfirst($row['styl'])."</td>
            <td>".ucfirst($row['imie'])."</td>
            <td>".ucfirst($row['nazwisko'])."</td>
            <td>".ucfirst($row['szkola'])."</td>
            <td>".ucfirst($row['druzyna'])."</td>
            </tr>";
             $czas = $row['czas'];
          }
       }
       echo "</table>";
       echo "</div>";
    }
    if(isset($_POST['klasyczny']))
    {
       echo "<div id='wyswietlanie'>";
       echo "<table>";
       echo "<tr>
            <td style='text-align: center;'><b>Miejsce</b></td>
            <td style='text-align: center;'><b>Czas</b></td>
            <td style='text-align: center;'><b>Styl</b></td>
            <td style='text-align: center;'><b>Imię</b></td>
            <td style='text-align: center;'><b>Nazwisko</b></td>
            <td style='text-align: center;'><b>Szkoła</b></td>
            <td style='text-align: center;'><b>Drużyna</b></td>
            </tr>";
       while($row = $wyniki1->fetch_assoc())
       {
          if($row['styl'] == "klasyczny")
          {
             if($row['czas']!=$czas)
             { 
                $licznik++;
                $licznik = $licznik + $powt;
                $powt = 0;
             }
             else
                $powt++;
             if($row['plec'] == 'mezczyzna')
                $row['plec'] = 'mężczyzna';
             echo "<tr>
            <td>$licznik</td>
            <td>".$row['czas'].' '.'s'."</td>
            <td>".ucfirst($row['styl'])."</td>
            <td>".ucfirst($row['imie'])."</td>
            <td>".ucfirst($row['nazwisko'])."</td>
            <td>".ucfirst($row['szkola'])."</td>
            <td>".ucfirst($row['druzyna'])."</td>
            </tr>";
             $czas = $row['czas'];
          }
       }
       echo "</table>";
       echo "</div>";
    }
    if(isset($_POST['grzbietowy']))
    {
       echo "<div id='wyswietlanie'>";
       echo "<table>";
       echo "<tr>
            <td style='text-align: center;'><b>Miejsce</b></td>
            <td style='text-align: center;'><b>Czas</b></td>
            <td style='text-align: center;'><b>Styl</b></td>
            <td style='text-align: center;'><b>Imię</b></td>
            <td style='text-align: center;'><b>Nazwisko</b></td>
            <td style='text-align: center;'><b>Szkoła</b></td>
            <td style='text-align: center;'><b>Drużyna</b></td>
            </tr>";
       while($row = $wyniki1->fetch_assoc())
       {
          if($row['styl'] == "grzbietowy")
          {
             if($row['czas']!=$czas)
             { 
                $licznik++;
                $licznik = $licznik + $powt;
                $powt = 0;
             }
             else
                $powt++;
             if($row['plec'] == 'mezczyzna')
                $row['plec'] = 'mężczyzna';
             echo "<tr>
            <td>$licznik</td>
            <td>".$row['czas'].' '.'s'."</td>
            <td>".ucfirst($row['styl'])."</td>
            <td>".ucfirst($row['imie'])."</td>
            <td>".ucfirst($row['nazwisko'])."</td>
            <td>".ucfirst($row['szkola'])."</td>
            <td>".ucfirst($row['druzyna'])."</td>
            </tr>";
             $czas = $row['czas'];
          }
       }
       echo "</table>";
       echo "</div>";
    }
    if(isset($_POST['motylkowy']))
    {
       echo "<div id='wyswietlanie'>";
       echo "<table>";
       echo "<tr>
            <td style='text-align: center;'><b>Miejsce</b></td>
            <td style='text-align: center;'><b>Czas</b></td>
            <td style='text-align: center;'><b>Styl</b></td>
            <td style='text-align: center;'><b>Imię</b></td>
            <td style='text-align: center;'><b>Nazwisko</b></td>
            <td style='text-align: center;'><b>Szkoła</b></td>
            <td style='text-align: center;'><b>Drużyna</b></td>
            </tr>";
       while($row = $wyniki1->fetch_assoc())
       {
          if($row['styl'] == "motylkowy")
          {
          if($row['czas']!=$czas)
          { 
             $licznik++;
             $licznik = $licznik + $powt;
             $powt = 0;
          }
          else
             $powt++;
             if($row['plec'] == 'mezczyzna')
                $row['plec'] = 'mężczyzna';
             echo "<tr>
            <td>$licznik</td>
            <td>".$row['czas'].' '.'s'."</td>
            <td>".ucfirst($row['styl'])."</td>
            <td>".ucfirst($row['imie'])."</td>
            <td>".ucfirst($row['nazwisko'])."</td>
            <td>".ucfirst($row['szkola'])."</td>
            <td>".ucfirst($row['druzyna'])."</td>
            </tr>";
             $czas = $row['czas'];
          }
       }
       echo "</table>";
       echo "</div>";
    }
    
?>

</html>
