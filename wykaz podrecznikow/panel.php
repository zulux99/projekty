<?php
session_start();
if(@$_SESSION['zalogowany'] == false)
{
   echo "Nie jesteś uprawniony do przeglądania tej strony";
   die;
}
require("connect.php");
$ksiazki = $connect->query("SELECT * FROM ksiazka ORDER BY tytul");
$ksiazki2 = $connect->query("SELECT * FROM ksiazka ORDER BY tytul");
$ksiazki3 = $connect->query("SELECT * FROM ksiazka ORDER BY przedmiot");
$klasy = $connect->query("SELECT * FROM klasa ORDER BY nazwa");
$klasy2 = $connect->query("SELECT * FROM klasa ORDER BY nazwa");
$klasy3 = $connect->query("SELECT * FROM klasa ORDER BY nazwa");
$glowna = $connect->query("SELECT * FROM glowna");
$klasy1 = $connect->query("SELECT zawod FROM ksiazka GROUP BY zawod");
$glowna1 = $connect->query("SELECT * FROM glowna g INNER JOIN klasa k on g.id_klasy = k.id_klasy LEFT JOIN ksiazka s ON g.id_ksiazki = s.id_ksiazki;");
?>
   <!DOCTYPE html>
   <html>

   <head>
      <title>Podręczniki</title>
      <meta charset="utf-8">
      <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="style.css">
      <script type="text/javascript" src="skrypt.js"></script>
   </head>

   <body>
      <div id="baner">
         <div>
            <a href="logout.php">
               <input type="submit" name="wylogowanie" value="Wyloguj się" id="wyloguj" class="logowanie">
               </a>
            <a href="index.php">
               <input type="submit" value="Strona główna" class="logowanie">
            </a>
         </div>
         <div id="tytul">
            Panel administracyjny
         </div>
      </div>
      <div id="panel">
         <div id="panelmenu">
            <form method="POST">
               <input type="submit" name="dodaj" class="logowanie" id="panel2" value="Dodaj">
               <input type="submit" name="usung" class="logowanie" id="panel2" value="Usuń">
               <input type="submit" name="zmien" class="logowanie" id="panel2" value="Zmień dane">
            </form>
         </div>
         <!--Dodawanie danych-->
         <div id="panel_dodaj">
            <div class="panel_klasa">
               <form method="POST" ENCTYPE="multipart/form-data">
                  <input type="text" name="tytul" class="input">
                  <div class="inputtext">*Tytuł: </div><br/>
                  <input type="text" name="autor" class="input">
                  <div class="inputtext">*Autor: </div><br/>
                  <input type="text" name="wydawnictwo" class="input">
                  <div class="inputtext">*Wydawnictwo: </div><br/>
                  <input type="text" name="uwagi" class="input">
                  <div class="inputtext">Uwagi: </div><br/>
                  <input type="file" id="plik" name="plik">
                  <div class="inputtext">Zdjęcie:&nbsp;</div><br/>
                  <input type="text" name="zawod" class="input" placeholder="Puste jeśli przedmiot ogólny">
                  <div class="inputtext">Zawód: </div><br/>
                  <input type="text" name="przedmiot" class="input">
                  <div class="inputtext">*Przedmiot: </div><br/>
                  <input type="text" name="k_przedmiot" class="input">
                  <div class="inputtext">*Skr. naz. prz.: </div>
                  <input type="submit" name="dodaj_ksiazka" class="logowanie" id="dolny" value="Dodaj książkę">
               </form>
            </div>
            <div class="panel_klasa">
               <form method="POST">
                  <input type="text" name="numer" class="input">
                  <div class="inputtext">*Numer: </div><br/>
                  <input type="text" name="nazwa" class="input">
                  <div class="inputtext">*Nazwa: </div><br/>
                  <input type="submit" name="dodaj_klasa" class="logowanie" id="dolny" value="Dodaj klasę">
               </form>
            </div>
            <div class="panel_przypisanie">
               <form method="POST">
                  <select name="klasa" type="text" id="klasa" style="margin-top: 5px; float:right;">
                  <option selected disabled hidden>Klasa</option>
                  <?php
                  while ($row=$klasy->fetch_assoc())
                  {
                     echo '<option value="'.$row['id_klasy'].'">'.$row['numer'].' - '.$row['nazwa'].'</option>';
                  }  
                  ?>
               </select>
                  <div class="inputtext">*Klasa:&nbsp;</div><br/>
                  <select name="ksiazka" type="text" id="klasa" style="margin-top: 5px; float:right;">
                  <option selected disabled hidden>Książka</option>
                  <?php
                  while ($row=$ksiazki->fetch_assoc())
                  {
                     echo '<option value="'.$row['id_ksiazki'].'">'.$row['tytul'].'</option>';
                  }  
                  ?>
               </select>
                  <div class="inputtext">*Tytuł książki:&nbsp;</div><br/>
                  <input type="submit" name="dodaj_przypisanie" class="logowanie" id="dolny" value="Dodaj przypisanie">
               </form>
            </div>
         </div>
         <!--Usuwanie danych-->
         <div id="panel_usun">
            <form method="POST">
               <select name="usun_klasa5" type="text" id="klasa" style="margin-top: 20px;">
                  <option selected disabled hidden>Klasa</option>
                  <?php
                  while ($row=$klasy2->fetch_assoc())
                  {
                     echo '<option value="'.$row['id_klasy'].'">'.$row['numer'].' - '.$row['nazwa'].'</option>';
                  }  
                  ?>
               </select>
               <input type="submit" name="usun_klasa" class="logowanie" value="Usuń klasę" style="margin-top: 15px;">
               <select name="usun_ksiazka5" type="text" id="klasa" style="margin-top: 20px;">
                  <option selected disabled hidden>Książka</option>
                  <?php
                  while ($row=$ksiazki2->fetch_assoc())
                  {
                     echo '<option value="'.$row['id_ksiazki'].'">'.$row['tytul'].'</option>';
                  }  
                  ?>
               </select>
               <input type="submit" name="usun_ksiazka" class="logowanie" value="Usuń książkę" style="margin-top: 15px;">
               <select name="usun_przypisanie5" type="text" id="klasa" style="margin-top: 20px;">
                  <option selected disabled hidden>Przypisanie</option>
                  <?php
                  while ($row=$glowna1->fetch_assoc())
                  {
                     echo '<option value="'.$row['id_glownej'].'">'.$row['nazwa'].' - '.$row['tytul'].'</option>';
                  }  
                  ?>
               </select>
               <input type="submit" name="usun_przypisanie" class="logowanie" value="Usuń przypisanie" style="margin-top: 15px;">
            </form>
         </div>
         <!--Zmiana danych-->

         <div id="panel_zmien" style="display: none;">
            <div class="panel_klasa" style="margin-left: 180px;">
               <form method="POST">
                  <select name="zmiana_ksiazka" type="text" id="zmiana_ksiazka" style="margin-top: 5px; float: right; width: 220px;">
                     <option selected disabled hidden>Książka</option>
                     <?php
                        while ($row=$ksiazki3->fetch_assoc())
                        {
                           echo '<option data-tytul="'.$row['tytul'].'" data-autor="'.$row['autor'].'" data-wydawnictwo="'.$row['wydawnictwo'].'" data-uwagi="'.$row['uwagi'].'" data-zdjecie="'.$row['zdjecie'].'" data-zawod="'.$row['zawod'].'" data-przedmiot="'.$row['przedmiot'].'" data-k_przedmiot="'.$row['k_przedmiot'].'" value="'.$row['id_ksiazki'].'"><b>'.$row['przedmiot'].'</b> - '.$row['tytul'].'<br>'; 
                        }
                     ?>
                  </select>
                  <script type="text/javascript">
                     var zmiana_ksiazka = document.getElementById('zmiana_ksiazka');
                     zmiana_ksiazka.addEventListener('change', function() {
                        var option = zmiana_ksiazka.options[zmiana_ksiazka.selectedIndex];
                        document.getElementById('tytul5').value = option.dataset.tytul;
                        document.getElementById('autor').value = option.dataset.autor;
                        document.getElementById('wydawnictwo').value = option.dataset.wydawnictwo;
                        document.getElementById('uwagi').value = option.dataset.uwagi;
                        document.getElementById('zdjecie').value = option.dataset.zdjecie;
                        document.getElementById('zawod').value = option.dataset.zawod;
                        document.getElementById('przedmiot').value = option.dataset.przedmiot;
                        document.getElementById('k_przedmiot').value = option.dataset.k_przedmiot;
                     });

                  </script>
                  <input type="text" name="tytul" class="input" id="tytul5">
                  <div class="inputtext">*Tytuł: </div><br/>
                  <input type="text" name="autor" class="input" id="autor">
                  <div class="inputtext">*Autor: </div><br/>
                  <input type="text" name="wydawnictwo" class="input" id="wydawnictwo">
                  <div class="inputtext">*Wydawnictwo: </div><br/>
                  <input type="text" name="uwagi" class="input" id="uwagi">
                  <div class="inputtext">Uwagi: </div><br/>
                  <input type="text" name="zdjecie" class="input" id="zdjecie">
                  <div class="inputtext">Link do zdjęcia: </div><br/>
                  <input type="text" name="zawod" class="input" id="zawod" placeholder="Puste jeśli przedmiot ogólny">
                  <div class="inputtext">Zawód: </div><br/>
                  <input type="text" name="przedmiot" class="input" id="przedmiot">
                  <div class="inputtext">*Przedmiot: </div><br/>
                  <input type="text" name="k_przedmiot" class="input" id="k_przedmiot">
                  <div class="inputtext">*Skr. naz. prz.: </div>
                  <input type="submit" name="zmien_ksiazka" class="logowanie" id="dolny" value="Zmień dane książki" style="width: 220px; margin-right: 0;">
               </form>
            </div>
            <div class="panel_klasa">
               <form method="POST">
                  <select name="zmiana_klasa" type="text" id="zmiana_klasa" style="margin-top: 5px; float: right; width: 220px;">
                     <option selected disabled hidden>Klasa</option>
                     <?php
               while ($row=$klasy3->fetch_assoc())
               {
                  echo '<option data-numer="'.$row['numer'].'" data-nazwa="'.$row['nazwa'].'" value="'.$row['id_klasy'].'">'.$row['numer'].' - '.$row['nazwa'].'<br>'; 
               }
               ?>
               </select>
                  <script type="text/javascript">
                     var zmiana_klasa = document.getElementById('zmiana_klasa');
                     zmiana_klasa.addEventListener('change', function() {
                        var option = zmiana_klasa.options[zmiana_klasa.selectedIndex];
                        document.getElementById('numer').value = option.dataset.numer;
                        document.getElementById('nazwa').value = option.dataset.nazwa;
                     });

                  </script>
                  <input type="text" name="numer" class="input" id="numer">
                  <div class="inputtext">*Numer: </div><br/>
                  <input type="text" name="nazwa" class="input" id="nazwa">
                  <div class="inputtext">*Nazwa: </div><br/>
                  <input type="submit" name="zmien_klasa" class="logowanie" id="dolny" value="Zmień dane klasy" style="margin-top: 5px; float: right; width: 210px; margin-top: 30px;">
               </form>
            </div>
         </div>
      </div>
   </body>
   <?php
   if(@$_SESSION['zalogowany'] == true)
   {
      echo '<script type="text/javascript">
         document.getElementById("wyloguj").style.display = "block";
         </script>';
   }
      if(isset($_POST['dodaj']))
      {
         echo '<script type="text/javascript">
         document.getElementById("panel").style.height = "550px";
         document.getElementById("panel").style.width = "1280px";
         document.getElementById("panel_dodaj").style.display = "block";
         </script>';
      }
      if(isset($_POST['dodaj_ksiazka']))
      {
         if(!empty($_POST['tytul'])&&!empty($_POST['autor'])&&!empty($_POST['wydawnictwo'])&&!empty($_POST['przedmiot'])&&!empty($_POST['k_przedmiot']))
         {
            $okladki = "okladki/";
            $uwagi = $_POST['uwagi'];
            $zawod = $_POST['zawod'];
            $zdjecie = $_FILES['plik'];
            if (empty($uwagi))
               $uwagi='NULL';
            else
               $uwagi= "'".$_POST['uwagi']."'";
            if (!isset($zdjecie))
               $zdjecie='NULL';
            else
               $zdjecie= "'".$okladki.$_FILES['plik']['name']."'";
            if (empty($zawod))
               $zawod='NULL';
            else
               $zawod= "'".$_POST['zawod']."'";
            $connect->query("INSERT INTO `ksiazka` (`id_ksiazki`, `tytul`, `autor`, `wydawnictwo`, `uwagi`, `zdjecie`, `zawod`, `przedmiot`, `k_przedmiot`) VALUES (NULL, '".$_POST['tytul']."', '".$_POST['autor']."', '".$_POST['wydawnictwo']."', $uwagi, $zdjecie, $zawod, '".$_POST['przedmiot']."', '".$_POST['k_przedmiot']."');");
            echo "<div class='komunikat'>Dodano książkę</div>";
            if (is_uploaded_file($_FILES['plik']['tmp_name'])) {
                  move_uploaded_file($_FILES['plik']['tmp_name'],
                  $_SERVER['DOCUMENT_ROOT'].'/okladki/'.$_FILES['plik']['name']);
               }
         }
         else
         {
            echo "<div class='komunikat'>Wypełnij wymagane pola (oznaczone gwiazdką)</div>";
         }
      }
      if(isset($_POST['dodaj_klasa']))
      {
         if(!empty($_POST['numer'])&&!empty($_POST['nazwa']))
         {
            $connect->query("INSERT INTO `klasa` (`id_klasy`, `numer`, `nazwa`) VALUES (NULL, '".$_POST['numer']."', '".$_POST['nazwa']."');");
            echo "<div class='komunikat'>Dodano klasę</div>";
         }
         else
         {
            echo "<div class='komunikat'>Wypełnij wymagane pola (oznaczone gwiazdką)</div>";
         }
      }
      if(isset($_POST['dodaj_przypisanie']))
      {
         if(isset($_POST['klasa'])&&isset($_POST['ksiazka']))
         {
            $connect->query("INSERT INTO `glowna` (`id_glownej`, `id_klasy`, `id_ksiazki`) VALUES (NULL, '".$_POST['klasa']."', '".$_POST['ksiazka']."');");
            echo "<div class='komunikat'>Dodano przypisanie</div>";
         }
         else
         {
            echo "<div class='komunikat'>Wypełnij wymagane pola (oznaczone gwiazdką)</div>";
         }
      }
      if(isset($_POST['usung']))
      {
         echo '<script type="text/javascript">
         document.getElementById("panel_dodaj").style.display = "none";
         document.getElementById("panel_usun").style.display = "block";
         document.getElementById("panel").style.height = "260px";
         </script>';
      }
      if(isset($_POST['usun_klasa']))
      {
         if(isset($_POST['usun_klasa5']))
         {
            $connect->query("DELETE FROM klasa WHERE klasa.id_klasy = '".$_POST['klasa']."';");
            echo "<div class='komunikat'>Usunięto klasę</div>";
         }
         else
         {
            echo "<div class='komunikat'>Wybierz klasę aby usunąć</div>";
         }
      }
      if(isset($_POST['usun_ksiazka']))
      {
         if(isset($_POST['usun_ksiazka5']))
         {
            $connect->query("DELETE FROM ksiazka WHERE ksiazka.id_ksiazki = '".$_POST['ksiazka']."';");
            echo "<div class='komunikat'>Usunięto książkę</div>";
         }
         else
         {
            echo "<div class='komunikat'>Wybierz książkę aby usunąć</div>";
         }
      }
      if(isset($_POST['usun_przypisanie']))
      {
         if(isset($_POST['usun_przypisanie5']))
         {
            $connect->query("DELETE FROM glowna WHERE glowna.id_glownej =    '".$_POST['przypisanie']."';");
            echo "<div class='komunikat'>Usunięto przypisanie</div>";
         }
         else
         {
            echo "<div class='komunikat'>Wybierz przypisanie aby usunąć</div>";
         }
      }
      if(isset($_POST['zmien']))
      {
         echo '<script type="text/javascript">
         document.getElementById("panel").style.height = "600px";
         document.getElementById("panel").style.width = "1280px";
         document.getElementById("panel_zmien").style.display = "block";
         </script>';
      }
   if(isset($_POST['zmien_ksiazka']))
    {
      if(isset($_POST['zmiana_ksiazka']))
       {
         if(empty($_POST['tytul']) || empty($_POST['autor']) || empty($_POST['wydawnictwo']) || empty($_POST['przedmiot']) || empty($_POST['k_przedmiot']))
         {
            echo "<div class='komunikat'>Wypełnij wymagane pola</div>";
         }
         else
         {
           if(!empty($_POST['tytul']))
           {
              $connect->query("UPDATE ksiazka SET tytul='".$_POST['tytul']."' WHERE id_ksiazki='".$_POST['zmiana_ksiazka']."'");
           }
           if(!empty($_POST['autor']))
           {
              $connect->query("UPDATE ksiazka SET autor='".$_POST['autor']."' WHERE id_ksiazki='".$_POST['zmiana_ksiazka']."'");
           }
           if(!empty($_POST['wydawnictwo']))
           {
              $connect->query("UPDATE ksiazka SET wydawnictwo='".$_POST['wydawnictwo']."' WHERE id_ksiazki='".$_POST['zmiana_ksiazka']."'");
           }
           if(!empty($_POST['uwagi']))
           {
              $connect->query("UPDATE ksiazka SET uwagi='".$_POST['uwagi']."' WHERE id_ksiazki='".$_POST['zmiana_ksiazka']."'");
           }
           else
           {
              $connect->query("UPDATE ksiazka SET uwagi=NULL WHERE id_ksiazki='".$_POST['zmiana_ksiazka']."'");
           }
           if(!empty($_POST['zdjecie']))
           {
              $connect->query("UPDATE ksiazka SET zdjecie='".$_POST['zdjecie']."' WHERE id_ksiazki='".$_POST['zmiana_ksiazka']."'");
           }
           else
           {
              $connect->query("UPDATE ksiazka SET zdjecie=NULL WHERE id_ksiazki='".$_POST['zmiana_ksiazka']."'");
           }
           if(!empty($_POST['zawod']))
           {
              $connect->query("UPDATE ksiazka SET zawod='".$_POST['zawod']."' WHERE id_ksiazki='".$_POST['zmiana_ksiazka']."'");
           }
           else
           {
              $connect->query("UPDATE ksiazka SET zawod=NULL WHERE id_ksiazki='".$_POST['zmiana_ksiazka']."'");
           }
           if(!empty($_POST['przedmiot']))
           {
              $connect->query("UPDATE ksiazka SET przedmiot='".$_POST['przedmiot']."' WHERE id_ksiazki='".$_POST['zmiana_ksiazka']."'");
           }
           if(!empty($_POST['k_przedmiot']))
           {
              $connect->query("UPDATE ksiazka SET k_przedmiot='".$_POST['k_przedmiot']."' WHERE id_ksiazki='".$_POST['zmiana_ksiazka']."'");
           }
            echo "<div class='komunikat'>Zaktualizowano dane książki</div>";
         }
      }
      else
      {
         echo "<div class='komunikat'>Wybierz książkę aby edytować</div>";
      }
   }
      if(isset($_POST['zmien_klasa']))
      {
         if(isset($_POST['zmiana_klasa']))
         {
            if(!empty($_POST['numer'])&&!empty($_POST['nazwa']))
             {
               $connect->query("UPDATE klasa SET numer='".$_POST['numer']."' WHERE id_klasy='".$_POST['zmiana_klasa']."'");
               $connect->query("UPDATE klasa SET nazwa='".$_POST['nazwa']."' WHERE id_klasy='".$_POST['zmiana_klasa']."'");
               echo "<div class='komunikat'>Zaktualizowano dane klasy</div>";
            }
            else
            {
               echo "<div class='komunikat'>Wypełnij wszystkie pola</div>";
            }
         }
         else
         {
            echo "<div class='komunikat'>Wybierz klasę aby edytować</div>";
         }
      }
   ?>

   </html>
