<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>


<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delegación Regional No. 1</title>

<!--STYLESHEETS-->
<link href="css/style2.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
<!--SCRIPTS-->


</head>

<body>

<!--WRAPPER-->
<div class="azul"></div>
<div class="encabezado">
	  <img src="images/encabezado.png" width="350" id="logo" />  
</div>
<div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
    <!--END SLIDE-IN ICONS-->

<!--LOGIN FORM-->
<form name="login-form" class="login-form" action="execute.php" method="post">

	<!--HEADER-->
    <div class="header">
    <!--TITLE--><h1>Iniciar sesión</h1><!--END TITLE-->
    <!--DESCRIPTION--><span>Ingresa los siguientes datos que se indican para poder iniciar sesión.</span><!--END DESCRIPTION-->
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
	<!--USERNAME--><input name="username" id="username" type="text" class="input username" value="No. Trabajador" onfocus="this.value=''"  /><!--END USERNAME-->
    <!--PASSWORD--><input name="password" id="password" type="password" class="input password" value="Password" onfocus="this.value=''" /><!--END PASSWORD-->
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer">
    <!--LOGIN BUTTON--><input type="submit" name="submit" value="Iniciar" class="button" /><!--END LOGIN BUTTON-->
    </div>
    <!--END FOOTER-->

</form>
<!--END LOGIN FORM-->
<div class="gradient"><p><center>© Derechos Reservados 2013-2016 Universidad de Colima</center></p></div>
</div>


<!--END WRAPPER-->
<!--GRADIENT--><!--END GRADIENT-->


</body>
</html>
