<?php 
session_start();
error_reporting(false);
session_destroy();
 ?><!doctype html>

<html>
	<head>
		<title>Quiz</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>
		<div class="glowna1">
			<h1>Rozpocznij quiz o stolicach państw</h1></div>
		<form action="quiz.php">
			<input type="submit" name="menu" value="Rozpocznij" class="przycisk1"><br/><br/>
		</form>
		<?php
            $plik = "ranking.txt";
            $dane = file($plik);
            for($i=0;$i<count($dane);$i++)
            {
                list($abc[$i]['id_uczestnika'], $abc[$i]['nickname'], $abc[$i]['wynik'], $abc[$i]['data']) = explode(" || ", $dane[$i]);
            }
        echo "<table>";
    ?>
        <tr><td><b>Nickname</b></td>
            <td><b>Wynik</b></td>
            <td><b>Data</b></td>

        </tr>
        <?php
        function  porownaj_czas($a, $b)
 {
   if($a['wynik']==$b['wynik'] )
      return 0;
   else if ($a['wynik']<$b['wynik'])
      return 1;
   else
      return -1;
 }
 usort($abc, 'porownaj_czas');

        for($i=0;$i<@count($abc);$i++)
        {
            echo "<tr>".
                "<td>".$abc[$i]['nickname']."</td>".
                "<td>".$abc[$i]['wynik']."</td>".
                "<td>".$abc[$i]['data']."</td>".

                "</tr>";
            
        }
        echo "</table>";
        ?>
	</body>
</html>
