<?php
require("connect.php");
$ksiazki = $connect->query("SELECT * FROM ksiazka");
$klasy = $connect->query("SELECT * FROM klasa ORDER BY nazwa");
$glowna = $connect->query("SELECT * FROM glowna");
$klasy1 = $connect->query("SELECT zawod FROM ksiazka GROUP BY zawod ORDER BY zawod");
session_start();
?>
   <!DOCTYPE html>
   <html>

   <head>
      <title>Podręczniki</title>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="style.css">
      <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
      <script type="text/javascript" src="skrypt.js"></script>
   </head>

   <body>
      <div id="baner">
         <a href="logowanie.php">
            <input type="submit" name="logowanie" value="Zaloguj" id="zaloguj" class="logowanie">
            </a>
         <a href="logout.php">
               <input type="submit" name="wylogowanie" value="Wyloguj się" id="wyloguj" class="logowanie">
         </a>
         <a href="panel.php">
               <input type="submit" name="panel" value="Panel administracyjny" id="przyciskpanel" class="logowanie">
               </a>
         <div id="tytul">
            Wykaz podręczników
         </div>
      </div>
      <div id="menu">
         <div id="menu2">
            <form method="POST">
               <div id="lista">
                  <select name="wybor" type="text" id="klasazawod" onchange="zmiana(this.value);">
               <option selected hidden>Klasa</option>
               <option value="klasa">Klasa</option>
               <option value="zawod">Zawód</option>
            </select>
               </div>
               <div id="lista">
                  <select name="klasa" type="text" id="klasa" style="display: block;">
                 <option selected disabled hidden>Klasa</option>
               <?php
               while ($row=$klasy->fetch_assoc())
               {
                  echo '<option value="'.$row['id_klasy'].'">'.$row['numer'].' - '.$row['nazwa'].'</option>';
               }  
               ?>
               </select>
                  <select name="zawod" type="text" id="zawod" style="display: none;">
                 <option selected disabled hidden>Zawód</option>
               <?php
               while ($row=$klasy1->fetch_assoc())
               {
                   if(empty($row['zawod']))
                   {
                       echo '<option value="'.$row['zawod'].'">Nie dotyczy</option>';
                   } 
               else
               {
                   echo '<option value="'.$row['zawod'].'">'.$row['zawod'].'</option>';
               }
               }
                ?>
            </select>
               </div>
               <div id="lista">
                  <select name="podzial" type="text">
                     <option value="">Brak podziału</option>
                  <option>Podział ze względu na przedmioty ogólne i zawodowe</option>
               </select>
               </div>
               <div id="wyswietlanie">
                  <form method="POST">
                     <input type="submit" name="wyswietl" id="wyswietl" value="Wyświetl">
                  </form>
               </div>
            </form>
         </div>
      </div>
      <div id="main1" style="display: block;">
         Wybierz klasę lub zawód dla którego chcesz wyświetlić podręczniki
      </div>
      <div id="main2" style="display: none;">
         <?php
          if(isset($_POST['wyswietl']))
          {
               $jb = false;
             if (isset($_POST['wybor']) && isset($_POST['klasa']) || isset($_POST['zawod']) ) {        
                

                if (empty($_POST['podzial'])&& isset($_POST['klasa']) ) {
                   if (isset($_POST['klasa'])) {
                      $jb = true;
                      //wyswietlanie klasy bez podziału
                      $sql="SELECT * FROM glowna g INNER JOIN klasa k on g.id_klasy = k.id_klasy LEFT JOIN ksiazka s ON g.id_ksiazki = s.id_ksiazki  where g.id_klasy =".$_POST['klasa'];
                   }                   
                   if (isset($sql)) {
                      if ($rezultat = $connect->query($sql)) {
                         echo '<table>';
                         $licznik=0;
                         while($row = $rezultat->fetch_assoc()){
                            if ($licznik==0) {
                               echo '<tr style="text-align: center; font-size: 30px;"><td colspan="4"><b>'.$row['nazwa']."</b></td></tr>";
                            }
                            $licznik++;
                            //print_r($row);
                            echo 
                               "<tr><td> " .
                               $row['k_przedmiot'] . "</td><td>" .
                               $row['przedmiot'] . "</td><td>" .
                               $row['tytul'] . "</td><td>" .
                               '<a target="_blank" href="ksiazka.php?tytul='.$row['tytul'].'&autor='.$row['autor'].'&zawod='.$row['zawod'].'&uwagi='.$row['uwagi'].'&zdjecie='.$row['zdjecie'].'&wydawnictwo='.$row['wydawnictwo'].'">Więcej</a>' . 
                               "</td></tr>";


                         }
                         echo "</table>";
                      }
                   }
                }

                /*   
SELECT * FROM glowna g INNER JOIN klasa k on g.id_klasy = k.id_klasy LEFT JOIN ksiazka s ON g.id_ksiazki = s.id_ksiazki WHERE g.id_klasy = 1 && s.zawod IS NOT NULL  ORDER BY g.id_klasy

*/



                if (!empty($_POST['podzial'])&& isset($_POST['klasa']) && !isset($_POST['zawod'])) {
                   $jb = true;
                   //wyswietlanie klasy podział
                   $sql="SELECT * FROM glowna g INNER JOIN klasa k on g.id_klasy = k.id_klasy LEFT JOIN ksiazka s ON g.id_ksiazki = s.id_ksiazki where s.zawod IS NULL && g.id_klasy =".$_POST['klasa'];
                   if ($rezultat = $connect->query($sql)) {
                      $licznik=0;
                      echo '<table>';
                      while($row = $rezultat->fetch_assoc()){
                         if ($licznik==0) {
                            echo '<tr style="text-align: center; font-size: 30px;"><td colspan="4"><b>'.$row['nazwa']."</b></td></tr>";
                         }
                         $licznik++;
                         // print_r($row);
                         echo 
                            "<tr><td> " .
                            $row['k_przedmiot'] . "</td><td>" .
                            $row['przedmiot'] . "</td><td>" .
                            $row['tytul'] . "</td><td>" .
                            '<a target="_blank" href="ksiazka.php?tytul='.$row['tytul'].'&autor='.$row['autor'].'&zawod='.$row['zawod'].'&uwagi='.$row['uwagi'].'&zdjecie='.$row['zdjecie'].'&wydawnictwo='.$row['wydawnictwo'].'">Więcej</a>' . 
                            "</td></tr>";


                      }
                      //echo "</table>";
                   }
                          $sql="SELECT s.zawod , g.id_klasy FROM glowna g INNER JOIN klasa k on g.id_klasy = k.id_klasy LEFT JOIN ksiazka s ON g.id_ksiazki = s.id_ksiazki where s.zawod IS NOT NULL && g.id_klasy =".$_POST['klasa'].' GROUP BY s.zawod';
                      if ($rezultat = $connect->query($sql)) {
                            $licznik=0;
                              while($row = $rezultat->fetch_assoc()){
                               $tabela_z[$licznik]=$row;
                                $licznik++;
                           }
                        
foreach ($tabela_z as $key => $value) {
                                    
                                    

                                    $sql="SELECT * FROM glowna g INNER JOIN klasa k on g.id_klasy = k.id_klasy LEFT JOIN ksiazka s ON g.id_ksiazki = s.id_ksiazki where s.zawod ='".$value['zawod']."' && g.id_klasy =".$value['id_klasy'];
            if ($rezultata = $connect->query($sql)) {
                         $licznik=0;
                              while($rowa = $rezultata->fetch_assoc()){
                                if ($licznik==0) {
                                   echo '<tr style="text-align: center; font-size: 30px;"><td colspan="4"><b>'.$rowa['zawod']."</b></td></tr>";
                                }
                                $licznik++;
                          //print_r($row);
                          echo 
                         "<tr><td> " .
                         $rowa['k_przedmiot'] . "</td><td>" .
                         $rowa['przedmiot'] . "</td><td>" .
                         $rowa['tytul'] . "</td><td>" .
                         '<a target="_blank" href="ksiazka.php?tytul='.$rowa['tytul'].'&autor='.$rowa['autor'].'&zawod='.$rowa['zawod'].'&uwagi='.$rowa['uwagi'].'&zdjecie='.$rowa['zdjecie'].'&wydawnictwo='.$rowa['wydawnictwo'].'">Więcej</a>' . 
                         "</td></tr>";                             
                              }
                              
                          }







                                }






                              echo "</table>";
                          }
                    
          }

                if ($_POST['wybor'] == 'zawod' && isset($_POST['zawod']) && empty($_POST['podzial'])) {
                   $jb = true;
                   //wyswietlanie zawodu bez podziału     
                   //  echo "asdadssadsadzawod"; 

                   $sql="SELECT * FROM glowna g INNER JOIN klasa k on g.id_klasy = k.id_klasy LEFT JOIN ksiazka s ON g.id_ksiazki = s.id_ksiazki   where s.zawod ='".$_POST['zawod']."' GROUP BY g.id_klasy ORDER BY `g`.`id_klasy` ASC";
                   if ($rezultat = $connect->query($sql)) {
                      //print_r($rezultat);
                      $tabela_z[]=0;
                      $licznik=0;
                      while($row = $rezultat->fetch_assoc()){
                         $tabela_z[$licznik]=$row;
                         $licznik++;



                      }

                      echo "<table>";
                      foreach ($tabela_z as $key => $value) {



                         $sql="SELECT * FROM glowna g INNER JOIN klasa k on g.id_klasy = k.id_klasy LEFT JOIN ksiazka s ON g.id_ksiazki = s.id_ksiazki   where g.id_klasy =".$value['id_klasy'];
                         if ($rezultata = $connect->query($sql)) {
                            $licznik=0;
                            while($rowa = $rezultata->fetch_assoc()){
                               if ($licznik==0) {
                                  echo '<tr style="text-align: center; font-size: 30px;"><td colspan="4"><b>'.$rowa['nazwa']."</b></td></tr>";
                               }
                               $licznik++;
                               //print_r($row);
                               echo 
                                  "<tr><td> " .
                                  $rowa['k_przedmiot'] . "</td><td>" .
                                  $rowa['przedmiot'] . "</td><td>" .
                                  $rowa['tytul'] . "</td><td>" .
                                  '<a target="_blank" href="ksiazka.php?tytul='.$rowa['tytul'].'&autor='.$rowa['autor'].'&zawod='.$rowa['zawod'].'&uwagi='.$rowa['uwagi'].'&zdjecie='.$rowa['zdjecie'].'&wydawnictwo='.$rowa['wydawnictwo'].'">Więcej</a>' . 
                                  "</td></tr>";


                            }

                         }







                      }
                      echo "<td colspan='4'></td></table>";

                   }else
                   {
                      echo "cos nie tak";
                   }
                   // echo $sql;

                }

                if ($_POST['wybor'] == 'zawod' && isset($_POST['zawod']) && !empty($_POST['podzial'])) {
                   $jb = true;
                   //wyswietlanie zawodu z podziału     
                   //  echo "asdadssadsadzawod"; 

                   $sql="SELECT * FROM glowna g INNER JOIN klasa k on g.id_klasy = k.id_klasy LEFT JOIN ksiazka s ON g.id_ksiazki = s.id_ksiazki    where s.zawod ='".$_POST['zawod']."' GROUP BY g.id_klasy ORDER BY `g`.`id_klasy` ASC";
                   if ($rezultat = $connect->query($sql)) {
                      //print_r($rezultat);
                      $tabela_z[]=0;
                      $licznik=0;
                      while($row = $rezultat->fetch_assoc()){
                         $tabela_z[$licznik]=$row;
                         $licznik++;
                      }

                      echo "<table>";
                      foreach ($tabela_z as $key => $value) {

                         $sql="SELECT * FROM glowna g INNER JOIN klasa k on g.id_klasy = k.id_klasy LEFT JOIN ksiazka s ON g.id_ksiazki = s.id_ksiazki    where s.zawod IS NULL && g.id_klasy =".$value['id_klasy'];
                         if ($rezultat = $connect->query($sql)) {
                            $licznika=0;
                            while($row = $rezultat->fetch_assoc()){
                               if ($licznika==0) {
                                  echo '<tr style="text-align: center; font-size: 30px;"><td colspan="4"<b>Przedmioty ogólne '.$row['nazwa']."</b></td></tr>";
                               }
                               $licznika++;
                               //print_r($row);
                               echo 
                                  "<tr><td> " .
                                  $row['k_przedmiot'] . "</td><td>" .
                                  $row['przedmiot'] . "</td><td>" .
                                  $row['tytul'] . "</td><td>" .
                                  '<a target="_blank" href="ksiazka.php?tytul='.$row['tytul'].'&autor='.$row['autor'].'&zawod='.$row['zawod'].'&uwagi='.$row['uwagi'].'&zdjecie='.$row['zdjecie'].'&wydawnictwo='.$row['wydawnictwo'].'">Więcej</a>' . 
                                  "</td></tr>";


                            }
                            // echo "</table>";
                         }
                         $sql="SELECT * FROM glowna g INNER JOIN klasa k on g.id_klasy = k.id_klasy LEFT JOIN ksiazka s ON g.id_ksiazki = s.id_ksiazki    where s.zawod IS NOT NULL && g.id_klasy =".$value['id_klasy'];
                         if ($rezultat = $connect->query($sql)) {
                            $licznika=0;
                            while($row = $rezultat->fetch_assoc()){
                               if ($licznika==0) {
                                  echo '<tr style="text-align: center; font-size: 30px;"><td colspan="4"><b>Przedmioty zawodowe '.$row['nazwa'].'<b></td></tr>';
                               }
                               $licznika++;
                               //print_r($row);
                               echo 
                                  "<tr><td> " .
                                  $row['k_przedmiot'] . " </td><td>" .
                                  $row['przedmiot'] . "</td><td>" .
                                  $row['tytul'] . "</td><td>" .
                                  '<a target="_blank" href="ksiazka.php?tytul='.$row['tytul'].'&autor='.$row['autor'].'&zawod='.$row['zawod'].'&uwagi='.$row['uwagi'].'&zdjecie='.$row['zdjecie'].'&wydawnictwo='.$row['wydawnictwo'].'">Więcej</a>' . 
                                  "</td></tr>";


                            }

                         }
                      }
                      echo "</table>";
                   } 
                }
             }
             if($jb)
             {
                echo '<script type="text/javascript">
              document.getElementById("main1").style.display = "none";
              document.getElementById("main2").style.display = "block";
              </script>';
             }
          }
          ?>

      </div>
   </body>
   <?php
      if(@$_SESSION['zalogowany'] == true)
      {
         echo '<script type="text/javascript">
         document.getElementById("zaloguj").style.display = "none";
         document.getElementById("wyloguj").style.display = "block";
         document.getElementById("przyciskpanel").style.display = "block";
         </script>';
      }
      ?>

   </html>
