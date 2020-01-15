<?php
	include "./conexion.php";
session_start();
if(isset($_SESSION['Password'])&&isset($_SESSION['Usuario'])&&($_SESSION['Usuario']=="admin")){
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
   <link rel="stylesheet" type="text/css" href="./css/tablas.css">
    <link rel="stylesheet" type="text/css" href="./css/navstyle.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<header>
	<h1>Wellcome to the jungle</h1>
        <div class="navsup"> <p> Bienvenido <b><?php echo $_SESSION['Nombre']; ?> </b>¿que deseas? </p></div>
		<nav class="navegacion">
			<ul class="menu">
				<li><a href="./carritodecompras.php">Ver carrito</a></li>
				<li><a href="./menuuser.php">Ver catálogo</a></li>
                <li><a href="admin/agregarproducto.php">Agregar productos al stock</a></li>   
            <a class="button close" href="menuuser.php?op=1">Cerrar Sesion</a>
			</ul>
		</nav>
	</header>
	
	<section id="tabla">


	<center><h1>Últimas Compras</h1></center>
	<table border="0px" width="100%">	
		<thead>
		    <td>Usuario</td>
			<td>Imagen</td>
			<td>Nombre</td>
			<td>Precio</td>
			<td>Cantidad</td>
			<td>Subtotal</td>
		</thead>	
        <?php
        
            $solicitud="SELECT * FROM pedidos";
			$re=mysqli_query($con,$solicitud);
			$numeroventa=0; 
            $bandera=1;
        
			while ($f=mysqli_fetch_array($re)) {
                    
                //creo separaciones entre usuarios
                    if($bandera){
                            $nom=$f['nombreusuario'];
                            $bandera=0;
                            ?><tr class="tuser"> <td><?php echo $f['nombreusuario']; ?> </td></tr>    <?php
                            
                        
                        }else{
                                if($nom!=$f['nombreusuario']){
                                    ?><tr class="tuser"><td><?php echo $f['nombreusuario']; ?></td></tr><?php
                                    $nom=$f['nombreusuario'];
                                }
                            
                            }
                  //creo separaciones entre ventas de cada usuario  
                
					if($numeroventa	!=$f['numeroventa']){
						 ?><th class="sepcompra">Compra Número:<?php echo $f['numeroventa'];?> </th>
                           <?php
                            
                        }

					$numeroventa=$f['numeroventa'];
					 ?>
                             <tr>  
                              
                              <td><img src="./productos/<?php echo $f['imagen'];?>" width="100px" heigth="100px" /></td>
						      <td><?php echo $f['nombreproducto'];?></td>
						      <td><?php echo $f['preciounitario'];?></td>
						      <td><?php echo $f['cantidad'];?></td>
						      <td><?php echo $f['subtotal'];?></td>

					     </tr><?php
			}
        ?>
		
	</table>
	</section>
</body>
</html>


<?php    
}else{?> <p>No tienes permiso para estar aqui <a href="index.php">Volver al inicio</a></p> <?php  }
?>