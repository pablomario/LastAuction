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
		<link rel="stylesheet" type="text/css" href="css/estiloProductos.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> 
		<script src="js/funciones.js" type="text/javascript"></script>
		<?php 
			if(isset($_SESSION['id_usuario'])){
				echo "<script>prueba_notificacion('".$_SESSION['nombre']."')</script>";
			}
		?>
	</head>
	<body>
		
		<nav>
			<div class="centrado">
				<a href="subastas.php"><img id="logotipo" src="img/logomini.png" alt="last auction"></a>
				<ul>
					<a href="subastas.php"><li><i class="fa fa-legal"></i> Subastas</li></a>
					<?php

						if(isset($_SESSION['id_usuario'])){
							echo '<a href="crearsubasta.php"><li><i class="fa fa-rocket"></i> Nueva Subasta</li></a>';
							echo '<a href="mispujas.php"><li><i class="fa fa-rocket"></i> Mis Pujas</li></a>';
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
				<?php
					if(isset($_SESSION['id_usuario'])){
						echo '<article class="perfil">';					
							echo '<a href="interna/perfil.php"><img src="usuarios/yo.jpg"></a>';
							echo '<p>'.$_SESSION['nombre'].'</p>';
						echo '</article>';	
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
				<h2>Puja</h2>		
				<?php 
					listarProducto($idProducto); 
				?>

			
			</section>			
		</div>

		<footer>
			<a id="invertido" href="http://127.0.0.1/php/lastauction/"><img src="img/favicon.png" alt=""></a>
		</footer>
	</body>
</html>