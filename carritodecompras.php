<?php
session_start();
if(isset($_SESSION['Password'])&&isset($_SESSION['Usuario'])){

	include './conexion.php';
	if(isset($_SESSION['carrito'])){
		if(isset($_GET['id'])){
					$arreglo=$_SESSION['carrito'];//guardamos variable de sesión carrito
					$encontro=false;//inicilizo bandera boolean
					$numero=0;//incializo indice
					for($i=0;$i<count($arreglo);$i++){
						if($arreglo[$i]['Id']==$_GET['id']){
							$encontro=true;
							$numero=$i;
						}
					}
                    
					if($encontro==true){
						$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
						$_SESSION['carrito']=$arreglo;
					   }else{
						$nombre="";
						$precio=0;
						$imagen="";
                        $solicitud="select * from productos where id=".$_GET['id'];
		                $query=mysqli_query($con,$solicitud)or die(mysql_error());
                        $f=mysqli_fetch_array($query);
						if($f){
							$nombre=$f['nombre'];
							$precio=$f['precio'];
							$imagen=$f['imagen'];
			                 $arreglo[]=array('Id'=>$_GET['id'],
								'Nombre'=>$nombre,
								'Precio'=>$precio,
								'Imagen'=>$imagen,
								'Cantidad'=>1);
                                $_SESSION['carrito']=$arreglo;
                        }else{
                        ?><center><h2> Elemento no encontrado</h2></center> <?php
                            
                        }


					
						

					}
		}




	}else{
		if(isset($_GET['id'])){
			$nombre="";
			$precio=0;
			$imagen="";
            $solicitud="select * from productos where id=".$_GET['id'];
            $query=mysqli_query($con,$solicitud)or die(mysql_error());
			while ($f=mysqli_fetch_array($query)) {
				$nombre=$f['nombre'];
				$precio=$f['precio'];
				$imagen=$f['imagen'];
			}
			$arreglo[]=array('Id'=>$_GET['id'],
							'Nombre'=>$nombre,
							'Precio'=>$precio,
							'Imagen'=>$imagen,
							'Cantidad'=>1);
			$_SESSION['carrito']=$arreglo;
		}
	}
?>
<!-- --------------------HTML----------------------------  -->
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>

    <link rel="stylesheet" type="text/css" href="./css/navstyle.css">
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  src="./js/scripts.js"></script>
</head>
<body>
	<header>
		<h1>Carrito de compras</h1>
		<a href="./carritodecompras.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>
	</header>
	<section>
		<?php
			$total=0;
			if(isset($_SESSION['carrito'])){
			$datos=$_SESSION['carrito'];
			
			$total=0;
			for($i=0;$i<count($datos);$i++){
				
	?>
				<div class="producto">
					<center>
						<img src="./productos/<?php echo $datos[$i]['Imagen'];?>"><br>
						<span ><?php echo $datos[$i]['Nombre'];?></span><br>
						<span>Precio: <?php echo $datos[$i]['Precio'];?></span><br>
						<span>Cantidad: 
							<input type="text" value="<?php echo $datos[$i]['Cantidad'];?>"
							data-precio="<?php echo $datos[$i]['Precio'];?>"
							data-id="<?php echo $datos[$i]['Id'];?>"
							class="cantidad">
						</span><br>
						<span class="subtotal">Subtotal:<?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio'];?></span><br>
						<a href="#" class="elimina" data-id="<?php echo $datos[$i]['Id'];?>">Eliminar del carrito</a>
					</center>
				</div>
			<?php
				$total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
			}
				
			}else{
				echo '<center><h2>No has añadido ningun producto</h2></center>';
			}
			echo '<center><h2 id="total">Total: '.$total.'</h2></center>';
		      if($total){
        ?><div > <center> <a class="button"  href="./comprar/comprar.php">Comprar</a> </center> </div> <?php
		              }
        ?>
		<center><a href="menuuser.php">Ver catalogo</a></center>
		
		

		
	</section>
</body>
</html>





<?php    
}else{?> <p>No has iniciado sesion <a href="index.php">Volver al inicio</a></p> <?php  }
?>
