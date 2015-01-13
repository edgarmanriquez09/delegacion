<?php

class Usuarios{
	
	public function __construct(){ 	}
	
	public function login_in(){
		
		if($result = mysql_query("SELECT * FROM usuarios WHERE no_trabajador= '" . $_POST['username'] . "' 
			AND contra = '" . $_POST['password'] . "' ")){
						
			if($row=mysql_fetch_array($result)){
			
				if($role = $row["rol"]){
			
					switch($role){			
						case 'Secretaria':
							header('location: secretaria/index_secretaria.php');
						break;
					}
				}
			}
		if ($result = mysql_query("SELECT * FROM usuarios WHERE no_trabajador= '" . $_POST['username'] . "' 
			AND contra = '" . $_POST['password'] . "' ")){
			if($row=mysql_fetch_array($result)){
			
				if($role = $row["rol"]){
			
					switch($role){			
						case 'Dependencia':
							header('location: dependencia/index_depe.php');
						break;		
				}
			 }
		}
			if ($result = mysql_query("SELECT * FROM usuarios WHERE no_trabajador= '" . $_POST['username'] . "' 
			AND contra = '" . $_POST['password'] . "' ")){
			if($row=mysql_fetch_array($result)){
			
				if($role = $row["rol"]){
			
					switch($role){		
						case 'Admin':
							header('location: admin/index_root.php');
						break;			
					}
				}
			}

					}else{
						include(''); 
					}	
				
				}
			}
	
		}
	}
?>