<?php
session_start();
if(isset($_SESSION['Password'])&&isset($_SESSION['Usuario'])|| !empty($_COOKIE['datos'])){
   
    header("location: ./menuuser.php");}
   
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Sistema de gestion de ventas</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=divice-width,user-scalable=no,initial-scale=1,maximum-scale=1,minimum-scale=1">
    <link rel="stylesheet" href="css/estiloslogin.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/validar.js"></script>



    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <main>

        <!-----------------------HEADER------------------------------------------>
        <header>
            <div class="header-site">
                <h1 id="h1">Sistema de gestion de ventas</h1>

            </div>

        </header>
        <script src="js/validar.js"></script>
        <!-- NAV DEL LOGIN-->
        <nav class="nav-header">
            <ul class="elementos">
                <li class="elemento">
                    <h3 id="sgva">SGV</h3>
                </li>
                <li id="op1" class="elemento"><a>Iniciar sesión</a> </li>
                <li id="op2" class="elemento"><a>Crear Usuario</a> </li>

                <!--href="index.php?opcion=1"       href="index.php?opcion=2"-->

            </ul>
        </nav>



        <?php
       
       
          if(isset($_GET['opcion']))
            {
                  $op=$_GET['opcion'];
                 
                            if($op==1)
                            {
                                $nombre=$_GET['nombre'];$mail=$_GET['mail'];
    ?>
        <div class="mensaje" style="background-color:powderblue;">
            <center>
                <h2> "Nombre de usuario no disponible"</h2>
            </center>
        </div>

        <?php
                                   
                            }
                            else{ $nombre="";$mail="";}
              
                            if($op==2)
                            {
    ?> <div class="mensaje" style="background-color:powderblue;">
            <center>
                <h2> "Nombre de usuario o contraseña incorrecto" </h2>
            </center>
        </div> <?php
                            }
                }else{ $nombre="";$mail="";}
            ?>
        <!-- ***********************************Formulario de crear usuario*********************************-->
        <form id="form1" method="POST" action="./validaciones/validar.php" onsubmit="return validar();">
            <input class="input" type="text" name="usuario" placeholder="&#128272; User" id="usuario" onblur="revisar(this);" onkeyup="revisar(this);"><br>
            <input class="input" type="password" name="password" placeholder="&#128272; Password" id="password" onblur="revisar(this);" onkeyup="revisar(this);"> <br>
            <input class="input" type="text" name="nombre" value="<?php echo $nombre?>" placeholder="&#9000; Name" id="nombre" onblur="revisar(this);" value="<?php echo $nombre?>" onkeyup="revisar(this);"><br>
            <input class="input" type="text" name="mail" value="<?php echo $mail?>" placeholder="&#9000; Mail" id="correo" onblur="revisar(this);" onkeyup="revisar(this);"><br>

            <input type="submit" name="CREAR">
        </form>
        <!-- ****************************************Formulario de login*********************************-->
        <form id="form2" method="POST" action="./validaciones/validarlogin.php" onsubmit="return validarLog();">
            <input class="input" id="userlog" type="text" name="usuario" placeholder="&#128272; User" onblur="revisar(this);" onkeyup="revisar(this);">
            <input class="input" id="passlog" type="password" name="password" placeholder="&#128272; Password" onblur="revisar(this);" onkeyup="revisar(this);">
            <div class="recordar">
                <div class="recuerdame">
                    <p>Recuerdame</p>
                </div><input id="remember" type="checkbox" name="remember" value="1">
            </div>
            <input type="submit" name="INGRESAR">
        </form>

<script src="js/validar.js"></script>
        <!-- Generadorde comentarios aleatorios-->
        <div id="testimonio">

           <article>
                <div class="container mt-5 text-center" style="width: 150px; padding:10px;">
                    <h3 style="color:white;">Comentarios de usuarios</h3>
                    <button id="boton" class="btn btn-primary">Siguiente</button>
                    <div class="card">
                        <img class="card-img-top" src="" id="imagen">
                        <div class="card-body">
                            <h4 class="card-title" id="nombre-us">nombre</h4>
                        </div>
                    </div>
                </div>
                <div class="testimoniales">

                <div id="comentario" class="testimonial">
                   
                    
                </div>
                
            </div>
                
            
           </article>
        </div>

        <script src="js/validar.js"></script>
        <script src="javascript.js"></script>

    </main>
    <footer class="site-footer">
        <div class="contenedor contenedor-footer">
           <!-- 
               <nav class="navegacion">
                <!-- NAVEGACION DENTRO DE HEADER
                <a href="nosotros.html">Nosotros</a>
                <a href="anuncios.html">Anuncios</a>
                <a href="Blog.html">Blog</a>
                <a href="contacto.html">Contacto</a>
                <a target="_blank" href="http://www.google.com">Ir a google</a>
            </nav> 
            
            -->
            <p class="copyright">Creado por Bruno Di Giorgio 2020 &copy;</p>
        </div>
    </footer>
    <script src="js/validar.js"></script>
</body>



</html>
