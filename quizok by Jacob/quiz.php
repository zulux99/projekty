
<!doctype html>

<html>
    <head>
        <title>Quiz</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">



        <?php 
        session_start();
        error_reporting(false);
        $nplik =  "stolice.txt";

        if (!file_exists($nplik)) {
            echo "Brak pliku";
            exit();
        }
        $dane = file($nplik); 
        for($i=0;$i<count($dane);$i++)
        {
            list($plik[$i]['id'],$plik[$i]['nazwa'], $plik[$i]['stolica'], $plik[$i]['zdj']) = explode(" || ", $dane[$i]); 
        } 
        if (!isset($_SESSION['licznik'])) {
            $_SESSION['licznik']=0;
        }
        if (!isset($_SESSION['punkty'])) {
            $_SESSION['punkty']=0;
        }
        if ($_SESSION['licznik']=='9') {
            header('Location: wynik.php');
        }
        if (isset($_POST['stolica'])) {
$stolicapost = $_POST['stolica'];
    $stolicaplik = $plik[$_SESSION['licznik']]['stolica'];
    $stolicapost=mb_strtoupper($stolicapost,"UTF-8");
    $stolicaplik=mb_strtoupper($stolicaplik,"UTF-8");
    if ($stolicapost==$stolicaplik) {
                $_SESSION['punkty']=$_SESSION['punkty']+1;
            }else{
		$zle=true;
	}
            $_SESSION['licznik']=$_SESSION['licznik']+1;
        }


        ?>

    </head>

    <body>
        <div class="tytul">
            <h1>Quiz o stolicach państw</h1>
        </div><br/>
        <div class="pytanie">
            <h2><i>Stolicą <?php echo $plik[$_SESSION['licznik']]['nazwa']; ?> jest:</i></h2>
            <img src="Flagi/<?php echo $plik[$_SESSION['licznik']]['zdj']; ?>">			  <ul id="countdown">
            <li><span class="seconds" id="licznik">15</span>
                <p class="timeRefSeconds"></p>
            </li>
            </ul>
        </div>
        <div class="odpowiedz">
            <h2><?php if (isset($zle)) {
				echo "Poprzednia odpowiedź była zła";
			} ?></h2><br/>
        </div><br/>
        <div class="glowna">
            <form method="post" id="formularz">
                <br/><input class="tekst" id="stolica" type="text" name="stolica" placeholder="Stolica"><br/><br/>

                <input class="przycisk" id="next" type="submit" name="next" value="Kolejne"><br/>
            </form>

            <script>

                function test() {

                    document.getElementById("formularz").submit();
                    console.log('abc');
                }
                var res = document.getElementById('licznik'),
                    i = 15;

                (function countDown(i)
                 {
                    setInterval(function()
                                {
                        if (i >= 1)
                        {
                            document.getElementById("licznik").innerHTML = i;
                            i--;
                            countDown(i);
                        }
                    }, 1000);

                }(i));
                setTimeout('test()', 15000);

            </script>

            </body>
        </html>