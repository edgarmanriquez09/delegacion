<!--<?php
include('../Conexionbd/conexion.php');
@session_start();
 $y =$_SESSION['nombre_empleado']



?>--><!DOCTYPE html>
<html lang="en" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />
	<title>Delegación Regional No. 1</title>
	<link rel="shortcut icon" type="image/x-icon" href="css/images/favicon.png" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css' />
	
    <script laguage="javascript">
		function activar(form)
		{
		if(form.asistente.value=="Dependencia".selected==true)
		{form.depe.disabled=true; }
		else
		{form.depe.disabled=false;}
		}
	</script>
	<script src="js/jquery-1.8.0.min.js" type="text/javascript"></script>
	<!--[if lt IE 9]>
		<script src="js/modernizr.custom.js"></script>
	<![endif]-->
	<script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
	<script src="js/functions.js" type="text/javascript"></script>
</head>
<body>
	<!-- wraper -->
	<div id="wrapper">
		<!-- shell -->
		<div class="shell">
			<!-- container -->
			<div class="container">
				<!-- header -->
				<header id="header">
					<h1><img  id="encabezado" src="images/top.png"/></h1>
				</header>
				<!-- end of header -->
				<!-- navigation -->
				<nav id="navigation">
					<a href="#" class="nav-btn">Inicio<span class="arr"></span></a>
					<ul>
						<li><a href="index_root.php">INICIO</a></li>
						<li class="active"><a href="#">USUARIO</a></li>
                        <li><a href="form_lista_usuarios.php">LISTADO</a></li>
						
						<li><a href="../admin/cerrar.php">SALIR</a></li>
                        <!--<li>       BIENVENIDO (A): <? echo "$y";?>     </li>-->
					</ul>
              	  
				</nav>
				<!-- end of navigation -->
				
				<!-- main -->
				<div class="main">					
				  <section class="POST">
                    <h2><center>Editando Usuario</center></h2>
				  </section>
				</div>
              <div class="contenedor">


              	<?php 
$nombre=$_POST['nombre'];
echo "$no_trabajador";
echo "$id_status";
$id_perfil=$_POST['perfil'];

$id=$_POST['id'];

$nombre_empleado=$_POST['nombre_empleado'];
$no_trabajador=$_POST['no_trabajador'];
$password=$_POST['password'];
$id_plantel=$_POST['plantel'];

$id_status=$_POST['combo2'];

$id_plantel=$_POST['combo'];

$link = mysql_connect("localhost", "root","admin");
   mysql_select_db("correspondencia"); 
  
  if ($id_status == 0 and $id_plantel == 0){


   $sql = "UPDATE usuarios SET nombre_empleado='$nombre_empleado',no_trabajador='$no_trabajador', password='$password' WHERE id =$id";
   $result = mysql_query($sql);

  }elseif ($id_status == 0 and $id_plantel !== 0 ){

  	 $sql = "UPDATE usuarios SET nombre_empleado='$nombre_empleado',id_plantel='$id_plantel',no_trabajador='$no_trabajador', password='$password' WHERE id =$id";
   $result = mysql_query($sql);
  }elseif ($id_status !== 0 and $id_plantel == 0) {
  	 $sql = "UPDATE usuarios SET nombre_empleado='$nombre_empleado',id_status='$id_status',no_trabajador='$no_trabajador' , password='$password' WHERE id =$id";
   $result = mysql_query($sql);
  }else{
 	$sql = "UPDATE usuarios SET nombre_empleado='$nombre_empleado',id_status='$id_status',id_plantel='$id_plantel',no_trabajador='$no_trabajador', password='$password' WHERE id =$id";
   $result = mysql_query($sql);


  }
 



	echo "Actualizado Correctamente";
	echo "<a href='form_lista_usuarios.php'><input  type='submit' value='Actualizar a otro Usuario' /></a>";



?>



              	 
</div>
				<!-- end of main -->
				<div class="socials">
					<div class="socials-inner">
					 <!-- <h3>Siguenos en:</h3>
						<ul>
							<li><a href="https://www.facebook.com/pages/Delegaci%C3%B3n-Regional-Manzanillo-Oficial/674548025909344?fref=ts" class="facebook-ico"><span></span>Facebook</a></li>
							<li><a href="#" class="twitter-ico"><span></span>Twitter</a></li>
						</ul>-->
						<div class="cl">&nbsp;</div>
					</div>
				</div>
				<div id="footer">
					<!-- end of footer-cols -->
					<div class="footer-bottom">
						<nav class="footer-nav">
							<!--<ul>
								<li><a href="index_root.html">INICIO</a></li>
								<li class="active"><a href="form_usuarios.php">USUARIO</a></li>
								 <li><a href="#">LISTADO</a></li>
								<li><a href="#">ESTADO</a></li>
								<li><a href="#">SALIR</a></li>
							</ul>-->
						</nav>
						<p class="copy">&copy; Derechos Reservados 2013-2016 Universidad de Colima<span></span></p>
						<div class="cl">&nbsp;</div>
					</div>
				</div>
			</div>
			<!-- end of container -->	
		</div>
		<!-- end of shell -->	
	</div>
	<!-- end of wrapper -->
</body>
</html>
