
<?php include("header_out.php");?>

<script type="text/javascript">
	window.onload=function(){
	var antes = document.getElementById('carga');
	antes.style.display='none';}
</script>
<div id="carga"></div>
<center>
<div class="container">
	<div class="row">



<?php
//sesion de usuario
$codigo_usuario = @$_SESSION['id_user'];
//conexion
$con = Conexion::getConexion();
//obteniendo la categoria por get
$categoria = mysqli_real_escape_string($con, $_GET['categoria']);

$votacion = $con->query("SELECT * FROM votacion WHERE categoria ='".$categoria."'");
echo "<center><br><br></center>";

?>
<div class="">
	<div class="">
		<!--pasando el valor a la categria-->
		<input type="hidden" name="categoria" id="categoria" value="<?= $categoria;?>">
<?php

while ($ver = mysqli_fetch_array($votacion)) { 

	$id_voto = $ver['id'];
	$sql_megustas = $con->query("SELECT * FROM megustas WHERE id_voto = '".$ver['id']."' AND codigo_usuario = '".$codigo_usuario."'");	
	 

	$verificar_megusta = mysqli_num_rows($sql_megustas); ?>

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


	<div class="col s12 s6 m6 l4">
  <div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="../img/selecionados/<?php echo $ver['imagen'];?>" height="200">
    </div>
    <div class="card-content">
    	<span class="card-title activator grey-text text-darken-4"><?php echo $ver['nombre'];?><i class="material-icons right">more_vert</i></span>      <!--boton-->
		 <?php

		$verificar_selecion = $con->query("SELECT * FROM megustas WHERE codigo_usuario = '".$codigo_usuario."' AND codigo_categoria = '".$categoria."'");
			
		if (mysqli_num_rows($verificar_selecion) > 0){ 
			echo "<button class='button'>Ya votaste</button>";
		}else{

		 if ($verificar_megusta == 0) { ?>
			<input type="submit" onclick="onpopup();" class="id_selecion button" id="<?php echo $ver['id'];?>" value="Votar">
			<?php }else{ ?>
				<input type="submit" class="id_selecion button" id="<?php echo $ver['id'];?>" value="Selecionado">

		<?php } }?>	

    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Informacion.<i class="material-icons right">close</i></span>
      <hr>
      <span class="card-title grey-text text-darken-3"><?php echo $ver['nombre'];?></span>
      <p><?php echo $ver['biografia_logros'];?></p>
    </div>
  </div>
</div>


<?php }	  ?>
		</div>
	</div>
</div>
</center>
<script src="../js/script.js"></script>
<script src="../js/cuenta_regresiva.js"></script>
<script src="../js/materialize.min.js"></script>
</body>
</html>
