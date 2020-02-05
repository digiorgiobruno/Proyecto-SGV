<?php
session_start();
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
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
    <link rel="stylesheet" type="text/css" href="./css/stylepage.css">
    <script type="text/javascript" href="./js/scripts.js"></script>
</head>

<body>
    <header>
        <div class="header-site">
            <div class="encabezado">
                <h1>Descripción</h1>
            </div>
        </div>
            <header>
        <div class="header-site">
            <div class="encabezado">
                <h1>Sistema de Gestión de Ventas</h1>
            </div>

            <div class="navsup">
                <p> Bienvenido <b><?php echo $_SESSION['Nombre']; ?> </b>¿que deseas? </p>
            </div>
            <nav class="navegacion">
                <ul class="menu">
                    <li><a href="./carritodecompras.php">Carrito</a></li>
                    <li><a href="./menuuser.php">Catálogo</a></li>

                    <?php if($permiso){?>
                    <li><a href="admin.php">Administrar pedidos</a></li>
                    <li><a href="admin/agregarproducto.php">Agregar productos al stock</a></li>
                    <?php }else{ ?>


                    <li><a href="#">Contacto</a></li>


                    <?php }?>




                    <a class="button close" href="menuuser.php?op=1">Cerrar Sesion</a>
                </ul>
            </nav>
        </div>
    </header>
        
    </header>
    <div class="contenido">
        <section>

            <?php
		include 'conexion.php';
        $solicitud="select * from productos where id=".$_GET['id'];
        $query=mysqli_query($con,$solicitud)or die(mysqli_error());
		while ($f=mysqli_fetch_array($query)) {
		?>
            <div class="contenedor-detalles">
                <div class="producto-detalle">
                    <center>
                        <img src="./productos/<?php echo $f['imagen'];?>"><br>
                        <span><?php echo $f['nombre'];?></span><br>
                        <span>Precio: <?php echo $f['precio'].' $'; ?></span><br>

                        <div class="detalle">

                            <span>Descripción: <?php echo $f['descripcion']; ?> <br></span>
                            <span>Cantidad: <?php echo $f['cantidad']." unidades disponibles";?></span><br>
                        </div>

                        <a href="./carritodecompras.php?id=<?php  echo $f['id'];?>">Añadir al carrito de compras</a>
                    </center>
                </div>
            </div>
            <div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://comentarios-dzfgendyhm.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            
            <?php
		}
	?>




        </section>

    </div>
    <footer class="site-footer">
        <div class="contenedor contenedor-footer">
            <nav class="nave">
                <!-- NAVEGACION DENTRO DE HEADER-->
                <a href="nosotros.html">Nosotros</a>
                <a href="anuncios.html">Anuncios</a>
                <a href="Blog.html">Blog</a>
                <a href="contacto.html">Contacto</a>
                <a target="_blank" href="http://www.google.com">Ir a google</a>
            </nav>
            <p class="copyright">Creado por Bruno Di Giorgio 2020 &copy;</p>
        </div>
    </footer>
</body>

</html>



<?php    
}else{?> <p>No has iniciado sesion <a href="index.php">Volver al inicio</a></p> <?php  }
?>
