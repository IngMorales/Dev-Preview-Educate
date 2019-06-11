<!DOCTYPE html>
<html lang="es">
<head>
	<?php 
		include_once("interfaz/head.php");
	?>

</head>

<body class="index-page">

	<?php 
		include_once("interfaz/nav.php");
	?>

<div class="wrapper">

	<div class="header header-filter" style="background-image: url('assets/img/teacher.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<?php 
						include_once("interfaz/welcome.php");
					?>
				</div>
			</div>

		</div>
	</div>

	<div class="main main-raised">
		<div class="section section-tabs">
			<div class="container">
				<div class="row">

<!-- ================ MATEMATICAS =============-->			
					<div class="col-md-6">
						<div class="title">
							<h3>Matemáticas y Física</h3>
						</div>
						<div class="card card-nav-tabs">
							<div class="header header-success">
								<div class="nav-tabs-navigation">
									<div class="nav-tabs-wrapper">
										<ul class="nav nav-tabs" data-tabs="tabs">
											<li class="active">
												<a href="#d-math" data-toggle="tab">
													<i class="material-icons">face</i>
													Perfil
												</a>
											</li>
											<li>
												<a href="#c-math" data-toggle="tab">
													<i class="material-icons">chat</i>
													Formación
												</a>
											</li>
											<li>
												<a href="#m-math" data-toggle="tab">
													<i class="material-icons">phone</i>
													Contacto
												</a>

											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="content">
								<div class="tab-content text-center">
									<div class="tab-pane active" id="d-math">
										<img src="assets/img/docentes/example.jpg">
										<p> <strong>Nombres</strong></p>
										<p> <strong>Profesión</strong></p>
									</div>
									<div class="tab-pane" id="c-math">
										<p>
											 <ul align="justify">
											 	<li><strong>Profesión</strong></li>
											 </ul>
										</p>
									</div>
									<div class="tab-pane" id="m-math">
										<p>
											<ul align="justify">
												<i class="material-icons">phone</i> Celular: Phone
												<br>
												<i class="material-icons">email</i> Correo: Email
											</ul>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>



<!-- ================ LECTURA CRITICA =============-->			
					<div class="col-md-6">
						<div class="title">
							<h3>Lenguaje y Castellana</h3>
						</div>
						<div class="card card-nav-tabs">
							<div class="header header-danger">
								<div class="nav-tabs-navigation">
									<div class="nav-tabs-wrapper">
										<ul class="nav nav-tabs" data-tabs="tabs">
											<li class="active">
												<a href="#d-lect" data-toggle="tab">
													<i class="material-icons">face</i>
													Perfil
												</a>
											</li>
											<li>
												<a href="#c-lect" data-toggle="tab">
													<i class="material-icons">chat</i>
													Formación
												</a>
											</li>
											<li>
												<a href="#m-lect" data-toggle="tab">
													<i class="material-icons">phone</i>
													Contacto
												</a>

											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="content">
								<div class="tab-content text-center">
									<div class="tab-pane active" id="d-lect">
										<img src="assets/img/docentes/example.jpg" >
										<p> <strong>Nombres</strong></p>
										<p> <strong>Profesión</strong></p>
									</div>
									<div class="tab-pane" id="c-lect">
										<p> Texto de Contenido1</p>
									</div>
									<div class="tab-pane" id="m-lect">
										<p>Texto de Material1</p>
									</div>
								</div>
							</div>
						</div>
					</div>
			


