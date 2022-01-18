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
if (empty($_POST['id_nauczyciela'])) {
$ok=false;
$_SESSION['b_id_nauczyciela']='brak nauczyciela';
}


             if ($ok && isset($_POST['dodaj'])) {

        if (@$_POST['zk']== 'dodaj' || @$_POST['zk']== '') {
         
        
               $sql = "INSERT INTO `zapisani_do_klasy` (`id_wpisu`, `id_nauczyciela`, `id_klasy`) VALUES (NULL, '".$_POST['id_nauczyciela']."', '".$_POST['idklasy']."')";
              if ($rezultat = $polaczenie->query($sql)) {
                $_SESSION['dodano']='dodano';
              }else{
                $_SESSION['blad']='coś poszło nie tak :-(';
              }

            }else{
             $_SESSION['blad']='Zaznacz dodawanie';



             }
         }
if ($ok && isset($_POST['usun']) && isset($_POST['zk'])) {

        if ($_POST['zk']!= 'dodaj' && isset($_POST['zk'])) {
    
            
               $sql = "DELETE FROM `zapisani_do_klasy` WHERE `zapisani_do_klasy`.`id_wpisu` = ".$_POST['zk'];
              if ($rezultat = $polaczenie->query($sql)) {
                $_SESSION['dodano']='ok ';
              }else{
                $_SESSION['blad']='coś poszło nie tak :-(';
              }

            }else{
             $_SESSION['blad']='Zaznacz połączenie';



             }
         }
if ($ok && isset($_POST['zmien'])) {

        if ((@$_POST['zk']!= 'dodaj' || @$_POST['zk']!= '')&& isset($_POST['zk'])) {
        
        
               $sql = "UPDATE `zapisani_do_klasy` SET `id_nauczyciela` = '".$_POST['id_nauczyciela']."', `id_klasy` = '".$_POST['idklasy']."' WHERE `zapisani_do_klasy`.`id_wpisu` = "
               .$_POST['zk'];
              if ($rezultat = $polaczenie->query($sql)) {
                $_SESSION['dodano']='Zmieniono ';
              }else{
                $_SESSION['blad']='coś poszło nie tak :-(';
              }

            }else{
             $_SESSION['blad']='Zaznacz nauczyciela - klasę do zmiany';



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
   <title>nauczyciel klasa</title>
   <meta charset="UTF-8">
 <link rel="stylesheet" type="text/css" href="style.css"> 
   <script type="text/javascript">

     
     
function osa(){
  var namelist = document.getElementById('zk');
var option = namelist.options[namelist.selectedIndex];
  //document.getElementById('namecontact').value = option.value;
  document.getElementById('idklasy').value = option.dataset.idklasy;
  document.getElementById('idnauczyciela').value = option.dataset.idnauczyciela;


}


   </script>
</head>

<body>
   <div id="header">
      Edycja klasy - nauczyciel
   </div>
   <div class="form">
     <form method="POST"> 
      <input type="hidden" name="sesja" value="<?php echo rand(); ?>" /> <br>
      <select id="zk" name="zk" class="zk"  onchange="osa()" >
         <option selected disabled hidden>nauczyciel klasa do edycji/usunięcia</option>
          <option value="dodaj" data-idklasy='0' data-iducznia='0'>Dodaj połączenie nauczyciel klasa</option>
              <?php 
                $sql="SELECT * FROM zapisani_do_klasy zk INNER JOIN nauczyciel n on zk.id_nauczyciela = n.id_nauczyciela LEFT JOIN klasa k ON zk.id_klasy = k.id_klasy";
                    if ($rezultat = $polaczenie->query($sql)) {
                    while($row = $rezultat->fetch_assoc()){
                echo "<option data-idklasy='".$row['id_klasy']."' data-idnauczyciela='".$row['id_nauczyciela']."' value='".$row['id_wpisu']."'>".$row['imie'].' '.$row['nazwisko'].' - '.$row['nazwa']."</option>";
                    }
                }
                ?>
      </select>
    
   
        <div class="text">uczen: </div>
        <select id="idnauczyciela" name="id_nauczyciela"  class="idnauczyciela"  >
         <option value="0" selected disabled hidden>nauczyciel </option>
          
              <?php 
                $sql="SELECT * FROM `nauczyciel`";
                    if ($rezultat = $polaczenie->query($sql)) {
                    while($row = $rezultat->fetch_assoc()){
                    
                echo "<option value='".$row['id_nauczyciela']."'>".$row['imie'].' - '.$row['nazwisko'].' - '.$row['adres_m']."</option>";
                    }
                }
                ?>
      </select>
       
      
        <div class="text">klasa: </div>
        <select id="idklasy" name="idklasy" class="idklasy"  >
          <option value="0" selected disabled hidden>klasa </option>
              <?php 
                $sql="SELECT * , k.nazwa as knazwa,s.nazwa as snazwa FROM klasa k JOIN szkola s WHERE k.idszkoly = s.id_szkoly";
                    if ($rezultat = $polaczenie->query($sql)) {
                    while($row = $rezultat->fetch_assoc()){
                echo "<option  value='".$row['id_klasy']."'>".$row['rocznik'].' - '.$row['knazwa'].' - '.$row['snazwa']."</option>";
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
           <?php  if (isset($_SESSION['b_id_zk'])) {
        echo $_SESSION['b_id_zk'];
         unset($_SESSION['b_id_zk']);
       }  
         if (isset($_SESSION['b_id_klasy'])) {
        echo $_SESSION['b_id_klasy'];
         unset($_SESSION['b_id_klasy']);
       } if (isset($_SESSION['b_id_nauczyciela'])) {
        echo $_SESSION['b_id_nauczyciela'];
         unset($_SESSION['b_id_nauczyciela']);
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
