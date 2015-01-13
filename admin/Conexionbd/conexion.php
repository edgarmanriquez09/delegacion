<?php
function conection(){
	if(!($enlace=mysql_connect("localhost","root","admin"))){
		
		echo "error de conexion con el servidor";
		exit();
	}
	if(!mysql_select_db("correspondencia",$enlace)){
		echo "error de conexion con la base de datos";
		}	
		return $enlace;
	}
?>