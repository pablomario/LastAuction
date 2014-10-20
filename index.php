<?php
	session_start();
	require_once('php/funciones.php');
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
				<a href="index.php"><img id="logotipo" src="img/logomini.png" alt="last auction"></a>
				<ul>	
					<a href="subastas.php"><li><i class="fa fa-rocket"></i> Descubrir</li></a>
					<?php
						if(isset($_SESSION['id_usuario'])){
							echo '<a href="interna/perfil.php"><li><i class="fa fa-user "></i> '.$_SESSION['nombre'].'</li></a>';
							echo '<a href="interna/salir.php" class="salir" ><li><i class="fa fa-close "></i> salir</li></a>';
						}
						else{							
							echo '<a href="registro.html"><li><i class="fa fa-users "></i> registro</li></a>';
						}
					?>	
				</ul>
			</div>
		</nav>
		<header><!--NO BORRAR ESTA ETIQUETA --></header>

		<div class="centrado">
			<aside>
				<article>
					<?php
						if(isset($_SESSION['id_usuario'])){
							// DATOS DE USUARIO
						}else{							
							echo '<h2>Identifícate</h2>';        
							echo '<form action="login.php" method="POST">';
								echo '<input type="text" name="email" id="email" placeholder="email@email.com" />';
								echo '<input type="password" name="password" id="password" placeholder="contraseña" />';
								echo '<input type="submit" name="enviar" value="Iniciar Sesion" />';
								echo '<a href="">¿Todavia no tienes cuenta?</a>';
							echo '</form>';
						}
					?>
				</article>

				<article>
					<h2>Categorías</h2>					
					<a href=""><div class="menuVertical casa">Casa y Jardin</div></a><br>
					<a href=""><div class="menuVertical joyeria">Joyeria y Relojes</div></a><br>
					<a href=""><div class="menuVertical moda">Moda y Accesorios</div></a><br>
					<a href=""><div class="menuVertical deporte">Deporte y Salud</div></a><br>
					<a href=""><div class="menuVertical electronica">Electronica y Tecnologia</div></a><br>				 	
				</article>

			</aside>

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
			</section>			
		</div>

		<footer>
			<a id="invertido" href="http://127.0.0.1/php/lastauction/"><img src="img/favicon.png" alt=""></a>
		</footer>
	</body>
</html>