<!-- ================ QUÍMICA =============-->			
			<div class="col-md-6">
						<div class="title">
							<h3>Química</h3>
						</div>
						<div class="card card-nav-tabs">
							<div class="header header-danger">
								<div class="nav-tabs-navigation">
									<div class="nav-tabs-wrapper">
										<ul class="nav nav-tabs" data-tabs="tabs">
											<li class="active">
												<a href="#d-quimica" data-toggle="tab">
													<i class="material-icons">face</i>
													Perfil
												</a>
											</li>
											<li>
												<a href="#c-quimica" data-toggle="tab">
													<i class="material-icons">chat</i>
													Formación
												</a>
											</li>
											<li>
												<a href="#m-quimica" data-toggle="tab">
													<i class="material-icons">phone</i>
													Contacto
												</a>

											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="content">
								<div class="tab-content text-center">
									<div class="tab-pane active" id="d-quimica">
										<img class="img-circle" src="assets/img/docentes/example.jpg">
										<p><strong>Nombres</strong> </p>
										<p><strong>Profesión</strong> </p>
									</div>
									<div class="tab-pane" id="c-quimica">
										<ul align="justify">
											<li><strong>Profesión</strong></li>
											
										</ul>
									</div>
									<div class="tab-pane" id="m-quimica">
										<p>
											<ul align="justify">
												<i class="material-icons">phone</i> Celular: phone
												<br>
												<i class="material-icons">email</i> Correo: email
											</ul>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
<!-- ================ BIOLOGIA =============-->			
					<div class="col-md-6">
						<div class="title">
							<h3>Biología</h3>
						</div>
						<div class="card card-nav-tabs">
							<div class="header header-primary">
								<div class="nav-tabs-navigation">
									<div class="nav-tabs-wrapper">
										<ul class="nav nav-tabs" data-tabs="tabs">
											<li class="active">
												<a href="#d-qui" data-toggle="tab">
													<i class="material-icons">face</i>
													Perfil
												</a>
											</li>
											<li>
												<a href="#c-qui" data-toggle="tab">
													<i class="material-icons">chat</i>
													Formación
												</a>
											</li>
											<li>
												<a href="#m-qui" data-toggle="tab">
													<i class="material-icons">phone</i>
													Contacto
												</a>

											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="content">
								<div class="tab-content text-center">
									<div class="tab-pane active" id="d-qui">
										<img class="img-circle" src="assets/img/docentes/edwin.jpg" height="140" width="130">
										<p><strong>Edwin Alfonso Atunduaga Zambrano</strong> </p>
										<p><strong>Biólogo (Universidad de la Amazonia)</strong> </p>
									</div>
									<div class="tab-pane" id="c-qui">
										<ul align="justify">
											<li><strong>Biólogo, Universidad de la Amazonia.</strong></li>
											<li>“Experiencias de manejo en jardínes botánicos: Jardín Botánico del Quindío, Jardín Botánico UTP y Jardín Botánico Universidad del Quíndio”. Practicante. Armenia, Quindío y Pereira, Risaralda. Del 10 al 14 de mayo de 2016.</li>
											
											<li>“Cambio climático, aproximaciones conceptuales y visiones territoriales”. Asistente. Florencia, Caquetá. Del 9 al 11 de septiembre de 2015.</li>
											
											<li>“Seminario internacional sobre valoración de servicios ecosistémicos en la Amazonia colombiana”. Asistente. Florencia, Caquetá. Del 4 al 6 de marzo de 2015.</li>
											
											<li>“9° Foro ambiental: Alternativas de soluciones legítimas a problemas locales con incidencia global. Conflictos ambientales y ecología política”. Asistente. Florencia, Caquetá. Del 10 al 11 de noviembre de 2014.</li>
											
											<li>“Taller: Procesos técnicos e impactos de la exploración y explotación de hidrocarburos”. Asistente. Morelia, Caquetá. 5 y 6 de septiembre de 2014.</li>
											
											<li>“Alfabetización digital básica en TIC ´SoyTic´”. Curso virtual. Del 24 al 27 de diciembre de 2013.</li>
											
											<li>“IV Seminario Internacional en Medio Ambiente, Biodiversidad y Desarrollo, III Seminario de Química Aplicada”. Asistente. Florencia, Caquetá. Del 6 al 8 de noviembre de 2013.</li>
											<li>“Workshop en recursos genéticos”. Asistente. Florencia, Caquetá. 26 de septiembre de 2012.</li>
											<li>“II Seminario Internacional de química aplicada”. Asistente. Florencia, Caquetá. 1 de junio de 2012.</li>
											<li>“I Seminario internacional etnobotánica y educación en la comunidad Embera Chamí de las Malvinas”. Asitente. Florencia, Caquetá. 20 y 21 de marzo de 2012.</li>
											<li>“III Seminario Internacional en Medio Ambiente, Biodiversidad y Desarrollo, I Simposio Nacional de Química Aplicada”. Asistente. Florencia, Caquetá. Del 30 de agosto al 2 de septiembre de 2011.</li>
										</ul>
									</div>
									<div class="tab-pane" id="m-qui">
										<p>
											<ul align="justify">
												<i class="material-icons">phone</i> Celular: 321 374 4848
												<br>
												<i class="material-icons">email</i> Correo: artunduaga.bio@gmail.com
											</ul>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>

