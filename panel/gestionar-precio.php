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
          <small>Gestionar Precio | <b>Edúcate</b></small>
        </h1>
				<ol class="breadcrumb">
					<li><a href="index"><i class="fa fa-dashboard"></i> Inicio</a>
					</li>
					<li class="active">Tablas Básicas</li>
					<li class="active"><a href="gestionar-precio">Gestionar Precio</a>
					</li>
				</ol>
			</section>

			<?php
			$key = "sd4545u5u1r5663_s545gf13e78t_d5461a1d54f3_hgpo451w54q61";
				$query = mysqli_query( $conexion, "SELECT*FROM precio" );
			?>
			<section class="content">
				<div class="row">
					<div class="col-lg-12 col-xs-12">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Gestionar Precio</h3>
							</div>
							<?php 
							
							
                if(isset($_GET['action']) == 'eliminar'){
                  $id_delete = intval(base64_decode($_GET['idprecio'].$key));
                  $query = mysqli_query($conexion, "SELECT * FROM precio WHERE idprecio='$id_delete'");
                  if(mysqli_num_rows($query) == 0){

                  }else{
                    $delete = mysqli_query($conexion, "UPDATE precio SET estado=0 WHERE idprecio='$id_delete'");
                    if($delete){
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Felicitaciones. El Precio Ahora esta Inactivo&c=ruta&p=precio&t=success";
							</script>';

                    }else{
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Precio NO Se Inactivo&c=ruta&p=precio&t=error";
							</script>';
                    }
                  }
                }

                if(isset($_GET['active']) == 'activar'){
                  $id_activar = intval(base64_decode($_GET['idprecio'].$key));
                  $query = mysqli_query($conexion, "SELECT * FROM precio WHERE idprecio='$id_activar'");
                  if(mysqli_num_rows($query) == 0){
                  }else{
                    $delete = mysqli_query($conexion, "UPDATE precio SET estado = 1 WHERE idprecio='$id_activar'");
                    if($delete){
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Felicitaciones. El Precio Ahora esta Activo&c=ruta&p=precio&t=success";
							</script>';
                    }else{
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Precio NO Se Activo&c=ruta&p=precio&t=error";
							</script>';
                    }
                  }
                }
							
				if(isset($_GET['eliminar']) == 'borrar'){
                  $id_delete = intval(base64_decode($_GET['idprecio'].$key));
                  $query = mysqli_query($conexion, "SELECT * FROM precio WHERE idprecio='$id_delete'");
                  if(mysqli_num_rows($query) == 0){
                  }else{
                    $delete = mysqli_query($conexion, "DELETE FROM precio WHERE idprecio='$id_delete'");
                    if($delete){
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Felicitaciones. El Precio fue Eliminado&c=ruta&p=precio&t=success";
							</script>';

                    }else{
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Precio NO Se Elimino&c=ruta&p=precio&t=error";
							</script>';
                    }
                  }
                }
                ?>
							

							<form role="form" action="../control/agregar_precio.php" method="post" enctype="multipart/form-data">


								<div class="box-body">

									<div class="container">
										<div class="row">
											<div class="col-lg-3"></div>
											<div class="col-lg-4">

												<div class="form-group">
													<label for="precio">Digite Precio</label>

													<input type="number" name="precio" id="precio" class="form-control" onkeypress="return soloNumeros(event)" min="250000" max="700000" step="any" placeholder="Digite Precio" required=true />
												</div>

												<div class="box-footer">
													<button type="submit" class="btn btn-primary btn-block">Agregar Precio</button>
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
												<?php echo "$ ".$row['precio']; ?>
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
											$precio_id = base64_encode($row['idprecio'].$key);
                    echo "<a class='btn btn-warning' href='gestionar-precio?action=eliminar&idprecio=".$precio_id."' title='Inactivar'><i class='fa fa-eye-slash'></i></a>";
											
					echo "<a class='btn btn-success' href='gestionar-precio?active=activar&idprecio=".$precio_id."' title='Activar'><i class='fa fa-check'></i></a>";

                    echo "<a class='btn btn-danger' href='gestionar-precio?eliminar=borrar&idprecio=".$precio_id."' title='Eliminar'><i class='fa fa-trash'></i> Eliminar</a>";

                    
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