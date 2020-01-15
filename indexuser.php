<!---Archivo incluido en menuuser.php-------------------------------HTML------------------------------------------------------>
<?php
session_start();
if(isset($_SESSION['Password'])&&isset($_SESSION['Usuario'])){
    $permiso=0;
    if($_SESSION['Usuario']=='admin'){
        $permiso=1;
    }
?>

 <!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
    <link rel="stylesheet" type="text/css" href="./css/navstyle.css">
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	

	
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>
	
</head>
<body>

<div class="fondo"> </div>

<!--		<a href="./carritodecompras.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
        </a>-->
<div class="contenido">
	<header>
	<h1>Wellcome to the jungle</h1>
        <div class="navsup"> <p> Bienvenido <b><?php echo $_SESSION['Nombre']; ?> </b>¿que deseas? </p></div>
		<nav class="navegacion">
			<ul class="menu">
				<li><a href="./carritodecompras.php">Ver carrito</a></li>
				<li><a href="./menuuser.php">Ver catálogo</a></li>

				                <?php if($permiso){?> 
				<li><a href="admin.php">Administrar pedidos</a></li> 
                <li><a href="admin/agregarproducto.php">Agregar productos al stock</a></li>                  
                                 <?php }else{ ?> 
                                  
                <li><a href="#">Servicios</a>
					<ul class="submenu">
						<li><a href="#">Servicio #1</a></li>
						<li><a href="#">Servicio #2</a></li>
						<li><a href="#">Servicio #3</a></li>
						
					</ul>
					
				</li>                  
                <li><a href="#">Contacto</a></li> 
                                 
                                 
                <?php }?>
                                  
                                  
                                  
				
				<a class="button close" href="menuuser.php?op=1">Cerrar Sesion</a>
			</ul>
		</nav>
	</header>

	
	<section>
		
	<?php
    //-----------------------------------------
    //Limito la busqueda 
    $TAMANO_PAGINA = 2; //cantidad de productos que muestro por pagina

    //examino la página a mostrar y el inicio del registro a mostrar 
    
    
    
    if (isset($_GET["pagina"])){
                $pagina = $_GET["pagina"]; 
                $inicio = ($pagina - 1) * $TAMANO_PAGINA;//si la variable get esta seteada veo donde desde que registro empiezo a mostrar 
            }else{ 
                $inicio = 0;//si no esta seteada esta variable significa que estoy en la primer pagina y debo mostrar los registros desde el comienzo de la tabla  
   	            $pagina=1; 
             } 

   //------------------------------------- 
		include 'conexion.php';
        $consulta="select * from productos";
        $query=mysqli_query($con, $consulta);
    //para saber el numero total de registros hago
    $num_total_registros = mysqli_num_rows($query); 
    //calculo el total de páginas ,ceil redonde hacia arriba la division
    //ejemplo si los registros son 10 y quiero mostrar 4 por pagina la division dara 3 ,en lugar de 2,5.
    
    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 
    
    //construyo la sentencia SQL 
    $consulta = "select * from productos limit " . $inicio . "," . $TAMANO_PAGINA;
    
    $query=mysqli_query($con, $consulta);
    
    
		while ($f=mysqli_fetch_array($query)) {
		?>
			<div class="producto">
			<center>
				<img src="./productos/<?php echo $f['imagen'];?>"><br>
				<span><?php echo $f['nombre'];?></span><br>
				<a href="./detalles.php?id=<?php  echo $f['id'];?>">ver</a>
			</center>
		</div>
	<?php
             }
		//cerramos el conjunto de resultado y la conexión con la base de datos
        /*mysqli_free_result($rs); 
        mysqli_close($conn);*/
        //muestro los distintos índices de las páginas, si es que hay varias páginas 
        if ($total_paginas > 1){ 
   	        for ($i=1;$i<=$total_paginas;$i++){ 
      	     if ($pagina == $i) 
         	//si muestro el índice de la página actual, no coloco enlace 
         	  echo $pagina . " "; 
      	else 
         	//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 
         	echo "<a href='indexuser.php?pagina=". $i ."'>" . $i . "</a> "; 
   	} 
}
        
       
	?>
		
		

		
	</section>
</div>	

</body>
</html>  

<!--//--------------------------------FIN HTML------------------------------------------------------>
<?php    
}else{?> <p>No has iniciado sesion <a href="index.php">Volver al inicio</a></p> <?php  }
?>
