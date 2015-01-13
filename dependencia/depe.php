<?php
	$con=mysql_connect("localhost","root","root");
	mysql_select_db("avisos_corresp_dr1",$con);
	
	$id=$_POST['idDepe'];
	$sqlDepe=mysql_query("SELECT * FROM usuarios WHERE id_usuario='$id'");
	$depe=mysql_fetch_object($sqlDepe);
	$datos= $depe->nombre."/".$depe->apellidos."/".$depe->email."/".$depe->tel."/".$depe->cel;
	echo $datos;
?>