<?php
session_start();
if(isset($_SESSION['Password'])&&isset($_SESSION['Usuario'])){
    if(isset($_SESSION['carrito'])){
        
        include("../conexion.php");//agregamos archivo de conexion
        //Guardamos las variables de sesion en arrays
        $arreglo=$_SESSION['carrito'];
        //$datos=$_SESSION['Datos'];// no se por que no funca
        $usuario=$_SESSION['Usuario'];
        //inicializo variable
        $numeroventa=0;
        //ordeno todo de la tabla de pedidos en orden descendente de codigo(hago la para esto query)
        $solicitud="select * from pedidos order by numeroventa DESC limit 1";//limi1 uno hacer referencia al ultimo elemento
        $query=mysqli_query($con,$solicitud)or die(mysqli_error());
        
        //me posiciono en el ultimo elemento
        while($f=mysqli_fetch_array($query)){
					$numeroventa=$f['numeroventa'];	
		}
        //si es la primer venta la cambio por el numero 1
        if($numeroventa==0){
			$numeroventa=1;
		}else{
        //si no es la primer venta aumento el valor de su indice    
			$numeroventa=$numeroventa+1;
		}
        //obtenemos hora actual
        date_default_timezone_set('America/Argentina/Mendoza');
        $fecha=date("Y-m-d H:i:s");
        //guardamos en la base de datos de pedidos
		for($i=0; $i<count($arreglo);$i++){
       
      
            
            $solicitud="INSERT INTO pedidos (numeroventa,idproducto,nombreproducto, nombreusuario,imagen,fecha,cantidad, subtotal,preciounitario)VALUES(
				'".$numeroventa."','".$arreglo[$i]['Id']."','".$arreglo[$i]['Nombre']."',	'$usuario','".$arreglo[$i]['Imagen']."','$fecha','".$arreglo[$i]['Cantidad']."','".($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'])."','".$arreglo[$i]['Precio']."')";
            
			$re=mysqli_query($con,$solicitud);
            
            
            

            
		}
		unset($_SESSION['carrito']);
		header("Location: ../menuuser.php");
        
        
        
        
        
        
        
}else{
        
        ?> <p>No tiene elementos en el carrito <a href="../menuuser.php">Volver al inicio</a></p><?php
    } 
    
}else{?> <p>No has iniciado sesion <a href="../index.php">Volver al inicio</a></p> <?php } ?>