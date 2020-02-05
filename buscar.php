<?php
include 'conexion.php';
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

    $salida = "";

    $consulta="select * from productos";
    $query=mysqli_query($con, $consulta);
    //para saber el numero total de registros hago
    $num_total_registros = mysqli_num_rows($query); 
    //calculo el total de páginas ,ceil redonde hacia arriba la division
    //ejemplo si los registros son 10 y quiero mostrar 4 por pagina la division dara 3 ,en lugar de 2,5.
    
    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 
    
    //construyo la sentencia SQL 
    $consulta = "select * from productos limit " . $inicio . "," . $TAMANO_PAGINA;

    if (isset($_POST['consulta'])) {
    	$q = $con->real_escape_string($_POST['consulta']);
        
    	$consulta = "SELECT * FROM productos WHERE id LIKE '%$q%' OR nombre LIKE '%$q%' OR descripcion LIKE '%$q%'";
    }
   

    $query = mysqli_query($con, $consulta);

   if ($query->num_rows>0) {

 		while ($f=mysqli_fetch_array($query)) {
            
            $salida.= '
            
            <div class="producto">
                <center>
                    <img src="./productos/'.$f["imagen"].'"><br>
                    <span>'.$f["nombre"].'</span><br>
                    <a href="./detalles.php?id='.$f["id"].'">ver</a>
                </center>
            </div>
            

            
                ';
        }
       
       
       
       
       
    }

    else{$salida.="NO HAY DATOS :("; }


    echo $salida;

    $con->close();



?>