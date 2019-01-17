<?php include("header_out.php");?>

<script type="text/javascript">
	window.onload=function(){
	var antes = document.getElementById('carga');
	antes.style.display='none';}
</script>

<div id="carga"></div>

<center>
<div class="contenido">
	<div class="contenedor">
	<div class="categorias">

<?php
$con = Conexion::getConexion();
$categorias = $con->query("SELECT * FROM categorias");
echo "<center><br><br></center>";

?>
<?php while ($ver = mysqli_fetch_array($categorias)) { ?>

	<div>
		<a href="participantes_categoria.php?categoria=<?= $ver['id']; ?>">
			<section>
				<span><img src="../img/logo.png"></span>
				<div><?= $ver['nombre']; ?></div>
			</section>
		</a>
	</div>

<?php } ?>

	</div>
	</div>
</div>
</center>

<script src="../js/script.js"></script>
<script src="../js/cuenta_regresiva.js"></script>
<script src="../js/materialize.min.js"></script>
</body>
</html>