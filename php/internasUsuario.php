<?php
	require_once('conexion.php');


	function crearSubasta($usuario, $titulo, $descripcion, $preciominimo, $fechafin){
		$conexion = conexion();
		$fecha =  date("Y-m-d h:i");
  		$fechainicial=strtotime($fecha);
  		$fechafin = $fechainicial + ($fechafin*3600);
		$sql = "insert into productos(titulo, descripcion, preciominimo, fechainicial, fechafin, estado, usuario) values('".$titulo."','".$descripcion."','".$preciominimo."','".$fechainicial."','".$fechafin."','1','".$usuario."')";


		$conexion->close();
	}

	function crearSubastaCDirecta($usuario, $titulo, $descripcion, $preciominimo, $compradirecta, $fechafin){

	}

	function agregarImagenes(){

	}



	function bajaSubasta($usuario, $producto){

	}




?>