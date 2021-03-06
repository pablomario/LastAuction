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
				<h2>Crear Subasta</h2>  
				<article>   					    
					<form action="nuevoproducto.php" method="POST" ENCTYPE="multipart/form-data" class="datos">						
						Nombre de Producto:<br>
						<input type="text" name="titulo" placeholder="Titulo anuncio" required /> <br>
						Descripcion Producto: <br>
						<textarea  name="descripcion" id="descripcion" placeholder="descripcion" required></textarea> <br>
						Categoria: <br>
						<select name="categoria" required>
							<option value="6">Mascotas</option>
							<option value="1">Casa y Jardin</option>
							<option value="2">Joyeria y Relojes</option>
							<option value="3">Moda y Accesorios</option>
							<option value="4">Deporte y Salud</option> 
							<option value="5">Electronica y Tecnologia</option>            
						</select><br>  
						Precio de Salida: <br>
						<input type="number" name="preciominimo" placeholder="precio minimo" required/> <br>
						<!--Precio compra Directa: <br>
						<input type="number" step="0.01" name="compradirecta" placeholder="Precio Compra directa" /> -->
						Fecha finalizacion: <br>
						<select name="fechafin" required>
							<option value="15">15 dias</option>
							<option value="30">30 dias</option>
							<option value="60">60 dias</option>           
						</select><br>     
						Imagen prodcuto: *.jpg *.gif *.png<br>
						<input type="file" name="archivo" > <br>
						<input class="boton" type="submit" name="enviar" value="Publicar Producto" />
					</form>        
				</article> 
			</section>			
		</div>

	<!-- FOOTER -->
	<?php include('../footer.php'); ?>	
	</body>
</html>