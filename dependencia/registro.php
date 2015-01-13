<?php 
$id=$_POST['id'];
$plantel=$_POST['combo'];
$plantel_origen=$_POST['combo2'];
$asunto=$_POST['asunto'];
$nombre=$_POST['nombre'];
echo "$asunto";
$fecha = date("Y-m-d h:i:s ");
echo "$fecha";

// Abrimos la conexion a la base de datos  
//Conexion con la BD
require('Conexionbd/conexion.php');
/*$sqlsel=mysql_query("select * from usuarios where no_trabajador='".$no_trabajador."'; ", $link);*/
/*$selres=mysql_fetch_array($sqlsel);*/


if ($plantel == $plantel_origen)
{

 echo "<SCRIPT LANGUAGE='javascript'>alert('Favor de revisar destino y origen');  self.location= 'form_correspondencia.php';  </script>"; 

}else{
mysql_query("INSERT INTO corres ( fecha,nombre,asunto,no_trabajador,id_plantel,id_plantel_origen,status) values ('$fecha','$nombre','$asunto','$id','$plantel','$plantel_origen','1')"); 

 echo "<SCRIPT LANGUAGE='javascript'>alert('Datos capturados correctamente'); self.location= 'form_correspondencia.php';</script>"; 

}




?>
