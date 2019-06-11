<?php
session_start();

if ( isset( $_SESSION[ 'u_admin' ] ) == true || isset( $_SESSION[ 'u_user' ] ) == true || isset( $_SESSION[ 'u_teacher' ] ) == true ) {} else {
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
          <small>Consultar Respuestas | <b>Edúcate</b></small>
        </h1>
				<ol class="breadcrumb">
					<li><a href="index"><i class="fa fa-dashboard"></i> Inicio</a>
					</li>
					<li class="active">Simulacros</li>
					<li class="active"><a href="consultar-respuestas">Respuestas</a>
					</li>
				</ol>
			</section>

			<?php
			$key = "sd4545u5u1r5663_s545gf13e78t_d5461a1d54f3_hgpo451w54q61";
				$query = mysqli_query( $conexion, "SELECT p.idpregunta idpregunta, p.pregunta pregunta, p.respuesta respuesta, c.nombre componente, s.nombre simulacro FROM preguntas p INNER JOIN componente c ON p.fk_componente = c.idcomponente INNER JOIN simulacro_rapido s ON p.fk_simulacro = s.idsimulacro" );
			?>
			<section class="content">
				<div class="row">
					<div class="col-lg-12 col-xs-12">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Respuestas a las Preguntas</h3>
							</div>


							<div class="box-body">
							<div class="table-responsive">
								<table id="gestionar" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Pregunta</th>
											<th>Componente</th>
											<th>Simulacro</th>
											<th>Respuesta</th>

										</tr>
									</thead>
									<tbody>
										<?php
										
										while ( $row = mysqli_fetch_array( $query ) ) {
											?>
										<tr>
											<td>
												<?php echo mb_strtoupper($row['pregunta']); ?>
											</td>
											<td>
												<?php echo mb_strtoupper($row['componente']); ?>
											</td>
											<td>
												<?php echo mb_strtoupper($row['simulacro']); ?>
											</td>
											<td>
												<?php echo mb_strtoupper($row['respuesta']); ?>
											</td>
										</tr>
										<?php } ?>

									</tbody>
									<tfoot>
										<tr>
											<th>Pregunta</th>
											<th>Componente</th>
											<th>Simulacro</th>
											<th>Respuesta</th>
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