<?php
	require_once('conexion.php');	

	define("URL_LOCAL","http://127.0.0.1/php/lastauction/");




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
/////////                      FUNCIONES CREACION SUBASTA                            ////////
/////////////////////////////////////////////////////////////////////////////////////////////

	function crearSubasta($usuario, $titulo, $descripcion, $preciominimo, $fechafin, $categoria){
		$conexion = conexion();
		$fecha =  date("Y-m-d h:i");
  		$fechainicial=strtotime($fecha);
  		$fechafin = $fechainicial + ($fechafin*3600);
		$sql = "insert into productos (titulo, descripcion, preciominimo, fechainicial, fechafin, estado, usuario, categoria) 
		values('".$titulo."','".$descripcion."',".$preciominimo.",".$fechainicial.",".$fechafin.",1,".$usuario.",".$categoria.")";
				
		if($conexion->query($sql)){		
			if($resultado = $conexion->query("select LAST_INSERT_ID()")){				
				if($row=$resultado->fetch_array()){
					$idProducto = $row[0];
					$descripcion = "Tus subasta <span>".$titulo."</span> se ha creado correctamente.";					
					$sqlNoti = "insert into notificaciones(tipo,descripcion,usuario) values(4, '".$descripcion."',".$usuario.")";
					if($conexion->query($sqlNoti)){
						header('Location: '.URL_LOCAL.'/solo.php?p='.$producto);
					}else{
						echo "3";
					}					
					return $idProducto;
				}
			}			
		}else{
			echo "ERROR!";
			return 0;
		}
		$conexion->close();
	}

	function guardarImagen($idProducto,$imagen){
		$conexion = conexion();
		$sql = "insert into imagenes (producto,imagen) values('".$idProducto."','".$imagen."')";
		if($conexion->query($sql)){
			return true;
		}else{
			return false;
		}
		$conexion->close();

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
				switch ($row['categoria']) {
					case 1:
						echo '<article class="casa">';
						break;
					case 2:
						echo '<article class="joyeria">';
						break;
					case 3:
						echo '<article class="moda">';
						break;
					case 4:
						echo '<article class="deporte">';
						break;
					case 5:
						echo '<article class="electronica">';
						break;
					default:
						echo '<article>';
						break;
				}
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
				switch ($row['categoria']) {
					case 1:
						echo '<article class="casa">';
						break;
					case 2:
						echo '<article class="joyeria">';
						break;
					case 3:
						echo '<article class="moda">';
						break;
					case 4:
						echo '<article class="deporte">';
						break;
					case 5:
						echo '<article class="electronica">';
						break;
					default:
						echo '<article>';
						break;
				}
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
/////////                                 DISPARADOR                                 ////////
/////////////////////////////////////////////////////////////////////////////////////////////

// 0 - Subasta terminada
// 1 - Subasta Activa -> AL CREAR LA SUBASTA
// 2 - Subata vendida	
// 3 - Puja Aceptada

	/**
	 * DISPARADOR PARA NOTIFICACIONES Y SUBASTAS
	 * Cambio el estado de las subastas para que no se visualicen si han terminado
	 * y creo las notificaciones de subasta terminada con pujas (vendida) o
	 * subata terminada sin pujas (finalizada)
	 * @return nada nada
	 */
	function limpieza(){
		$conexion = conexion();
		echo "LIMPIEZA! <br>";
		$now=strtotime(date("Y-m-d h:i"));  

		// SOLO HA TERMINADO Y ADEMAS TIENE PUJAS (CAMBIAR A ESTADO 2)
		$sql = 'SELECT a.id, a.titulo, a.usuario,  a.estado, c.id as idUsuario, c.nombre, max(b.puja) as pujaMaxima FROM productos a, pujas b, usuarios c 
				WHERE a.id = b.producto and c.id = b.usuario and b.puja > 0 and a.fechafin <'.$now.' and a.estado = 1 GROUP BY a.id';
		if($resultado = $conexion->query($sql)){
			while($row=$resultado->fetch_array(MYSQLI_ASSOC)){				
				// CAMBIAR EL ESTADO A VENDIDO			
				$sqlUpdate = 'update productos set estado=2 , comprador='.$row['idUsuario'].' where id='.$row['id'].';';
				if($conexion->query($sqlUpdate)){
					// CREAR EL MENSAJE DE NOTIFICACION
					$descripcion = "¡Enhorabuena! Has comprado el articulo <span>".$row['titulo']."</span> por: ".$row['pujaMaxima']."€. ";					
					$sqlNoti = "insert into notificaciones(tipo,descripcion,usuario) values(2, '".$descripcion."',".$row['idUsuario'].")";
					if($conexion->query($sqlNoti)){
						//echo "todo OK";
					}
					$descripcion = "¡Felicidades! Has vendido el articulo <span>".$row['titulo']."</span> por: ".$row['pujaMaxima']."€. ";					
					$sqlNoti = "insert into notificaciones(tipo,descripcion,usuario) values(2, '".$descripcion."',".$row['usuario'].")";
					if($conexion->query($sqlNoti)){
						//echo "todo OK";
					}


				}
			}
		}

		// LA SUBASTA HA TERMINADO PERO NO TIENE PUJAS (CAMBIAR A ESTADO 0)
		$sql = 'SELECT * FROM productos where fechafin < '.$now.' and estado = 1 ';
		if($resultado = $conexion->query($sql)){
			while($row = $resultado->fetch_array(MYSQLI_ASSOC)){
				// CAMBIAR EL ESTADO A FINALIZADO
				$sqlUpdate = 'update productos set estado=0 where id='.$row['id'].';';
				if($conexion->query($sqlUpdate)){
					// CREAR NOTIFICACION
					$descripcion = "Lo sentimos, su subasta <span>".$row['titulo']."</span> ha caducado.";
					$sqlNoti = "insert into notificaciones(tipo,descripcion,usuario) values(0, '".$descripcion."',".$row['usuario'].")";
					if($conexion->query($sqlNoti)){
						//echo "todo OK 2";
					}
				}
			}
		}
		$conexion->close();
	} 


/////////////////////////////////////////////////////////////////////////////////////////////
/////////                              NOTIFICACIONES                                ////////
/////////////////////////////////////////////////////////////////////////////////////////////

// 0 - Subasta terminada
// 1 - Subasta Activa -> AL CREAR LA SUBASTA
// 2 - Subata vendida	
// 3 - Puja Aceptada
// 4 - Subasta Creada


	function notificacionPuja($idUsuario){
		$conexion = conexion();
		$sql = 'select * from notificaciones where usuario ='.$idUsuario.' and tipo = 3 ';
		if($resultado = $conexion->query($sql)){
			while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
				echo '<p class=notificacionPuja>'.$row['descripcion'].'</p>';
			}
		}
		$conexion->close();		
	}

	function notificacionVenta($idUsuario){
		$conexion = conexion();
		$sql = 'select * from notificaciones where usuario ='.$idUsuario.' and tipo = 2 ';
		if($resultado = $conexion->query($sql)){
			while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
				echo '<p class=notificacionCompra>'.$row['descripcion'].'</p>';
			}
		}
		$conexion->close();
	}

	function notificacionCompra($idUsuario){
		$conexion = conexion();
		$sql = 'select * from notificaciones where usuario ='.$idUsuario.' and tipo = 2 ';
		if($resultado = $conexion->query($sql)){
			while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
				echo '<p class=notificacionCompra>'.$row['descripcion'].'</p>';
			}
		}
		$conexion->close();		
	}

	function notificacionCaducada($idUsuario){
		$conexion = conexion();
		$sql = 'select * from notificaciones where usuario ='.$idUsuario.' and tipo = 0 ';
		if($resultado = $conexion->query($sql)){
			while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
				echo '<p class=notificacionCaducada>'.$row['descripcion'].'</p>';
			}
		}

		$conexion->close();
	}

	// CAMBIAR LAS NOTIFICACIONES A CADA UNA CON SU CLASE
		function subastaCreada($idUsuario){
		$conexion = conexion();
		$sql = 'select id, tipo, descripcion from notificaciones where usuario ='.$idUsuario.' order by id desc';
		if($resultado = $conexion->query($sql)){
			while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
				echo '<p class=notificacionCaducada>'.$row['descripcion'].'</p>';
			}
		}

		$conexion->close();
	}







