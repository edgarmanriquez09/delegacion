<?php
	session_start();
	 $y = $_SESSION['no_trabajador'] ;

	$q = $_GET['correspondencia'];

		require('Conexionbd/conexion.php');
	$consulta = "SELECT * FROM corres  
							left join planteles on planteles.id_plantel = corres.id_plantel 
							left join usuarios on usuarios.no_trabajador = corres.no_trabajador
							where id_corres = $q "  ;

	$consulta2 = "SELECT * FROM corres  
							left join planteles on planteles.id_plantel = corres.id_plantel_origen where id_corres = $q "  ;





//ejecutamos la sentencia
$empresa_editar=mysql_query($consulta);
$fila = mysql_fetch_object($empresa_editar);

//ejecutamos la sentencia
$empresa_editar2=mysql_query($consulta2);
$fila2 = mysql_fetch_object($empresa_editar2);


if ($fila->status == '2' )
{
 echo "<SCRIPT LANGUAGE='javascript'>alert('YA FUE ENTREGADO ESTE PAQUETE'); </script>"; 

}
	
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
              
              <form action="entrega.php" method="post" >
                <table width="100%" border="0">
  <tr>
    <td width="175"><input type="text" name="id2" id="id2"   value="<?php echo $fila->status;?>"  style="visibility:hidden"></td>
    <td width="321"><input type="text" name="id" id="id"   style="visibility: hidden;" value="<? echo "$y" ?>"> </td>
    <td width="182">Folio</td>
    <td width="184"><?php echo $fila->id_corres;?></td>
    </tr>
  <tr>
    <td>Destinatario:</td>
    <td> <?php echo $fila->nombre;?> </td>
    <td>Fecha y Hora emitda</td>
    <td><?php echo $fila->fecha;?></td>
    </tr>
  <tr>
    <td>Procedencia</td>
    <td><?php echo $fila->plantel;?>  </td>
    <td>Dado de alta por</td>
    <td><?php echo $fila->nombre_empleado;?></td>
  </tr>
  <tr>
    <td>Destino</td>
    <td><?php echo $fila2->plantel;?>  </td>
    <td>&nbsp;</td
    >
    <td>&nbsp;</td
    ></tr>
  <tr>
    <td>Asunto</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td colspan="4"> <?php echo $fila->asunto;?> </td>
  </tr>
  <tr>
    <td colspan="4"><div align="center">Entrega</div></td>
    </tr>
  <tr>
    <td>Entregado (Nombre completo)</td>
    <td>
      <input type="text" name="nombre" id="nombre"></td>
    <td><input type="text" name="id" id="id"  value="<?php echo $fila2->id_corres;?>" style="visibility:hidden"> </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>No.trabajador</td>
    <td><label for="textfield2"></label>
      <input type="text" name="no_trabajador" id="no_trabajador"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><label for="textarea">
      <input type="submit" name="EnviarRegis" id="EnviarRegis" value="Enviar">
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
					<!-- end of footer-cols -->
					<div class="footer-bottom">
						<nav class="footer-nav">
							<!--<ul>
								<li><a href="index_root.html">INICIO</a></li>
								<li class="active"><a href="form_correspondencia.php">CORRESPONDENCIA</a></li>
								 <li><a href="form_lista_correspondencia.php">LISTADO</a></li>
								<li><a href="form_lista_estado.php">ESTADO</a></li>
								<li><a href="#">SALIR</a></li>
							</ul>-->
						</nav>
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