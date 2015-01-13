

<?php
include('../Conexionbd/conexion.php');
@session_start();
 $y =$_SESSION['nombre_empleado']



?><!DOCTYPE html>
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
                        <li>       BIENVENIDO (A): <? echo "$y";?></li>
					</ul>
              	  
				</nav>
				<!-- end of navigation -->
				
				<!-- main -->
				<div class="main">					
				  <section class="post">
                    <h2><center>Registro de Usuarios</center></h2>
				  </section>
				</div>
              <div class="contenedor">
              	 <form action="registro.php" method="post"  >
                <table width="100%" border="0">
                  <tr>
                    <td width="163">&nbsp;</td>
                    <td width="159">&nbsp;</td>
                    <td width="93">&nbsp;</td>
                    <td width="125">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>Nombre Completo</td>
                    <td><label for="textfield"></label>
                    <input type="text" name="nombre" id="nombre" required></td>
                    <td></td>
                    <td><label for="textfield3"></label>
                    <iframe id="frame" name="ventana" style="visibility:hidden; width:1px; height:1px;"></iframe> </td>
                  </tr>
                  <tr>
                    <td>No.Trabajador</td>
                    <td><label for="textfield2"></label>
                    <input type="text" name="no_trabajador" id="no_trabajador" required ></td>
                    <td>Password</td>
                    <td><label for="textfield4"></label>
                    <input type="text" name="password" id="password" required></td>
                  </tr>
                  <tr>
                    <td>Dependencia</td>
                    <td><select name="combo" id="combo" required >
      <option value="" name="dato" id="datos2" selected="selected" >Selecciona un plantel </option>
      <?php 

						$conexion=mysql_connect("localhost","root","admin");
  						mysql_select_db("correspondencia",$conexion);
						$consulta = "SELECT * FROM planteles";
						$resultado = mysql_query($consulta,$conexion);
						while($filas=mysql_fetch_array($resultado))
						 {
						  echo "<option value=" .$filas['id_plantel'] . ">" . $filas['plantel'] . "</option>";
						}

					?>
    </select>
    
    </td>
                    <td>Perfil</td>
                    <td><select name="combo2"  id="combo2" required >
      <option value="" name="dato" id="datos2" selected="selected" >Selecciona un perfil </option>
      <?php 

						$conexion=mysql_connect("localhost","root","admin");
  						mysql_select_db("correspondencia",$conexion);
						$consulta = "SELECT * FROM perfil";
						$resultado = mysql_query($consulta,$conexion);
						while($filas=mysql_fetch_array($resultado))
						 {
						  echo "<option value=" .$filas['id_perfil'] . ">" . $filas['perfil'] . "</option>";
						}

					?>
    </select></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><input type="submit" name="EnviarRegis" id="EnviarRegis" value="Insertar" ></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
            </form>
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