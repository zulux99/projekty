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
$_SESSION['b_nazwa']='brak nazwy';
}
if (empty($_POST['rocznik'])) {
$ok=false;
$_SESSION['b_numer']='brak rocznik';
}
if (empty($_POST['idszkoly'])) {
$ok=false;
$_SESSION['b_idszkoly']='brak wybranej szkoły';
}
$rocznik=$_POST['rocznik'];
$nazwa=$_POST['nazwa'];

             if ($ok && isset($_POST['dodaj'])) {

        if (@$_POST['klasa']== 'dodaj' || @$_POST['klasa']== '') {
         
        
               $sql = "INSERT INTO `klasa` (`id_klasy`, `nazwa`, `rocznik`, `idszkoly`) VALUES (NULL, '".$rocznik."', '".$nazwa."', '".$_POST['idszkoly']."')";
              if ($rezultat = $polaczenie->query($sql)) {
                $_SESSION['dodano']='dodano: '.$rocznik.' '.$nazwa;
              }else{
                $_SESSION['blad']='coś poszło nie tak :-(';
              }

            }else{
             $_SESSION['blad']='Zaznacz dodawanie';



             }
         }
if ($ok && isset($_POST['usun']) && isset($_POST['klasa'])) {

        if ($_POST['klasa']!= 'dodaj' && isset($_POST['klasa'])) {
    
              $rocznik=$_POST['rocznik'];
              $nazwa=$_POST['nazwa'];
               $sql = "DELETE FROM `klasa` WHERE `klasa`.`id_klasy` = ".$_POST['klasa'];
              if ($rezultat = $polaczenie->query($sql)) {
                $_SESSION['dodano']='usunięto: '.$rocznik.' '.$nazwa;
              }else{
                $_SESSION['blad']='coś poszło nie tak :-(';
              }

            }else{
             $_SESSION['blad']='Zaznacz klasę';



             }
         }
if ($ok && isset($_POST['zmien'])) {

        if ((@$_POST['klasa']!= 'dodaj' || @$_POST['klasa']!= '')&& isset($_POST['klasa'])) {
         $rocznik=$_POST['rocznik'];
              $nazwa=$_POST['nazwa'];
              $klasa=$_POST['klasa'];
        
               $sql = "UPDATE `klasa` SET `rocznik` = '".$rocznik."', `nazwa` = '".$nazwa."', `idszkoly` = '".$_POST['idszkoly']."' WHERE `klasa`.`id_klasy` = ".$klasa;
              if ($rezultat = $polaczenie->query($sql)) {
                $_SESSION['dodano']='Zmieniono na: '.$rocznik.' '.$nazwa;
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
  var namelist = document.getElementById('klasa');
var option = namelist.options[namelist.selectedIndex];
  //document.getElementById('namecontact').value = option.value;
  document.getElementById('rocznik').value = option.dataset.rocznik;
  document.getElementById('nazwa').value = option.dataset.nazwa;
  document.getElementById('idszkoly').value = option.dataset.idszkoly;
  console.log(option.dataset.rocznik);
  console.log(option.dataset.nazwa);

}


   </script>
</head>

<body>
   <div id="header">
      Edycja klasy
   </div>
   <div class="form">
     <form method="POST">
      <select id="klasa" name="klasa" class="klasa" id="klasa" onchange="osa()" style="margin-top: 10px;">
         <option selected disabled hidden>Klasa do edycji/usunięcia</option>
          <option value="dodaj" data-rocznik='' data-nazwa='' data-idszkoly=''>Dodaj klasę</option>
              <?php 
                $sql="SELECT * , k.nazwa as knazwa,s.nazwa as snazwa FROM klasa k JOIN szkola s WHERE k.idszkoly = s.id_szkoly";
                    if ($rezultat = $polaczenie->query($sql)) {
                    while($row = $rezultat->fetch_assoc()){
                      print_r($row);
                echo "<option data-rocznik='".$row['rocznik']."' data-nazwa='".$row['knazwa']."' data-idszkoly='".$row['idszkoly']."' value='".$row['id_klasy']."'>".$row['rocznik'].' - '.$row['knazwa'].' - '.$row['snazwa']."</option>";
                    }
                }
                ?>
      </select>
    
     <input type="hidden" name="sesja" value="<?php echo rand(); ?>" /> <br>
        <div class="text">Rocznik: </div>
        <input type="text" id="rocznik" name="rocznik" class="input">
       
      
        <div class="text">Nazwa klasy: </div>
        <input type="text" name="nazwa" id="nazwa" class="input"><br><br>
                <div class="text">Szkoła: </div>
         <select id="idszkoly" name="idszkoly" class="idszkoly"  >
          <option value="0" selected disabled hidden>szkoła </option>
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
           <?php  if (isset($_SESSION['b_numer'])) {
        echo $_SESSION['b_numer'];
         unset($_SESSION['b_numer']);
       }  
         if (isset($_SESSION['b_nazwa'])) {
        echo $_SESSION['b_nazwa'];
         unset($_SESSION['b_nazwa']);
       }  
       if (isset($_SESSION['b_idszkoly'])) {
        echo $_SESSION['b_idszkoly'];
         unset($_SESSION['b_idszkoly']);
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
