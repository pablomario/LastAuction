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
		$sql = "select count(*) from usuarios where email = '".$email."' and contrasena = '".$password."';";
		
		if($resultado = $conexion->query($sql)){				
			if($row = $resultado->fetch_array()){
				if($row[0]==1){					
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






?>