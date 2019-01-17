<?php
include('libs/conexion.php');

$categoria = $_POST['categoria'];
$nombre = $_POST['nombre'];
$biografia = $_POST['biografia'];
$imagen = $_FILES['imagen']['name'];
$fileimage = $_FILES['imagen']['tmp_name'];
$fecha = date('Y-m-d');

$ruta = "../img/selecionados";
$ruta = $ruta."/".$imagen;
// if(move_uploaded_file($fileimage, $ruta)){
move_uploaded_file($fileimage, $ruta);

$sql = "INSERT INTO votacion(categoria,nombre,imagen,megustas,fecha,biografia_logros) 
VALUES ('".$categoria."','".$nombre."','".$imagen."',0,'".$fecha."','".$biografia."')";

echo var_dump($_POST);

		if (Conexion::ejecutar($sql)) {
			// header('Location: ../success.php');
			echo "good";
			return true;
		}else{
			// header('Location: ../fail.php');
			echo "bad";
			return false;
		}

// echo var_dump($_POST);
// }else{
// 	// header('Location: ../fail.php');
// 	return false;
// }

?>