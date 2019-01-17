<?php
include '../modells/libs/conexion.php';
session_start();
if (!isset($_SESSION['nombre_user']) && $_SESSION['role_user'] == 'admin') { header("Location:../index.php"); } ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
	<title>Premios</title>
	<script src="../js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../css/animate.css">
	<link rel="stylesheet" type="text/css" href="../css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="../fonts/material_icons/stylesheet.css">
	<link rel="icon" type="image/png" href="../img/logo.png">
</head>
<body class="fondo">
<header class="animated fadeIn">
	<div class="header">

	<div class="aside_header"></div>

	<div class="centro">
		<div class="logo">
			<!-- <img src="../img/logo.png" width="100"> -->
		</div>
			<div class="centro_centro">
			<div class="paquete">
				<div>
					<img src="../img/logo.png" class="logo_responsive" width="100"><br>
				</div>
				<div class="cajas">
					
					<center><h3>Votacion Mi Voz Para Cristo 2018</h3></center>
				</div>		
				<div class="cajas">
					<b><span id="contador"></span></b>
				</div>
			</div>	
			</div>
		<div class="redes">
			<!--Redes sociales-->
		</div>
	</div>
	<div class="aside_header"></div>
	</div>

	<label for="btn_menu" class="btn_menu"><img src="../img/menu.png"></label>
	<input type="checkbox" id="btn_menu">
	<div class="menu">
		<ul>
			<li><a href="../index.php" class="activo">Inicio</a></li>
			<?php if($_SESSION['role_user'] == 'admin'){?>
			<li><a href="./Categorias.php">Categorias</a></li>
			<li><a href="./participantes.php">Participantes</a></li>
			<?php }else{ ?>
			<li><a href="../index.php">Novedades</a></li>
			<li><a href="./categorias_participantes.php">Categorias</a></li>
			<li><a href="../index.php">Galeria</a></li>
			<li><a href="../index.php">Comite Organizador</a></li>
			<li><a href="../index.php">Contacto</a></li>
			<?php } ?>
			<!-- <li><a href="./inscripcion.php">Inscribe a tu favorito</a></li> -->
			<li><a href="../modells/salir.php" style="color: red;">Salir</a></li>
		</ul>
	</div>

</header>