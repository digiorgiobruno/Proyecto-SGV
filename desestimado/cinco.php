<?php
include("conexion.php");
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$celular = $_POST['celular'];
$id = $_POST['id'];

$solicitud = "UPDATE  datos SET  Nombre='$nombre',Apellido='$apellido',Edad='$edad',Celular='$celular' WHERE ID=$id ";
$resultado=mysqli_query($conexion,$solicitud);
echo $nombre;
//header("location:dos.php");

?>