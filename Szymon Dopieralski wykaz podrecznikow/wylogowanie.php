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
   <div id="baner" style="text-align:center;">
      <div>
         <div id="log">
            <?php
            echo '<script type="text/javascript">
            function przekierowanie() {document.location.replace("index.php");}
            setTimeout(\'przekierowanie()\', 2000);
            </script>';
            echo "Zostałeś poprawnie wylogowany.<br/>
            Przekierowanie nastąpi automatycznie...";
            ?>
         </div>
      </div>
   </div>
</body>

</html>
