<?php
session_start();

require_once "dane_servera.php";
$polaczenie = @new mysqli($adreshostabd, $nazwauserbd, $haslobd, $nazwabd);
               
                if ($polaczenie->connect_errno!=0)
                {
                   exit("<span class='blad'>Error: ".$polaczenie->connect_errno.'</span>');
                    
                }
                else
                {
 $polaczenie->set_charset("utf8");
}

if(isset($_POST['dodaj']) || (isset($_POST['zmien']) || isset($_POST['usun']))){
 
  if(!isset($_SESSION['sesja']) || (isset($_SESSION['sesja']) && $_SESSION['sesja'] != $_POST['sesja'])){
    $_SESSION['sesja'] = $_POST['sesja'];
   
$ok=true;
if (empty($_POST['imie'])) {
$ok=false;
$_SESSION['b_imie']='brak imie ';
}
if (empty($_POST['nazwisko'])) {
$ok=false;
$_SESSION['b_nazwisko']='brak nazwiska ';
}
if (empty($_POST['adres_m'])) {
$ok=false;
$_SESSION['b_adres_m']='brak adresu miasta ';
}
if (empty($_POST['telefon'])) {
$ok=false;
$_SESSION['b_telefon']='brak telefonu ';
}
if (empty($_POST['przedmiot'])) {
$ok=false;
$_SESSION['b_przedmiot']='brak przedmiot ';
}


             if ($ok && isset($_POST['dodaj'])) {

        if (@$_POST['nauczyciel']== 'dodaj' || @$_POST['nauczyciel']== '') {
         
        
               $sql = "INSERT INTO `nauczyciel` (`id_nauczyciela`, `imie`, `nazwisko`, `adres_m`, `telefon`, `przedmiot`) VALUES (NULL, '".$_POST['imie']."', '".$_POST['nazwisko']."', '".$_POST['adres_m']."', '".$_POST['telefon']."', '".$_POST['przedmiot']."')";
              if ($rezultat = $polaczenie->query($sql)) {
                $_SESSION['dodano']='dodano: '.$_POST['imie'].' '.$_POST['nazwisko'];
              }else{
                $_SESSION['blad']='coś poszło nie tak :-(';
              }

            }else{
             $_SESSION['blad']='Zaznacz dodawanie';



             }
         }
if ($ok && isset($_POST['usun']) && isset($_POST['nauczyciel'])) {

        if ($_POST['nauczyciel']!= 'dodaj' && isset($_POST['nauczyciel'])) {
    
              
               $sql = "DELETE FROM `nauczyciel` WHERE `nauczyciel`.`id_nauczyciela` = ".$_POST['nauczyciel'];
              if ($rezultat = $polaczenie->query($sql)) {
                $_SESSION['dodano']='usuniento: '.$_POST['imie'].' '.$_POST['nazwisko'];
              }else{
                $_SESSION['blad']='coś poszło nie tak :-(';
              }

            }else{
             $_SESSION['blad']='Zaznacz klasę';



             }
         }
if ($ok && isset($_POST['zmien'])) {

        if ((@$_POST['nauczyciel']!= 'dodaj' || @$_POST['nauczyciel']!= '')&& isset($_POST['nauczyciel'])) {
        
        
               $sql = "UPDATE `nauczyciel` SET `imie` = '".$_POST['imie']."', `nazwisko` = '".$_POST['nazwisko']."', `adres_m` = '".$_POST['adres_m']."', `telefon` = '".$_POST['telefon']."', `przedmiot` = '".$_POST['przedmiot']."' WHERE `nauczyciel`.`id_nauczyciela` = ".$_POST['nauczyciel'];
              if ($rezultat = $polaczenie->query($sql)) {
                $_SESSION['dodano']='Zmieniono na: '.$_POST['imie'].' '.$_POST['nazwisko'];
              }else{
                $_SESSION['blad']='coś poszło nie tak :-(';
              }

            }else{
             $_SESSION['blad']='Zaznacz klasę do zmiany';



             }
         }


  }
  else{
   // echo '<script>alert("Proszę nie odświeżać strony");</script>';
  }
}
 












  ?>
<html>

