<?php
	require_once('conexion.php');	

	define("URL_LOCAL","http://127.0.0.1/lastauction/");




/////////////////////////////////////////////////////////////////////////////////////////////
/////////                      LOGIN Y REGISTRO USUARIOS                             ////////
/////////////////////////////////////////////////////////////////////////////////////////////

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




/////////////////////////////////////////////////////////////////////////////////////////////
/////////                      PERFIL DEL USUARIO ASIDE                              ////////
/////////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * [cuadroPerfil description]
	 * @param  integer $usuario se recive el id de usuario para crear su cuadro personalizado
	 * @return HTML          Crea estructura HTML con imagen de perfil y enlace
	 */
	function cuadroPerfil($usuario){
		echo '<article class="perfil">';					
		echo '<a href="'.URL_LOCAL.'interna/perfil.php"><img src="'.URL_LOCAL.'usuarios/default.jpg"></a>';
		echo '<p><a href="'.URL_LOCAL.'interna/perfil.php">¡Hola <span>'.$usuario.'</span>!</a></p>';
		echo '</article>';	
	}





/////////////////////////////////////////////////////////////////////////////////////////////
/////////                         FUNCIONES MISCELANEAS                              ////////
/////////////////////////////////////////////////////////////////////////////////////////////

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
	    return "<span>Finaliza en: ".$dias."d ".$horas."h</span>";
	}


	function menuLogeado(){
		echo '<a href="'.URL_LOCAL.'index.php"><img id="logotipo" src="'.URL_LOCAL.'img/logomini.png" alt="last auction"></a>';
		echo '<ul>';
			echo '<a href="'.URL_LOCAL.'subastas.php"><li><i class="fa fa-heart-o"></i> Subastas</li></a>';						
			echo '<a href="'.URL_LOCAL.'interna/crearsubasta.php"><li><i class="fa fa-plus-square-o"></i> Vender</li></a>';
			echo '<a href="'.URL_LOCAL.'interna/notificaciones.php"><li><i class="fa fa-bell-o"></i> Notificaciones</li></a>';
			echo '<a href="'.URL_LOCAL.'interna/salir.php" class="salir" ><li><i class="fa fa-power-off "></i> salir</li></a>';						
		echo '</ul>';
	}

	function menuNoLogeado(){
		echo '<a href="'.URL_LOCAL.'index.php"><img id="logotipo" src="img/logomini.png" alt="last auction"></a>';
		echo '<ul>';
			echo '<a href="'.URL_LOCAL.'subastas.php"><li><i class="fa fa-heart-o"></i> Subastas</li></a>';							
			echo '<a href="'.URL_LOCAL.'registro.php"><li><i class="fa fa-users "></i> registro</li></a>';								
		echo '</ul>';
	}



/////////////////////////////////////////////////////////////////////////////////////////////
/////////                     FUNCIONES VISUALIZACION PRODUCTOS                      ////////
/////////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * [listarSubastas description]
	 * @param  entero $idUsuario identificador de usuario
	 * @return none            crea estructura HTML
	 */
	function listarSubastasU($idUsuario){
		$conexion=conexion();		
  		$now=strtotime(date("Y-m-d h:i"));  		
		$sql = 'select * from productos where estado > 0 and fechafin >'.$now.' and usuario != '.$idUsuario.' ;';
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
				$sqlPrecio = 'select MAX(puja) from pujas where producto ='.$row['id'].';';
				if($resultadoPrecio = $conexion->query($sqlPrecio)){
					if($rowPrecio = $resultadoPrecio->fetch_array()){
						if($rowPrecio[0]!=null){
							echo '<p><span>Puja: [ '.$rowPrecio[0].'€ ]</span></p>';
						}else{							
							echo '<p><span>Puja: [ '.$row['preciominimo'].'€ ]</span></p>';
						}
					}						
				}
				echo '</div>';
				echo '</article>';
			}
		}
		$conexion->close();
	}

	/**
	 * [listarSubastas description]	 *
	 * @return [type]            [description]
	 */
	function listarSubastas(){
		$conexion=conexion();		
  		$now=strtotime(date("Y-m-d h:i"));  		
		$sql = 'select * from productos where estado > 0 and fechafin >'.$now.';';
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
				$sqlPrecio = 'select MAX(puja) from pujas where producto ='.$row['id'].';';
				if($resultadoPrecio = $conexion->query($sqlPrecio)){
					if($rowPrecio = $resultadoPrecio->fetch_array()){
						if($rowPrecio[0]!=null){
							echo '<p><span>Puja: [ '.$rowPrecio[0].'€ ]</span></p>';
						}else{							
							echo '<p><span>Puja: [ '.$row['preciominimo'].'€ ]</span></p>';
						}
					}						
				}				
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
	function listarProducto($idProducto, $estado){
		$conexion = conexion();
		$sql ='select a.id, a.titulo, a.descripcion, a.fechafin, c.nombre,  b.imagen , a.preciominimo ';		 
		$sql.='from productos a, imagenes b, usuarios c ';
		$sql.='where a.id = b.producto and a.usuario = c.id and a.id ='.$idProducto.'';		
		if($resultado = $conexion->query($sql) ){
			if($row = $resultado->fetch_array()){
				echo '<article class="solo">';				
				$urlImagen = substr($row[5], 1);
				echo '<img src='.$urlImagen.'>';

				echo '<div class="datosBasicos"> ';
				echo '<h3>'.$row[1].'</h3>';							
				echo '<p>'.seg2tiempo($row[3]).'</p>'; 
				echo '<p class="vendedor"> Vendedor: '.$row[4].'</p>';
				echo '</div>';	
				if($estado){
					echo '<form action="interna/pujar.php" method="POST">';
					echo '<input type="hidden" name="producto" value="'.$idProducto.'" > ';
					$sqlPrecio = 'select MAX(puja) from pujas where producto ='.$idProducto.';';
					if($resultadoPrecio = $conexion->query($sqlPrecio)){
						if($rowPrecio = $resultadoPrecio->fetch_array()){
							if($rowPrecio[0]!=null){								
								echo '<input name="puja" type="number" min="'.($rowPrecio[0]+1).'" value="'.$rowPrecio[0].'">';
							}else{
								echo '<input name="puja" type="number" min="'.($row[6]+1).'" value="'.$row[6].'">';
							}
						}						
					}					
					echo '<input type="submit" value=" HACER OFERTA " class="boton">';
					echo '</form>';
				}else{
					echo '<div class="aviso"><h2>Inicia sesion para realziar una oferta</h2></div>';
				}				
				echo '<p class="descripcion">'.$row[2].'</p>';	
				echo '</article>';
			}else{
				echo "NOOOOO";
			}
		}else{
			echo "noooooo x 2";
		}
		$conexion->close();
	}


/////////////////////////////////////////////////////////////////////////////////////////////
/////////                          FUNCIONES PARA PUJAS                              ////////
/////////////////////////////////////////////////////////////////////////////////////////////

	function pujar($producto, $puja, $usuario){
		$conexion = conexion();
		$sql = 'insert into pujas(producto,puja,usuario) values('.$producto.','.$puja.','.$usuario.') ';

		if($resultado = $conexion->query($sql)){
			echo "PUJA ACEPTADA";
		}else{
			echo "ERROR";
		}



		$conexion->close();
	}











?>