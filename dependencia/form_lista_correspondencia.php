<!DOCTYPE html>
<? 
@session_start();
$y = $_SESSION['id_plantel'] ;


?>
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
						<li><a href="index.php">INICIO</a></li>
						
                        <li class="active"><a href="#">LISTADO</a></li>
						<li><a href="../admin/cerrar.php">SALIR</a></li>
                        <center><img  id="panel" src="images/depe.png"/></center>
					</ul>
              	  
				</nav>
				<!-- end of navigation -->
				
				<!-- main -->
				<div class="main">					
				  <section class="post">
                    <h2><center>Listado correspondencia</center></h2>
				  </section>
				</div>
              <div class="contenedor">    	  
			  <center>
				<?php  

		require('Conexionbd/conexion.php');
	$query = "SELECT * FROM corres  inner join planteles on corres.id_plantel_origen= planteles.id_plantel   where corres.id_plantel = $y "  ;



$Resultado=mysql_query($query);

 echo  '<table width="100%" id="tabla" border="1" cellspacing="0" cellpadding="5">
          <tr>
            <th width="3%"><div align="center">Folio</div></th>
            <th width="14%"><div align="center">Fecha/Hora</div></th>
            <th width="20%"><div align="center">Nombre </div></th>
             <th width="20%"><div align="center">Plantel Origen </div></th>
             <th width="20%"><div align="center">STATUS </div></th>

            
            <th width="10%"><div align="center">Detalles </div></th>
        
          </tr>';
while($row=mysql_fetch_array($Resultado)){

	if ($row['status'] == 1  ){
   
		

	
		$mensaje ="ACTIVO";

	}else{

		$mensaje ="ENTREGADO";

	    
	}

        echo  '<tr>
            <td>'.$row['id_corres'].'</td>
            <td>'.$row['fecha'].'</td>
            <td>'.$row['nombre'].'</td>
             <td>'.$row['plantel'].'</td>
             <td  align="center" >'.$mensaje.'</td>

			<td align="center" ><a href="../pdf/pdf.php?correspondencia='.$row['id_corres'].'"><img src="images/pdf.png" width="25" height="25"> </a></td>
            </tr>';
      }
      echo  '</table>';

				?>
				</center>
				
                </div>
				<!-- end of main -->
				<!--<div class="socials">
					<div class="socials-inner">
					  <h3>Siguenos en:</h3>
						<ul>
							<li><a href="https://www.facebook.com/pages/Delegaci%C3%B3n-Regional-Manzanillo-Oficial/674548025909344?fref=ts" class="facebook-ico"><span></span>Facebook</a></li>
							<li><a href="#" class="twitter-ico"><span></span>Twitter</a></li>
						</ul>
						<div class="cl">&nbsp;</div>
					</div>
				</div>-->
				<div id="footer">
					<!-- end of footer-cols -->
					<div class="footer-bottom">
						<!--<nav class="footer-nav">
							<ul>
								<li><a href="index_secretaria.html">INICIO</a></li>
								<li ><a href="form_correspondencia.php">USUARIO</a></li>
								 <li class="active"><a href="form_lista_correspondencia.php">LISTADO</a></li>
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