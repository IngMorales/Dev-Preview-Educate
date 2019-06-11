<?php
session_start();

if ( isset( $_SESSION[ 'u_user' ] ) ) {} else {
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
          <small>Presentar Simulacro | <b>Edúcate</b></small>
        </h1>
				<ol class="breadcrumb">
					<li><a href="index"><i class="fa fa-dashboard"></i> Inicio</a>
					</li>
					<li class="active">Simulacros</li>
					<li class="active"><a href="presentar-simulacro">Presentar Simulacro</a>
					</li>
				</ol>
			</section>

			<?php
			$key = "sd4545u5u1r5663_s545gf13e78t_d5461a1d54f3_hgpo451w54q61";
			$query = "SELECT p.idpregunta idpregunta, p.pregunta pregunta, p.a a, p.b b, p.c c, p.d d FROM preguntas p";
			?>
			<section class="content">
				<div class="row">
					<div class="col-lg-12 col-xs-12">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Presentar Simulacro Tipo ICFES</h3>
							</div>
							
							<form role="form" action="../control/enviar_respuestas.php" method="post" enctype="multipart/form-data">


								<div class="box-body">

									<div class="container">
										<div class="row">
											<div class="col-lg-11">
<div class="form-group">											
<?php
	$contador = 0;											
	foreach ( $conexion->query( $query ) as $pregunta ) { 
		$contador++;										
	?>
		
			<label for="pregunta">Pregunta # <?php echo $contador."<br>".$pregunta['pregunta']; ?></label>
			<br>
			<label class="radio-inline">
				<input type="radio" name="respuesta" id="respuesta" value="<?php echo $pregunta[$contador]; ?>" required="required"><?php echo $pregunta[ 'a' ]; ?>
				<br>
				<input type="radio" name="respuesta" id="respuesta" value="<?php echo $pregunta[$contador]; ?>" required="required"><?php echo $pregunta[ 'b' ]; ?>
			</label>
		
		
		<?php
	}

?>
</div>
												
												<div class="box-footer" align="center">
													<button type="submit" class="btn btn-primary">Enviar</button>
												</div>

											</div>
										</div>
									</div>


								</div>

							</form>
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