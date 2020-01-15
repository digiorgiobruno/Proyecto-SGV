<?php
$host = "localhost";
$user= "root";
$pass= "";
$db= "dbsgvm";

$conexion = mysqli_connect($host,$user,$pass,$db);
mysqli_set_charset($conexion,"utf8");
$con=$conexion;
//esto nos permite ver caracteres especiales de utf8
?>