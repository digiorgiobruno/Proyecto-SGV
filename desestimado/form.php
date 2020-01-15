<link rel="stylesheet" href="estilos.css">
<script src="validar.js"></script>
<form method="POST"	action="validar.php" onsubmit="return validar();" >
	
	User:<input class="input" type="text" name="usuario" placeholder="&#128272; User" id="usuario" onblur="revisar(this);" onkeyup="revisar(this);"><br>
	Password:<input type="password" name="password" placeholder="&#128272; Password"id="password"> <br>
	Name:<input type="text" name="nombre" placeholder="&#9000; Name" value="<?php echo $nombre?>" id="nombre"><br>
	Mail:<input type="text" name="mail" placeholder="&#9000; Mail" value="<?php echo $mail ?>"id="correo"><br>
	<input type="submit" name="CREAR">
</form>


<!-- <a href="dos.php">Consultar contenido</a> -->