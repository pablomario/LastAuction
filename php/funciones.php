<?php
	require_once('conexion.php');	

	/**
	 * FUNCIONES LOGIN Y REGISTRO DE USUARIOS
	 */
	
	function prueba(){
		hola();
	}


	/**
	 * [identificarUsuario description]
	 * Crea uns sesion con los datos si fue exitoso y redirige a la pagina productos
	 * en caso de error regresa a index con un mensaje de error
	 */
	function identificarUsuario(){

	}


	function registroUsuario($usuario, $email, $direccion, $password){
		echo "LLEGO";
		$conexion = conexion();
		$sql = "select * from usuarios where email = '".$email."' ;";
		echo $sql;
		if($conexion->query($sql)){
			if($conexion->affected_rows()==1){				
				return false;
			}else{
				$password = md5($password);
				$sql = "insert into usuarios('usuario','email','direccion','contrasena') values('".$usuario."','".$email."','".$direccion."','".$password."') ";
				echo $sql;
				if($conexion->query($sql)){
					return true;
				}else{
					return false;
				}
			}
		}else{
			return false;
		}
		$conexion->close();
	}






?>