<?php
	session_start();
	require_once('php/funciones.php');
	$idUsuario = $_GET['u'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>last auction</title>
		<link rel="icon" href="img/favicon.png" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/aside.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> 
		<!-- SLIDER -->
		<link rel="stylesheet" href="css/bjqs.css">      
   		<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    	<script src="js/bjqs-1.3.js"></script>
    	<!-- FIN SLIDER -->
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
				<article class="perfilPublico">
					<h2>Perfil Publico</h2>
						<?php perfilPublico($idUsuario) ?>
						<div class="limpio"></div>
						
				</article>		
				<article class="ultimosProductos">
					<h2>Mas de este Usuario</h2>
					<?php masDelUsuario($idUsuario); ?>
				</article>		
			</section>			
		</div>

		<footer>
			<a id="invertido" href="http://127.0.0.1/php/lastauction/"><img src="img/favicon.png" alt=""></a>
		</footer>
	</body>
</html>