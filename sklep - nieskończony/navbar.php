<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<?php
require("connect.php");
if(isset($_POST['zaloguj']) && !empty($_POST['login_login']) && !empty($_POST['login_haslo']))
{
  $dane_logowania = $connect->query("SELECT login,email,haslo FROM konto WHERE login = '".$_POST['login_login']."'");
  while($row = mysqli_fetch_assoc($dane_logowania))
  {
    if($_POST['login_login'] == $row['login'] && password_verify($_POST['login_haslo'], $row['haslo']) == 1)
    {
     $_SESSION['zalogowany'] = true;
      $_SESSION['login'] = $_POST['login_login'];
    }
  }
}
  $dane = mysqli_fetch_assoc($connect->query("SELECT * FROM konto WHERE login = '".@$_SESSION['login']."'"));
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a href="index.php"><img class="navbar-brand" src="img/logo2.png" height="60px"></a>
  <label class="navbar-brand m-0 mr-5"><a href="index.php" class="a-bezdekoracji">Cebulandia</a></label>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Telefony
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Xiaomi</a>
          <a class="dropdown-item" href="#">Samsung</a>
          <a class="dropdown-item" href="#">LG</a>
          <a class="dropdown-item" href="#">ASUS</a>
          <a class="dropdown-item" href="#">Lenovo</a>
          <a class="dropdown-item" href="#">Nokia</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Komputery
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Lenovo</a>
          <a class="dropdown-item" href="#">HP</a>
          <a class="dropdown-item" href="#">Dell</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Sprzęt
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Monitory</a>
          <a class="dropdown-item" href="#">Myszki</a>
          <a class="dropdown-item" href="#">Klawiatury</a>
        </div>
      </li>
    </ul>
    <div class="text-light mr-5">
      <?php 
      if($dane['ranga'] == 1)
      {
      echo "<div class='navbar-text mr-5 pr-5'><a href='admin.php' class='text-light'>Panel admina</a></div>";
      }
      if(isset($_SESSION['zalogowany']))
{
  echo "<div class='c-default navbar-text text-light'>Witaj ".$_SESSION['login']."</div>";
}
?>
</div>
<ul class="m-0 p-0 navbar-nav"><li class="nav-item dropdown">
 <img src="img/ludzik.png" height="60px" class="btn" data-toggle="modal" data-target="#exampleModalLong">
 <?php
 if(isset($_SESSION['zalogowany']))
{
  ?>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <form method="GET" action="panel.php">
    <a class="dropdown-item btn" href="panel.php?a1">Konto</a>
    <a class="dropdown-item btn" href="panel.php?a2">Zmień hasło</a>
    <a class="dropdown-item btn" href="panel.php?a3">Moje zamówienia</a>
    <a class="dropdown-item btn" href="panel.php?a4">Lista życzeń</a>
  </form>
  <form method="POST" action="logout.php">
    <input type="submit" name="wyloguj" class="dropdown-item btn" value="Wyloguj">
  </form>
  </div>
  <?php
}
?>
</li></ul>
<img src="img/koszyk.png" height="60px" class="btn">
</div>
</nav>
<?php 
if(!isset($_SESSION['zalogowany']))
{
 ?>
 <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Logowanie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <h6>Login</h6>
          <input type="text" class="form-control" name="login_login">
          <br/>
          <h6>Hasło</h6>
          <input type="password" class="form-control" name="login_haslo">
          Nie masz jeszcze konta? <a data-toggle="modal" data-target="#rejestracja" data-dismiss="modal" aria-label="Close"><b>Zarejestruj się</b></a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
          <button type="submit" class="btn btn-primary" name="zaloguj">Zaloguj się</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="rejestracja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Rejestracja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <h6>Email</h6>
          <input type="email" class="form-control" name="rejestracja_email">
          <h6>Login</h6>
          <input type="text" class="form-control" name="rejestracja_login">
          <h6>Hasło</h6>
          <input type="password" class="form-control" name="rejestracja_haslo">
          <h6>Potwierdź hasło</h6>
          <input type="password" class="form-control" name="rejestracja_potwierdz">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
          <button type="submit" class="btn btn-primary" name="zarejestruj">Zarejestruj się</button>
        </form>
        <?php
        @$email = $_POST['rejestracja_email'];
        @$login = $_POST['rejestracja_login'];
        @$haslo = password_hash($_POST['rejestracja_haslo'], PASSWORD_DEFAULT);
        @$potwierdz = password_verify($_POST['rejestracja_haslo'], $haslo);
        if(isset($_POST['zarejestruj']) && !empty($email) && !empty($login) && !empty($haslo) && !empty($potwierdz) && $potwierdz == 1)
          {
            $sql = $connect->query("SELECT login,email FROM konto WHERE login = '".$login."' OR email = '".$email."'");
            if(mysqli_fetch_row($sql) == 0)
              {
                $connect->query("INSERT INTO konto (id_konta,login,haslo,email,imie,nazwisko,ranga,data_dol) VALUES (NULL, '".$login."', '".$haslo."', '".$email."',NULL,NULL,'0','".date("Y-m-d")."')");
              }
          }
?>
</div>
</div>
</div>
</div>
<?php 
}
?>