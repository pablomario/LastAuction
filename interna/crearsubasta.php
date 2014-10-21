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
			<aside>
				<?php
					cuadroPerfil($_SESSION['nombre']);
				?>
			</aside>

			<section>
				<article>   
					<h2>Crear Subasta</h2>      
					<form action="nuevoproducto.php" method="POST" ENCTYPE="multipart/form-data">
						Nombre de Producto:<br>
						<input type="text" name="titulo" placeholder="Titulo anuncio" required />
						Descripcion Producto: <br>
						<textarea  name="descripcion" id="descripcion" placeholder="descripcion" required></textarea>
						Precio de Salida: <br>
						<input type="number" step="0.01" name="preciominimo" placeholder="precio minimo" required/>
						<!--Precio compra Directa: <br>
						<input type="number" step="0.01" name="compradirecta" placeholder="Precio Compra directa" /> -->
						Fecha finalizacion: <br>
						<select name="fechafin" required>
							<option value="15">15 dias</option>
							<option value="30">30 dias</option>
							<option value="60">60 dias</option>           
						</select><br>     
						Imagen prodcuto: <br>
						<input type="file" name="archivo" >
						<input class="boton" type="submit" name="enviar" value="Publicar Producto" />
					</form>        
				</article> 
			</section>			
		</div>

		<footer>
			<a id="invertido" href="http://127.0.0.1/php/lastauction/"><img src="../img/favicon.png" alt=""></a>
		</footer>
	</body>
</html>