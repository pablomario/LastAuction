<?php
	require_once('php/funciones.php');	
	$email = $_POST['email'];	
	$password = $_POST['password'];
	
	echo "TRALALALALALALALA";
		
	if( identificarUsuario($email, $password) ){		
		header('Location: productos.php');			
	}else{
		echo "MAAAAAAL";
		//header('Location: index.html');		
	}



?>