<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<link rel="stylesheet" type="text/css" href="style.css">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<title>Wypożyczalnia kaset</title>
</head>
<body>
<div class="container text-center">
	<form action="index.php">
	<input type="submit" value="Strona główna" class="btn btn-dark mt-3">
	<input type="submit" value="Wyloguj" class="btn btn-dark mt-3" name="wyloguj">
	</form>
<h1>Panel Admina</h1>
<form method="POST">
	<select name="gatunek" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center mt-3 mb-3">
		<option selected disabled hidden>Gatunek</option>
		<option>
			<!-- wyświetl tu z bazy gatunki -->
		</option>
	</select>
	Dodaj gatunek
	<input type="text" placeholder="Nazwa" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center mt-1">
	<input type="submit" value="Dodaj gatunek" class="btn btn-dark mt-3">
	<input type="submit" value="Usuń gatunek" class="btn btn-dark mt-3">
	<select name="kaseta" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center  mt-3 mb-3">
		<option selected disabled hidden>Kaseta</option>
		<option>
			<!-- wyświetl tu z bazy kasety -->
		</option>
	</select>
	Dodaj kasetę
	<input type="text" placeholder="Tytuł filmu" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center mt-1">
	<select name="gatunek" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center mt-3">
		<option selected disabled hidden>Gatunek</option>
		<option>
			<!-- wyświetl tu z bazy gatunki -->
		</option>
	</select>
	<select name="rezyser" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center mt-3">
		<option selected disabled hidden>Reżyser</option>
		<option>
			<!-- wyświetl tu z bazy reżyserów -->
		</option>
	<input type="text" placeholder="Ilość kaset" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center mt-3">
	</select>
	<input type="submit" value="Dodaj kasetę" class="btn btn-dark mt-3">
	<input type="submit" value="Usuń kasetę" class="btn btn-dark mt-3">
	<select name="rezyser" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center mt-3">
		<option selected disabled hidden>Reżyser</option>
		<option>
			<!-- wyświetl tu z bazy reżyserów -->
		</option>
	</select>
	<input type="text" placeholder="Imię" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center mt-3">
	<input type="text" placeholder="Nazwisko" class="form-control col-10 col-sm-8 col-md-6 col-xl-4 ml-auto mr-auto text-center mt-3">
	<input type="submit" value="Dodaj reżysera" class="btn btn-dark mt-3">
	<input type="submit" value="Usuń reżysera" class="btn btn-dark mt-3">
</form>
</div>
</body>
</html>