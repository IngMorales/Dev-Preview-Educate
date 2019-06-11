<?php
session_start();

if ( isset( $_SESSION[ 'u_admin' ] ) ) {} else {
	header( "Location: ../index" );
}
?>

<!DOCTYPE html>
<html lang="es">
<?php
include '../control/conexion.php';
include 'interfaz/head.php';
?>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<?php 
    include 'interfaz/header.php';
    include 'interfaz/menu.php';
    ?>


		<div class="content-wrapper">

			<section class="content-header">
				<h1>
          Bienvenido
          <small>Editar Estudiante | <b>Edúcate</b></small>
        </h1>
			
				<ol class="breadcrumb">
					<li><a href="index"><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li class="active">Estudiante</li>
          <li class="active"><a href="gestionar-estudiante">Gestionar Estudiante</a></li>
          <li class="active">Editar Estudiante</li>
				</ol>
			</section>

			<section class="content">
				<div class="row">

					<div class="col-lg-12 col-xs-12">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Editar Estudiante</h3>
							</div>
							<?php
							$key = "d45s41_41s25_s412a";

							$id = intval(base64_decode($_GET[ 'idusuario' ].$key));
							$sql = mysqli_query( $conexion, "SELECT u.idusuario idusuario, u.usuario usuario,  u.nombre1 nombre1, u.nombre2 nombre2, u.apellido1 apellido1,
u.apellido2 apellido2, u.identificacion identificacion,u.correo correo, u.telefono telefono, u.direccion direccion, u.pass pass, u.nacimiento nacimiento, u.fk_sexo fk_sexo, u.fk_rol fk_rol, u.estado estado, s.nombre nombre FROM usuario u INNER JOIN sexo s
ON u.fk_sexo = s.idsexo WHERE idusuario='$id'" );
							if ( mysqli_num_rows( $sql ) == 0 ) {
								echo '<script language="javascript">
									window.location.href="../alertas.php?msj=NO se permite alterar Objetos en el Sistema&c=ruta&p=estudiante_bien&t=warning";
									</script>';
							} else {
								$row = mysqli_fetch_assoc( $sql );
							}
							?>
							<form role="form" action="../control/actualizar_estudiante.php" method="post">


								<div class="box-body">
									

									<div class="container">
										<div class="row">

											<div class="col-lg-3">

													<input type="hidden" class="form-control" id="idusuario" name="idusuario" value="<?php echo $row['idusuario']; ?>" readonly>
												
												
												<!--<div class="form-group text-center">
													<a href="#" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal_pass">Cambiar Contraseña</a>
												</div>-->

												<div class="form-group">
													<label for="nombre1">Primer Nombre</label>
													<input type="text" class="form-control" id="nombre1" name="nombre1" value="<?php echo $row['nombre1']; ?>" placeholder="Digite Primer Nombre"/>
												</div>

												<div class="form-group">
													<label for="nombre2">Segundo Nombre</label>
													<input type="text" class="form-control" id="nombre2" name="nombre2" value="<?php echo $row['nombre2']; ?>" placeholder="Digite Segundo Nombre"/>
												</div>

												<div class="form-group">
													<label for="apellido1">Primer Apellido</label>
													<input type="text" class="form-control" id="apellido1" name="apellido1" value="<?php echo $row['apellido1']; ?>" placeholder="Digite Primer Apellido"/>
												</div>
												
												<div class="form-group">
													<label for="apellido2">Segundo Apellido</label>
													<input type="text" class="form-control" id="apellido2" name="apellido2" value="<?php echo $row['apellido2']; ?>" placeholder="Digite Segundo Apellido"/>
												</div>
											</div>


											<div class="col-lg-4">
												<div class="form-group">
													<label for="apellido2">Segundo Apellido</label>
													<input type="text" class="form-control" id="apellido2" name="apellido2" value="<?php echo $row['apellido2']; ?>" placeholder="Digite Segundo Apellido"/>
												</div>

												<div class="form-group">
													<label for="identificacion">Identificación</label>
													<input type="text" class="form-control" id="identificacion" name="identificacion" onblur="may(this.value, this.id)" value="<?php echo $row['identificacion']; ?>" placeholder="Digite Identificación"/>
													<div class="validacion_identificacion"></div>
												</div>

												<div class="form-group">
													<label for="correo">Correo</label>
													<input type="email" class="form-control" id="correo" name="correo" onblur="may(this.value, this.id)" value="<?php echo $row['correo']; ?>" placeholder="Digite Correo"/>
													<div class="validacion_correo"></div>
												</div>

												<div class="form-group">
													<label for="telefono">Teléfono</label>
													<input type="text" class="form-control" id="telefono" name="telefono" onblur="may(this.value, this.id)" value="<?php echo $row['telefono']; ?>" placeholder="Digite Teléfono"/>
													<div class="validacion_telefono"></div>
												</div>
											</div>
											<div class="col-lg-4">
											
											<div class="form-group">
													<label for="nacimiento">Nacimiento</label>
													<input type="date" class="form-control" id="nacimiento" name="nacimiento" value="<?php echo $row['nacimiento']; ?>"/>
												</div>
												
												<div class="form-group">
													<label for="direccion">Dirección</label>
													<input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $row['direccion']; ?>" placeholder="Digite Dirección"/>
												</div>
												<div class="form-group">
												<label>Sexo</label>
													<input type="text" class="form-control" value="<?php echo $row['nombre']; ?>" readonly/>
													
													<label for="sexo">Seleccione Sexo</label>
													<br>
													<?php
													$sex = "SELECT * FROM sexo";

													foreach ( $conexion->query( $sex ) as $sexualidad ) {
														if ( $sexualidad[ 'estado' ] == 1 ) { ?>

														<label class="radio-inline">
															<input type="radio" name="sexo" id="sexo" value="<?php echo $sexualidad[ 'idsexo' ]; ?>" required="required"><?php echo $sexualidad[ 'nombre' ]; ?>
														</label>
														<?php }
													}
													?>
												</div>
												<div class="form-group">
													<input type="submit" name="update" id="update" value="Actualizar" class="btn btn-md btn-info btn-block"/>
													<a href="gestionar-estudiante" class="btn btn-md btn-danger btn-block">Cancelar</a>

												</div>

											</div>




										</div>

									</div>
								</div>
							</form>
						</div>

					</div>

				</div>
			</section>
		</div>
		<?php 
  include 'interfaz/footer.php';
  ?>
	</div>
	<?php 
include 'interfaz/script.php';
?>

<script type="text/javascript">

  $('#identificacion').change(function(){
    $.post('../interfaz/validacion_identificacion.php',{
      identificacion:$('#identificacion').val(),

      beforeSend: function(){
        $('.validacion_identificacion').html("Espere un momento por favor...");
      }
    }, function(respuesta){
      $('.validacion_identificacion').html(respuesta)
    });
  });

  $('#correo').change(function(){
    $.post('../interfaz/validacion_correo.php',{
      correo:$('#correo').val(),

      beforeSend: function(){
        $('.validacion_correo').html("Espere un momento por favor...");
      }
    }, function(respuesta){
      $('.validacion_correo').html(respuesta)
    });
  });

  $('#telefono').change(function(){
    $.post('../interfaz/validacion_telefono.php',{
      telefono:$('#telefono').val(),

      beforeSend: function(){
        $('.validacion_telefono').html("Espere un momento por favor...");
      }
    }, function(respuesta){
      $('.validacion_telefono').html(respuesta)
    });
  });

</script>
</body>

</html>