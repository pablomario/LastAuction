<?php
	require_once('../php/funciones.php');
	session_start();

	try{
		$titulo = $_POST['titulo'];
		$titulo = noXSS($titulo);
		$descripcion = $_POST['descripcion'];
		$descripcion = noXSS($descripcion);
		$preciominimo = $_POST['preciominimo'];	
		$fechafin = $_POST['fechafin'];
		$categoria = $_POST['categoria'];

		if( $preciominimo>0 ){
			$idProducto = crearSubasta($_SESSION['id_usuario'], $titulo, $descripcion, $preciominimo, $fechafin, $categoria);
			
			if($idProducto>0){
				// SEGUNDA PARTE: Lo hacemos "comme il faut"
				// Solo permitimos ficheros con extensión jpg o gif
				if(!($_FILES['archivo']['type']=="image/jpeg" OR $_FILES['archivo']['type']=="image/gif" OR $_FILES['archivo']['type']=="image/png")) {
					echo "El formato ".$_FILES['archivo']['type']." no está permitido";
					exit();
				}else{
					if($_FILES['archivo']['type']=="image/jpeg"){
						$extension=".jpg";
					}else{
						$extension=".gif";
					}
				}

				// Cambiamos el nombre que nos de el cliente a uno que nos gusta
				$numero=strtotime(date("Y-m-d h:i"));
				$nuevo_nombre="../productos/".$numero.$extension;		

				// Solo permitimos ficheros "normales" de tamaño
				if($_FILES['archivo']['size']>5000000 OR 
					$_FILES['archivo']['size']==0){
					echo "El tamaño ".$_FILES['archivo']['size']." es raro";
					exit();
				}
				// Solo permitimos ficheros con nombre
				if ($_FILES['archivo']['tmp_name'] != "none" ){
					// Pasamos el archivo que está en el directorio temporal
					// a donde nosotros queramos (por defecto .)
					if (copy($_FILES['archivo']['tmp_name'], $nuevo_nombre)) {				
						if(guardarImagen($idProducto,$nuevo_nombre)){
							echo "<h2>TODO SALIO BIEN - Subasta creada</h2>";
							header('Location: notificaciones.php');
						}else{
							echo '<br><br><center><img src="../img/error.png"><center>';
							echo '<a href="crearsubasta.php" class="boton" >Volver</a>';
						}

					}else{
						echo '<br><br><center><img src="../img/error.png"><center>';
						echo '<a href="crearsubasta.php" class="boton" >Volver</a>';
					}
				}
			}else{
				echo '<br><br><center><img src="../img/error.png"><center>';
				echo '<a href="crearsubasta.php" class="boton" >Volver</a>';	
			}
		}	
	}catch(Exception $e){
		echo '<br><br><center><img src="../img/error.png"><center>';
		echo '<a href="crearsubasta.php" class="boton" >Volver</a>';	
	}

?>