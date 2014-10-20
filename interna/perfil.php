<?php
  session_start();
  require_once('../php/funciones.php');
  if(!isset($_SESSION['id_usuario'])){
      header('Location: ../subastas.php');
  }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>last auction</title>
		<link rel="icon" href="../img/favicon.png" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="../css/estilo.css">
		<link rel="stylesheet" type="text/css" href="../css/aside.css">
		<link rel="stylesheet" type="text/css" href="../css/interna.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	</head>
	<body>
		
		<nav>
			<div class="centrado">
				<a href="../index.php"><img id="logotipo" src="../img/logomini.png" alt="last auction"></a>
				<ul>	
					<a href="crearsubasta.php"><li><i class="fa fa-rocket"></i> Nueva Subasta</li></a>
					<a href="mispujas.php"><li><i class="fa fa-rocket"></i> Mis Pujas</li></a>
					<a href="../subastas.php"><li><i class="fa fa-rocket"></i> Descubrir</li></a>
					<a href="salir.php" class="salir" ><li><i class="fa fa-close "></i> salir</li></a>						
				</ul>
			</div>
		</nav>
		<header><!--NO BORRAR ESTA ETIQUETA --></header>

		<div class="centrado">
			<aside>
				<article class="perfil">					
					<img src="../usuarios/default.jpg" height="140px" width="140px">
					<?php
			          echo "<p>".$_SESSION['nombre']."</p>";			                                  
			        ?>
			        <a href="editarperfil.php" class="boton">Editar Perfil</a>
				</article>
			</aside>

			<section>
				<article class="aviso">
					<h2>Todavia no has subastado nada:</h2>
					<a href="crearsubasta.php" class="boton">Crear subasta Ahora</a>					
				</article>
			</section>			
		</div>

		<footer>
			<a id="invertido" href="http://127.0.0.1/php/lastauction/"><img src="../img/favicon.png" alt=""></a>
		</footer>
	</body>
</html>