
    <!--		<a href="./carritodecompras.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
        </a>-->

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
                    <li><a href="agregarproducto.php">Agregar productos al stock</a></li>
                    <li><a href="modificar.php">modificar/eliminar productos</a></li>
                    
                    <?php }else{ ?>


                    <!--<li><a href="#">Contacto</a></li> -->


                    <?php }?>




                    <a class="button close" href="menuuser.php?op=1">Cerrar Sesión</a>
                </ul>
            </nav>
        </div>
    </header>
    


