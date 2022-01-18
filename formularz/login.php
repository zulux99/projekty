<?php
@session_start();
if(isset($_POST['zaloguj']))
{
   $login = $_POST['login'];
   $password = md5($_POST['password']);
   if(!empty($password) && !empty($login))
   {
      if($login == "admin" && $password == "21232f297a57a5a743894a0e4a801fc3")
      {
         $_SESSION['zalogowany'] = true;
         header("Location: panel.php");
          exit();
      }
      else
      {
         echo "Niepoprawny login lub hasło";
      }
   }
   else
   {
     echo "Podaj login oraz hasło aby się zalogować";
   }

}

?>
