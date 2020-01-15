<?php
include("conexion.php");
//obtenemos y guardamos en una variable el dato id que recibimos por el metodo get
$id = $_GET['id'];

$solicitud = "SELECT * FROM datos WHERE ID=$id";
$resultado = mysqli_query($conexion, $solicitud);
?>
<form method="POST"	action="cinco.php" >
	  
<?php $fila = mysqli_fetch_array($resultado); ?>
		
			 Nombre:<input type="text" name="nombre" value="<?php echo $fila['Nombre'] ?>"><br>
			 Apellido:<input type="text" name="apellido" value="<?php echo $fila['Apellido'] ?>" ><br>
			 Edad:<input type="text" name="edad" value="<?php echo $fila['Edad'] ?>"><br>
			 Celular:<input type="text" name="celular" value="<?php echo $fila['Celular'] ?>"><br>
			 ID:<?php echo $id ?> <input type="hidden" name="id"   value="<?php echo $id ?>"><br>

			

	<input type="submit" name="CREAR">
</form> 

<?php




?>