<?php 
	include "../conexion.php";
   


	if($_POST['Caso']=="Eliminar"){
       
      
        mysqli_query($con,"delete from productos where id=".$_POST['Id'] );
		
            unlink("../productos/".$_POST['Imagen']);
            echo 'El producto se ha eliminado';
        
	}
	if($_POST['Caso']=="Modificar"){
		mysqli_query($con,"update productos set nombre='".$_POST['Nombre']."' where id=".$_POST['Id']);
        mysqli_query($con,"update productos set cantidad='".$_POST['Cantidad']."' where id=".$_POST['Id']);
		mysqli_query($con,"update productos set descripcion='".$_POST['Descripcion']."' where id=".$_POST['Id']);
		mysqli_query($con,"update productos set precio='".$_POST['Precio']."' where id=".$_POST['Id']);
		echo 'El producto se ha modificado';
	} 

?>