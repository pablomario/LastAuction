<?php
	require_once('php/funciones.php');
	$usuario = $_POST['usuario'];
	$email = $_POST['email'];
	$direccion = $_POST['direccion'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];


	if( $password1 == $password2 ){
		
		if( registroUsuario($usuario, $email, $direccion, $password1, $password2) ){
			return true;
			echo "Bien";
		}else{
			return false;
			echo "Mal INSERT";
		}
	}else{
		return false;
		echo "MAL PSSWORD";
	}



?>