<head>
   <title>Podręczniki</title>
   <meta charset="UTF-8">
 <link rel="stylesheet" type="text/css" href="style.css"> 
   <script type="text/javascript">

     
     
function osa(){
  var namelist = document.getElementById('nauczyciel');
var option = namelist.options[namelist.selectedIndex];
  //document.getElementById('namecontact').value = option.value;
  document.getElementById('imie').value = option.dataset.imie;
  document.getElementById('nazwisko').value = option.dataset.nazwisko;
    document.getElementById('adres_m').value = option.dataset.adres_m;
  document.getElementById('telefon').value = option.dataset.telefon;
    document.getElementById('przedmiot').value = option.dataset.przedmiot;

}


   </script>
</head>

<body>
   <div id="header">
      Edycja nauczyciela
   </div>
   <div class="form">
     <form method="POST">
      <select id="nauczyciel" name="nauczyciel" class="nauczyciel"  onchange="osa()" style="margin-top: 10px;">
         <option selected disabled hidden>nauczyciel do edycji/usunięcia</option>
          <option value="dodaj" data-imie='' data-nazwisko='' data-adres_m='' data-telefon='' data-przedmiot=''>Dodaj nauczyciela</option>
              <?php 
                $sql="SELECT * FROM `nauczyciel`";
                    if ($rezultat = $polaczenie->query($sql)) {
                    while($row = $rezultat->fetch_assoc()){
                      print_r($row);
                echo "<option data-imie='".$row['imie']."' data-nazwisko='".$row['nazwisko']."' data-adres_m='".$row['adres_m']."' data-telefon='".$row['telefon']."' data-przedmiot='".$row['przedmiot']."' value='".$row['id_nauczyciela']."'>".$row['imie'].' - '.$row['nazwisko'].' - '.$row['przedmiot']."</option>";
                    }
                }
                ?>
      </select>
    
     <input type="hidden" name="sesja" value="<?php echo rand(); ?>" /> <br>
        <div class="text">Imie: </div>
        <input type="text" id="imie" name="imie" class="input">
        <div class="text">Nazwisko: </div>
        <input type="text" id="nazwisko" name="nazwisko" class="input">
        <div class="text">Adres miasto: </div>
        <input type="text" id="adres_m" name="adres_m" class="input">
        <div class="text">telefon: </div>
        <input type="text" id="telefon" name="telefon" class="input">
       <div class="text">Przedmiot: </div>
        <input type="text" id="przedmiot" name="przedmiot" class="input">
       
       
      
        
       <br>
       <input type="submit" name="dodaj" value="Dodaj" class="przycisk" style="margin-top: 20px;">
       <input type="submit" name="zmien" value="zmien" class="przycisk">
       <input type="submit" name="usun" value="Usuń" class="przycisk">
      <br/>
        <div class="komunikat">
           <?php  if (isset($_SESSION['b_numer'])) {
        echo $_SESSION['b_numer'];
         unset($_SESSION['b_numer']);
       }  
       if (isset($_SESSION['b_przedmiot'])) {
        echo $_SESSION['b_przedmiot'];
         unset($_SESSION['b_przedmiot']);
       }  
       if (isset($_SESSION['b_telefon'])) {
        echo $_SESSION['b_telefon'];
         unset($_SESSION['b_telefon']);
       }  
       if (isset($_SESSION['b_adres_m'])) {
        echo $_SESSION['b_adres_m'];
         unset($_SESSION['b_adres_m']);
       }  
       if (isset($_SESSION['b_imie'])) {
        echo $_SESSION['b_imie'];
         unset($_SESSION['b_imie']);
       }  
       if (isset($_SESSION['b_nazwisko'])) {
        echo $_SESSION['b_nazwisko'];
         unset($_SESSION['b_nazwisko']);
       }  


       
         if (isset($_SESSION['dodano'])) {
        echo $_SESSION['dodano'];
         unset($_SESSION['dodano']);
       } 
if (isset($_SESSION['blad'])) {
        echo $_SESSION['blad'];
         unset($_SESSION['blad']);
       } 
        ?>
        </div>
        

     </form>








   </div>
   <div id="stopka">
 <a href="index.php">
      <input type="submit" class="przycisk" value="Menu">
      </a>
   </div>
   
   
</body>

</html>
