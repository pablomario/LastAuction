<?php
	
	/**
	 * [conexion description]
	 * @return conexion retorna una conexion
	 */
	function conexion(){		
		$conexion = new mysqli("127.0.0.1","root","root","lastauction");
		if(mysqli_connect_errno()){
			die("Error: " .mysqli_connect_errno());
		}
		return $conexion;
	}

	/**
	 * FUNCIONES LOGIN Y REGISTRO DE USUARIOS
	 */

	/**
	 * [identificarUsuario description]
	 * Crea uns sesion con los datos si fue exitoso y redirige a la pagina productos
	 * en caso de error regresa a index con un mensaje de error
	 */
	function identificarUsuario(){

	}

	/**
	 * [registroUsuario description]
	 * @return boolean retorna verdadeo si se ha registrado falso si fallo
	 */
	function registroUsuario(){

	}






?>