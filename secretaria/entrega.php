<?php 
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$num_trabajador= $_POST['no_trabajador'];
echo "$asunto";
$fecha = date("Y-m-d h:i:s ");
echo "$fecha";

// Abrimos la conexion a la base de datos  
//Conexion con la BD
require('Conexionbd/conexion.php');
/*$sqlsel=mysql_query("select * from usuarios where no_trabajador='".$no_trabajador."'; ", $link);*/
/*$selres=mysql_fetch_array($sqlsel);*/



mysql_query("UPDATE corres set status = '2'  where  id_corres=  '$id'" ); 

mysql_query("INSERT INTO entregas ( id_correspondencia,nom_completo,no_trabajador,fecha_recogio) values ('$id','$nombre','$num_trabajador','$fecha')"); 



 echo "<SCRIPT LANGUAGE='javascript'>alert('Datos capturados correctamente'); self.location= 'form_lista_correspondencia.php';</script>"; 

?>