<!-- ================ SOCIALES =============-->			
					<div class="col-md-6">
						<div class="title">
							<h3>Ciencias Sociales y Ciudadanas</h3>
						</div>
						<div class="card card-nav-tabs">
							<div class="header header-warning">
								<div class="nav-tabs-navigation">
									<div class="nav-tabs-wrapper">
										<ul class="nav nav-tabs" data-tabs="tabs">
											<li class="active">
												<a href="#d-sociales" data-toggle="tab">
													<i class="material-icons">face</i>
													Perfil
												</a>
											</li>
											<li>
												<a href="#c-sociales" data-toggle="tab">
													<i class="material-icons">chat</i>
													Formación
												</a>
											</li>
											<li>
												<a href="#m-sociales" data-toggle="tab">
													<i class="material-icons">phone</i>
													Contacto
												</a>

											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="content">
								<div class="tab-content text-center">
									<div class="tab-pane active" id="d-sociales">
										<img class="img-circle" src="assets/img/docentes/example.jpg">
										<p> <strong>Nombre </strong></p>
										<p> <strong>Profesión (Universidad)</strong></p>
									</div>
									<div class="tab-pane" id="c-sociales">
										<ul align="justify">
											<li><strong>Profesión</strong></li>
										</ul>
									</div>
									<div class="tab-pane" id="m-sociales">
										<p>
											<ul align="justify">
												<i class="material-icons">phone</i> Celular: 
												<br>
												<i class="material-icons">email</i> Correo:
											</ul>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>


<!-- ================ INGLES =============-->			
					<div class="col-md-6">
						<div class="title">
							<h3>Inglés</h3>
						</div>
						<div class="card card-nav-tabs">
							<div class="header header-success">
								<div class="nav-tabs-navigation">
									<div class="nav-tabs-wrapper">
										<ul class="nav nav-tabs" data-tabs="tabs">
											<li class="active">
												<a href="#d-english" data-toggle="tab">
													<i class="material-icons">face</i>
													Perfil
												</a>
											</li>
											<li>
												<a href="#c-english" data-toggle="tab">
													<i class="material-icons">chat</i>
													Formación
												</a>
											</li>
											<li>
												<a href="#m-english" data-toggle="tab">
													<i class="material-icons">phone</i>
													Contacto
												</a>

											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="content">
								<div class="tab-content text-center">
									<div class="tab-pane active" id="d-english">
										<img src="assets/img/docentes/example.jpg">
										<p> <strong>Nombres</strong></p>
										<p> <strong>Profesión</strong></p>
									</div>
									<div class="tab-pane" id="c-english">
										<p> Texto de Contenido1</p>
									</div>
									<div class="tab-pane" id="m-english">
										<p>Texto de Material1</p>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

<?php 
	include_once("interfaz/footer.php");
?>


</div>

	<?php
		include_once("interfaz/modals.php");
	?>
</body>
	<?php 
		include_once("interfaz/scripts.php");
	?>
</html>
