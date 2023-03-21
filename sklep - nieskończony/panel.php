<!doctype html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <?php
  require("connect.php");
  session_start();
  ?>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script type="text/javascript">
    function tab(a)
    {
      $('#menu1').removeClass('active');
      $('#link1').removeClass('active');
      $('#menu'+a).addClass('active');
      $('#link'+a).addClass('active');
    }
  </script>
  <title>Cebulandia</title>
</head>
<body>
  <?php 
  require("navbar.php");
  if(@$_SESSION['zalogowany'] != 1)
  {
    echo "<div class='text-danger text-center'>Musisz się zalogować aby zobaczyć tą stronę</div>'";
    die();
  }
  $dane = mysqli_fetch_assoc($connect->query("SELECT * FROM konto WHERE login = '".$_SESSION['login']."'"));
  $ilosc_zamowien = mysqli_num_rows($connect->query("SELECT id_zamowienia FROM zamowienie"));
  $licznik = 0;
  if(isset($_POST['update1']))
  {
  $dane['imie'] = $_POST['imie'];
  $dane['nazwisko'] = $_POST['nazwisko'];
  }
  ?>
  <main>
    <div class="container mt-3">
      <ul class="nav justify-content-center">
        <li class="nav-item">
          <button id="link1" type="button" class="btn btn-dark zakladka border-0 active pr-5 pl-5" href="#menu1" data-toggle="pill" onclick="">Twój profil</button>
        </li>
        <li class="nav-item">
          <button id="link2" type="button" class="btn btn-dark zakladka border-0 pr-5 pl-5" href="#menu2" data-toggle="pill">Zmień hasło</button>
        </li>
        <li class="nav-item">
          <button id="link3" type="button" class="btn btn-dark zakladka border-0 pr-5 pl-5" href="#menu3" data-toggle="pill">Moje zamówienia</button>
        </li>
        <li class="nav-item">
          <button id="link4" type="button" class="btn btn-dark zakladka border-0 pr-5 pl-5" href="#menu4" data-toggle="pill">Lista życzeń</button>
        </li>
      </ul>

      <div class="tab-content bg-light c-default p-4">
        <div id="menu1" class="tab-pane fade show  mt-4 text-center text-dark active">
          <h3>Twój profil</h3><br/>
          <form method="POST">
          <p>Login: <input type="text" disabled value="<?php echo $dane['login']; ?>" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 m-auto c-not-allowed" data-toggle="tooltip" data-placement="right" title="Nie możesz zmienić loginu"></p>
          <p>Imię: <input type="text" name="imie" value="<?php echo $dane['imie']; ?>" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 m-auto"></p>
          <p>Nazwisko: <input type="text" name="nazwisko" value="<?php echo $dane['nazwisko']; ?>" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 m-auto"></p>
         <p> Email: <input type="text" disabled value="<?php echo $dane['email']; ?>" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 m-auto c-not-allowed" data-toggle="tooltip" data-placement="right" title="Nie możesz zmienić emaila"></p>
         <input type="submit" name="update1" value="Zatwierdź" class="btn btn-dark">
       </form>
         <p class="mt-3"> Data dołączenia: <?php echo $dane['data_dol']; ?></p>
       <?php
        if(isset($_POST['update1']))
        {
          $connect->query("UPDATE konto SET imie = '".$_POST['imie']."', nazwisko = '".$_POST['nazwisko']."' WHERE id_konta = '".$dane['id_konta']."'");
        }
       ?>
        </div>
        <div id="menu2" class="tab-pane fade show mt-4 text-center text-dark p-4">
          <h3>Zmień hasło</h3><br/>
          <form method="POST">
          <input type="password" name="stare_haslo" placeholder="Stare hasło" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 m-auto auto"><br/>
          <input type="password" name="nowe_haslo" placeholder="Nowe hasło" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 m-auto"><br/>
          <input type="password" name="nowe_haslo_potwierdz" placeholder="Nowe hasło" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 m-auto"><br/>
          <input type="submit" name="update2" value="Zmień hasło" class="m-auto btn-dark btn"><br/>
        </form>
        <?php
          if(isset($_POST['update2']))
          {
          ?>
          <script type="text/javascript">
            tab(2);
          </script>
          <?php
            if(!empty($_POST['stare_haslo']) && !empty($_POST['nowe_haslo']) && !empty($_POST['nowe_haslo_potwierdz']))
            {
              if(password_verify($_POST['stare_haslo'], $dane['haslo']))
              {
                if($_POST['nowe_haslo'] == $_POST['nowe_haslo_potwierdz'])
                {
                  $connect->query("UPDATE konto SET haslo = '".password_hash($_POST['nowe_haslo'], PASSWORD_DEFAULT)."' WHERE id_konta = '".$dane['id_konta']."'");
                  ?>
                  <div class="text-info mt-4">Zmieniono hasło</div>
                  <?php
                }
                else
                {
                  ?>
                  <div class="text-info mt-4">Nowe hasło jest inne od potwierdzonego hasła</div>
                  <?php
                }
              }
              else
              {
              ?>
              <div class="text-info mt-4">Stare hasło jest niepoprawne</div>
              <?php
              }
            }
          else
            {
              ?>
              <div class="text-info mt-4">Wypełnij wszystkie pola</div>
              <?php
            }
          }
        ?>
        </div>
        <div id="menu3" class="tab-pane fade show mt-4 text-center text-dark">
          <h3>Moje zamówienia</h3>
          <div class="table-responsive">
          <table class="table w-100">
            <thead class="thead-light">
            <tr>
              <th>Produkt</th>
              <th>Zamówiono</th>
              <th>Wysłano</th>
              <th>Cena przedmiotu</th>
              <th>Cena wysyłki</th>
              <th>Stan realizacji</th>
              <th>Zobacz więcej</th>
            </tr>
            </thead>
            <tbody>
              <?php
              $zamowienia = $connect->query("SELECT * FROM zamowienie z JOIN konto k ON z.konto = k.id_konta JOIN platnosc pl ON z.platnosc = pl.id_platnosci JOIN dostawa d ON z.dostawa = d.id_dostawy JOIN zamowienie_produkt zp ON z.id_zamowienia = zp.zamowienie JOIN produkt pr ON zp.produkt = pr.id_produktu WHERE k.login = '".$_SESSION['login']."'");
              while($row = $zamowienia->fetch_assoc())
              {
                echo "<tr><td>".$row['nazwa']."</td>";
                echo "<td>".$row['data_zamowienia']."</td>";
                echo "<td>";
                if(!$row['data_wysylki'])
                  echo "Przesyłka nie wysłana";
                else
                  echo $row['data_wysylki'];
                echo "</td>";
                echo "<td>".$row['cena']."</td>";
                echo "<td>".$row['koszt']."</td>";
                echo "<td>";
                if(!$row['data_wysylki'] && !$row['data_przyjecia'])
                  echo "Oczekuje na zaakceptowanie";
                if(!$row['data_wysylki'] && $row['data_przyjecia'])
                  echo "Przygotowywanie do wysyłki";
                if($row['data_wysylki'])
                  echo "Przesyłka wysłana";
                echo "</td>";
                echo "<td><a href='#'>Szczegóły</a></td>";

                echo "</tr>";
              }
               ?>
          </tbody>
          </table>
        </div>
        </div>
        <div id="menu4" class="tab-pane fade show mt-4 text-center text-dark">
          <h3>Lista życzeń</h3>
        </div>
      </div>
    </div>
  </main>
<?php 
    if(isset($_GET['a2']))
    {
    echo '<script type="text/javascript">;tab(2);</script>';
    }
    if(isset($_GET['a3']))
    {
    echo '<script type="text/javascript">tab(3);</script>';
    }
    if(isset($_GET['a4']))
    {
    echo '<script type="text/javascript">tab(4);</script>';
    }
?>
  </html>