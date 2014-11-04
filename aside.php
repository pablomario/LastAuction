<aside>				
	<?php
		if(isset($_SESSION['id_usuario'])){
			cuadroPerfil($_SESSION['nombre']);
		}else{		 
			echo '<article class=perfil>';      
			echo '<form action="login.php" method="POST">';
				echo '<input type="text" name="email" id="email" placeholder="email@email.com" />';
				echo '<input type="password" name="password" id="password" placeholder="contraseña" />';
				echo '<input type="submit" name="enviar" value="Iniciar Sesion" class="boton" />';
				echo '<a href="'.URL_LOCAL.'registro.php">¿Todavia no tienes cuenta?</a>';
			echo '</form>';
			echo '</article>';
		}
		buscador();
		categorias();
	?>
</aside>