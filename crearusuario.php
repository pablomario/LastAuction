<?php
	require_once('php/funciones.php');
	$usuario = $_POST['usuario'];
	$email = $_POST['email'];
	$direccion = $_POST['direccion'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];

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
				<article>
				<?php
					if( $password1 == $password2 ){
						if( registroUsuario($usuario, $email, $direccion, $password1, $password2) ){
							echo "<br><br><center><img src=img/bien.png><center>";
							echo "<p>Fantastico! Ya puedes iniciar sesion</p>";									
						}else{
							echo "<br><br><center><img src=img/error.png><center>";
							echo "<p>Ese email ya ha sido registrado</p>";		
						}
					}else{
						echo "<br><br><center><img src=img/error.png><center>";
						echo "<p>Las contraseñas no coinciden</p>";	
					}
				?>					
				</article>
				
			</section>			
		</div>

		<!-- FOOTER -->
	<?php include('footer.php'); ?>	
	</body>
</html>