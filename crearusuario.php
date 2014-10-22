<?php
	require_once('php/funciones.php');
	$usuario = $_POST['usuario'];
	$email = $_POST['email'];
	$direccion = $_POST['direccion'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];


	if( $password1 == $password2 ){
		
		if( registroUsuario($usuario, $email, $direccion, $password1, $password2) ){
			echo "Se ha registrado correctamente";
			header('Refresh: 5; url=index.html');			
		}else{
			echo "ERROR EMAIL YA EXISTENTE";			
		}
	}else{
		echo "ERROR CONTRASEÑAS NO COINCIDEN";	
	}



?>