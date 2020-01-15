<?php
session_start();
if(isset($_SESSION['Password'])&&isset($_SESSION['Usuario'])){
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	   <link rel="stylesheet" type="text/css" href="./css/navstyle.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<header>
		<h1>Descripción</h1>
		<a href="./carritodecompras.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>
	</header>
	<section>
		
	<?php
		include 'conexion.php';
        $solicitud="select * from productos where id=".$_GET['id'];
        $query=mysqli_query($con,$solicitud)or die(mysqli_error());
		while ($f=mysqli_fetch_array($query)) {
		?>
			<div class="producto">
			<center>
				<img src="./productos/<?php echo $f['imagen'];?>"><br>
				<span><?php echo $f['nombre'];?></span><br>
				<span>Precio: <?php echo $f['precio'].' $'; ?></span><br>
                <a href="./carritodecompras.php?id=<?php  echo $f['id'];?>">Añadir al carrito de compras</a>
			</center>
		</div>
		<div class="detalle">
            
		    <span>Descripción: <?php echo $f['descripcion']; ?> <br></span>
		    <span>Cantidad: <?php echo $f['cantidad']." unidades disponibles";?></span><br>
		</div>
	<?php
		}
	?>
		
		

		
	</section>
</body>
</html>



<?php    
}else{?> <p>No has iniciado sesion <a href="index.php">Volver al inicio</a></p> <?php  }
?>