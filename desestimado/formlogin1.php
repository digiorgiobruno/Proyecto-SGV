<link rel="stylesheet" href="estilos.css">
<script src="validar.js"></script>
<form method="POST"	action="validarlogin.php" onsubmit="return validar();"  >
	    User:<input type="text" name="usuario" placeholder="&#128272; User"><br>
    	Password:<input type="password" name="password" placeholder="&#128272; Password"> <br>
        Recuerdame<input type="checkbox" name="remember" value="1">
        <input type="submit" name="INGRESAR">
</form>