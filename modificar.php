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
    <meta charset="utf-8" />
    <title>Carrito de Compras</title>
    <link rel="stylesheet" type="text/css" href="./css/stylepage.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="./admin/modificar.js"></script>

</head>
<body>
	 <?php include './header.php';?>

<div class="contenido">

        <section>
    <div class="modificar-site">
		<h1>MODIFICAR Y/O ELIMINAR</h1>
		<table width="100%">
			<tr>
				<td>Id</td>
				<td>Nombre</td>
				<td>Descripcion</td>
				<td>Precio</td>
				<td>Eliminar</td>
				<td>Modificar</td>
			</tr>
		<?php 
            
			$resultado=mysqli_query($con,"select * from productos");
			while($row=mysqli_fetch_array($resultado)){
				?>
				<tr>
					<td>
						<input type="hidden" value="<?php echo $row['id'];?>"><?php echo $row['id']; ?> 
						<input type="hidden" class="imagen" value="<?php echo $row['imagen']; ?>">
					</td>
					<td><input type="text" class="nombre" value="<?php echo $row['nombre']; ?>"></td>
					<td><input type="text" class="descripcion" value="<?php echo $row['descripcion']; ?>"></td>
					<td><input type="text" class="precio" value="<?php echo $row['precio']; ?>"></td>
					<td><input type="text" class="cantidad" value="<?php echo $row['cantidad']; ?>"></td>
					<td><button class="eliminar" data-id="<?php echo $row['id']; ?>">Eliminar</button></td>
					<td><button class="modificar" data-id="<?php echo $row['id']; ?>">Modificar</button></td>
				</tr>
				
				<?php
			}
		?>
	</table>
	
	</div>
	</section>	
    </div>

	<?php include './footer.php';?>

</body>
</html>