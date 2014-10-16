<?php
  session_start();

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

    
    <section class="productos">
      <div class="centrado">
        


      </div>      
    </section>  

    <footer>
      <div class="centrado">
        <article>
          <img src="../img/favicon.png">
        </article>        
      </div>
    </footer>

  </body>
</html>