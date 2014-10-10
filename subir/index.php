<html>
<head>
<title>index.php</title>
</head>
<body>
<FORM 
ENCTYPE="multipart/form-data" 
ACTION=recibe.php 
METHOD=post> 

<INPUT type="hidden" name="lim_tamano" value="1000000">

Archivo a transferir: 
<INPUT type="file" name="archivo"> 

<INPUT type="submit" name="enviar" value="Aceptar">
</FORM>
</body>
</html>
