<?php
	$connect = new mysqli("localhost","root","","ogloszenia");
	$connect->query("INSERT INTO `ogloszenie` (`id`, `uzytkownik_id`, `kategoria`, `podkategoria`, `tytul`, `tresc`) VALUES (NULL, '1', '".$_POST['kategoria']."', '".$_POST['podkategoria']."', '".$_POST['tytul']."', '".$_POST['tresc']."')");
	$connect->close();
	header("Location: formularz.html");
?>