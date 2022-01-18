<?php
$serwer='localhost';
$user='root';
$haslo='';
$baza='wypozyczalnia';
@$connect = new mysqli($serwer,$user,$haslo,$baza);
if($connect->connect_errno != false)
{
   exit("Error: ".$connect->connect_errno);

}
$connect->query("SET NAMES 'utf8'");
function test_input($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>