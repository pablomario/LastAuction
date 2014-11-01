<?php

	session_start();
	require_once('../php/funciones.php');

	$producto = $_POST['producto'];
	$puja = $_POST['puja'];	
	$maximoPujador = $_POST['maximoPujador'];

	if(pujar($producto, $puja, $_SESSION['id_usuario'],$maximoPujador )){
		// INSERTADO
	}else{
		// ERRRRROOOOOR
	}




?>