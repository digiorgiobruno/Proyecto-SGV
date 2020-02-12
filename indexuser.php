<!---Archivo incluido en menuuser.php------------HTML--------------------------->
<?php

if(isset($_SESSION['Password'])&&isset($_SESSION['Usuario'])){
    
  
    
    $permiso=0;
    if($_SESSION['Usuario']=='admin'){
        $permiso=1;
        
    }
    
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Carrito de Compras</title>
    <link rel="stylesheet" type="text/css" href="./css/stylepage.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="./js/busqueda.js"></script>
    

</head>

<body>
    <?php include './header.php';?>
    <div class="contenido">


        <div class="form-busqueda">
            <label for="caja_busqueda">Buscar</label>
            <input type="text" name="caja_busqueda" id="caja_busqueda">

        </div>

        <section>
       <div class="productos-contenedor">
            <?php
    //-----------------------------------------
    //Limito la busqueda 
    $TAMANO_PAGINA = 3; //cantidad de productos que muestro por pagina

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
                             } ?>
            </div>                
                             
            <div class="indice">
                                <?php
                             
                        //cerramos el conjunto de resultado y la conexión con la base de datos
                        /*mysqli_free_result($rs); 
                        mysqli_close($conn);*/
                        //muestro los distintos índices de las páginas, si es que hay varias páginas 
                        if ($total_paginas > 1){ 
                            for ($i=1;$i<=$total_paginas;$i++){ 
                             if ($pagina == $i){
                            //si muestro el índice de la página actual, no coloco enlace 
                             echo $pagina . " "; 

                             }
                        else{ 
                            //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 
                            echo "<a href='indexuser.php?pagina=". $i ."'>" . $i . "</a> "; }
                    } 
                }


                    ?>
         

        </div>

        </section>
    </div>

    <?php
    include './footer.php';?>

</body>
   
    <script type="text/javascript" href="./js/busqueda.js"></script>
    
</html>    
<?php
   
}else{?> <p>No has iniciado sesion <a  href="menuuser.php?op=1">Volver al inicio</a></p> <?php  }
?>
