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
          <small>Gestionar Porcentaje | <b>Edúcate</b></small>
        </h1>
				<ol class="breadcrumb">
					<li><a href="index"><i class="fa fa-dashboard"></i> Inicio</a>
					</li>
					<li class="active">Tablas Básicas</li>
					<li class="active"><a href="gestionar-porcentaje">Gestionar Porcentaje</a>
					</li>
				</ol>
			</section>

			<?php
			$key = "gfhg54512h_g5451sas_er4512tr6_yty112a4_sd45oipo45";
				$query = mysqli_query( $conexion, "SELECT*FROM porcentaje" );
			?>
			<section class="content">
				<div class="row">
					<div class="col-lg-12 col-xs-12">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Gestionar Porcentaje</h3>
							</div>
							<?php 
							
							
                if(isset($_GET['action']) == 'eliminar'){
                  $id_delete = intval(base64_decode($_GET['idporcentaje'].$key));
                  $query = mysqli_query($conexion, "SELECT * FROM porcentaje WHERE idporcentaje='$id_delete'");
                  if(mysqli_num_rows($query) == 0){

                  }else{
                    $delete = mysqli_query($conexion, "UPDATE porcentaje SET estado=0 WHERE idporcentaje='$id_delete'");
                    if($delete){
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Felicitaciones. El Porcentaje Ahora esta Inactivo&c=ruta&p=porcentaje&t=success";
							</script>';

                    }else{
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Porcentaje NO Se Inactivo&c=ruta&p=porcentaje&t=error";
							</script>';
                    }
                  }
                }

                if(isset($_GET['active']) == 'activar'){
                  $id_activar = intval(base64_decode($_GET['idporcentaje'].$key));
                  $query = mysqli_query($conexion, "SELECT * FROM porcentaje WHERE idporcentaje='$id_activar'");
                  if(mysqli_num_rows($query) == 0){
                  }else{
                    $delete = mysqli_query($conexion, "UPDATE porcentaje SET estado = 1 WHERE idporcentaje='$id_activar'");
                    if($delete){
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Felicitaciones. El Porcentaje Ahora esta Activo&c=ruta&p=porcentaje&t=success";
							</script>';
                    }else{
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Porcentaje NO Se Activo&c=ruta&p=porcentaje&t=error";
							</script>';
                    }
                  }
                }
							
				if(isset($_GET['eliminar']) == 'borrar'){
                  $id_delete = intval(base64_decode($_GET['idporcentaje'].$key));
                  $query = mysqli_query($conexion, "SELECT * FROM porcentaje WHERE idporcentaje='$id_delete'");
                  if(mysqli_num_rows($query) == 0){
                  }else{
                    $delete = mysqli_query($conexion, "DELETE FROM porcentaje WHERE idporcentaje='$id_delete'");
                    if($delete){
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Felicitaciones. El Porcentaje fue Eliminado&c=ruta&p=porcentaje&t=success";
							</script>';

                    }else{
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Porcentaje NO Se Elimino&c=ruta&p=porcentaje&t=error";
							</script>';
                    }
                  }
                }
                ?>
							

							<form role="form" action="../control/agregar_porcentaje.php" method="post" enctype="multipart/form-data">


								<div class="box-body">

									<div class="container">
										<div class="row">
											<div class="col-lg-3"></div>
											<div class="col-lg-4">
											
												<div class="form-group">
													<label for="naturaleza">Digite Naturaleza</label>

													<input type="text" name="naturaleza" id="naturaleza" class="form-control" onkeypress="return soloLetras(event)" placeholder="Digite Naturaleza del Porcentaje" required=true />
												</div>
												<div class="form-group">
													<label for="porcentaje">Digite Porcentaje</label>

													<input type="number" name="porcentaje" id="porcentaje" class="form-control" min="0" max="100" step="any" placeholder="Digite Porcentaje" required=true />
												</div>

												<div class="box-footer">
													<button type="submit" class="btn btn-primary btn-block">Agregar Porcentaje</button>
												</div>



											</div>
											<div class="col-lg-3"></div>
										</div>
									</div>


								</div>

							</form>
						</div>

					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 col-xs-12">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Datos Guardatos</h3>
							</div>


							<div class="box-body">
							<div class="table-responsive">
								<table id="gestionar" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Naturaleza</th>
											<th>Porcentaje</th>
											<th>Estado</th>
											<th>Acción</th>

										</tr>
									</thead>
									<tbody>
										<?php
										
										while ( $row = mysqli_fetch_array( $query ) ) {
											?>
										<tr>
											<td>
												<?php echo $row['pago']; ?>
											</td>
											<td>
												<?php echo $row['porcentaje']." %"; ?>
											</td>
											<td>
												<?php 
												if($row['estado'] == 1){
													echo "Activo <i style='color: green' class='fa fa-circle'> </i>";
												}else{
													echo "Activo <i style='color: red' class='fa fa-circle'> </i>";
												}
											
													 
												?>
											</td>
											<td align="center">
											<?php 
											$porcentaje_id = base64_encode($row['idporcentaje'].$key);
                    echo "<a class='btn btn-warning' href='gestionar-porcentaje?action=eliminar&idporcentaje=".$porcentaje_id."' title='Inactivar'><i class='fa fa-eye-slash'></i></a>";
											
					echo "<a class='btn btn-success' href='gestionar-porcentaje?active=activar&idporcentaje=".$porcentaje_id."' title='Activar'><i class='fa fa-check'></i></a>";

                    echo "<a class='btn btn-danger' href='gestionar-porcentaje?eliminar=borrar&idporcentaje=".$porcentaje_id."' title='Eliminar'><i class='fa fa-trash'></i> Eliminar</a>";
											
                    ?>
											</td>

										</tr>
										<?php } ?>

									</tbody>
									<tfoot>
										<tr>
											<th>Naturaleza</th>
											<th>Porcentaje</th>
											<th>Estado</th>
											<th>Acción</th>

										</tr>
									</tfoot>
								</table>
								</div>
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