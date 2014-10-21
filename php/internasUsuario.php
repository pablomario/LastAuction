<?php
	require_once('conexion.php');


/////////////////////////////////////////////////////////////////////////////////////////////
/////////                      FUNCIONES CREACION SUBASTA                            ////////
/////////////////////////////////////////////////////////////////////////////////////////////

	function crearSubasta($usuario, $titulo, $descripcion, $preciominimo, $fechafin){
		$conexion = conexion();
		$fecha =  date("Y-m-d h:i");
  		$fechainicial=strtotime($fecha);
  		$fechafin = $fechainicial + ($fechafin*3600);
		$sql = "insert into productos(titulo, descripcion, preciominimo, fechainicial, fechafin, estado, usuario) 
		values('".$titulo."','".$descripcion."','".$preciominimo."','".$fechainicial."','".$fechafin."','1','".$usuario."')";
		if($conexion->query($sql)){
			if($resultado = $conexion->query("select LAST_INSERT_ID()")){
				if($row=$resultado->fetch_array()){
					$idProducto = $row[0];
					echo "Insertado!";
					return $idProducto;
				}
			}			
		}else{
			echo "ERROR!";
			return 0;
		}
		$conexion->close();
	}

	function crearSubastaCDirecta($usuario, $titulo, $descripcion, $preciominimo, $compradirecta, $fechafin){

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


	function agregarImagenes(){

	}


	function bajaSubasta($usuario, $producto){

	}




?>