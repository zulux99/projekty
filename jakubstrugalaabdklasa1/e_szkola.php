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
if (empty($_POST['nazwa'])) {
$ok=false;
$_SESSION['b_nazwa']='brak nazwy ';
}

if (empty($_POST['adres_m'])) {
$ok=false;
$_SESSION['b_adres_m']='brak adresu miasta ';
}
if (empty($_POST['adres_ul'])) {
$ok=false;
$_SESSION['b_adres_ul']='brak adresu ulicy ';
}
if (empty($_POST['adres_nr'])) {
$ok=false;
$_SESSION['b_adres_nr']='brak adresu miasta ';
}

             if ($ok && isset($_POST['dodaj'])) {

        if (@$_POST['szkola']== 'dodaj' || @$_POST['szkola']== '') {

        
               $sql = "INSERT INTO `szkola` (`id_szkoly`, `nazwa`, `adres_m`, `adres_ul`, `adres_nr`) VALUES (NULL, '".$_POST['nazwa']."', '".$_POST['adres_nr']."', '".$_POST['adres_ul']."', '".$_POST['adres_nr']."')";
              if ($rezultat = $polaczenie->query($sql)) {
                $_SESSION['dodano']='dodano: '.$_POST['nazwa'].' '.$_POST['adres_m'];
              }else{
                $_SESSION['blad']='coś poszło nie tak :-(';
              }

            }else{
             $_SESSION['blad']='Zaznacz dodawanie';



             }
         }
         

if ($ok && isset($_POST['usun']) && isset($_POST['szkola'])) {

        if ($_POST['szkola']!= 'dodaj' && isset($_POST['szkola'])) {
    
              
               $sql = "DELETE FROM `szkola` WHERE `szkola`.`id_szkoly` = ".$_POST['szkola'];
              if ($rezultat = $polaczenie->query($sql)) {
                $_SESSION['dodano']='usuniento: '.$_POST['nazwa'].' '.$_POST['adres_m'];
              }else{
                $_SESSION['blad']='coś poszło nie tak :-(';
               
              }

            }else{
             $_SESSION['blad']='Zaznacz szkołę';



             }
         }
if ($ok && isset($_POST['zmien'])) {

        if ((@$_POST['szkola']!= 'dodaj' || @$_POST['szkola']!= '')&& isset($_POST['szkola'])) {
        
        
               $sql = "UPDATE `szkola` SET `nazwa` = '".$_POST['nazwa']."', `adres_m` = '".$_POST['adres_m']."', `adres_ul` = '".$_POST['adres_ul']."', `adres_nr` = '".$_POST['adres_nr']."' WHERE `szkola`.`id_szkoly` = ".$_POST['szkola'];
              if ($rezultat = $polaczenie->query($sql)) {
                $_SESSION['dodano']='Zmieniono na: '.$_POST['nazwa'].' '.$_POST['adres_m'];
              }else{
                $_SESSION['blad']='coś poszło nie tak :-(';
              }

            }else{
             $_SESSION['blad']='Zaznacz szkołe do zmiany';



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
   <title>szkola</title>
   <meta charset="UTF-8">
 <link rel="stylesheet" type="text/css" href="style.css"> 
   <script type="text/javascript">

     
     
function osa(){
  var namelist = document.getElementById('szkola');
var option = namelist.options[namelist.selectedIndex];
  //document.getElementById('namecontact').value = option.value;
  document.getElementById('nazwa').value = option.dataset.nazwa;
  document.getElementById('adres_m').value = option.dataset.adres_m;
    document.getElementById('adres_ul').value = option.dataset.adres_ul;
  document.getElementById('adres_nr').value = option.dataset.adres_nr;

}


   </script>
</head>

<body>
   <div id="header">
      szkola
   </div>
   <div class="form">
     <form method="POST">
      <select id="szkola" name="szkola" class="szkola"  onchange="osa()" style="margin-top: 10px;">
         <option selected disabled hidden>szola do edycji/usunięcia</option>
          <option value="dodaj" data-nazwa='' data-adres_ul='' data-adres_m='' data-adres_nr='' >Dodaj szkołe</option>
              <?php 
                $sql="SELECT * FROM `szkola`";
                    if ($rezultat = $polaczenie->query($sql)) {
                    while($row = $rezultat->fetch_assoc()){
                      print_r($row);
                echo "<option data-nazwa='".$row['nazwa']."' data-adres_ul='".$row['adres_ul']."' data-adres_m='".$row['adres_m']."' data-adres_nr='".$row['adres_nr']."' value='".$row['id_szkoly']."'>".$row['nazwa'].' - '.$row['adres_m'].' - '.$row['adres_ul']."</option>";
                    }
                }
                ?>
      </select>
    
     <input type="hidden" name="sesja" value="<?php echo rand(); ?>" /> <br>
        <div class="text">nazwa: </div>
        <input type="text" id="nazwa" name="nazwa" class="input">
        <div class="text">Adres miasto: </div>
        <input type="text" id="adres_m" name="adres_m" class="input">
        <div class="text">Adres ulica: </div>
        <input type="text" id="adres_ul" name="adres_ul" class="input">
              <div class="text">Adres nr: </div>
        <input type="text" id="adres_nr" name="adres_nr" class="input">
       
       
      
      
        
       <br>
       <input type="submit" name="dodaj" value="Dodaj" class="przycisk" style="margin-top: 20px;">
       <input type="submit" name="zmien" value="zmien" class="przycisk">
       <input type="submit" name="usun" value="Usuń" class="przycisk">
      <br/>
        <div class="komunikat">
           <?php  if (isset($_SESSION['b_szkola'])) {
        echo $_SESSION['b_szkola'];
         unset($_SESSION['b_szkola']);
       }  
       if (isset($_SESSION['b_nazwa'])) {
        echo $_SESSION['b_nazwa'];
         unset($_SESSION['b_nazwa']);
       }  
       if (isset($_SESSION['b_adres_m'])) {
        echo $_SESSION['b_adres_m'];
         unset($_SESSION['b_adres_m']);
       }
if (isset($_SESSION['b_adres_ul'])) {
        echo $_SESSION['b_adres_ul'];
         unset($_SESSION['b_adres_ul']);
       }
if (isset($_SESSION['b_adres_nr'])) {
        echo $_SESSION['b_adres_nr'];
         unset($_SESSION['b_adres_nr']);
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
