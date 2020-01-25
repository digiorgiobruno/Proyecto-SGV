<?php
	include "./conexion.php";
session_start();
$permiso=0;
if(isset($_SESSION['Password'])&&isset($_SESSION['Usuario'])&&($_SESSION['Usuario']=="admin")){
    
    
    if($_SESSION['Usuario']=='admin'){
        $permiso=1;
    }
    
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Panel de Administración</title>
   
    <link rel="stylesheet" type="text/css" href="./css/tablas.css">
    <link rel="stylesheet" type="text/css" href="./css/stylepage.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" href="./js/scripts.js"></script>
</head>

<body>

    <?php include './header.php' ?>

    <div class="contenido">
        <section id="tabla">


            <center>
                <h1>Últimas Compras</h1>
            </center>
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
                            ?><tr class="tuser">
                    <td><?php echo $f['nombreusuario']; ?> </td>
                </tr> <?php
                            
                        
                        }else{
                                if($nom!=$f['nombreusuario']){
                                    ?><tr class="tuser">
                    <td><?php echo $f['nombreusuario']; ?></td>
                </tr><?php
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
        
    </div>
    
<?php include './footer.php' ?>
</body>

</html>


<?php    
}else{?> <p>No tienes permiso para estar aqui <a href="index.php">Volver al inicio</a></p> <?php  }
?>
