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
        <article>
          <?php
            if(isset($_SESSION['id_usuario'])){
              cuadroPerfil($_SESSION['nombre']);
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
          <form action="crearusuario.php" method="POST" class="datos">
            <h2>Registrate Ahora</h2>
            Nombre y Apellidos:<br>
            <input type="text" name="usuario" id="usuario" placeholder="Mario Garcia" required />
            Correo electronico (e-mail): <br>
            <input type="text" name="email" id="email" placeholder="usuario@email.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required/>
            Direccion Postal: <br>
            <input type="text" name="direccion" id="direccion" placeholder="C/Gran Via 5 4B" required/>
            Contraseña: <br>
            <input type="password" name="password1" id="password1" placeholder="contraseña" required/>
            Repita Contraseña:<br>
            <input type="password" name="password2" id="password2" placeholder="Repita contraseña" required/>
            <br>
            <input type="submit" name="enviar" value="Registrarme Ahora" class="boton" />
          </form>
        </article>
      </section>      
    </div>

    <footer>
      <a id="invertido" href="http://127.0.0.1/php/lastauction/"><img src="img/favicon.png" alt=""></a>
    </footer>
  </body>
</html>