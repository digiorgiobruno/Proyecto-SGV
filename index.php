<?php
session_start();
if(isset($_SESSION['Password'])&&isset($_SESSION['Usuario'])){
    header("location: ./menuuser.php"); }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Sistema de gestion de ventas</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=divice-width,user-scalable=no,initial-scale=1,maximum-scale=1,minimum-scale=1">
    <link rel="stylesheet" href="estilos.css">
    <script src="js/validar.js"></script>
    
</head>
<body>
 
     <link rel="stylesheet" href="estilos.css">

<header> <hgroup><h1 id="h1">Wellcome to the Jungle</h1></hgroup></header> 
<script src="js/validar.js"></script>

<nav>
    <ul>
       <li id="op1"><a>Iniciar sesión</a> </li>
       <li id="op2"><a>Crear Usuario</a> </li> 
       
       <!--href="index.php?opcion=1"       href="index.php?opcion=2"-->
        
    </ul>
</nav>	
    
    <link rel="stylesheet" href="estilos.css">
        
        <?php
       
       
          if(isset($_GET['opcion']))
            {
                  $op=$_GET['opcion'];
                 
                            if($op==1)
                            {
                                $nombre=$_GET['nombre'];$mail=$_GET['mail'];
    ?>  <div id="mensaje" style="background-color:powderblue;"><center><h2> "Nombre de usuario no disponible"</h2></center></div>
                                    
                                <?php
                                   
                            }
                            else{ $nombre="";$mail="";}
              
                            if($op==2)
                            {
    ?> <div id="mensaje" style="background-color:powderblue;"><center><h2> "Nombre de usuario o contraseña incorrecto" </h2></center></div>  <?php
                            }
                }else{ $nombre="";$mail="";}
            ?>
<!-- ***********************************Formulario de crear usuario*********************************-->                       
                        <form id="form1" method="POST"	action="./validaciones/validar.php" onsubmit="return validar();" >
                               <input class="input" type="text" name="usuario" placeholder="&#128272; User" id="usuario" onblur="revisar(this);" onkeyup="revisar(this);"><br>
                               <input class="input" type="password" name="password" placeholder="&#128272; Password"id="password" onblur="revisar(this);" onkeyup="revisar(this);"> <br>
                               <input class="input" type="text" name="nombre" value="<?php echo $nombre?>" placeholder="&#9000; Name"  id="nombre" onblur="revisar(this);" value="<?php echo $nombre?>"onkeyup="revisar(this);"><br>
                               <input class="input" type="text" name="mail" value="<?php echo $mail?>"placeholder="&#9000; Mail" id="correo" onblur="revisar(this);" onkeyup="revisar(this);"><br>
                          
                           <input type="submit" name="CREAR">
                        </form>
<!-- ****************************************Formulario de login*********************************-->
                        <form id="form2" method="POST"	action="./validaciones/validarlogin.php" onsubmit="return validarLog();"  >
                                    <input class="input" id="userlog" type="text" name="usuario" placeholder="&#128272; User" onblur="revisar(this);" onkeyup="revisar(this);">
                                    <input class="input"  id="passlog" type="password" name="password" placeholder="&#128272; Password" onblur="revisar(this);" onkeyup="revisar(this);"> 
                                    <a>Recuerdame</a><input id="remember" type="checkbox" name="remember" value="1">
                                    <input type="submit" name="INGRESAR">
                        </form>

    <script src="js/validar.js"></script>
</body>
</html>