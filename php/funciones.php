<?php
	require_once('conexion.php');	

	/**
	 * FUNCIONES LOGIN Y REGISTRO DE USUARIOS
	 */
	

	/**
	 * [identificarUsuario description]
	 * @param  string $email    email de el usuario
	 * @param  string $password contraseña de el usario se compara en md5
	 * @return boolean           
	 */
	function identificarUsuario($email, $password){
		$conexion = conexion();
		$password = md5($password);
		$sql = "select count(*), id, nombre, direccion from usuarios where email = '".$email."' and contrasena = '".$password."';";
		
		if($resultado = $conexion->query($sql)){
			echo "mal 1";				
			if($row = $resultado->fetch_array()){
				echo "mal 2";
				if($row[0]==1){
					echo "mal 3";						
					session_start();
					$_SESSION['id_usuario'] = $row[1];
					$_SESSION['nombre'] = $row[2];
					$_SESSION['direccion'] = $row[3];
					$_SESSION['email']=$email;
					header('Location: subastas.php');	
				}else{
					header('Location: index.html');					
				}				
			}else{
				header('Location: index.html');	
			}
		}else{
			header('Location: index.html');	
		}
		$conexion->close();
	}


	/**
	 * [registroUsuario description]
	 * @param  string $usuario   nombre de usuario
	 * @param  string $email     email de el usuario
	 * @param  string $direccion direccion completa del usuario
	 * @param  string $password  contraseña
	 * @return boolean           
	 */
	function registroUsuario($usuario, $email, $direccion, $password){		
		$conexion = conexion();
		$sql = "select count(email) from usuarios where email = '".$email."' ;";		
		if($resultado = $conexion->query($sql) ){
			if($row=$resultado->fetch_array()){
				$resultado = $row[0];
			}			
			if($resultado==0){								
				$password = md5($password); // Almaceno la contraseña en algoritmo md5
				$sql = "insert into usuarios(email,nombre,direccion,contrasena) values('".$email."','".$usuario."','".$direccion."','".$password."') ";
				if($conexion->query($sql)){					
					return true;					
				}else{					
					return false;					
				}
			}else{
				return false;
			}			
		}else{
			return false;
		}
		$conexion->close();
	}




	function listarSubastas(){
		$conexion=conexion();		
  		$now=strtotime(date("Y-m-d h:i"));
		$sql = "select * from productos where estado > 0 and fechafin >".$now.";";
		if($resultado = $conexion->query($sql)){
			while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
				echo '<article class="articulo">';

				$queryImagen = "select * from imagenes where producto = ".$row['id']." ";
				if($resultadoImagen = $conexion->query($queryImagen)){
					while($rowImagen = $resultadoImagen->fetch_array(MYSQLI_ASSOC)){
						$urlImagen = substr($rowImagen['imagen'], 1);						
						echo '<img src='.$urlImagen.' />';
					}
				}			
				echo '<div class="datosProducto">';
				echo '<h3><a href="solo.php?='.$row['id'].'">'.$row['titulo'].'</a></h3>';
				echo '<p class="descripcion">'.$row['descripcion'].'</p>';

				$queryUsuario = 'select nombre from usuarios where id='.$row['usuario'].';';
				if($resultadoUsuario =  $conexion->query($queryUsuario)){
					if($rowUsuario = $resultadoUsuario->fetch_array()){
						echo '<p class="vendedor">'.$rowUsuario[0].'</p>';
					}
				}

				//echo "<p>Vendedor:".$row['usuario']."</p>";
				echo '<p><span>Puja: [ '.$row['preciominimo'].'€ ]</span></p>';
				echo '</div>';
				echo '</article>';
			}
		}

		$conexion->close();
	}




?>