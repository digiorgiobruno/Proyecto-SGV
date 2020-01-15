<?php
include("conexion.php");
//CONSULTA--------------------------------------------------------------------
//select * from sirve para seleccionar una tabla de la base de datos
// order edad  asc significa que los ordena por edad de forma ascendente
$solicitud="SELECT * FROM datos ORDER BY Edad ASC";
$resultado=mysqli_query($conexion,$solicitud);
//VACIADO DE DATOS----------------------------------------------------------
//mientras el fectch array sea diferente de cero imprimimos el valor de la tabla en para ese id .El id se incrementa automaticamente.

/*<?php echo ?>*/
?>


<table border='1'> <tr><td>NOMBRE Y APELLIDO</td><td>EDAD</td><td>CELULAR</td><td colspan='2'>ACCIONES </td></tr>

<?php while($fila = mysqli_fetch_array($resultado)){ ?>
	 <tr>
	 <td><?php echo $fila['Nombre']." ".$fila['Apellido'] ?></td>
	 <td><?php echo $fila['Edad']?></td>
	 <td><?php echo$fila['Celular']?></td>
	 <td><a href="tres.php?id=<?php echo $fila['ID'] ?>"> ELIMINAR </a>  </td>
	 <td><a href="cuatro.php?id=<?php echo $fila['ID'] ?>"> MODIFICAR </a>  </td>
	 </tr>

<?php } ?>

</table>
<a href='index.php'> Volver al Formulario </a>
<?php

?>