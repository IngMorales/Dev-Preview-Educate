<?php 
	include '../control/conexion.php';
	$identificacion = $conexion -> real_escape_string($_POST['identificacion']);

	$sel = $conexion -> query("SELECT idusuario FROM usuario WHERE identificacion = '$identificacion'");
	$row = mysqli_num_rows($sel);

	if ($row != 0) {
		echo "<label style='color: red;'>Esta Identificación ya esta en Uso</label>";
	}else{
		echo "<label style='color: green;'>El Número se puede Registrar</label>";
	}

	$conexion -> close();
?>