<?php

session_start();

    /* //se muestran variables de sesion en pantalla para pruebas
    echo "<p>variables de session <br> Bienvenido ".$_SESSION['Nombre']." ".$_SESSION['Usuario']." ".$_SESSION['Password']." ".$_SESSION['Mail']. "<p>";
    */
   //cerrar sesion
    if(isset($_GET['op'])){ 
                            
                            session_unset();//borramos variables de sesion
                            setcookie("datos",base64_encode(serialize($fila)),time()-60,"/");
                            header("location: index.php");
        
        
                            }else{
 
    if(!empty($_COOKIE['datos'])){
        
           $dato=unserialize(base64_decode($_COOKIE['datos']));
        //echo "<br> variables de coockies.Esta cookie se eliminara en 60 segundos <br>";
       // echo "Bienvenido ".$dato['Name']." ".$dato['User']." ".$dato['Pass']." ".$dato['Mail'];
        
        //como en este momento las cookies estan activas usamos sus datos para inicilizar las variables de sesion ,el tiempo de cookies puesto es de 60 segundos,pasado ese tiempo vencen y sus datos son borrados
        
        $_SESSION['Nombre']=$dato['Name'];
        $_SESSION['Usuario']=$dato['User'];
        $_SESSION['Password']=$dato['Pass'];
        $_SESSION['Mail']=$dato['Mail'];
        
        
    }

if(isset($_SESSION['Password'])&&isset($_SESSION['Usuario'])){
    


include './indexuser.php';



    
 
}else {?> <p>No has iniciado sesion <a  href="index.php">Volver al inicio</a></p> <?php  }}
?>






