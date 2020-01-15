<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Sistema de gestion de ventas</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=divice-width,user-scalable=no,initial-scale=1,maximum-scale=1,minimum-scale=1">
    <link rel="stylesheet" href="estilos.css">
    <script src="validar.js"></script>
    
</head>
<body>

    <header> <hgroup><h1 id="h1">Wellcome to the Jungle</h1></hgroup></header> 
<script src="validar.js"></script>

    <nav>
        <ul>
           <li><a onclick="form1()" href="index.php?opcion=1">Iniciar sesión</a> </li>
           <li><a onclick="form2()" href="index.php?opcion=2">Crear Usuario</a> </li> 
            
        </ul>
    </nav>	
    
	<?php 
    
         ?><link rel="stylesheet" href="estilos.css"><?php

		if(isset($_GET['r'])){ ?> <p><br>Usuario o Password incorrecto!!!</p><?php }

	  	if(isset($_GET['opcion']))
                {
	  			$op=$_GET['opcion'];

	  	

					   if($op==2)
                                {
                                $nombre="";
				                $mail="";
                           ?>
                            <form id="form1" method="POST"	action="validar.php" onsubmit="return validar();" >
	                           User:<input class="input" type="text" name="usuario" placeholder="&#128272; User" id="usuario" onblur="revisar(this);" onkeyup="revisar(this);"><br>
	                           Password:<input class="input" type="password" name="password" placeholder="&#128272; Password"id="password" onblur="revisar(this);" onkeyup="revisar(this);"> <br>
                               Name:<input class="input" type="text" name="nombre" placeholder="&#9000; Name" value="<?php echo $nombre?>" id="nombre" onblur="revisar(this);" onkeyup="revisar(this);"><br>
	                           Mail:<input class="input" type="text" name="mail" placeholder="&#9000; Mail" value="<?php echo $mail ?>"id="correo" onblur="revisar(this);" onkeyup="revisar(this);"><br>
                              
                               <input type="submit" name="CREAR">
                            </form>
                               <?php
                                }   
						else
				                {
								    if($op==1)
									{
                                    ?>
                                    <form id="form2" method="POST"	action="validarlogin.php" onsubmit="return validarLog();"  >
                                        User:<input class="input" id="usuario" type="text" name="usuario" placeholder="&#128272; User" onblur="revisar(this);" onkeyup="revisar(this);">
    	                                Password:<input class="input"  id="password" type="password" name="password" placeholder="&#128272; Password" onblur="revisar(this);" onkeyup="revisar(this);"> 
                                        Recuerdame<input id="remember" type="checkbox" name="remember" value="1">
                                        <input type="submit" name="INGRESAR">
                                    </form>
                                    <?php
									}
                                    if($op==3)
                                    {
                                        echo "Nombre de usuario no disponible"; 
                                    }
                                }    
                }
	
		
	?>	

</body>
</html>