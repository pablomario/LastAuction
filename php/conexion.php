<?php

	/**
	 * [conexion description]
	 * @return conexion retorna una conexion
	 */
	function conexion(){		
		$conexion = new mysqli("127.0.0.1","root","","lastauction");
		if(mysqli_connect_errno()){
			die("Error: " .mysqli_connect_errno());
		}
		return $conexion;
	}

	function hola(){
		echo "Hola";
	}





?>