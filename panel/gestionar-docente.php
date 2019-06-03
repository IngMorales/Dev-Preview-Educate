<?php
session_start();

if ( isset( $_SESSION[ 'u_admin' ] ) == true || isset( $_SESSION[ 'u_user' ] ) == true || isset( $_SESSION[ 'u_teacher' ] ) == true ) {} else {
	header( "Location: ../index" );
}
?>

<!DOCTYPE html>
<html lang="es">
<?php
require '../control/conexion.php';
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
          	<small>
				<?php
				  if(@$_SESSION['u_admin'] == true){ ?>
					  Gestionar Docente
				  <?php }else{ ?>
					  Consultar Docente
				<?php } ?> | <b>Edúcate</b>
       		</small>
        </h1>
			


				<ol class="breadcrumb">
					<li><a href="index"><i class="fa fa-dashboard"></i> Inicio</a>
					</li>
					<li class="active">Docente</li>
					<li class="active"><a href="gestionar-docente">Gestionar Docente</a>
					</li>
				</ol>
			</section>

			<?php
			$key = "s412_s44s5_s412d_sdd4512d_d454sa5d25";
			$consulta = $conexion->query( "SELECT * FROM usuario WHERE fk_rol = 3" );
			$row = mysqli_num_rows( $consulta );
			?>

			<section class="content">
				<div class="row">
					<div class="col-xs-12">

						<?php 
			  if(@$_SESSION['u_user'] == true){ ?>
						<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Estimado Estudiante!</h4> Aquí se muestra la lista de Docentes adscriptos a la Empresa Asesorías Académicas Edúcate. Puede ver sus datos de Contacto para que pueda tener una comunicación Directa con el mismo.
						</div>
						<?php }else if(@$_SESSION['u_teacher'] == true){ ?>
						<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Estimado Docente!</h4> Aquí se muestra la lista de Docentes adscriptos a la Empresa Asesorías Académicas Edúcate. Puede ver sus datos de Contacto para que pueda tener una comunicación Directa con el mismo.
						</div>
						<?php }
			  ?>

						<div class="box">

							<?php 
                if (@$_SESSION['u_admin'] == true) { ?>
							<div class="box-header">
								<h3 class="box-title"><a class="btn btn-info" href="crear-docente">Agregar Nuevo <i class="fa fa-plus"></i></a></h3>

								<h3 class="box-title"><a class="btn btn-success" href="../control/bajar_docente_excel">Exportar Excel <i class="fa fa-file-excel-o"></i></a></h3>

								<div class="col-md-12 text-center">
									<?php $h1 = "Docentes Asesorías Académicas Edúcate";  
            	 						echo '<h3>'.$h1.'</h3>'
									?>
								</div>

							</div>
							<?php }
              ?>



							<?php 
              if(isset($_GET['action']) == 'eliminar'){
				  
                $id_delete = intval(base64_decode($_GET['idusuario'].$key));
                $query = mysqli_query($conexion, "SELECT * FROM usuario WHERE idusuario='$id_delete'");
                if(mysqli_num_rows($query) == 0){

                  echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Docente NO Se Encontro&c=ruta&p=teacher_bien&t=warning";
							</script>';

                }else{
                  $delete = mysqli_query($conexion, "UPDATE usuario SET estado=0 WHERE idusuario='$id_delete'");
                  if($delete){
                    echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Felicitaciones. El Docente Se Inactivo del Sistema&c=ruta&p=teacher_bien&t=success";
							</script>';

                  }else{
                    echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Docente NO se Inactivo del Sistema&c=ruta&p=teacher_bien&t=error";
							</script>';
                  }
                }
              }

              if(isset($_GET['active']) == 'activar'){
                $id_activar = intval(base64_decode($_GET['idusuario'].$key));
                $query = mysqli_query($conexion, "SELECT * FROM usuario WHERE idusuario='$id_activar'");
                if(mysqli_num_rows($query) == 0){

                  echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Docente NO Se Encontro&c=ruta&p=teacher_bien&t=warning";
							</script>';
                }else{
                  $delete = mysqli_query($conexion, "UPDATE usuario SET estado=1 WHERE idusuario='$id_activar'");
                  if($delete){
                    echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Felicitaciones. El Docente se Activo en el Sistema&c=ruta&p=teacher_bien&t=success";
							</script>';
                  }else{
                    echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Docente NO se Activo en el Sistema&c=ruta&p=teacher_bien&t=error";
							</script>';
                  }
                }
              }
							
			if(isset($_GET['push']) == 'borrar'){
                $id_activar = intval(base64_decode($_GET['idusuario'].$key));
                $query = mysqli_query($conexion, "SELECT * FROM usuario WHERE idusuario='$id_activar'");
                if(mysqli_num_rows($query) == 0){

                  echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Docente NO Se Encontro&c=ruta&p=teacher_bien&t=warning";
							</script>';
                }else{
                  $delete = mysqli_query($conexion, "DELETE FROM usuario WHERE idusuario='$id_activar'");
                  if($delete){
                    echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Felicitaciones. El Docente se Elimino del Sistema&c=ruta&p=teacher_bien&t=success";
							</script>';
                  }else{
                    echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Docente NO se Elimino del Sistema&c=ruta&p=teacher_bien&t=error";
							</script>';
                  }
                }
              }
              ?>
							<div class="box-body">
								<div class="table-responsive">
									<table id="gestionar" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Nombres</th>
												<?php
													if(@$_SESSION['u_admin'] == true){ ?>
														<th>Identificación</th>
													<?php }
												?>
												
												<th>Teléfono</th>
												<th>Correo</th>
												
												<?php 
												if(@$_SESSION['u_admin'] == true){ ?>
												<th>Estado</th>
												<th>Acción</th>
												<?php }
											?>

											</tr>
										</thead>
										<tbody>

											<?php while ($f = $consulta -> fetch_assoc()){ ?>
											<tr>
												<td>
													<?php echo utf8_decode($f['nombre1']." ".$f['nombre2']." ".$f['apellido1']." ".$f['apellido2']); ?>
												</td>
												<?php
													if(@$_SESSION['u_admin'] == true){ ?>
														<td>
															<?php echo $f['identificacion']; ?>
														</td>
													<?php }
												?>
												
												<td>
													<?php echo $f['telefono']; ?>
												</td>
												<td>
													<?php echo $f['correo']; ?>
												</td>
												
												<?php 
												if(@$_SESSION['u_admin'] == true){ ?>
												<td>
													<?php
													if ( $f[ 'estado' ] == 1 ) {
														echo "Activo <i style='color: green' class='fa fa-circle'> </i>";
													}

													if ( $f[ 'estado' ] == 0 ) {
														echo "Inactivo <i style='color: red' class='fa fa-circle'> </i>";
													}
													?>

												</td>
												<td align="center">
												
													
<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Acción
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
   <?php
    $usuario_id = base64_encode( $f[ 'idusuario' ] . $key );
	echo "<li><a href='editar-docente?idusuario=" . $usuario_id . "' title='Editar Docente'>Editar</a></li>";	
																						  
	echo "<li><a href='gestionar-docente?action=eliminar&idusuario=" . $usuario_id . "' title='Desactivar Docente'>Desactivar</a></li>";
																						  
	echo "<li><a href='gestionar-docente?active=activar&idusuario=" . $usuario_id . "' title='Activar Docente'>Activar</a></li>";	
													
	echo "<li><a href='gestionar-docente?push=borrar&idusuario=" . $usuario_id . "' title='Eliminar Docente'>Eliminar</a></li>";	
																						  
	?>
  </ul>
</div>

												</td>
												<?php }
											?>



											</tr>
											<?php } ?>
										</tbody>
										<tfoot>
											<tr>
												<th>Nombres</th>
												<?php
													if(@$_SESSION['u_admin'] == true){ ?>
														<th>Identificación</th>
													<?php }
												?>
												
												<th>Teléfono</th>
												<th>Correo</th>
												
												<?php 
												if(@$_SESSION['u_admin'] == true){ ?>
												<th>Estado</th>
												<th>Acción</th>
												<?php }
											?>

											</tr>
										</tfoot>
									</table>
								</div>
								<?php 
									if(@$_SESSION['u_admin'] == true){ ?>
								<form action="../control/reporte_docente_pdf.php" method="post">

									<input type="hidden" name="reporte_name" value="<?php echo $h1; ?>">
									<h3 class="box-title">
												<input type="submit" name="create_pdf" class="btn btn-danger" formtarget="_blank" value="Exportar PDF">
											</h3>
								
								</form>
								<?php }
								?>

							</div>

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
</body>

</html>