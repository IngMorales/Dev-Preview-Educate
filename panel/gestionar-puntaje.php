<?php
session_start();

if ( isset( $_SESSION[ 'u_admin' ] ) || isset( $_SESSION[ 'u_user' ] ) || isset( $_SESSION[ 'u_teacher' ] ) ) {} else {
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
          	<small>
				<?php
				  if(@$_SESSION['u_admin'] == true){ ?>
					  Gestionar Puntaje
				  <?php }else{ ?>
					  Consultar Puntaje
				<?php } ?> | <b>Edúcate</b>
       		</small>
        </h1>
			

				<ol class="breadcrumb">
					<li><a href="index"><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li class="active">Puntaje</li>
          <li class="active"><a href="gestionar-puntaje">Gestionar Puntaje</a></li>
				</ol>
			</section>

			<?php
			$key = "sd44as_zhj454_jhs245_iuiyr4221a";
			//consulta para el administrador del sistema
			$variable = $_SESSION[ 'usuario' ]; //cargamos la variable usuario
			if ( @$_SESSION[ 'u_admin' ] == true || @$_SESSION[ 'u_teacher' ] == true ) {
				$consulta = $conexion->query( "SELECT p.idpuntaje idpuntaje, p.puntaje puntaje, p.fecha fecha, p.fk_usuario fk_usuario, p.fk_simulacro fk_simulacro, p.estado estadopuntaje, u.idusuario idusuario, u.usuario usuario, u.nombre1 nombre1, u.nombre2 nombre2, u.apellido1 apellido1, u.apellido2 apellido2, u.identificacion identificacion, u.estado estadousuario, s.idsimulacro idsimulacro, s.nombre nombresimulacro, s.estado estadosimulacro 
			FROM puntaje p 
INNER JOIN usuario u ON p.fk_usuario = u.usuario 
INNER JOIN simulacro s ON p.fk_simulacro = s.idsimulacro" );
				$row = mysqli_num_rows( $consulta );
			} else {
				$consulta = $conexion->query( "SELECT p.idpuntaje idpuntaje, p.puntaje puntaje, p.fecha fecha, p.fk_usuario fk_usuario,
p.fk_simulacro fk_simulacro, p.estado estadopuntaje, u.idusuario idusuario, u.usuario usuario,
u.nombre1 nombre1, u.nombre2 nombre2, u.apellido1 apellido1, u.apellido2 apellido2,
u.identificacion identificacion, u.estado estadousuario, s.idsimulacro idsimulacro,
s.nombre nombresimulacro, s.estado estadosimulacro FROM puntaje p 
INNER JOIN usuario u ON p.fk_usuario = u.usuario
INNER JOIN simulacro s ON p.fk_simulacro = s.idsimulacro WHERE p.fk_usuario =$variable" );
				$row = mysqli_num_rows( $consulta );
			}

			?>

			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<?php 
			  if(@$_SESSION['u_user'] == true){ ?>
						<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Estimado Estudiante!</h4> Aquí encontrará el historial de sus simulacros junto con el puntaje global obtenido.
						</div>
						<?php }
			  
			  if(@$_SESSION['u_teacher'] == true){ ?>

						<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Estimado Docente!</h4> Aquí encontrará el resultado de los simulacros realizados durante el curso PreICFES, al igual que el puntaje obtenido por cada estudiante.
						</div>
						<?php }
			  ?>
						<div class="box">

							<?php 
							if(@$_SESSION['u_teacher'] == true){ ?>
							<div class="col-md-12 text-center">
								<?php $h1 = "Puntajes de Estudiantes Asesorías Académicas Edúcate";  
									echo '<h3>'.$h1.'</h3>'
								?>
							</div>
							<?php }
							?>
							<div class="box-header">
								<?php 
				  if(@$_SESSION['u_admin'] == true){ ?>
								<h3 class="box-title"><a class="btn btn-info" href="subir-archivo"><i class="fa fa-plus"> </i> Subir Archivo </a></h3>

								<h3 class="box-title"><a class="btn btn-danger" href="asignar-puntaje"><i class="fa fa-sort-numeric-asc"> </i> Asignar Puntaje </a></h3>

								<h3 class="box-title"><a class="btn btn-success" href="../control/bajar_puntaje">Exportar Excel <i class="fa fa-file-excel-o"></i></a></h3>

								<div class="col-md-12 text-center">
									<?php $h1 = "Puntajes de Estudiantes Asesorías Académicas Edúcate";  
									echo '<h3>'.$h1.'</h3>'
								?>
								</div>
								<?php }
				  ?>





							</div>
							<?php 
              if(isset($_GET['action']) == 'eliminar'){
				  
                $id_delete = intval(base64_decode($_GET['idpuntaje'].$key));
                $query = mysqli_query($conexion, "SELECT * FROM puntaje WHERE idpuntaje='$id_delete'");
                if(mysqli_num_rows($query) == 0){

                  echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Puntaje NO Se Encontro&c=ruta&p=puntaje_bien&t=warning";
							</script>';

                }else{
                  $delete = mysqli_query($conexion, "UPDATE puntaje SET estado=0 WHERE idpuntaje='$id_delete'");
                  if($delete){
                    echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Felicitaciones. El Puntaje Se Inactivo del Sistema&c=ruta&p=puntaje_bien&t=success";
							</script>';

                  }else{
                    echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Puntaje NO se Inactivo del Sistema&c=ruta&p=puntaje_bien&t=error";
							</script>';
                  }
                }
              }

              if(isset($_GET['active']) == 'activar'){
                $id_activar = intval(base64_decode($_GET['idpuntaje'].$key));
                $query = mysqli_query($conexion, "SELECT * FROM puntaje WHERE idpuntaje='$id_activar'");
                if(mysqli_num_rows($query) == 0){

                  echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Puntaje NO Se Encontro&c=ruta&p=puntaje_bien&t=warning";
							</script>';
                }else{
                  $delete = mysqli_query($conexion, "UPDATE puntaje SET estado=1 WHERE idpuntaje='$id_activar'");
                  if($delete){
                    echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Felicitaciones. El Puntaje Se Activo en el Sistema&c=ruta&p=puntaje_bien&t=success";
							</script>';
                  }else{
                    echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Puntaje NO se Activo en el Sistema&c=ruta&p=puntaje_bien&t=error";
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
											<th>Estudiante</th>
											<?php
											if ( @$_SESSION[ 'u_admin' ] == true || @$_SESSION[ 'u_teacher' ] == true ) {
												?>
											<th>Identificación</th>
											<?php }
											?>
											<th>Fecha</th>
											<th>Simulacro</th>
											<th>Puntaje</th>
											<?php
											if ( @$_SESSION[ 'u_admin' ] == true ) {
												?>
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
												<?php 
													
													if(@$_SESSION[ 'u_admin' ] == true || @$_SESSION[ 'u_teacher' ] == true){
														echo $f['identificacion'];
													}?>
											</td>
											<td>
												<?php echo $f['fecha']; ?>
											</td>
											<td>
												<?php echo $f['nombresimulacro']; ?>
											</td>
											<td>
												<?php echo $f['puntaje']; ?>
											</td>

											<?php
											if ( @$_SESSION[ 'u_admin' ] == true ) {
												?>
											<td align="center">

<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Acción
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
   <?php
    $puntaje_id = base64_encode( $f[ 'idpuntaje' ] . $key );
												
	echo "<li><a href='editar-puntaje?idpuntaje=" . $puntaje_id . "' title='Editar Puntaje'>Editar</a></li>";
																						  
	//echo "<li><a href='gestionar-puntaje?active=activar&idpuntaje=" . $puntaje_id . "' title='Activar Puntaje'>Activar</a></li>";	
													
	//echo "<li><a href='gestionar-puntaje?action=eliminar&idpuntaje=" . $puntaje_id . " title='Desactivar Puntaje'>Desactivar</a></li>";	
																						  
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
											<th>Estudiante</th>
											<?php
											if ( @$_SESSION[ 'u_admin' ] == true || @$_SESSION[ 'u_teacher' ] == true ) {
												?>
											<th>Identificación</th>
											<?php }
											?>
											<th>Fecha</th>
											<th>Simulacro</th>
											<th>Puntaje</th>
											<?php
											if ( @$_SESSION[ 'u_admin' ] == true ) {
												?>
											<th>Acción</th>
											<?php }
						?>
										</tr>
									</tfoot>
								</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php 
		  if(@$_SESSION['u_admin'] == true || @$_SESSION['u_teacher'] == true){ ?>


				<form action="../control/reporte_puntaje_pdf.php" method="post">
					<input type="hidden" name="reporte_name" value="<?php echo $h1; ?>">
					<h3 class="box-title">
						<input type="submit" name="create_pdf" class="btn btn-danger" formtarget="_blank" value="Exportar PDF">
						<a class="btn btn-success" href="../control/bajar_puntaje">Exportar Excel <i class="fa fa-file-excel-o"></i></a>
						
						<input type="submit" name="simulacro1" class="btn btn-warning" formtarget="_blank" value="Simulacro 1">
						
						<input type="submit" name="simulacro2" class="btn btn-success" formtarget="_blank" value="Simulacro 2">
						
						<input type="submit" name="simulacro1" class="btn btn-primary" formtarget="_blank" value="Simulacro 3">
					</h3>
				
				</form>
				<?php }
		  ?>
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