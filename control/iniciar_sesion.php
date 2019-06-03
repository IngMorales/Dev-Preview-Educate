<?php
session_start();

$user = $_POST[ "usuario" ];
$pass = $_POST[ "pass" ];

//$encriptado = md5( $pass );
$encriptado = base64_encode( $pass );

include( "conexion.php" );

$usuario = $conexion->query( "SELECT*FROM usuario WHERE usuario='$user' AND pass='$encriptado' AND estado = '1'" );
$resultado = mysqli_fetch_array( $usuario );


if ( $resultado[ 'fk_rol' ] == 1 ) {


	if ( $resultado[ 'estado' ] == 0 ) {
		header( 'location: ../alertas.php?msj=Usuario Inactivo&c=login&p=iniciar&t=error' );
	} else {
		$_SESSION[ 'u_admin' ] = $user;
		$_SESSION[ 'tiempo_admin' ] = time();
		$_SESSION[ 'idusuario' ] = $resultado[ 'idusuario' ];
		$_SESSION[ 'rol' ] = $resultado[ 'fk_rol' ];
		$_SESSION[ 'nombre1' ] = $resultado[ 'nombre1' ];
		$_SESSION[ 'nombre2' ] = $resultado[ 'nombre2' ];
		$_SESSION[ 'apellido1' ] = $resultado[ 'apellido1' ];
		$_SESSION[ 'apellido2' ] = $resultado[ 'apellido2' ];
		$_SESSION[ 'usuario' ] = $resultado[ 'usuario' ];
		$_SESSION[ 'identificacion' ] = $resultado[ 'identificacion' ];
		$_SESSION[ 'correo' ] = $resultado[ 'correo' ];
		$_SESSION[ 'telefono' ] = $resultado[ 'telefono' ];
		$_SESSION[ 'pass' ] = $resultado[ 'pass' ];
		$_SESSION[ 'sexo' ] = $resultado[ 'fk_sexo' ];
		header( 'location: ../alertas.php?msj=Felicitaciones! Inicio de Sesion Administrador&c=ruta&p=inicio&t=success' );
	}
} else if ( $resultado[ 'fk_rol' ] == 2 ) {


	if ( $resultado[ 'estado' ] == 0 ) {
		header( 'location: ../alertas.php?msj=Usuario Inactivo&c=login&p=iniciar&t=error' );
	} else {
		$_SESSION[ 'u_user' ] = $user;
		$_SESSION[ 'tiempo_user' ] = time();
		$_SESSION[ 'idusuario' ] = $resultado[ 'idusuario' ];
		$_SESSION[ 'rol' ] = $resultado[ 'fk_rol' ];
		$_SESSION[ 'nombre1' ] = $resultado[ 'nombre1' ];
		$_SESSION[ 'nombre2' ] = $resultado[ 'nombre2' ];
		$_SESSION[ 'apellido1' ] = $resultado[ 'apellido1' ];
		$_SESSION[ 'apellido2' ] = $resultado[ 'apellido2' ];
		$_SESSION[ 'usuario' ] = $resultado[ 'usuario' ];
		$_SESSION[ 'identificacion' ] = $resultado[ 'identificacion' ];
		$_SESSION[ 'correo' ] = $resultado[ 'correo' ];
		$_SESSION[ 'telefono' ] = $resultado[ 'telefono' ];
		$_SESSION[ 'pass' ] = $resultado[ 'pass' ];
		$_SESSION[ 'sexo' ] = $resultado[ 'fk_sexo' ];
		header( 'location: ../alertas.php?msj=Felicitaciones! Inicio de Sesion Estudiante&c=ruta&p=inicio&t=success' );
	}
} elseif ( $resultado[ 'fk_rol' ] == 3 ) {
	if ( $resultado[ 'estado' ] == 0 ) {
		header( 'location: ../alertas.php?msj=Usuario Inactivo&c=login&p=iniciar&t=error' );
	} else {
		$_SESSION[ 'u_teacher' ] = $user;
		$_SESSION[ 'tiempo_teacher' ] = time();
		$_SESSION[ 'idusuario' ] = $resultado[ 'idusuario' ];
		$_SESSION[ 'rol' ] = $resultado[ 'fk_rol' ];
		$_SESSION[ 'nombre1' ] = $resultado[ 'nombre1' ];
		$_SESSION[ 'nombre2' ] = $resultado[ 'nombre2' ];
		$_SESSION[ 'apellido1' ] = $resultado[ 'apellido1' ];
		$_SESSION[ 'apellido2' ] = $resultado[ 'apellido2' ];
		$_SESSION[ 'usuario' ] = $resultado[ 'usuario' ];
		$_SESSION[ 'identificacion' ] = $resultado[ 'identificacion' ];
		$_SESSION[ 'correo' ] = $resultado[ 'correo' ];
		$_SESSION[ 'telefono' ] = $resultado[ 'telefono' ];
		$_SESSION[ 'pass' ] = $resultado[ 'pass' ];
		$_SESSION[ 'sexo' ] = $resultado[ 'fk_sexo' ];
		header( 'location: ../alertas.php?msj=Felicitaciones! Inicio de Sesion Docente&c=ruta&p=inicio&t=success' );
	}
} else {
	header( 'location: ../alertas.php?msj=Usuario y/o Password Incorrecto&c=login&p=iniciar&t=error' );
}
$conexion->close();
?>