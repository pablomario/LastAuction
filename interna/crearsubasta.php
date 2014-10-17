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
          <li><a href="perfil.php" class="login"><i class="fa fa-user "></i> Mi Perfil</a>
          <li><a href="index.html" class="login"><i class="fa fa-trophy"></i> Mis Subastas</a>
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
      <h1>Vender Producto</h1>
      <article>         
        <form action="nuevoproducto.php" method="POST" ENCTYPE="multipart/form-data">
          Nombre de Producto:<br>
          <input type="text" name="titulo" placeholder="Titulo anuncio" required />
          Descripcion Producto: <br>
          <textarea  name="descripcion" id="descripcion" placeholder="descripcion" required></textarea>
          Precio de Salida: <br>
          <input type="number" step="0.01" name="preciominimo" placeholder="precio minimo" required/>
          Precio compra Directa: <br>
          <input type="number" step="0.01" name="compradirecta" placeholder="Precio Compra directa" />
          Fecha finalizacion: <br>
          <input type="date" name="fechafin" placeholder="dia-mes-año" required/>
          Imagen prodcuto: <br>
          <input type="file" name="archivo">
          <input type="submit" name="enviar" value="Publicar Producto" />
        </form>        
      </article>             
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