<!doctype html>

<html>
	<head>
		<title>Podręczniki</title>
		<meta charset="UTF-8">
      <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="style.css">
	</head>
   
   <body>
      <div id="ksiazka">
         <div id="zdj" class="wiersz">
            <img src="<?php echo $_GET['zdjecie'] ?>" width="400px">
         </div>
         <div class="wiersz">
            <b>Tytuł: </b><?php echo $_GET['tytul']; ?>
         </div>
         <div class="wiersz">
            <b>Autor: </b><?php echo $_GET['autor']; ?>
         </div>
         <div class="wiersz">
            <b>Wydawnictwo: </b>
            <?php echo $_GET['wydawnictwo']; ?>
         </div>
         <div class="wiersz">
            <b>Rodzaj: </b>
            <?php
               if(!$_GET['zawod'])
                  echo "Przedmiot ogólny";
               else
                  echo "Przedmiot zawodowy";
            ?>
         </div>
         <div class="wiersz">
            <b>Zawód: </b>
            <?php
               if(!$_GET['zawod'])
                  echo "Nie dotyczy";
               else
                  echo $_GET['zawod']; 
            ?>
         </div>
         <div style="border: 0;" class="wiersz">
            <b>Uwagi: </b>
            <?php
               if(!$_GET['uwagi'])
                  echo "Brak";
               else
                  echo $_GET['uwagi'];
            ?>
         </div>
      </div>
	</body>
</html>