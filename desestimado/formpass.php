<form method="POST"	action="validarpass.php" >

User:<input type="text" name="usuario" readonly=”readonly” value="<?php echo $usuario ?>">
	<br>
Password:<input type="password" name="password" placeholder="Password"> <br>
<input type="checkbox" name="remember" value="1">Recuerdame
<br>
<input type="submit" name="INGRESAR">
</form>
