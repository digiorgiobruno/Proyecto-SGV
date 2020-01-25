<?php
session_start();
	include "./conexion.php";
	if(isset($_SESSION['Usuario'])){
        
    $permiso=0;
    if($_SESSION['Usuario']=='admin'){
        $permiso=1;
    }
	}else{
		header("Location: ./index.php?Error=Acceso denegado");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de Administración</title>
	
	<link rel="stylesheet" type="text/css" href="./css/stylepage.css">
	<link rel="stylesheet" type="text/css" href="./css/altaproductos.css">
	<script type="text/javascript" src="./js/jquery-1.10.2.js"></script>
	<script type="text/javascript"  src="./js/scripts.js"></script>
</head>
<body>
	<?php include './header.php' ?>
    <div class="contenido">
	<section>


	<center><h1>Agregar un nuevo producto</h1></center>
	<form action="./admin/altaproducto.php" method = "post" enctype="multipart/form-data">
		<fieldset>
			Nombre<br>
			<input type="text" name="nombre">
		</fieldset>
		<fieldset>
			Descripción<br>
			<input type="text" name="descripcion">
		</fieldset>
		<fieldset>
			Imagen<br>
			<input id="imag" type="file" name="file">
		</fieldset>
		<fieldset>
			Precio<br>
			<input type="text" name="precio">
		</fieldset>
        <fieldset>
			Cantidad<br>
			<input type="text" name="cantidad">
		</fieldset>
		
		    <input type="submit" name="accion" value="Enviar" class="aceptar">
		
	</form>	
	
		
	</section>
        
        </div>
 <?php include './footer.php' ?>
</body>
</html>