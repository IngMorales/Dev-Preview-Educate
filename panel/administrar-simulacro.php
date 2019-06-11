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
          <small>Administrador de Simulacros | <b>Edúcate</b></small>
        </h1>
				<ol class="breadcrumb">
					<li><a href="index"><i class="fa fa-dashboard"></i> Inicio</a>
					</li>
					<li class="active">Simulacros</li>
					<li class="active"><a href="administrar-simulacro">Administrar Simulacro</a>
					</li>
				</ol>
			</section>

			<?php
			$key = "sd4545u5u1r5663_s545gf13e78t_d5461a1d54f3_hgpo451w54q61";
				$query = mysqli_query( $conexion, "SELECT*FROM simulacro_rapido" );
			?>
			<section class="content">
				<div class="row">
					<div class="col-lg-12 col-xs-12">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Administrador de Simulacros</h3>
							</div>
							<?php

							
				if(isset($_GET['eliminar']) == 'borrar'){
                  $id_delete = intval(base64_decode($_GET['idsimulacro'].$key));
                  $query = mysqli_query($conexion, "SELECT * FROM simulacro_rapido WHERE idsimulacro='$id_delete'");
                  if(mysqli_num_rows($query) == 0){
                  }else{
                    $delete = mysqli_query($conexion, "DELETE FROM simulacro_rapido WHERE idsimulacro='$id_delete'");
                    if($delete){
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Felicitaciones. El Simulacro fue Eliminado&c=ruta&p=admin_simulacro&t=success";
							</script>';

                    }else{
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. El Simulacro NO Se Elimino&c=ruta&p=admin_simulacro&t=error";
							</script>';
                    }
                  }
                }
                ?>
							

							<form role="form" action="../control/crear_simulacro.php" method="post" enctype="multipart/form-data">


								<div class="box-body">

									<div class="container">
										<div class="row">
											<div class="col-lg-2"></div>
											<div class="col-lg-4">

												<div class="form-group">
													<label for="nombre">Digite Nombre Simulacro</label>

													<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Digite Nombre de Simulacro" required />
												</div>


											</div>
											<div class="col-lg-4">

												<div class="form-group">
													<label for="fecha">Establezca Fecha de Publicación</label>

													<input type="date" name="fecha" id="fecha" class="form-control" required />
												</div>

												<div class="box-footer">
													<button type="submit" class="btn btn-primary btn-block">Crear Simulacro</button>
												</div>



											</div>
											<div class="col-lg-2"></div>
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
											<th>Fecha</th>
											<th>Acción</th>

										</tr>
									</thead>
									<tbody>
										<?php
										
										while ( $row = mysqli_fetch_array( $query ) ) {
											?>
										<tr>
											<td>
												<?php echo mb_strtoupper($row['nombre']); ?>
											</td>
											<td>
												<?php echo $row['fecha']; ?>
											</td>
											<td align="center">
											<?php 
											$precio_id = base64_encode($row['idsimulacro'].$key);
											
                    echo "<a class='btn btn-danger' href='administrar-simulacro?eliminar=borrar&idsimulacro=".$precio_id."' title='Eliminar'><i class='fa fa-trash'></i> Eliminar</a>";

                    
                    ?>
											</td>

										</tr>
										<?php } ?>

									</tbody>
									<tfoot>
										<tr>
											<th>Nombre</th>
											<th>Fecha</th>
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