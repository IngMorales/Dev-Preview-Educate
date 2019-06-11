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
          <small>Agregar Preguntas | <b>Edúcate</b></small>
        </h1>
				<ol class="breadcrumb">
					<li><a href="index"><i class="fa fa-dashboard"></i> Inicio</a>
					</li>
					<li class="active">Simulacros</li>
					<li class="active"><a href="agregar-preguntas">Agregar Pregunta</a>
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
								<h3 class="box-title">Administrador de Preguntas</h3>
							</div>
							<?php

							
				if(isset($_GET['eliminar']) == 'borrar'){
                  $id_delete = intval(base64_decode($_GET['idpregunta'].$key));
                  $query = mysqli_query($conexion, "SELECT * FROM preguntas WHERE idpregunta='$id_delete'");
                  if(mysqli_num_rows($query) == 0){
                  }else{
                    $delete = mysqli_query($conexion, "DELETE FROM preguntas WHERE idpregunta='$id_delete'");
                    if($delete){
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Felicitaciones. La Pregunta fue Eliminada&c=ruta&p=crear_pregunta&t=success";
							</script>';

                    }else{
                      echo '<script language="javascript">
							window.location.href="../alertas.php?msj=Error. La Pregunta NO Se Elimino&c=ruta&p=crear_pregunta&t=error";
							</script>';
                    }
                  }
                }
                ?>
							

							<form role="form" action="../control/crear_pregunta.php" method="post" enctype="multipart/form-data">


								<div class="box-body">

									<div class="container">
										<div class="row">
											<div class="col-lg-11">

												<div class="form-group">
													<label for="pregunta">Digite Pregunta para Agregar al Simulacro</label>
													
													
													<textarea type="text" name="pregunta" id="pregunta" class="form-control" placeholder="Digite la Pregunta para agregar al Simulacro" rows="3" required ></textarea>
												</div>

											</div>
										</div>
										
										<div class="row">
											<div class="col-lg-3">
												<div class="form-group">
													<label for="imagen">¿Tiene Imagen de Apoyo?</label>

													<input type="file" name="imagen" id="imagen" class="form-control"/>
												</div>
												
												<div class="form-group">
													<label for="componente">Seleccionar Componente</label>
													<select required id="componente" name="componente" class="form-control select2" style="width: 100%;">
														<option value="">Seleccione Componente</option>
														<?php
														$componente = "SELECT * FROM componente";

														foreach ( $conexion->query( $componente ) as $materia ) {

															if ( $materia[ 'estado' ] == 1 ) {
																echo "<option value='" . $materia[ 'idcomponente' ] . "'>" . mb_strtoupper($materia[ 'nombre' ]) . "</option>";
															}
														}
														?>
													</select>
												</div>
												
												<div class="form-group">
													<label for="simulacro">Seleccionar Simulacro</label>
													<select required id="simulacro" name="simulacro" class="form-control select2" style="width: 100%;">
														<option value="">Seleccione Simulacro</option>
														<?php
														$simu = "SELECT * FROM simulacro_rapido";

														foreach ( $conexion->query( $simu ) as $simulacrito ) {
														echo "<option value='" . $simulacrito[ 'idsimulacro' ] . "'>" . mb_strtoupper($simulacrito[ 'nombre' ]) . "</option>";
															
														}
														?>
													</select>
												</div>
												
												
											</div>
											<div class="col-lg-4">

												<div class="form-group">
													<label for="op1">Opción A <span style="color: crimson;">Correcta</span></label>
													
													<textarea type="text" name="op1" id="op1" class="form-control" placeholder="Digite Respuesta Opción A" required></textarea>
												</div>
												
												<div class="form-group">
													<label for="op2">Opción B</label>
												
													<textarea type="text" name="op2" id="op2" class="form-control" placeholder="Digite Respuesta Opción B" required></textarea>
												</div>


											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="op3">Opción C</label>
													
													<textarea type="text" name="op3" id="op3" class="form-control" placeholder="Digite Respuesta Opción C" required ></textarea>
												</div>
												
												<div class="form-group">
													<label for="op4">Opción D</label>
													
													<textarea type="text" name="op4" id="op4" class="form-control" placeholder="Digite Respuesta Opción D" required ></textarea>
												</div>
												
												<div class="box-footer">
													<button type="submit" class="btn btn-primary btn-block">Agregar Pregunta</button>
												</div>
											</div>
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
											<th>Pregunta</th>
											<th>Componente</th>
											<th>Simulacro</th>
											<th>Respuesta</th>
											<th>Acción</th>

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
											<td align="center">
											<?php 
											$precio_id = base64_encode($row['idpregunta'].$key);
											
                    echo "<a class='btn btn-danger' href='agregar-preguntas?eliminar=borrar&idpregunta=".$precio_id."' title='Eliminar'><i class='fa fa-trash'></i> Eliminar</a>";

                    
                    ?>
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