<?php 


	$solicitud ="INSERT INTO Tusuario (Name,User,Mail,Pass) VALUES('$nombre','$usuario','$mail','$password') ";
	$resultado = mysqli_query($conexion,$solicitud);//consulta para insertar elementos , en el argumento de la funcion van los datos de conexion y un string con la consulta,esta ultima esta en lenguage sql
	
//inicio sesion y luego almaceno las variables como variables de sesion
	session_start();
	$_SESSION['Nombre']=$nombre;
	$_SESSION['Usuario']=$usuario;
	$_SESSION['Password']=$password;
	$_SESSION['Mail']=$mail;
	header("location: menuuser.php");
	

?>