<?php
session_start();
	include "../conexion.php";
	if(isset($_SESSION['Usuario'])){

	}else{
		header("Location: ./index.php?Error=Acceso denegado");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="../css/altaproductos.css">
	<link rel="stylesheet" type="text/css" href="../css/navstyle.css">
	<script type="text/javascript" src="./js/jquery-1.10.2.js"></script>
	<script type="text/javascript"  src="./js/scripts.js"></script>
</head>
<body>
	<header>
	<h1>Wellcome to the jungle</h1>
        <div class="navsup"> <p> Bienvenido <b><?php echo $_SESSION['Nombre']; ?> </b>¿que deseas? </p></div>
		<nav class="navegacion">
			<ul class="menu">
				<li><a href="../carritodecompras.php">Ver carrito</a></li>
				<li><a href="../menuuser.php">Ver catálogo</a></li>
                <li><a href="../admin.php">Administrar pedidos</a></li> 
            <a class="button close" href="../menuuser.php?op=1">Cerrar Sesion</a>
			</ul>
		</nav>
	</header>
	<section>


	<center><h1>Agregar un nuevo producto</h1></center>
	<form action="altaproducto.php" method = "post" enctype="multipart/form-data">
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
</body>
</html>