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
		<header><!-- NO BORRAR ESTA ETIQUETA --></header>

		<div class="centrado">
			<!-- ASIDE -->
			<?php include('aside.php');	?>

			<section>
				<article>
					<div id="container">    
						<div id="banner-slide">       
							<ul class="bjqs">
								<li><a href=""><img src="img/deporte.png"></a></li>
								<li><a href=""><img src="img/casa.png"></a></li>
								<li><a href=""><img src="img/moda.png"></a></li>
								<li><a href=""><img src="img/joyeria.png"></a></li>
								<li><a href=""><img src="img/electronica.png"></a></li>						    
							</ul>
						</div>   
						<script class="secret-source">
							jQuery(document).ready(function($) {
								$('#banner-slide').bjqs({
									animtype      : 'slide',
									height        : 420,
									width         : 620,
									responsive    : true,
									randomstart   : true
								});
							});
						</script>
					</div>
				</article>
				<article class="ultimosProductos">
					<h2>Ultimas Subastas Creadas</h2>
					<?php ultimosProductos(); ?>
				</article>
			</section>			
		</div>

	<!-- FOOTER -->
	<?php include('footer.php'); ?>	
	</body>
</html>