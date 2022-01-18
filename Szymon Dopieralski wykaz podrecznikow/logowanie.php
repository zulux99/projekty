<!doctype html>

<html>

<head>
   <title>Zaloguj się</title>
   <meta charset="UTF-8">
   <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
   <div id="baner">
      <div id="glowna1">
         <a href="index.php">
            <input type="submit" value="Strona główna" id="glowna2">
            </a>
      </div>
   </div>
   <div id="logowanie">
      <form action="" method="POST">
         <input type="text" name="login" id="logowanie2" placeholder="Login"><br/>
         <input type="password" name="password" id="logowanie2" placeholder="Hasło"><br/>
         <input type="submit" name="zaloguj" value="Zaloguj się" id="glowna2" style="margin-top: 35px;"><br/><br/>
      </form>
         <?php
         require "login.php";
         ?>
   </div>
</body>

</html>
