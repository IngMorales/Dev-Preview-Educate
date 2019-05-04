<?php 
	include '../control/conexion.php';
	$usuario = $conexion -> real_escape_string($_POST['usuario']);

	$sel = $conexion -> query("SELECT idusuario FROM usuario WHERE usuario = '$usuario'");
	$row = mysqli_num_rows($sel);

	if ($row != 0) {
		echo "<label style='color: red;'>Este Usuario ya esta en Uso</label>";
	}else{
		echo "<label style='color: green;'>El Usuario se puede Registrar</label>";
	}

	$conexion -> close();
?>