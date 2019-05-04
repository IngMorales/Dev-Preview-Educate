<?php
include 'control/conexion.php';
# Iniciando la variable de control que permitirá mostrar o no el modal
$exibirModal = false;
# Verificando si existe o no la cookie
if ( !isset( $_COOKIE[ "mostrarModal" ] ) ) {
	# Caso no exista la cookie entra aquí
	# Creamos la cookie con la duración que queramos

	//$expirar = 0; // muestra cada 0 minutos
	//$expirar = 112.5; // muestra cada 1.87500 minutos
	$expirar = 225; // muestra cada 3.75 minutos
	//$expirar = 450; // muestra cada 7.5 minutos
	//$expirar = 900; // muestra cada 15 minutos
	//$expirar = 1800; // muestra cada 30 minutos
	//$expirar = 3600; // muestra cada 1 hora
	//$expirar = 10800; // muestra cada 3 horas
	//$expirar = 21600; //muestra cada 6 horas
	//$expirar = 43200; //muestra cada 12 horas
	//$expirar = 86400;  // muestra cada 24 horas
	setcookie( 'mostrarModal', 'SI', ( time() + $expirar ) ); // mostrará cada 12 horas.
	# Ahora nuestra variable de control pasará a tener el valor TRUE (Verdadero)
	$exibirModal = true;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<?php
	include_once( "control/conexion.php" );
	include_once( "interfaz/head.php" );
	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body class="signup-page">

	<div class="modal fade" id="modalInicio" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title" align="center">Bienvenidos a Asesorías Académicas Edúcate</h3>
				</div>
				<div class="modal-body" align="center">
					<p align="center">
						Las Inscripciones para el Curso PreICFES Semestral 2019 de Asesorías Académicas Edúcate se <strong>Cerraron</strong>, para mayor información puedes contactar con 320 375 7000 o 310 319 9146 (Cupos Disponibles).
					</p>
					
					<!-- 
					<p align="center">
						Registrándote en Nuestro Sistema estarás al tanto de toda la actualidad informativa vía correo electrónico, plataforma virtual para que no te pierdas ningún avance en materia de Educación.
					</p>
					-->

					<!--<p align="center">
						Una vez hayas pulsado el botón de registro, estarás aceptando nuestra política de protección de Datos, para mayor información pulsa el Botón PROTECCIÓN DE DATOS.
					</p>-->

					<a href="pdata.php" class="btn btn-danger">PROTECCIÓN DE DATOS</a>

					<p align="center" class="h3">
						<div class="alert alert-success">
							Tenemos habilitados nuestros números para <strong>CUPOS DISPONIBLES</strong> al Curso <strong>PreICFES Semestral</strong> que se realizara desde Febrero de 2019. Para Mayor información escribenos al correo electrónico <strong>asesoriasacademicaseducate@gmail.com</strong> o al 320 375 7000 o 310 319 9146
						</div>
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="leer" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title" align="center">Bienvenidos a Asesorías Académicas Edúcate</h3>
				</div>
				<div class="modal-body" align="center">
					<p align="center">
						<b>RECOMENDACIÓN:</b> El tamaño de la imagen de perfil debe tener un tamaño entre los 160x160 y los 200x200 pixeles, esto debido al manejo y tratamiendo de la información
					</p>

					<P align="center">
						Una vez hayas pulsado el botón de registro, estarás aceptando nuestra política de protección de Datos, para mayor información pulsa el Botón PROTECCIÓN DE DATOS.
					</P>

					<a href="pdata.php" class="btn btn-danger">PROTECCIÓN DE DATOS</a>

					<p align="center" class="h3">
						<img src="assets/img/pixeles.png" width="200" height="200">
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>

	<?php 
	include_once("interfaz/nav.php");
	?>

	<div class="wrapper">
		<div class="header header-filter" style="background-color: #808080 ; background-size: cover; background-position: top center;">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">

							<form class="form" method="post" action="control/registro_estudiante.php" enctype="multipart/form-data">
								<div class="header header-danger text-center">
									<h4>Registro de Estudiante</h4>
								</div>
								<div class="content">

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">contacts</i>
										</span>
									
										<input type="text" id="nombre1" name="nombre1" placeholder="Digite Primer Nombre" class="form-control" onkeypress="return soloLetras(event)" required="true"/>

										<span class="input-group-addon">
											<i class="material-icons">contacts</i>
										</span>
									
										<input type="text" id="nombre2" name="nombre2" class="form-control" placeholder="Digite Segundo Nombre" onkeypress="return soloLetras(event)"/>

									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">contacts</i>
										</span>
									
										<input type="text" id="apellido1" name="apellido1" placeholder="Digite Primer Apellido" class="form-control" onkeypress="return soloLetras(event)" required="true"/>

										<span class="input-group-addon">
											<i class="material-icons">contacts</i>
										</span>
									
										<input type="text" id="apellido2" name="apellido2" class="form-control" placeholder="Digite Segundo Apellido" onkeypress="return soloLetras(event)"/>
									</div>

									<div class="input-group">


										<span class="input-group-addon">
											<i class="material-icons">select_all</i>
										</span>
									
										<input type="text" id="identificacion" name="identificacion" class="form-control" placeholder="Digite Identificación" onblur="may(this.value, this.id)" onkeypress="return soloNumeros(event)" required="true"/>
										<div class="validacion_identificacion"></div>

										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
									
										<input type="email" id="correo" name="correo" class="form-control" placeholder="Digite Correo Eléctronico" onKeyUp="javascript:validarCorreo('correo')" onblur="may(this.value, this.id)" required="true"/>
										<div class="validacion_correo"></div>

									</div>

									<div class="input-group">


										<span class="input-group-addon">
											<i class="material-icons">phone</i>
										</span>
									
										<input type="text" id="telefono" name="telefono" class="form-control" placeholder="Digite Teléfono" onblur="may(this.value, this.id)" onkeypress="return soloNumeros(event)" required="true"/>
										<div class="validacion_telefono"></div>

										<span class="input-group-addon">
											<i class="material-icons">date_range</i>
										</span>
									
										<div class="form-control">
											<label for="fecha">Seleccione Fecha Nacimiento</label>
										</div>
										<input type="date" id="fecha" name="fecha" onblur="may(this.value, this.id)" class="form-control" required="true"/>
										<div class="validacion_fecha"></div>
										


									</div>

									<div class="input-group">


										<span class="input-group-addon">
											<i class="material-icons">location_city</i>
										</span>
									
										<input type="text" id="direccion" name="direccion" class="form-control" placeholder="Digite Dirección"/>

									</div>
									<div class="form-group">
										<div class="col-12 col-md-12">
											<select required name="colegio" id="colegio" class="form-control">
												<option value="">Seleccione Colegio</option>
												<?php
												$cole = "SELECT * FROM colegio";

												foreach ( $conexion->query( $cole ) as $institucion ) {

													if ( $institucion[ 'estado' ] == 1 ) {
														echo "<option value='" . $institucion[ 'idcolegio' ] . "'>" . $institucion[ 'nombre' ] . "</option>";
													}
												}
												?>
											</select>
										</div>
									</div>
									
									


									<div class="form-group">
										<div class="col-12 col-md-12">
											<select required name="sexo" id="sexo" class="form-control">
												<option value="">Seleccione Sexo</option>
												<?php
												$sex = "SELECT * FROM sexo";

												foreach ( $conexion->query( $sex ) as $sexualidad ) {

													if ( $sexualidad[ 'estado' ] == 1 ) {
														echo "<option value='" . $sexualidad[ 'idsexo' ] . "'>" . $sexualidad[ 'nombre' ] . "</option>";
													}
												}
												?>
											</select>
										</div>
									</div>


								</div>
								<div class="footer text-center">
									<button type="submit" class="btn btn-primary btn-lg" disabled>Registrarme</button>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>

			<?php 
			include_once("interfaz/footer.php");
			?>

		</div>

	</div>

	<?php 

if($exibirModal === true) : // Si nuestra variable de control "$exibirModal" es igual a TRUE activa nuestro modal y será visible a nuestro usuario. 

?>
	<script>
		$( document ).ready( function () {
			// id de nuestro modal
			$( "#modalInicio" ).modal( "show" );
		} );
	</script>
	<script type="text/javascript">
		$( '#identificacion' ).change( function () {
			$.post( 'interfaz/validacion_identificacion.php', {
				identificacion: $( '#identificacion' ).val(),

				beforeSend: function () {
					$( '.validacion_identificacion' ).html( "Espere un momento por favor..." );
				}
			}, function ( respuesta ) {
				$( '.validacion_identificacion' ).html( respuesta )
			} );
		} );


		$( '#correo' ).change( function () {
			$.post( 'interfaz/validacion_correo.php', {
				correo: $( '#correo' ).val(),

				beforeSend: function () {
					$( '.validacion_correo' ).html( "Espere un momento por favor..." );
				}
			}, function ( respuesta ) {
				$( '.validacion_correo' ).html( respuesta )
			} );
		} );

		$( '#telefono' ).change( function () {
			$.post( 'interfaz/validacion_telefono.php', {
				telefono: $( '#telefono' ).val(),

				beforeSend: function () {
					$( '.validacion_telefono' ).html( "Espere un momento por favor..." );
				}
			}, function ( respuesta ) {
				$( '.validacion_telefono' ).html( respuesta )
			} );
		} );
		
		$( '#fecha' ).change( function () {
			$.post( 'interfaz/validacion_fecha.php', {
				fecha: $( '#fecha' ).val(),

				beforeSend: function () {
					$( '.validacion_fecha' ).html( "Espere un momento por favor..." );
				}
			}, function ( respuesta ) {
				$( '.validacion_fecha' ).html( respuesta )
			} );
		} );

	</script>
	
	<?php endif; ?>

</body>
<?php 
include_once("interfaz/scripts.php");
?>

</html>