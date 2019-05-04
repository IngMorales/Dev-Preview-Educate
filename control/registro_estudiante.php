<?php
$nombre1 = $_POST[ "nombre1" ];
$nombre2 = $_POST[ "nombre2" ];
$apellido1 = $_POST[ "apellido1" ];
$apellido2 = $_POST[ "apellido2" ];
$identificacion = $_POST[ "identificacion" ];
$fecha = $_POST[ 'fecha' ];
$telefono = $_POST[ "telefono" ];
$correo = $_POST[ "correo" ];
$direccion = $_POST[ 'direccion' ];
$colegio = $_POST[ 'colegio' ];
$sexo = $_POST[ 'sexo' ];

//$pass = md5( $identificacion );
$pass = base64_encode( $identificacion );

$fechaactual = date( 'Y-m-d' );
$nuevafecha = strtotime( '-12 year', strtotime( $fechaactual ) );
$nuevafecha = date( 'Y-m-d', $nuevafecha );

include( "conexion.php" );

if ( $colegio == '0' ) {
	header( 'location: ../alertas.php?msj=Lo Sentimos! Seleccione Colegio&c=ruta&p=estudiante_error&t=warning' );
}

if ( $sexo == '0' ) {
	header( 'location: ../alertas.php?msj=Lo Sentimos! Seleccione Sexo&c=ruta&p=estudiante_error&t=warning' );
}

