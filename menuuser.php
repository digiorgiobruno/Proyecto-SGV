<?php
include './indexuser.php';

if(isset($_SESSION['Password'])&&isset($_SESSION['Usuario'])){
    //cerrar sesion
    if(isset($_GET['op'])){
                            session_unset();
                            header("location: index.php");
                            }
    
    /* //se muestran variables de sesion en pantalla para pruebas
    echo "<p>variables de session <br> Bienvenido ".$_SESSION['Nombre']." ".$_SESSION['Usuario']." ".$_SESSION['Password']." ".$_SESSION['Mail']. "<p>";
    */
 
   
    
    if(!empty($_COOKIE['datos'])){
        
           $dato=unserialize(base64_decode($_COOKIE['datos']));
        echo "<br> variables de coockies.Esta cookie se eliminara en 60 segundos <br>";
        echo "Bienvenido ".$dato['Name']." ".$dato['User']." ".$dato['Pass']." ".$dato['Mail'];
        
    }

    
}
?>





