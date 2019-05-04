<?php 
	include '../control/conexion.php';
	$correo = $conexion -> real_escape_string($_POST['correo']);

	$sel = $conexion -> query("SELECT idusuario FROM usuario WHERE correo = '$correo'");
	$row = mysqli_num_rows($sel);

	if ($row != 0) {
		echo "<label style='color: red;'>Este Correo ya esta en Uso</label>";
	}else{
		echo "<label style='color: green;'>El Correo se puede Registrar</label>";
	}

	$conexion -> close();
?>