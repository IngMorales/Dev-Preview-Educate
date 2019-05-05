<?php
session_start();

if ( isset( $_SESSION[ 'u_admin' ] ) == true || isset( $_SESSION[ 'u_teacher' ] ) == true ) {} else {
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
          <small>Gestionar Estudiante | <b>Edúcate</b></small>
        </h1>
			
				<ol class="breadcrumb">
					<li><a href="index"><i class="fa fa-dashboard"></i> Inicio</a>
					</li>
					<li class="active">Estudiante</li>
					<li class="active"><a href="gestionar-estudiante">Gestionar Estudiante</a>
					</li>
				</ol>
			</section>
			<?php
			$key = "d45s41_41s25_s412a";
			$consulta = $conexion->query( "SELECT * FROM usuario WHERE fk_rol = 2" );
			$row = mysqli_num_rows( $consulta );
			?>
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<?php 
			  if(@$_SESSION['u_teacher'] == true){ ?>
						<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Estimado Docente!</h4> Aquí puede ver la lista de todos los estudiantes adscriptos al curso PreICFES de Asesorías Académicas Edúcate para el periodo actual.
						</div>
						<?php }
			  ?>
						<div class="box">

							<?php 

              if (@$_SESSION['u_admin'] == true) { ?>
							<div class="box-header">
								<h3 class="box-title"><a class="btn btn-danger" href="subir-archivo-listado"><i class="fa fa-plus"> </i> Subir Archivo </a></h3>
							
								<h3 class="box-title"><a class="btn btn-info" href="crear-estudiante">Agregar Nuevo <i class="fa fa-plus"></i></a></h3>

								<h3 class="box-title"><a class="btn btn-success" href="../control/bajar_estudiante_excel.php">Exportar Excel <i class="fa fa-file-excel-o"></i></a></h3>

								<div class="col-md-12 text-center">
									<?php $h1 = "Estudiantes Asesorías Académicas Edúcate";  
            	 		echo '<h3>'.$h1.'</h3>'
					?>
								</div>
							</div>
							<?php }else if(@$_SESSION['u_teacher'] == true){ ?>
							<div class="box-header">
								<h3 class="box-title"><a class="btn btn-success" href="../control/bajar_estudiante_excel.php">Exportar Excel <i class="fa fa-file-excel-o"></i></a></h3>

								<div class="col-md-12 text-center">
									<?php $h1 = "Estudiantes Asesorías Académicas Edúcate";  
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
							window.location.href="../alertas.php?msj=Error. El Estudiante NO Se Encontro&c=ruta&p=estudiante_bien&t=warning";
							</script>';

                }else{
                  $delete = mysqli_query($conexion, "UPDATE usuario SET estado=0 WHERE idusuario='$id_delete'");
                  if($delete){
                    echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Felicitaciones. El Estudiante Se Inactivo del Sistema&c=ruta&p=estudiante_bien&t=success";
							</script>';

                  }else{
                    echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Estudiante NO se Inactivo del Sistema&c=ruta&p=estudiante_bien&t=error";
							</script>';
                  }
                }
              }

              if(isset($_GET['active']) == 'activar'){
                $id_activar = intval(base64_decode($_GET['idusuario'].$key));
                $query = mysqli_query($conexion, "SELECT * FROM usuario WHERE idusuario='$id_activar'");
                if(mysqli_num_rows($query) == 0){

                  echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Estudiante NO Se Encontro&c=ruta&p=estudiante_bien&t=warning";
							</script>';
                }else{
                  $delete = mysqli_query($conexion, "UPDATE usuario SET estado=1 WHERE idusuario='$id_activar'");
                  if($delete){
                    echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Felicitaciones. El Estudiante Se Activo en el Sistema&c=ruta&p=estudiante_bien&t=success";
							</script>';
                  }else{
                    echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Estudiante NO se Activo en el Sistema&c=ruta&p=estudiante_bien&t=error";
							</script>';
                  }
                }
              }
							
			if(isset($_GET['push']) == 'borrar'){
                $id_activar = intval(base64_decode($_GET['idusuario'].$key));
                $query = mysqli_query($conexion, "SELECT * FROM usuario WHERE idusuario='$id_activar'");
                if(mysqli_num_rows($query) == 0){

                  echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Estudiante NO Se Encontro&c=ruta&p=estudiante_bien&t=warning";
							</script>';
                }else{
                  $delete = mysqli_query($conexion, "DELETE FROM usuario WHERE idusuario='$id_activar'");
                  if($delete){
                    echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Felicitaciones. El Estudiante se Elimino del Sistema&c=ruta&p=estudiante_bien&t=success";
							</script>';
                  }else{
                    echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Estudiante NO se Elimino del Sistema&c=ruta&p=estudiante_bien&t=error";
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
												<th>Identificación</th>
												<th>Teléfono</th>
												<th>Correo</th>
												<th>Estado</th>
												<?php 
						if(@$_SESSION['u_admin'] == true){ ?>
												<th>Acción</th>
												<?php }
						?>

											</tr>
										</thead>
										<tbody>
											<?php while ($f = $consulta -> fetch_assoc()){ ?>
											<tr>
												<td>
													<?php echo $f['nombre1']." ".$f['nombre2']." ".$f['apellido1']." ".$f['apellido2']; ?>
												</td>
												<td>
													<?php echo $f['identificacion']; ?>
												</td>
												<td>
													<?php echo $f['telefono']; ?>
												</td>
												<td>
													<?php echo $f['correo']; ?>
												</td>
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
												<?php 
						if(@$_SESSION['u_admin'] == true){ ?>
												<td align="center">

<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Acción
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
   <?php
    $usuario_id = base64_encode( $f[ 'idusuario' ] . $key );
	echo "<li><a href='editar-estudiante?idusuario=" . $usuario_id . "' title='Editar Estudiante'>Editar</a></li>";	
																						  
	echo "<li><a href='gestionar-estudiante?action=eliminar&idusuario=" . $usuario_id . "' title='Desactivar Estudiante'>Desactivar</a></li>";
																						  
	echo "<li><a href='gestionar-estudiante?active=activar&idusuario=" . $usuario_id . "' title='Activar Estudiante'>Activar</a></li>";	
							
	echo "<li><a href='editar-colegio-estudiante?editar=colegio&idusuario=" . $usuario_id . "' title='Colegio Estudiante'>Colegio</a></li>";	
							
	echo "<li><a href='editar-grupo-estudiante?editar=grupo&idusuario=" . $usuario_id . "' title='Grupo Estudiante'>Grupo</a></li>";	
													
	echo "<li><a href='gestionar-estudiante?push=borrar&idusuario=" . $usuario_id . "' title='Eliminar Estudiante'>Eliminar</a></li>";	
																						  
	?>
  </ul>
</div>

												</td>
												<?php }
						?>
											</tr>
											<?php } 
					  ?>
										</tbody>
										<tfoot>
											<tr>
												<th>Nombres</th>
												<th>Identificación</th>
												<th>Teléfono</th>
												<th>Correo</th>
												<th>Estado</th>
												<?php 
					if(@$_SESSION['u_admin'] == true){ ?>
												<th>Acción</th>
												<?php }
				 ?>
											</tr>
										</tfoot>
									</table>
								</div>

								<?php
								if ( @$_SESSION[ 'u_admin' ] == true ) {
									?>

					<form action="../control/reporte_estudiante_pdf.php" method="post">
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