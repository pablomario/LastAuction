<?php
  session_start();
  require_once('php/funciones.php');
 if(isset($_SESSION['id_usuario'])){   

 }


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/favicon.png" type="image/x-icon">
    <title>last auction</title>
    <link rel="stylesheet" type="text/css" href="estilo/estilo.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> 

    <link rel="stylesheet" href="estilo/bjqs.css">      
    <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="js/bjqs-1.3.js"></script>
    <script src="js/funciones.js"></script>
    
    <?php 
      if(isset($_SESSION['id_usuario'])){
        echo "<script>prueba_notificacion('".$_SESSION['nombre']."')</script>";
      }
    ?>

  </head>
  <body>

    <nav>
      <div class="centrado">
        <a href="index.html"><img src="img/logo.png"></a>
       
         <ul>
             <li><a href="subastas.php" class="contacto"><i class="fa fa-rocket"></i> Descubrir</a></li>
         <?php
            if(isset($_SESSION['id_usuario'])){
              echo '<li><a href="interna/perfil.php" class="login"><i class="fa fa-user "></i> mi Perfil</a>';
            }
            else{ 

              echo '<li><a href="index.html" class="login"><i class="fa fa-user "></i> indentifícate</a>';
              echo '<li><a href="registro.html" class="registro"><i class="fa fa-users "></i> registro</a></li>';
            }
         ?>          
             
        <li>
          <form action="buscar.php" method="get" accept-charset="utf-8">
            <input type="text" name="busqueda" value="" placeholder="BUSQUEDA POR PALABRA...">                
          </form>
          </li>       
        </ul>
        
      </div>      
    </nav>

   <div class="centrado">  
    <aside>
      <article>
    <?php
      if(!isset($_SESSION['id_usuario'])){
        echo '<h2><i class="fa fa-user "></i> Identifícate</h2>';        
        echo '<form action="login.php" method="POST">';
        echo '<input type="text" name="email" id="email" placeholder="email@email.com" />';
        echo '<input type="password" name="password" id="password" placeholder="contraseña" />';
        echo '<input type="submit" name="enviar" value="Iniciar Sesion" />';
        echo ' <a href="">¿Todavia no tienes cuenta?</a>';
        echo '</form>';
      }      
    ?>    
      </article>
      <article>
         <h2><i class="fa fa-shopping-cart"></i> Categorías</h2>
        <ul>
           <a href=""><li class="casa">Casa y Jardin</li></a>
           <a href=""><li class="joyeria">Joyeria y Relojes</li></a>               
           <a href=""><li class="moda">Moda y Accesorios</li></a>
           <a href=""><li class="deporte">Deporte y Salud</li></a>   
           <a href=""><li class="electronica">Electronica y Tecnologia</li></a>         
        </ul> 
      </article>
          
    </aside>




    
    <section class="productos">            
          <?php listarSubastas() ?>        
    </section>  




    </div>   
    <footer>
      <div class="centrado">
        <article>
          <img src="img/favicon.png">
        </article>        
      </div>
    </footer>

  </body>
</html>