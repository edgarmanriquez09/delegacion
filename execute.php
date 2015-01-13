<?php

//llamado de clases
$conex = mysql_connect("localhost", "root", "admin")
		or die("No se pudo realizar la conexion");
	mysql_select_db("correspondencia",$conex)
		or die("ERROR con la base de datos");

if (!isset($_SESSION)) {
  session_start();
}

//Recibir los datos ingresados en el formulario

$username= $_POST['username'];
$password= $_POST['password'];

//Consultar si los datos son están guardados en la base de datos
$consulta= "SELECT * FROM usuarios WHERE no_trabajador='".$username."' and password='".$password."'"; 
$resultado= mysql_query($consulta,$conex) or die (mysql_error());
$fila=mysql_fetch_array($resultado);


if (!$fila[0]) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
{
	 echo "<SCRIPT LANGUAGE='javascript'>alert('Usuario o Password incorrectos, por favor verifique.'); self.location= 'index.php';</script>";  
	
}
else //opcion2: Usuario logueado correctamente
{
	//Definimos las variables de sesión y redirigimos a la página de usuario
	
	$_SESSION['nombre_empleado'] = $fila['nombre_empleado'];
	$_SESSION['no_trabajador'] = $fila['no_trabajador'];
	$_SESSION['id_plantel'] = $fila['id_plantel'];

	
						
	if($resultado = mysql_query("SELECT * FROM usuarios WHERE no_trabajador= '" . $_POST['username'] . "' 
			AND password = '" . $_POST['password'] . "' ")){
						
			if($row=mysql_fetch_array($resultado)){
			

			  if ($role = $row["id_status"] == 2   ){

			  		 echo "<SCRIPT LANGUAGE='javascript'>alert('Tu usuario se encuentra bloqueado comunicate al Telefono (314) 33 1 12 01 ext. 53001
correo electronico: delega1@ucol.mx'); self.location= 'index.php';</script>";  
                 }else{
				if($role = $row["id_perfil"]){
			   
					switch($role){			
						case '1':
							header('location: admin/index_root.php');

						break;
					}

					}
				}
			}
		}

		if($result = mysql_query("SELECT * FROM usuarios WHERE no_trabajador= '" . $_POST['username'] . "' 
			AND password = '" . $_POST['password'] . "' ")){
						
			if($row=mysql_fetch_array($result)){
			
					  if ($role = $row["id_status"] == 2   ){

			  		 echo "<SCRIPT LANGUAGE='javascript'>alert('Tu usuario se encuentra bloqueado comunicate al Telefono (314) 33 1 12 01 ext. 53001
correo electronico: delega1@ucol.mx '); self.location= 'index.php';</script>";  
                 }else{

				if($role = $row["id_perfil"]){
			
					switch($role){			
						case '2':
							header('location: secretaria/index.php');
						break;
					}
				}
			}
			}
		}
		if ($result = mysql_query("SELECT * FROM usuarios WHERE no_trabajador= '" . $_POST['username'] . "' 
			AND password = '" . $_POST['password'] . "' ")){
			if($row=mysql_fetch_array($result)){
			

			  if ($role = $row["id_status"] == 2   ){

			  		 echo "<SCRIPT LANGUAGE='javascript'>alert('Tu usuario se encuentra bloqueado comunicate al Telefono (314) 33 1 12 01 ext. 53001
correo electronico: delega1@ucol.mx '); self.location= 'index.php';</script>";  
                 }else{
				if($role = $row["id_perfil"]){
			
					switch($role){			
						case '3':
							header('location: dependencia/index.php');
						break;		
				}
			}
			 }
		}
		
}
}
?>