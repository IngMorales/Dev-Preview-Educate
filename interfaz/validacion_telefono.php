<?php 
	include '../control/conexion.php';
	$telefono = $conexion -> real_escape_string($_POST['telefono']);

	$sel = $conexion -> query("SELECT idusuario FROM usuario WHERE telefono = '$telefono'");
	$row = mysqli_num_rows($sel);

	if ($row != 0) {
		echo "<label style='color: red;'>Este Teléfono ya esta en Uso</label>";
	}else{
		echo "<label style='color: green;'>El Teléfono se puede Registrar</label>";
	}

	$conexion -> close();
?>