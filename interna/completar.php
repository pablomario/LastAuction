<?php
	require_once('../php/funciones.php');
	session_start();

	$telefono = $_POST['telefono'];
	
	// SEGUNDA PARTE: Lo hacemos "comme il faut"
	// Solo permitimos ficheros con extensión jpg o gif
	if(!($_FILES['archivo']['type']=="image/jpeg" OR $_FILES['archivo']['type']=="image/gif")){
		echo "El formato ".$_FILES['archivo']['type']." no está permitido";
		exit();
	}else{
		if($_FILES['archivo']['type']=="image/jpeg"){
			$extension=".jpg";
		}else{
			$extension=".gif";
		}
	}

	$numero=strtotime(date("Y-m-d h:i"));
	$nuevo_nombre="../usuarios/".$numero.$extension;
	
	if($_FILES['archivo']['size']>5000000 OR 
		$_FILES['archivo']['size']==0){
		echo "El tamaño ".$_FILES['archivo']['size']." es raro";
		exit();
	}
	
	if ($_FILES['archivo']['tmp_name'] != "none" ){				
		if (copy($_FILES['archivo']['tmp_name'], $nuevo_nombre)) {				
			if(completarPerfil($_SESSION['id_usuario'],$telefono,$nuevo_nombre)){						
				header('Location: perfil.php');
			}else{
				echo "<br><br><center><img src=../img/error.png><center>";
			}
		}else{
			echo "<br><br><center><img src=../img/error.png><center>"; 
		}
	}
		
	


?>