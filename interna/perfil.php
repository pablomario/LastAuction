<?php
  session_start();
  if(!isset($_SESSION['id_usuario'])){
      header('Location: ../productos.php');
  }
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/favicon.png" type="../image/x-icon">
    <title>last auction</title>
    <link rel="stylesheet" type="text/css" href="../estilo/estilo.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> 
  
  </head>
  <body>

    <nav>
      <div class="centrado">
        <a href="index.html"><img src="../img/logo.png"></a>

        <ul>
          <li><a href="../subastas.php" class="contacto"><i class="fa fa-rocket"></i> Descubrir</a></li>
          <li><a href="index.html" class="login"><i class="fa fa-trophy"></i> Mis Subastas</a></li>
          <li><a href="registro.html" class="registro"><i class="fa fa-bullhorn"></i> Mis Pujas</a></li> 

          <li>
            <form action="buscar.php" method="get" accept-charset="utf-8">
              <input type="text" name="busqueda" value="" placeholder="buscar por palabra clave">
              <input type="submit" name="buscar" value="BUSCAR">          
            </form>
          </li>

        </ul>
           
        
    </div>      
  </nav>
   
   <div class="centrado">
  <section>
      
        <h1>Mi Perfil</h1>
        <article>         
         
        <?php
          echo "<h3>Nombre: ".$_SESSION['nombre']."</h3>";
          echo "<h3>Direccion: ".$_SESSION['direccion']."</h3>";
          echo "<h3>Email: ".$_SESSION['email']."</h3>";                         
        ?>        
        <a href="modificardatos.php">Cambiar mis datos</a>
        </article>  

        <h1>Vender Producto</h1>
        <a href="crearsubasta.php">Vender Producto</a>
           
    </section> 
    </div> 
    <footer>
      <div class="centrado">
        <article>
          <img src="../img/favicon.png">
        </article>        
      </div>
    </footer>

  </body>
</html>