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
				<?php
					if(isset($_SESSION['id_usuario'])) menuLogeado();					
					else menuNoLogeado();
				?>				
			</div>
		</nav>
		<header><!--NO BORRAR ESTA ETIQUETA --></header>

		<div class="centrado">
			<!-- ASIDE -->
			<?php include('../aside.php');	?>
			
			<section>
				<article class="aviso">
					<h2>Recuerda completar tu perfil:</h2>
					<a href="editarperfil.php" class="boton">Completar Ahora</a>					
				</article>
				<article>
					<h2>Estas son todas tus Subastas:</h2>
					<?php
						misSubastas($_SESSION['id_usuario']);
					?>
				</article>

			</section>			
		</div>

	<!-- FOOTER -->
	<?php include('../footer.php'); ?>	
	</body>
</html>