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
   		include('Conexionbd/conexion.php'); 
   		$enlace=conection();
   		$consulta=mysql_query("Select * From estado", $enlace);   
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
						<li><a href="index_root.html">INICIO</a></li>
						<li><a href="form_usuarios.php">USUARIO</a></li>
                        <li><a href="form_lista_usuarios.php">LISTADO</a></li>
						<li class="active"><a href="form_lista_estado.php">ESTADO</a></li>
						<li><a href="#">SALIR</a></li>
                        <center><img  id="panel" src="images/PANEL DE CONTROL.png"/></center>
					</ul>
              	  
				</nav>
				<!-- end of navigation -->
				<!-- slider -->
				<div class="m-slider">
					<div class="slider-holder">
						<span class="slider-shadow"></span>
						<span class="slider-b"></span>
						<div class="slider flexslider">
							<ul class="slides">
								<li>
									<div class="img-holder">
										<img src="css/images/slide-img1.png" alt="" />
									</div>
									<div class="slide-cnt">
										   <center>
                                        		<h2>Delegación Regional  Manzanillo</h2>
                                            	<h3>Avisos de Correspondencia</h3>
                                     	   </center>
										<!--<a href="#" class="grey-btn">request a demo</a>-->
									</div>
								</li>
						  </ul>
					  </div>
				  </div>
				</div>		
				<!-- end of slider -->
				<!-- main -->
				<div class="main">					
				  <section class="post">
                    <h2><center>Estado de correspondencia</center></h2>
				  </section>
				</div>
              <div class="contenedor">    	  
			  <center><table id="table" width="80%" cellspacing="0" cellpadding="0">
  				<tr style="background:#A4A4A4; color:#FAFAFA">
					<td>&nbsp;Nombre de dependencia</td>
                    <td>&nbsp;Fecha</td>
                    <td>&nbsp;Hora</td>
                    <td>&nbsp;Persona</td>
    				<td>&nbsp;E-mail</td>
    				<td>&nbsp;Telefono</td>
    				<td>&nbsp;Celular</td>
  				</tr>

				<?php  
					while ($renglon=mysql_fetch_array($consulta)){ 
  					echo "<tr>";
    				echo "<td>&nbsp;".$renglon['nombre']."</td>";
    				echo "<td>&nbsp;".$renglon['apellidos']."</td>";
    				echo "<td>&nbsp;".$renglon['no_trabajador']."</td>";
    				echo "<td>&nbsp;".$renglon['contra']."</td>";
    				echo "<td>&nbsp;".$renglon['email']."</td>";
					echo "<td>&nbsp;".$renglon['tel']."</td>";
					echo "<td>&nbsp;".$renglon['cel']."</td>";
					echo "<td>&nbsp;".$renglon['rol']."</td>";
					echo "<td>&nbsp;".$renglon['depe']."</td>";
					echo "<td>&nbsp;".$renglon['desc_corres']."</td>";
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
					  <h3>Siguenos en:</h3>
						<ul>
							<li><a href="https://www.facebook.com/pages/Delegaci%C3%B3n-Regional-Manzanillo-Oficial/674548025909344?fref=ts" class="facebook-ico"><span></span>Facebook</a></li>
							<!--<li><a href="#" class="twitter-ico"><span></span>Twitter</a></li>-->
						</ul>
						<div class="cl">&nbsp;</div>
					</div>
				</div>
				<div id="footer">
					<!-- end of footer-cols -->
					<div class="footer-bottom">
						<nav class="footer-nav">
							<ul>
								<li><a href="index_secretaria.html">INICIO</a></li>
								<li ><a href="form_correspondencia.php">CORRESPONDENCIA</a></li>
								 <li ><a href="form_lista_correspondencia.php">LISTADO</a></li>
								<li class="active"><a href="form_lista_estado.php">ESTADO</a></li>
								<li><a href="#">SALIR</a></li>
							</ul>
						</nav>
						<p class="copy">&copy; © Derechos Reservados 2013-2016 Universidad de Colima<span></span></p>
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