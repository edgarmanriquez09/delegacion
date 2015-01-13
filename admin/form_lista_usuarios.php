

<!DOCTYPE html>
<html lang="en" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />
	<title>Delegación Regional No. 1</title>
	<link rel="shortcut icon" type="image/x-icon" href="css/images/favicon.png" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css' />
	
	<script src="js/jquery-1.8.0.min.js" type="text/javascript"></script>
	<!--[if lt IE 9]>
		<script src="js/modernizr.custom.js"></script>
	<![endif]-->
	<script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
	<script src="js/functions.js" type="text/javascript"></script>
</head>
<body>
<p>
    <?php

     @session_start();

   		include('Conexionbd/conexion.php');


   		 $y = $_SESSION['nombre_empleado']; 
   		$enlace=conection();
   		$consulta=mysql_query("SELECT * FROM usuarios  inner join planteles on usuarios.id_plantel= planteles.id_plantel  inner join perfil on usuarios.id_perfil= perfil.id_perfil inner join status on status.id_status = usuarios.id_status ", $enlace);   
   		$totalreg=mysql_num_rows($consulta);
	?>
</p>
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
						<li><a href="form_usuarios.php">USUARIO</a></li>
                        <li class="active"><a href="#">LISTADO</a></li>
						
						<li><a href="../admin/cerrar.php">SALIR</a></li>
                        <li>       BIENVENIDO (A): <?echo "$y";?>     </li>
					</ul>
              	  
				</nav>
				<!-- end of navigation -->
				<!-- slider -->
				
				<!-- end of slider -->
				<!-- main -->
				<div class="main">					
				  <section class="post">
                    <h2><center>Listado de usuarios</center></h2>
				  </section>
				</div>
              <div class="contenedor">    	  
			  <center><table id="table" width="80%" cellspacing="0" cellpadding="0">
  				<tr style="background:#A4A4A4; color:#FAFAFA">
    				<td>&nbsp;Nombre de Usuario </td>
    				<td>&nbsp;No. Trabajador</td>
    				<td>&nbsp;Contraseña</td>
    				<td>&nbsp;Perfil</td>
    				<td>&nbsp;Plantel</td>
    				<td>&nbsp;Status</td>
    				<td>Eliminar</td>
    				<td>Editar</td>
  				</tr>

				<?php  
					while ($renglon=mysql_fetch_array($consulta)){ 
  					echo "<tr>";
    				echo "<td>&nbsp;".$renglon['nombre_empleado']."</td>";
    				
    				echo "<td>&nbsp;".$renglon['no_trabajador']."</td>";
    				echo "<td>&nbsp;".$renglon['password']."</td>";
    				echo "<td>&nbsp;".$renglon['perfil']."</td>";


					echo "<td>&nbsp;".$renglon['plantel']."</td>";

					echo "<td>&nbsp;".$renglon['status']."</td>";
					
					echo "<td><a href='eliminar.php?no_trabajador=".$renglon['no_trabajador']."'><img  width='30px' heigth='30px' src='images/elim.ico'></a></td>";
					echo "<td><a href='Edit_usuarios.php?no_trabajador=".$renglon['no_trabajador']."'><img  width='30px' heigth='30px' src='images/modifi.ico'></a></td>";
  					echo "</tr>";
 					}
				?>
				</table></center>
				<?php
					echo "<br> Total de registros: ", $totalreg;
					mysql_free_result($consulta);
					mysql_close($enlace);
				?>
                </div>
				<!-- end of main -->
				<div class="socials">
					<div class="socials-inner">
					  <!--<h3>Siguenos en:</h3>
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
							<!-- <ul>
								<li><a href="index_root.html">INICIO</a></li>
								<li ><a href="form_usuarios.php">USUARIO</a></li>
								 <li class="active"><a href="form_lista_usuarios.php">LISTADO</a></li>
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