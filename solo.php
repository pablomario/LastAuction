<?php
	session_start();
	require_once('php/funciones.php');
	$idProducto = $_GET['p'];	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>last auction</title>
		<link rel="icon" href="img/favicon.png" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/aside.css">
		<link rel="stylesheet" type="text/css" href="css/puja.css">
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
			<aside>				
				<?php
					if(isset($_SESSION['id_usuario'])){
						cuadroPerfil($_SESSION['nombre']);
					}else{	
						echo '<article>';						
						echo '<h2>Identifícate</h2>';        
						echo '<form action="login.php" method="POST">';
							echo '<input type="text" name="email" id="email" placeholder="email@email.com" />';
							echo '<input type="password" name="password" id="password" placeholder="contraseña" />';
							echo '<input type="submit" name="enviar" value="Iniciar Sesion" />';
							echo '<a href="">¿Todavia no tienes cuenta?</a>';
						echo '</form>';
						echo '</article>';
					}
				?>

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
				<h2>Pujar Ahora</h2>		
				<?php 
					if(isset($_SESSION['id_usuario'])){
						listarProducto($idProducto, true); 
					}else{
						listarProducto($idProducto,false); 
					}					
				?>			
			</section>			
		</div>

		<footer>
			<a id="invertido" href="http://127.0.0.1/php/lastauction/"><img src="img/favicon.png" alt=""></a>
		</footer>
	</body>
</html>