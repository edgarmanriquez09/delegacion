<?php 
$nombre=$_GET['nombre'];
$ape_completo=$_GET['ape_completo'];
$email=$_GET['email'];
$tel=$_GET['tel'];
$cel=$_GET['cel'];
$fech_entre=$GET['fech_entre'];
$corre=$_GET['corre'];
$cantidad=$_GET['cantidad'];
include('Conexionbd/conexion.php');
$link=conection();
$sqlinsert=mysql_query("update usuarios set nombre='".$nombre."',apellidos='".$ape_completo."',no_trabajador='".$no_trabajador."',contra='".$contraseña."',email='".$email."',tel='".$tel."',cel='".$cel."',rol='".$asistente."'depe='".$depe."';", $link);
mysql_close($link);

	
header('location: form_lista_usuarios.php');
?>