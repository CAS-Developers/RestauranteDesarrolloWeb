<html>
<head>
		<title ><?php echo $title; ?>La Langosta Azul</title>

		<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css');?>">
		<link rel="stylesheet" href="<?php echo base_url('css/bootstrap-theme.min.css');?>">
		<style>
		body {
			padding-top: 20px;
			padding-bottom: 20px;
			}

			.navbar {
				margin-bottom: 5px;
			}

			#cuerpo1{
	  				width: 790px;
	  				margin-left: 208px;
	  				padding: 12px 0px 10px 0px;
				}

		#pie{
			clear: both;
		}
		</style>
</head>

<header>
	<div class="container-fluid">
		<div class="row">
		<!-- Static navbar -->
		<nav class="navbar navbar-default">
			<!--<div class="container-fluid">-->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">La langosta Azul</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li ><a href="<?php echo base_url('index.php/welcome');?>">Inicio</a></li>
						<li><a class="dropdown-toggle" data-toggle="dropdown" role="button"
										aria-haspopup="true" aria-expanded="false">Cocineros<span class="caret"></span></a>
											<ul class="dropdown-menu">
													<li><a href="<?php echo base_url('index.php/crudcocineros');?>">Lista de cocineros</a></li>
													<li><a href="<?php echo base_url('index.php/crudcocineros/crear');?>">Agregar Cocinero</a></li>
											</ul>
					</li>
						<li><a class="dropdown-toggle" data-toggle="dropdown" role="button"
										aria-haspopup="true" aria-expanded="false">Recetas<span class="caret"></span></a>
											<ul class="dropdown-menu">
													<li><a href="<?php echo base_url('index.php/crudrecetas');?>">Lista de recetas</a></li>
													<li><a href="<?php echo base_url('index.php/crudrecetas/crear');?>">Agregar receta</a></li>
											</ul>
						</li>
						<li><a class="dropdown-toggle" data-toggle="dropdown" role="button"
										aria-haspopup="true" aria-expanded="false">Clientes<span class="caret"></span></a>
												<ul class="dropdown-menu">
														<li><a href="<?php echo base_url('index.php/crudclientes');?>">Lista de clientes</a></li>
														<li><a href="<?php echo base_url('index.php/crudclientes/crear');?>">Agregar cliente</a></li>
												</ul>
						</li>
						<li><a href="<?php echo base_url('index.php/welcome/video');?>">Videos</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			<!--</div>/.container-fluid -->
		</nav>

</header>

<script src="<?php echo base_url('js/JQuery/jquery-1.11.3.min.js');?>"> </script>
<script src="<?php echo base_url('js/bootstrap.min.js');?>"> </script>

<body>
	<div class="container-fluid" >
		<h2><?php echo $title; ?> </h2>
