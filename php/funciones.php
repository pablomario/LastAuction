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


	/**
	 * [seg2tiempo description]
	 * @param  integer $segundos entra segundo
	 * @return string           fecha fianl
	 */
	function seg2tiempo($segundos){
	    $tiempo=$segundos;	   
	    $tiempo=abs($tiempo);
	    $dias=floor($tiempo/86400);
	    $tiempo=$tiempo-$dias*86400;
	    $horas=floor($tiempo/3600);
	    $tiempo=$tiempo-$horas*3600;	   
	    return "<span>Finaliza en: [ ".$dias." d&iacute;as, ".$horas." horas ]</span>";
	}


	/**
	 * [listarSubastas description]
	 * @return none crea estructura html de cada producto
	 */
	function listarSubastas(){
		$conexion=conexion();		
  		$now=strtotime(date("Y-m-d h:i"));
		$sql = "select * from productos where estado > 0 and fechafin >".$now.";";
		if($resultado = $conexion->query($sql)){
			while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
				echo '<article>';

				$queryImagen = "select * from imagenes where producto = ".$row['id']." ";
				if($resultadoImagen = $conexion->query($queryImagen)){
					while($rowImagen = $resultadoImagen->fetch_array(MYSQLI_ASSOC)){
						$urlImagen = substr($rowImagen['imagen'], 1);						
						echo '<a href="solo.php?p='.$row['id'].'"><img src='.$urlImagen.' /></a>';
					}
				}			
				echo '<div class="datosProducto">';
				echo '<a href="solo.php?p='.$row['id'].'">'.$row['titulo'].'</a>';
				echo '<p>'.$row['descripcion'].'</p>';

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

/**
 * [listarProducto description]
 * @param  int $idProducto numero identificacion de producto a listar
 * @return none             crea estructura HTML para poder pujar
 */
	function listarProducto($idProducto){
		$conexion = conexion();
		$sql ='select a.id, a.titulo, a.descripcion, a.fechafin, c.nombre,  b.imagen ';		 
		$sql.='from productos a, imagenes b, usuarios c ';
		$sql.='where a.id = b.producto and a.usuario = c.id and a.id ='.$idProducto.'';		
		if($resultado = $conexion->query($sql) ){
			if($row = $resultado->fetch_array()){
				echo '<article>';
				echo '<h2>'.$row[1].'</h2>';
				$urlImagen = substr($row[5], 1);
				echo '<img src='.$urlImagen.'>';
				echo '<p>'.$row[2].'</p>';				
				echo seg2tiempo($row[3]); 
				echo '<p> Vendedor: '.$row[4].'</p>';				
				echo '<form action="pujar.php" method="POST">';
				echo '<input type="number" min="100" value="100">';
				echo '<input type="submit" value="PUJAR" class="boton">';
				echo '</form>';
				echo '</article>';
			}else{
				echo "NOOOOO";
			}
		}else{
			echo "noooooo x 2";
		}


		$conexion->close();
	}



?>