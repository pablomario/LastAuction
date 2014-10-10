<?php

// PRIMERA PARTE: Comprobamos valores recibidos
// Vemos c�mo viene de informado un fichero
foreach ($_FILES['archivo'] as $indice=>$valor){
	print $indice."--->".$valor."<br>";
}



// SEGUNDA PARTE: Lo hacemos "comme il faut"
// Solo permitimos ficheros con extensi�n jpg o gif
if(!($_FILES['archivo']['type']=="image/jpeg" OR
$_FILES['archivo']['type']=="image/gif")){
	echo "El formato ".$_FILES['archivo']['type']." no est� permitido";
	exit();
}else{
	if($_FILES['archivo']['type']=="image/jpeg"){
		$extension=".jpg";
	}else{
		$extension=".gif";
	}
}

// Cambiamos el nombre que nos de el cliente a uno que nos gusta
$nuevo_nombre="foto_recibida".$extension;


// Solo permitimos ficheros "normales" de tama�o
if($_FILES['archivo']['size']>$_POST['lim_tamano'] OR 
	$_FILES['archivo']['size']==0){
	echo "El tama�o ".$_FILES['archivo']['size']." es raro";
	exit();
}
// Solo permitimos ficheros con nombre
if ($_FILES['archivo']['tmp_name'] != "none" ){
	// Pasamos el archivo que est� en el directorio temporal
	// a donde nosotros queramos (por defecto .)
	if (copy($_FILES['archivo']['tmp_name'], $nuevo_nombre)) {
		echo "<h2>Se ha transferido el archivo</h2>"; 
	}else{
		echo "<h2>Ups� Houston, tenemos un problema</h2>";  
	}
}

?>