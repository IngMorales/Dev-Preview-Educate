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
          <small>Gestionar Parentesco | <b>Edúcate</b></small>
        </h1>
				<ol class="breadcrumb">
					<li><a href="index"><i class="fa fa-dashboard"></i> Inicio</a>
					</li>
					<li class="active">Tablas Básicas</li>
					<li class="active"><a href="gestionar-parentesco">Gestionar Parentesco</a>
					</li>
				</ol>
			</section>

			<?php
			$key = "jdh6ksjs_djdfj6h7_slyp7_sjtr9ele3_g4j51d65";
				$query = mysqli_query( $conexion, "SELECT*FROM parentesco" );
			?>
			<section class="content">
				<div class="row">
					<div class="col-lg-12 col-xs-12">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Gestionar Parentesco</h3>
							</div>
							<?php 
							
							
                if(isset($_GET['action']) == 'eliminar'){
                  $id_delete = intval(base64_decode($_GET['idparentesco'].$key));
                  $query = mysqli_query($conexion, "SELECT * FROM parentesco WHERE idparentesco='$id_delete'");
                  if(mysqli_num_rows($query) == 0){

                  }else{
                    $delete = mysqli_query($conexion, "UPDATE parentesco SET estado=0 WHERE idparentesco='$id_delete'");
                    if($delete){
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Felicitaciones. El Parentesco Ahora esta Inactivo&c=ruta&p=parentesco_basico&t=success";
							</script>';

                    }else{
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Parentesco NO Se Inactivo&c=ruta&p=parentesco_basico&t=error";
							</script>';
                    }
                  }
                }

                if(isset($_GET['active']) == 'activar'){
                  $id_activar = intval(base64_decode($_GET['idparentesco'].$key));
                  $query = mysqli_query($conexion, "SELECT * FROM parentesco WHERE idparentesco='$id_activar'");
                  if(mysqli_num_rows($query) == 0){
                  }else{
                    $delete = mysqli_query($conexion, "UPDATE parentesco SET estado = 1 WHERE idparentesco='$id_activar'");
                    if($delete){
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Felicitaciones. El Parentesco Ahora esta Activo&c=ruta&p=parentesco_basico&t=success";
							</script>';
                    }else{
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Parentesco NO Se Activo&c=ruta&p=parentesco_basico&t=error";
							</script>';
                    }
                  }
                }
							
				if(isset($_GET['eliminar']) == 'borrar'){
                  $id_delete = intval(base64_decode($_GET['idparentesco'].$key));
                  $query = mysqli_query($conexion, "SELECT * FROM parentesco WHERE idparentesco='$id_delete'");
                  if(mysqli_num_rows($query) == 0){
                  }else{
                    $delete = mysqli_query($conexion, "DELETE FROM parentesco WHERE idparentesco='$id_delete'");
                    if($delete){
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Felicitaciones. El Parentesco fue Eliminado&c=ruta&p=parentesco_basico&t=success";
							</script>';

                    }else{
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Parentesco NO Se Elimino&c=ruta&p=parentesco_basico&t=error";
							</script>';
                    }
                  }
                }
                ?>
							

							<form role="form" action="../control/agregar_parentesco.php" method="post" enctype="multipart/form-data">


								<div class="box-body">

									<div class="container">
										<div class="row">
											<div class="col-lg-3"></div>
											<div class="col-lg-4">
											
												<div class="form-group">
													<label for="nombre">Digite Nombre Parentesco</label>

													<input type="text" name="nombre" id="nombre" class="form-control" onkeypress="return soloLetras(event)" placeholder="Digite Nombre del Parentesco" required=true />
												</div>

												<div class="box-footer">
													<button type="submit" class="btn btn-primary btn-block">Agregar Parentesco</button>
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
											<th>Nombre</th>
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
												<?php echo $row['nombre']; ?>
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
											$parentesco_id = base64_encode($row['idparentesco'].$key);
                    echo "<a class='btn btn-warning' href='gestionar-parentesco?action=eliminar&idparentesco=".$parentesco_id."' title='Inactivar'><i class='fa fa-eye-slash'></i></a>";
											
					echo "<a class='btn btn-success' href='gestionar-parentesco?active=activar&idparentesco=".$parentesco_id."' title='Activar'><i class='fa fa-check'></i></a>";

                    echo "<a class='btn btn-danger' href='gestionar-parentesco?eliminar=borrar&idparentesco=".$parentesco_id."' title='Eliminar'><i class='fa fa-trash'></i> Eliminar</a>";
											
                    ?>
											</td>

										</tr>
										<?php } ?>

									</tbody>
									<tfoot>
										<tr>
											<th>Nombre</th>
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