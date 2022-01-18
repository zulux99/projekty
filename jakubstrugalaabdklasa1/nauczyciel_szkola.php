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
if (empty($_POST['id_szkoly'])) {
$ok=false;
$_SESSION['b_id_szkoly']='brak szkoły';
}
if (empty($_POST['id_nauczyciela'])) {
$ok=false;
$_SESSION['b_id_nauczyciel']='brak nauczyciela';
}


             if ($ok && isset($_POST['dodaj'])) {

        if (@$_POST['ns']== 'dodaj' || @$_POST['ns']== '') {
         
        
               $sql = "INSERT INTO `nauczyciel_szkola` (`id_ns`, `id_nauczyciela`, `id_szkoly`) VALUES (NULL, '".$_POST['id_nauczyciela']."', '".$_POST['id_szkoly']."')";
              if ($rezultat = $polaczenie->query($sql)) {
                $_SESSION['dodano']='dodano';
              }else{
                $_SESSION['blad']='coś poszło nie tak :-(';
              }

            }else{
             $_SESSION['blad']='Zaznacz dodawanie';



             }
         }
if ($ok && isset($_POST['usun']) && isset($_POST['ns'])) {

        if ($_POST['ns']!= 'dodaj' && isset($_POST['ns'])) {
    
            
               $sql = "DELETE FROM `nauczyciel_szkola` WHERE `nauczyciel_szkola`.`id_ns` = ".$_POST['ns'];
              if ($rezultat = $polaczenie->query($sql)) {
                $_SESSION['dodano']='ok';
              }else{
                $_SESSION['blad']='coś poszło nie tak :-(';
              }

            }else{
             $_SESSION['blad']='Zaznacz połączenie';



             }
         }
if ($ok && isset($_POST['zmien'])) {

        if ((@$_POST['ns']!= 'dodaj' || @$_POST['ns']!= '')&& isset($_POST['ns'])) {
        
        
               $sql = "UPDATE `nauczyciel_szkola` SET `id_nauczyciela` = '".$_POST['id_nauczyciela']."', `id_szkoly` = '".$_POST['id_szkoly']."' WHERE `nauczyciel_szkola`.`id_ns` = "
               .$_POST['ns'];
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
   <title>Nauczyciel szkola</title>
   <meta charset="UTF-8">
 <link rel="stylesheet" type="text/css" href="style.css"> 
   <script type="text/javascript">

     
     
function osa(){
  var namelist = document.getElementById('ns');
var option = namelist.options[namelist.selectedIndex];
  //document.getElementById('namecontact').value = option.value;
  document.getElementById('idszkoly').value = option.dataset.idszkoly;
  document.getElementById('idnauczyciela').value = option.dataset.idnauczyciela;


}


   </script>
</head>

<body>
   <div id="header">
      Edycja nauczyciel szkoła
   </div>
   <div class="form">
     <form method="POST"> 
      <input type="hidden" name="sesja" value="<?php echo rand(); ?>" /> <br>
      <select id="ns" name="ns" class="ns"  onchange="osa()" >
         <option selected disabled hidden>nauczyciel szkola do edycji/usunięcia</option>
          <option value="dodaj" data-idklasy='0' data-iducznia='0'>Dodaj połączenie nauczyciel szkola</option>
              <?php 
                $sql="SELECT * FROM nauczyciel_szkola ns INNER JOIN nauczyciel n on ns.id_nauczyciela = n.id_nauczyciela LEFT JOIN szkola s ON ns.id_szkoly = s.id_szkoly";
                    if ($rezultat = $polaczenie->query($sql)) {
                    while($row = $rezultat->fetch_assoc()){
                echo "<option data-idnauczyciela='".$row['id_nauczyciela'].
                "' data-idszkoly='".$row['id_szkoly'].
                "' value='".$row['id_ns']."'>".
                $row['imie'].' '.$row['nazwisko'].' - '.
                $row['nazwa']."</option>";
                    }
                }
                ?>
      </select>
    
   
        <div class="text">nauczyciel: </div>
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
       
      
        <div class="text">szkola: </div>
        <select id="idszkoly" name="id_szkoly" class="idszkoly"  >
          <option value="0" selected disabled hidden>klasa </option>
              <?php 
                $sql="SELECT * FROM `szkola`";
                    if ($rezultat = $polaczenie->query($sql)) {
                    while($row = $rezultat->fetch_assoc()){
                echo "<option  value='".$row['id_szkoly']."'>".$row['nazwa'].' - '.$row['adres_m']."</option>";
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
           <?php  if (isset($_SESSION['b_id_ns'])) {
        echo $_SESSION['b_id_ns'];
         unset($_SESSION['b_id_ns']);
       }  
         if (isset($_SESSION['b_id_szkoly'])) {
        echo $_SESSION['b_id_szkoly'];
         unset($_SESSION['b_id_szkoly']);
       } if (isset($_SESSION['b_id_nauczyciel'])) {
        echo $_SESSION['b_id_nauczyciel'];
         unset($_SESSION['b_id_nauczyciel']);
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
