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
          <small>Gestionar Sexo | <b>Edúcate</b></small>
        </h1>
				<ol class="breadcrumb">
					<li><a href="index"><i class="fa fa-dashboard"></i> Inicio</a>
					</li>
					<li class="active">Tablas Básicas</li>
					<li class="active"><a href="gestionar-sexo">Gestionar Sexo</a>
					</li>
				</ol>
			</section>

			<?php
			$key = "ds45d2121sd_454gf4646454sds_45ds12545ds_t454op2_45p252";
				$query = mysqli_query( $conexion, "SELECT*FROM sexo" );
			?>
			<section class="content">
				<div class="row">
					<div class="col-lg-12 col-xs-12">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Gestionar Sexo</h3>
							</div>
							<?php 
							
							
                if(isset($_GET['action']) == 'eliminar'){
                  $id_delete = intval(base64_decode($_GET['idsexo'].$key));
                  $query = mysqli_query($conexion, "SELECT * FROM sexo WHERE idsexo='$id_delete'");
                  if(mysqli_num_rows($query) == 0){

                  }else{
                    $delete = mysqli_query($conexion, "UPDATE sexo SET estado=0 WHERE idsexo='$id_delete'");
                    if($delete){
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Felicitaciones. El Sexo Ahora esta Inactivo&c=ruta&p=sexo&t=success";
							</script>';

                    }else{
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Sexo NO Se Inactivo&c=ruta&p=sexo&t=error";
							</script>';
                    }
                  }
                }

                if(isset($_GET['active']) == 'activar'){
                  $id_activar = intval(base64_decode($_GET['idsexo'].$key));
                  $query = mysqli_query($conexion, "SELECT * FROM sexo WHERE idsexo='$id_activar'");
                  if(mysqli_num_rows($query) == 0){
                  }else{
                    $delete = mysqli_query($conexion, "UPDATE sexo SET estado = 1 WHERE idsexo='$id_activar'");
                    if($delete){
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Felicitaciones. El Sexo Ahora esta Activo&c=ruta&p=sexo&t=success";
							</script>';
                    }else{
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Sexo NO Se Activo&c=ruta&p=sexo&t=error";
							</script>';
                    }
                  }
                }
							
				if(isset($_GET['eliminar']) == 'borrar'){
                  $id_delete = intval(base64_decode($_GET['idsexo'].$key));
                  $query = mysqli_query($conexion, "SELECT * FROM sexo WHERE idsexo='$id_delete'");
                  if(mysqli_num_rows($query) == 0){
                  }else{
                    $delete = mysqli_query($conexion, "DELETE FROM sexo WHERE idsexo='$id_delete'");
                    if($delete){
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Felicitaciones. El Sexo fue Eliminado&c=ruta&p=sexo&t=success";
							</script>';

                    }else{
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Sexo NO Se Elimino&c=ruta&p=sexo&t=error";
							</script>';
                    }
                  }
                }
                ?>
							

							<form role="form" action="../control/agregar_sexo.php" method="post" enctype="multipart/form-data">


								<div class="box-body">

									<div class="container">
										<div class="row">
											<div class="col-lg-3"></div>
											<div class="col-lg-4">

												<div class="form-group">
													<label for="sexo">Digite Nombre Sexo</label>

													<input type="text" name="sexo" id="sexo" class="form-control" onkeypress="return soloLetras(event)" placeholder="Digite Nombre Sexo" required=true />
												</div>

												<div class="box-footer">
													<button type="submit" class="btn btn-primary btn-block">Agregar Sexo</button>
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
											$sexo_id = base64_encode($row['idsexo'].$key);
                    echo "<a class='btn btn-warning' href='gestionar-sexo?action=eliminar&idsexo=".$sexo_id."' title='Inactivar'><i class='fa fa-eye-slash'></i></a>";
											
					echo "<a class='btn btn-success' href='gestionar-sexo?active=activar&idsexo=".$sexo_id."' title='Activar'><i class='fa fa-check'></i></a>";

                    echo "<a class='btn btn-danger' href='gestionar-sexo?eliminar=borrar&idsexo=".$sexo_id."' title='Eliminar'><i class='fa fa-trash'></i> Eliminar</a>";

                    
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