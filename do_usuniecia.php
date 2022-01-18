<?php
$t = array(3,2,1,3,2,2,2,2,105);
$n = 10;
$k = 1;
$wynik[] = array();
for ($i = 0; $i < $n; $i++)
{ 
	$j = 0;
	while (($j < $k) && ($t[$i] != $wynik[0][$j]))
	{
		$j++;
	}
	if ($j == $k)
	{
		$wynik[0][$k] = $t[$i];
		$wynik[1][$k] = 1;
		$k++;
	}
	else
		$wynik[1][$j] = $wynik[1][$j] + 1;
}
$a = 0;
while ($wynik)
{
	print_r($wynik[0]."liczba");
	$a++;
}
?>