<?php
	$fecha = $_POST[ 'fecha' ];

	$fechaactual = date( 'Y-m-d' );
	$nuevafecha = strtotime( '-12 year', strtotime( $fechaactual ) );
	$nuevafecha = date( 'Y-m-d', $nuevafecha );



	if (strtotime( $fecha ) > strtotime( $nuevafecha )) {
		echo "<label style='color: red;'>Verifica Fecha de Nacimiento (Mayor a 12 Años)</label>";
	}else{
		echo "<label style='color: green;'>Fecha Nacimiento Valida</label>";
	}
?>