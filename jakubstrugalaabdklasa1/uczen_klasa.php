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
if (empty($_POST['idklasy'])) {
$ok=false;
$_SESSION['b_id_klasy']='brak klasy';
}
if (empty($_POST['iducznia'])) {
$ok=false;
$_SESSION['b_id_ucznia']='brak ucznia';
}


             if ($ok && isset($_POST['dodaj'])) {

        if (@$_POST['uk']== 'dodaj' || @$_POST['uk']== '') {
         
        
               $sql = "INSERT INTO `uczen_klasa` (`id_uk`, `id_ucznia`, `id_klasy`) VALUES (NULL, '".$_POST['iducznia']."', '".$_POST['idklasy']."')";
              if ($rezultat = $polaczenie->query($sql)) {
                $_SESSION['dodano']='dodano';
              }else{
                $_SESSION['blad']='coś poszło nie tak :-(';
              }

            }else{
             $_SESSION['blad']='Zaznacz dodawanie';



             }
         }
if ($ok && isset($_POST['usun']) && isset($_POST['uk'])) {

        if ($_POST['uk']!= 'dodaj' && isset($_POST['uk'])) {
    
            
               $sql = "DELETE FROM `uczen_klasa` WHERE `uczen_klasa`.`id_uk` = ".$_POST['uk'];
              if ($rezultat = $polaczenie->query($sql)) {
                $_SESSION['dodano']='usuniento ';
              }else{
                $_SESSION['blad']='coś poszło nie tak :-(';
              }

            }else{
             $_SESSION['blad']='Zaznacz połączenie';



             }
         }
if ($ok && isset($_POST['zmien'])) {

        if ((@$_POST['uk']!= 'dodaj' || @$_POST['uk']!= '')&& isset($_POST['uk'])) {
        
        
               $sql = "UPDATE `uczen_klasa` SET `id_ucznia` = '"
               .$_POST['iducznia']."', `id_klasy` = '"
               .$_POST['idklasy']."' WHERE `uczen_klasa`.`id_uk` = "
               .$_POST['uk'];
              if ($rezultat = $polaczenie->query($sql)) {
                $_SESSION['dodano']='Zmieniono ';
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
   <title>uczen klasa</title>
   <meta charset="UTF-8">
 <link rel="stylesheet" type="text/css" href="style.css"> 
   <script type="text/javascript">

     
     
function osa(){
  var namelist = document.getElementById('uk');
var option = namelist.options[namelist.selectedIndex];
  //document.getElementById('namecontact').value = option.value;
  document.getElementById('idklasy').value = option.dataset.idklasy;
  document.getElementById('iducznia').value = option.dataset.iducznia;


}


   </script>
</head>

<body>
   <div id="header">
      Edycja klasy - uczen
   </div>
   <div class="form">
     <form method="POST"> 
      <input type="hidden" name="sesja" value="<?php echo rand(); ?>" /> <br>
      <select id="uk" name="uk" class="uk"  onchange="osa()" >
         <option selected disabled hidden>uczen klasa do edycji/usunięcia</option>
          <option value="dodaj" data-idklasy='0' data-iducznia='0'>Dodaj połączenie uczen klasa</option>
              <?php 
                $sql="SELECT * FROM uczen_klasa uk INNER JOIN uczen u on uk.id_ucznia = u.id_ucznia LEFT JOIN klasa k ON uk.id_klasy = k.id_klasy";
                    if ($rezultat = $polaczenie->query($sql)) {
                    while($row = $rezultat->fetch_assoc()){
                echo "<option data-idklasy='".$row['id_klasy']."' data-iducznia='".$row['id_ucznia']."' value='".$row['id_uk']."'>".$row['imie'].' '.$row['nazwisko'].' - '.$row['nazwa']."</option>";
                    }
                }
                ?>
      </select>
    
   
        <div class="text">uczen: </div>
        <select id="iducznia" name="iducznia"  class="iducznia"  >
         <option value="0" selected disabled hidden>uczen </option>
          
              <?php 
                $sql="SELECT * FROM `uczen`";
                    if ($rezultat = $polaczenie->query($sql)) {
                    while($row = $rezultat->fetch_assoc()){
                    
                echo "<option value='".$row['id_ucznia']."'>".$row['imie'].' - '.$row['nazwisko'].' - '.$row['adres_m']."</option>";
                    }
                }
                ?>
      </select>
       
      
        <div class="text">klasa: </div>
        <select id="idklasy" name="idklasy" class="idklasy"  >
          <option value="0" selected disabled hidden>klasa </option>
              <?php 
                $sql="SELECT * FROM `klasa`";
                    if ($rezultat = $polaczenie->query($sql)) {
                    while($row = $rezultat->fetch_assoc()){
                echo "<option  value='".$row['id_klasy']."'>".$row['rocznik'].' - '.$row['nazwa']."</option>";
                    }
                }
                ?>
      </select>
        
       <br>
       <input type="submit" name="dodaj" value="Dodaj" class="przycisk" style="margin-top: 20px;">
       <input type="submit" name="zmien" value="zmien" class="przycisk">
       <input type="submit" name="usun" value="Usuń" class="przycisk">
      <br/>
        <div class="komunikat">
           <?php  if (isset($_SESSION['b_id_uk'])) {
        echo $_SESSION['b_id_uk'];
         unset($_SESSION['b_id_uk']);
       }  
         if (isset($_SESSION['b_id_klasy'])) {
        echo $_SESSION['b_id_klasy'];
         unset($_SESSION['b_id_klasy']);
       } if (isset($_SESSION['b_id_ucznia'])) {
        echo $_SESSION['b_id_ucznia'];
         unset($_SESSION['b_id_ucznia']);
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
