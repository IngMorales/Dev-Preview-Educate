<!DOCTYPE html>
<html lang="es">
<head>
	<?php 
		include("../interfaz-login/head.php");
	?>
</head>

<body class="signup-page">

	<?php 
		include("../interfaz-login/nav.php");
	?>

    <div class="wrapper">
		<div class="header header-filter" style="background-color: #808080 ; background-size: cover; background-position: top center;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">
							<form class="form" method="POST" action="../control/iniciar_sesion.php">
								<div class="header header-danger text-center">
									<h4>Iniciar Sesión</h4>
								</div>
								<div class="content">

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">face</i>
										</span>
										<input type="text" id="usuario" name="usuario" class="form-control" placeholder="Digite Usuario" required />
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input type="password" id="pass" name="pass" placeholder="Digite Contraseña" class="form-control" required />
									</div>

								</div>
								<div class="footer text-center">
									<button type="submit" class="btn btn-primary btn-lg">Iniciar</button>
									<br>
									<a href="../recovery/recovery-pass.php" class="btn btn-success" title="Recuperar Contraseña">¿Olvido su Contraseña?</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

<?php 
	include("../interfaz-login/footer.php");
?>

		</div>

    </div>


</body>
	<?php 
		include("../interfaz-login/scripts.php");
		include("../interfaz-login/video.php");
	?>
</html>