if ( strtotime( $fecha ) > strtotime( $nuevafecha ) ) {
	header( 'location: ../alertas.php?msj=Lo Sentimos! Error en la Fecha de Nacimiento (Verificar que sea Mayor a 12)&c=registro&p=registrar&t=warning' );
} else {

	$grupo1 = "SELECT COUNT(*) total FROM usuario WHERE fk_grupo='1'";
	$result1 = mysqli_query( $conexion, $grupo1 );
	$row1 = mysqli_fetch_assoc( $result1 );

	if ( $row1[ 'total' ] < 30 ) {
		$insertar = "INSERT INTO usuario (usuario, nombre1, nombre2, apellido1, apellido2, identificacion, correo, telefono, direccion, pass, nacimiento, fk_colegio, fk_sexo, fk_rol, fk_grupo, estado) 
		VALUES ('$identificacion', '$nombre1', '$nombre2', '$apellido1', '$apellido2', '$identificacion', '$correo', '$telefono', '$direccion', '$pass', '$fecha', '$colegio', '$sexo', '2', '1', '1')";

		if ( $conexion->query( $insertar ) == true ) {
			header( 'location: ../alertas.php?msj=Felicitaciones. Registro Correcto. LOS DATOS DE ACCESO DE ENTREGARAN AL INICIO DEL CURSO PREICFES&c=ruta&p=estudiante_bien&t=success' );
		} else {
			header( 'location: ../alertas.php?msj=Error. Vuelve a Intentarlo&c=ruta&p=estudiante_error&t=error' );
		}
	} else {
		$grupo2 = "SELECT COUNT(*) total FROM usuario WHERE fk_grupo='2'";
		$result2 = mysqli_query( $conexion, $grupo2 );
		$row2 = mysqli_fetch_assoc( $result2 );

		if ( $row2[ 'total' ] < 30 ) {
			$insertar = "INSERT INTO usuario (usuario, nombre1, nombre2, apellido1, apellido2, identificacion, correo, telefono, direccion, pass, nacimiento, fk_colegio, fk_sexo, fk_rol, fk_grupo, estado) 
			VALUES ('$identificacion', '$nombre1', '$nombre2', '$apellido1', '$apellido2', '$identificacion', '$correo', '$telefono', '$direccion', '$pass', '$fecha', '$colegio', '$sexo', '2', '2', '1')";

			if ( $conexion->query( $insertar ) == true ) {
				header( 'location: ../alertas.php?msj=Felicitaciones. Registro Correcto. LOS DATOS DE ACCESO DE ENTREGARAN AL INICIO DEL CURSO PREICFES&c=ruta&p=estudiante_bien&t=success' );
			} else {
				header( 'location: ../alertas.php?msj=Error. Vuelve a Intentarlo&c=ruta&p=estudiante_error&t=error' );
			}

		} else {
			$grupo3 = "SELECT COUNT(*) total FROM usuario WHERE fk_grupo='3'";
			$result3 = mysqli_query( $conexion, $grupo3 );
			$row3 = mysqli_fetch_assoc( $result3 );

			if ( $row3[ 'total' ] < 30 ) {

				$insertar = "INSERT INTO usuario (usuario, nombre1, nombre2, apellido1, apellido2, identificacion, correo, telefono, direccion, pass, nacimiento, fk_colegio, fk_sexo, fk_rol, fk_grupo, estado) 
				VALUES ('$identificacion', '$nombre1', '$nombre2', '$apellido1', '$apellido2', '$identificacion', '$correo', '$telefono', '$direccion', '$pass', '$fecha', '$colegio', '$sexo', '2', '3', '1')";

				if ( $conexion->query( $insertar ) == true ) {
					header( 'location: ../alertas.php?msj=Felicitaciones. Registro Correcto. LOS DATOS DE ACCESO DE ENTREGARAN AL INICIO DEL CURSO PREICFES&c=ruta&p=estudiante_bien&t=success' );
				} else {
					header( 'location: ../alertas.php?msj=Error. Vuelve a Intentarlo&c=ruta&p=estudiante_error&t=error' );
				}

			} else {
				$grupo4 = "SELECT COUNT(*) total FROM usuario WHERE fk_grupo='4'";
				$result4 = mysqli_query( $conexion, $grupo4 );
				$row4 = mysqli_fetch_assoc( $result4 );

				if ( $row4[ 'total' ] < 30 ) {
					$insertar = "INSERT INTO usuario (usuario, nombre1, nombre2, apellido1, apellido2, identificacion, correo, telefono, direccion, pass, nacimiento, fk_colegio, fk_sexo, fk_rol, fk_grupo, estado) 
					VALUES ('$identificacion', '$nombre1', '$nombre2', '$apellido1', '$apellido2', '$identificacion', '$correo', '$telefono', '$direccion', '$pass', '$fecha', '$colegio', '$sexo', '2', '4', '1')";

					if ( $conexion->query( $insertar ) == true ) {
						header( 'location: ../alertas.php?msj=Felicitaciones. Registro Correcto. LOS DATOS DE ACCESO DE ENTREGARAN AL INICIO DEL CURSO PREICFES&c=ruta&p=estudiante_bien&t=success' );
					} else {
						header( 'location: ../alertas.php?msj=Error. Vuelve a Intentarlo&c=ruta&p=estudiante_error&t=error' );
					}
				} else {

					$grupo5 = "SELECT COUNT(*) total FROM usuario WHERE fk_grupo='5'";
					$result5 = mysqli_query( $conexion, $grupo5 );
					$row5 = mysqli_fetch_assoc( $result5 );

					if ( $row5[ 'total' ] < 30 ) {
						$insertar = "INSERT INTO usuario (usuario, nombre1, nombre2, apellido1, apellido2, identificacion, correo, telefono, direccion, pass, nacimiento, fk_colegio, fk_sexo, fk_rol, fk_grupo, estado) 
						VALUES ('$identificacion', '$nombre1', '$nombre2', '$apellido1', '$apellido2', '$identificacion', '$correo', '$telefono', '$direccion', '$pass', '$fecha', '$colegio', '$sexo', '2', '5', '1')";

						if ( $conexion->query( $insertar ) == true ) {
							header( 'location: ../alertas.php?msj=Felicitaciones. Registro Correcto. LOS DATOS DE ACCESO DE ENTREGARAN AL INICIO DEL CURSO PREICFES&c=ruta&p=estudiante_bien&t=success' );
						} else {
							header( 'location: ../alertas.php?msj=Error. Vuelve a Intentarlo&c=ruta&p=estudiante_error&t=error' );
						}
					} else {
						$grupo6 = "SELECT COUNT(*) total FROM usuario WHERE fk_grupo='6'";
						$result6 = mysqli_query( $conexion, $grupo6 );
						$row6 = mysqli_fetch_assoc( $result6 );

						if ( $row6[ 'total' ] < 30 ) {
							$insertar = "INSERT INTO usuario (usuario, nombre1, nombre2, apellido1, apellido2, identificacion, correo, telefono, direccion, pass, nacimiento, fk_colegio, fk_sexo, fk_rol, fk_grupo, estado) 
						VALUES ('$identificacion', '$nombre1', '$nombre2', '$apellido1', '$apellido2', '$identificacion', '$correo', '$telefono', '$direccion', '$pass', '$fecha', '$colegio', '$sexo', '2', '6', '1')";

							if ( $conexion->query( $insertar ) == true ) {
								header( 'location: ../alertas.php?msj=Felicitaciones. Registro Correcto. LOS DATOS DE ACCESO DE ENTREGARAN AL INICIO DEL CURSO PREICFES&c=ruta&p=estudiante_bien&t=success' );
							} else {
								header( 'location: ../alertas.php?msj=Error. Vuelve a Intentarlo&c=ruta&p=estudiante_error&t=error' );
							}
						} else {
							$grupo7 = "SELECT COUNT(*) total FROM usuario WHERE fk_grupo='7'";
						$result7 = mysqli_query( $conexion, $grupo7 );
						$row7 = mysqli_fetch_assoc( $result7 );

						if ( $row7[ 'total' ] < 30 ) {
							$insertar = "INSERT INTO usuario (usuario, nombre1, nombre2, apellido1, apellido2, identificacion, correo, telefono, direccion, pass, nacimiento, fk_colegio, fk_sexo, fk_rol, fk_grupo, estado) 
						VALUES ('$identificacion', '$nombre1', '$nombre2', '$apellido1', '$apellido2', '$identificacion', '$correo', '$telefono', '$direccion', '$pass', '$fecha', '$colegio', '$sexo', '2', '7', '1')";

							if ( $conexion->query( $insertar ) == true ) {
								header( 'location: ../alertas.php?msj=Felicitaciones. Registro Correcto. LOS DATOS DE ACCESO DE ENTREGARAN AL INICIO DEL CURSO PREICFES&c=ruta&p=estudiante_bien&t=success' );
							} else {
								header( 'location: ../alertas.php?msj=Error. Vuelve a Intentarlo&c=ruta&p=estudiante_error&t=error' );
							}
						} else {
							header( 'location: ../alertas.php?msj=Lo Sentimos. El Registro NO se Realizo. NO QUEDAN CUPOS DISPONIBLES EN EL SISTEMA. LLAMA A LAS LINEAS 3203757000 - 3103199146&c=ruta&p=estudiante_error&t=warning' );
						}
						}
					}
				}
			}
		}
	}
	//$grupo = $conexion -> query("SELECT*FROM grupo");
	//$resultado = mysqli_fetch_array($grupo);
}

$conexion->close();
?>