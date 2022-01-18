<?php
$serwer='localhost';
$user='root';
$haslo='';
$baza='wykaz';
@$connect=new mysqli($serwer,$user,$haslo,$baza);
if($connect->connect_errno!=false)
{
   exit("Error: ".$connect->connect_errno);

}
$connect->query("SET NAMES 'utf8'");
?>