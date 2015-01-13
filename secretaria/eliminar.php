<?php 
$no_trabajador=$_GET['no_trabajador'];
include('Conexionbd/conexion.php');
$link=conection();
$sqlelim=mysql_query("delete from usuarios where no_trabajador='".$no_trabajador."';",$link);
header('location: form_lista_usuarios.php');
?>