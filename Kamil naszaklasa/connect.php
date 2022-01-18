<?php

$connection = @new mysqli('localhost','root','')
or die ('Brak połączenia z serwerem. <br/>');

$db = @mysqli_select_db($connection,'naszaklasa')
or die ('Nie mogę połączyć się z bazą danych. <br/>');

$connection->query("SET NAMES 'utf8'");

?>