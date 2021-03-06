<?php
	session_start();
	require_once('php/funciones.php');
	limpieza();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>last auction</title>
		<link rel="icon" href="img/favicon.png" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/aside.css">
		<link rel="stylesheet" type="text/css" href="css/estiloProductos.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> 
		
	</head>
	<body>
		
		<nav>
			<div class="centrado">				
				<?php
					if(isset($_SESSION['id_usuario'])) menuLogeado();					
					else menuNoLogeado();
				?>				
			</div>
		</nav>
		<header><!--NO BORRAR ESTA ETIQUETA --></header>

		<div class="centrado">
			<!-- ASIDE -->
			<?php include('aside.php');	?>

			<section>	
				<h2>Subastas Actuales</h2>		
				<?php 
					if(isset($_SESSION['id_usuario'])){
						listarSubastasU( $_SESSION['id_usuario'] );
					}else{	
						listarSubastas();
					}  
				?> 
			</section>			
		</div>

		<!-- FOOTER -->
	<?php include('footer.php'); ?>	
	</body>
</html>