<!DOCTYPE html>
<html lang="es">
<head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Aplicación de Operaciones con Ficheros</title> 
	<meta name="description" content="Free Bootstrap Theme"/>
	<meta name="keywords" content="Template, Theme, web, html5, css3, Bootstrap" />
	<meta name="author" content="Łukasz Holeczek from creativeLabs"/>
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: Facebook Open Graph -->
	<meta property="og:title" content=""/>
	<meta property="og:description" content=""/>
	<meta property="og:type" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:image" content=""/>
	<!-- end: Facebook Open Graph -->

    <!-- start: CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
	<!-- end: CSS -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
	
	<!--start: Header -->
	<header>
		
		<!--start: Container -->
		<div class="container">
			
			<!--start: Row -->
			<div class="row">
					
				<!--start: Logo -->
				<div class="logo span3">
						
					<a class="brand" href="#"><img src="../img/logo.png" alt="Logo"></a>
						
				</div>
				<!--end: Logo -->
					
				<!--start: Navigation -->
				<div class="span9">
					
					<div class="navbar navbar-inverse">
						<div class="nav-collapse collapse">
							<ul class="nav">
								<?php
									session_start();
									if (!isset($_SESSION['usuario']))
									{
                                ?>
								<li class="active"><a href="#">Sesión no iniciada</a></li>
                                <?php
									}else{
                                ?>                
                                <li class="active"><a href="#"><?php echo $_SESSION['usuario']." esta logueado";?> </a></li>
                                <?php
									}
								?>
								<li class="active"><a href="../index.php">Inicio</a></li>
							</ul>
						</div>
					</div>
				</div>	
				<!--end: Navigation -->
					
			</div>
			<!--end: Row -->
			
		</div>
		<!--end: Container-->			
			
	</header>
	<!--end: Header-->
	
	
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
		<div class="container">
			<!-- start: Hero Unit - Main hero unit for a primary marketing message or call to action -->
			<div>
            <?php
            include("../codigo/funciones.php");
            consultaindividual1($nombres);
            ?>
				<form id="newsletter" action="../codigo/principal.php?consulta" method="POST">
					<h3>Formulario Selecciona Nombre</h3>
                    <select name="nombre">
						<option value="">Seleccione:</option>
                        <?php
							for($i=0;$i<count($nombres);$i++){
								echo '<option value="'.$nombres[$i].'">'.$nombres[$i].' </option>';
							}
						?>
                    </select>
                    <br />
                    <br />
					<input type="submit" id="newsletter_submit" value="Enviar">
				</form>
			</div>
			<!-- end: Hero Unit -->

		</div>
		<!--end: Container-->
	
	</div>
	<!-- end: Wrapper  -->			

    <!-- start: Footer Menu -->
	<div id="footer-menu" class="hidden-tablet hidden-phone">

		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">

				<!-- start: Footer Menu Back To Top -->
				<div class="span1">
						
					<div id="footer-menu-back-to-top">
						<a href="#"></a>
					</div>
				
				</div>
				<!-- end: Footer Menu Back To Top -->
			
			</div>
			<!-- end: Row -->
			
		</div>
		<!-- end: Container  -->	

	</div>	
	<!-- end: Footer Menu -->

	<!-- start: Footer -->
	<div id="footer">
		
		<!-- start: Container -->
		<div class="container">
			


	<!-- start: Copyright -->
	<div id="copyright">
	
		<!-- start: Container -->
		<div class="container">
		
			<p>
				&copy; 2021, 1DAW. <a href="http://ieslaarboleda.es" alt="IesLaArboleda"></a> IES La Arboleda<img src="../img/poland2.png" alt="Poland" style="margin-top:-4px">
			</p>
	
		</div>
		<!-- end: Container  -->
		
	</div>	
	<!-- end: Copyright -->

<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery-1.8.2.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/flexslider.js"></script>
<script src="../js/carousel.js"></script>
<script src="../js/jquery.cslider.js"></script>
<script src="../js/slider.js"></script>
<script defer="defer" src="../js/custom.js"></script>
<!-- end: Java Script -->

</body>
</html>