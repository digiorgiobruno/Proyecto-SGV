<?php
include("conexion.php");
//obtenemos y guardamos en una variable el dato id que recibimos por el metodo get
$id = $_GET['id'];

$solicitud = "DELETE FROM datos WHERE ID=$id";
$resultado = mysqli_query($conexion, $solicitud);

header("location: dos.php");


?>