/////////////////////////////////////////////////////////////////////////////////////////////
/////////                          FUNCIONES PARA PUJAS                              ////////
/////////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * [Pujar funcion que inserta las pujas en la base de datos]
	 * @param  entero $producto ID del producto
	 * @param  entero $puja     cantidad a pujar
	 * @param  entero $usuario  ID del usuario pujador
	 * @return HTML           esctructura HTML
	 */
	function pujar($producto, $puja, $usuario){
		$conexion = conexion();
		$sql = 'insert into pujas(producto,puja,usuario) values('.$producto.','.$puja.','.$usuario.') ';

		if($conexion->query($sql)){				
			
			$sqlProducto = 'select * from productos where id ='.$producto.'; ';

			if($resultado = $conexion->query($sqlProducto)){
				if($row = $resultado->fetch_array(MYSQLI_ASSOC)){
					$descripcion = "¡Genial! Tu puja de <span>".$puja."€</span> para <span>".$row['titulo']."</span> ha sido aceptada.";					
					$sqlNoti = "insert into notificaciones(tipo,descripcion,usuario) values(3, '".$descripcion."',".$usuario.")";
					if($conexion->query($sqlNoti)){
						header('Location: '.URL_LOCAL.'/solo.php?p='.$producto);
					}else{
						echo "3";
					}					
				}else{
					echo "2";
				}
			}else{
				echo "1";
			}
			
		}else{
			echo "ERROR";
		}

		$conexion->close();
	}











?>