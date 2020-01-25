<?php
	include ("../conexion.php");
	if(!isset($_POST['nombre']) &&  !isset($_POST['descripcion']) && !isset($_POST['precio']) && !isset($_POST['cantidad'])){
		header("Location: ../agregarproducto.php");
	}else{
			$allowedExts = array("gif", "jpeg", "jpg", "png");
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);
			$imagen="";
			$random=rand(1,999999);
			if ((($_FILES["file"]["type"] == "image/gif")
				|| ($_FILES["file"]["type"] == "image/jpeg")
				|| ($_FILES["file"]["type"] == "image/jpg")
				|| ($_FILES["file"]["type"] == "image/pjpeg")
				|| ($_FILES["file"]["type"] == "image/x-png")
				|| ($_FILES["file"]["type"] == "image/png"))){
				//Verificamos que sea una imagen
		  	if ($_FILES["file"]["error"] > 0){
		  		//verificamos que venga algo en el input file
		    	echo "Error numero: " . $_FILES["file"]["error"] . "<br>";
		    }else{
		    	//subimos la imagen

		    	$imagen= $random.'_'.$_FILES["file"]["name"];
		    	if(file_exists("../productos/".$random.'_'.$_FILES["file"]["name"])){
		      		echo $_FILES["file"]["name"] . " Ya existe. ";
		      	}else{
		      		move_uploaded_file($_FILES["file"]["tmp_name"],
		      		"../productos/" .$random.'_'.$_FILES["file"]["name"]);
		      		echo "Archivo guardado en " . "../productos/" .$random.'_'. $_FILES["file"]["name"];
		      		$producto=$_POST['nombre'];
					$descripcion=$_POST['descripcion'];
					$precio=$_POST['precio'];
                    $cantidad=$_POST['cantidad'];
					$Sql="insert into productos (nombre,descripcion,imagen,precio,cantidad) values(
							'".$producto."',
							'".$descripcion."',
							'".$imagen."',
							'".$precio."','".$cantidad."')";
					mysqli_query($con,$Sql);
					header ("Location: ../agregarproducto.php");
		      }
		    }
		  }else{
		  echo "Formato no soportado";
		  }

		
	}
?>
