<?php
	session_start();
	 $y = $_SESSION['no_trabajador'] ;
	
?>

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
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
    	function namedepe(id){
			$.post("depe.php",{idDepe:id}, function(retorno){datos=retorno.split("/");
			$('#nombre').val(datos[0])
			$('#ape_completo').val(datos[1])
			$('#email').val(datos[2])
			$('#tel').val(datos[3])
			$('#cel').val(datos[4])
			});
			}
    </script>
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
						<li><a href="index.php">INICIO</a></li>
						<li class="active"><a href="form_correspondencia.php">Correspondencia</a></li>
                        <li><a href="form_lista_correspondencia.php">LISTADO</a></li>
						
						<li><a href="../admin/cerrar.php">SALIR</a></li>
                        <center><img  id="panel" src="images/secre.png"/></center>
					</ul>
              	  
				</nav>
				<!-- end of navigation -->
				<!-- slider -->
				<!--<div class="m-slider">
					<div class="slider-holder">
						<span class="slider-shadow"></span>
				  <span class="slider-b"></span></div>
				</div>		-->
				<!-- end of slider -->
				<!-- main -->
				<div class="main">					
				  <section class="post">
                    <h2><center>Registro de Correspondencia</center></h2>
				  </section>
				</div>
              <div class="contenedor">
              
              <form action="registro.php" method="post" >
                <table width="100%" border="0">
  				<tr>
    				<td width="116">&nbsp;</td>
    				<td width="116">&nbsp;</td>
    				<td width="118">&nbsp;</td>
    			</tr>
  				<tr>
    				<td><p>Destinatario:</p></td>
    				<!--<td><input type="text" name="nombre" id="nombre"  ></td>-->
    				<td><select name="combo3" id="combo3"  >
      					<option value="" name="dato" id="datos3" selected="selected" >Seleccionar Destinatario</option>
     					<?php 
							$conexion=mysql_connect("localhost","root","admin");
  							mysql_select_db("correspondencia",$conexion);
							$consulta = "SELECT * FROM usuarios";
							$resultado = mysql_query($consulta,$conexion);
							while($filas=mysql_fetch_array($resultado))
						 	{
						 		if ($filas['id_perfil']=='3') {
						 			echo "<option value=" .$filas['nombre_empleado'] . ">" . $filas['nombre_empleado'] . "</option>";
							}
						 		}
						  		
						?>
					</td>
    				<td><input type="text" name="id" id="id"   style="visibility: hidden;" value="<? echo "$y" ?>"></td>
    			</tr>
  				<tr>
    				<td>Plantel de Origen:</td>
   					<td>
							<input id="combo2" value=" Delegación Regional No. 1" disabled ></input>
    				</td>
    				<td>&nbsp;</td>
 				</tr>
  			<tr>
    				<td>Destino</td>
    				<td>
    				 <select name="combo" id="combo" >
      <option value="" name="dato" id="datos" selected="selected" >Selecciona un giro </option>
      <?php 

						$conexion=mysql_connect("localhost","root","admin");
  						mysql_select_db("correspondencia",$conexion);
						$consulta = "SELECT usuarios.nombre_empleado, usuarios.id_plantel, planteles.plantel FROM usuarios, planteles WHERE usuarios.id_plantel=planteles.plantel"; 
						$resultado = mysql_query($consulta,$conexion);
						while($filas=mysql_fetch_array($resultado))
						{
							
								echo "<option value=" .$filas['plantel'] . ">" . $filas['plantel'] . "</option>";
						}

					?>
    </select></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>Asunto</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2"><!--<a href="entregas.php">entregas--></a><textarea name="asunto" id="asunto" cols="1" rows="5"></textarea></td>
  </tr>
  <tr>
    <td colspan="3"><label for="textarea">
      <input type="submit"name="EnviarRegis" id="EnviarRegis"  value="Enviar">
    </label></td>
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
					<div class="footer-bottom">
						<!--<nav class="footer-nav">
							<ul>
								<li><a href="index_root.html">INICIO</a></li>
								<li class="active"><a href="form_correspondencia.php">CORRESPONDENCIA</a></li>
								 <li><a href="form_lista_correspondencia.php">LISTADO</a></li>
								<li><a href="form_lista_estado.php">ESTADO</a></li>
								<li><a href="#">SALIR</a></li>
							</ul>
						</nav>-->
						<p class="copy">&copy; Copyright 2014 Delegación Regional Manzanillo <span></span></p>
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