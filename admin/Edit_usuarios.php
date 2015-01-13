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
	
    <script laguage="javascript">
		function activar(form)
		{
		if(form.asistente.options[0].selected || form.asistente.options[2].selected==true)
		{form.depe.disabled=true;}
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
<?php 
$no_trabajador=$_GET['no_trabajador'];
include('Conexionbd/conexion.php');
$link=conection();
$sqlsel=mysql_query("select * from usuarios  inner join perfil on perfil.id_perfil = usuarios.id_perfil inner join  planteles on planteles.id_plantel= usuarios.id_plantel inner join status on status.id_status=usuarios.id_status where  no_trabajador='".$no_trabajador."'; ", $link);
$selres=mysql_fetch_array($sqlsel);
?>
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
                        <li><a href="form_lista_usuarios.php">LISTADO</a></li>
						<li><a href="../admin/cerrar.php">SALIR</a></li>
					</ul>
              	  
				</nav>
				<!-- end of navigation -->
				<!-- slider -->	
				<!-- end of slider -->
				<!-- main -->
				<div class="main">					
				  <section class="post">
                    <h2><center>Editando Usuario</center></h2>
				  </section>
				</div>
              <div class="contenedor">
              <form action="actualizar.php" method="post">
              <table width="100%" border="0">
  <tr>
    <td>Status</td>
    <td><?php echo $selres['status'];?> </td>
    <td>&nbsp;</td>
    <td><input type="text" name="id" id="id"   value="<?php echo $selres['id'];?>" style="visibility:hidden" ></td>
  </tr>
  <tr>
    <td width="13%">Nombre</td>
    <td width="37%"><label for="textfield"></label>
      <input type="text" name="nombre_empleado" id="nombre_empleado" value="<?php echo $selres['nombre_empleado'];?>"> </td>
    <td width="13%">&nbsp;</td>
    <td width="37%"><label for="textfield4"></label></td>
  </tr>
  <tr>
    <td>No.Trabajador</td>
    <td><label for="textfield2"></label>
      <input type="text" name="no_trabajador" id="no_trabajador"   value="<?php echo $selres['no_trabajador'];?>" ></td>
    <td>Status</td>
    <td><select name="combo2"  >
      <option value="" name="dato" id="datos2">Selecciona un giro </option>
      <option value="1" name="dato" id="datos2" selected="selected" >ACTIVO </option>
      <option value="2" name="dato" id="datos2">INACTIVO </option>
    </select></td>
    </tr>
  <tr>
    <td>Plantel</td>
    <td><label for="textfield3"></label>
      <?php echo $selres['plantel'];?></td>
    <td>Plantel</td>
    <td><select name="combo"  >
      <option value="" name="dato" id="datos" selected="selected" >Selecciona un giro </option>
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
    </select></td>
    </tr>
  <tr>
    <td>Perfil</td>
    <td><input type="text" name="perfil" id="perfil"  value="<?php echo $selres['perfil'];?>" ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="text" name="password" id="password"  value="<?php echo $selres['password'];?>" ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input type="submit" name="EnviarRegis" id="EnviarRegis" value="Actualizar" ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
    </tr>
</table>
                </p>
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