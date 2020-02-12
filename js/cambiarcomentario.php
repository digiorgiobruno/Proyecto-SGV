<?php
//inicio sesión
session_start();
	   
        $cant=6;//cantidad de comentarios en la base de datos
		include '../conexion.php';
        $i=rand(1, $cant);
        $consulta="select * from cometarios where id=".$i;
        $query=mysqli_query($con, $consulta);
        $f=mysqli_fetch_array($query);
        

        echo $f['contenido'];
        
        
      

?>