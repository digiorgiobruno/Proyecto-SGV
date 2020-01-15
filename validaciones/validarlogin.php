<?php

if(isset($_POST['usuario'])&&isset($_POST['password'])){
    
$password=md5($_POST['password']);
$usuario =$_POST['usuario'];
$useradmin="admin";

    include("../conexion.php");
    $solicitud="SELECT  * FROM tusuario WHERE User='$usuario'&&Pass='$password'";//codigo sql
    $resultado = mysqli_query($conexion,$solicitud);
    $fila = mysqli_fetch_array($resultado);


    if(mysqli_num_rows($resultado))
		{

			echo "todo ok!!!"; 
			session_start();
			$_SESSION['Nombre']=$fila['Name'];
			$_SESSION['Usuario']=$fila['User'];
			$_SESSION['Password']=$fila['Pass'];
			$_SESSION['Mail']=$fila['Mail'];
            //Si se presiono la casilla recuerdame setiamos la cookie
			if(isset($_POST['remember'])){setcookie("datos",base64_encode(serialize($fila)),time()+60,"/");}
        
			if($fila['User']==$useradmin)
                {
				    //header("location: menuadm.php");
				   /* echo "esto es el menu del administrador";}*/
                    header("location: ../menuuser.php");
                    }
               else{

				    header("location: ../menuuser.php");
				} 
        
         }else{header("location: ../index.php?opcion=2");}
}else{echo "si no ingresas usuario y contraseña no puedes acceder a este sitio loquillo";}

?>