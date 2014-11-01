<?php
	 
	$fechainicial=strtotime(date("Y-m-d h:i"));
	echo $fechainicial;

	$fechainicial = 2413829020;

	echo "<br/>";
    $caca =  date('d:H:i', $fechainicial);
    $dias =  date('d', $fechainicial);
    $horas =  date('H', $fechainicial);
    $minutos =  date('i', $fechainicial);
    echo $dias."dias ".$horas."horas ".$minutos."minutos ";


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="icon" href="img/favicon.png" type="image/x-icon">		
	</head>
	<body>		
	
	</body>
</html>