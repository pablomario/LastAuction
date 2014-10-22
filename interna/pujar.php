<?php

	session_start();
	require_once('../php/funciones.php');

	$producto = $_POST['producto'];
	$puja = $_POST['puja'];	

	if(pujar($producto, $puja)){
		// INSERTADO
	}else{
		// ERRRRROOOOOR
	}




?>