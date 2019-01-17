<?php
include '../modells/libs/conexion.php';
session_start();
if (isset($_SESSION['nombre_user']) && $_SESSION['role_user'] == 'admin') { ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Votaciones, un sitio web donde puedes votar por tus artistas preferidos dependiendo de sus generos.">
    <meta name="keywords" content="votaciones,musica,premios custodia">
    <meta name="author" content="Roberto Chacon A.">
	<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
	<title>votos</title>
	<script src="../js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../css/animate.css">
	<link rel="stylesheet" type="text/css" href="../css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="../css/toastr.css">
	<link rel="stylesheet" type="text/css" href="../fonts/material_icons/stylesheet.css">
	<link rel="icon" type="image/png" href="../img/logo.png">
</head>
<body>
	<header class="animated fadeInDown">
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
			<li><a href="../index.php">Inicio</a></li>
			<?php if($_SESSION['role_user'] == 'admin'){?>
			<li><a href="./categorias.php">Categorias</a></li>
			<li><a href="./participantes.php" class="activo">Participantes</a></li>
			<?php }else{ ?>
			<li><a href="../index.php">Novedades</a></li>
			<li><a href="../index.php">Categoria</a></li>
			<li><a href="../index.php">Galeria</a></li>
			<li><a href="../index.php">Comite Organizador</a></li>
			<li><a href="../index.php">Contacto</a></li>
			<?php } ?>
			<li><a href="./inscripcion.php">Inscribe a tu favorito</a></li>
			<li><a href="../modells/salir.php" style="color: red;">Salir</a></li>
		</ul>
	</div>

</header>

<center>
<div class="container">
	<!-- <div class="contenedor"> -->

<?php
$codigo_usuario = @$_SESSION['id_user'];
$con = Conexion::getConexion();
$votacion = $con->query("SELECT * FROM votacion");
echo "<center><br><br></center>";

?>


<div class="row">

<?php

while ($ver = mysqli_fetch_array($votacion)) { 

	$id_voto = $ver['id'];
	$sql_megustas = $con->query("SELECT * FROM megustas WHERE id_voto = '".$ver['id']."' AND codigo_usuario = '".$codigo_usuario."'");
	$verificar_megusta = mysqli_num_rows($sql_megustas); ?>


<div class="col s12 s6 m6 l4">
  <div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="../img/selecionados/<?php echo $ver['imagen'];?>">
    </div>
    <div class="card-content">
    	<span class="card-title activator grey-text text-darken-4"><?php echo $ver['nombre'];?><i class="material-icons right">more_vert</i></span>      <!--boton-->

    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Informacion.<i class="material-icons right">close</i></span>
      <span class="card-title grey-text text-darken-4"><?php echo $ver['nombre'];?></span>
      <p><?php echo $ver['biografia_logros'];?></p>
 
    </div>
  </div>
</div>


 <?php }	  ?>

			<!--ventana popup-->
			<div class="popup_background" id="popup">
				<div class="popup">
				<section class="texto">
					<h1>Gracias por tu voto</h1>
				</section>

				<section class="abajo">
					Redirecionando	
				</section>
				</div>
			</div>

</div>
</center>
 

</div>
<a class="waves-effect waves-teal btn-flat">
	<?php if (isset($_GET['mensaje'])) {echo "Datos incorrectos";}else{}?>
</a>

<!-- <script>
  $(document).ready(function(){
    $('.tabs').tabs();
  });
</script> -->
<script src="../js/jquery.js"></script>
<script src="../js/script.js"></script>
<script src="../js/cuenta_regresiva.js"></script>
<script src="../js/materialize.min.js"></script>
<script src="../js/toastr.min.js"></script>
</body>
</html>


<?php }else{ header("Location:./dentro.php");}
// require_once('vendor/autoload.php');
// require_once('App/Auth/Auth.php');
// Auth::getUserAuth();
?>

<!-- <a href="?login=Facebook">Facebook</a>
<a href="?login=Twitter">Twitter</a>
<a href="?login=Gmail">Gmail</a> -->
