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
				<img id="logotipo" src="img/logomini.png" alt="last auction">
				<ul>
					<a href="subastas.php"><li><i class="fa fa-rocket"></i> Descubrir</li></a>
					<?php
						if(isset($_SESSION['id_usuario'])){
							echo '<a href="interna/perfil.php"><li><i class="fa fa-user "></i> '.$_SESSION['nombre'].'</li></a>';
						}
						else{
							echo '<a href="index.html"><li><i class="fa fa-user "></i> indentifícate</li></a>';
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
					
				</article>
			</aside>

			<section>			
				<?php listarSubastas(); ?> 
			</section>			
		</div>

		<footer>
			<a id="invertido" href="http://127.0.0.1/lastauction/index.html"><img src="img/favicon.png" alt=""></a>
		</footer>
	</body>
</html>