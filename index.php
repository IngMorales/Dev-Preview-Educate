<?php
session_start();
//Las Cookies son para el manejo de sesiones en la plataforma
$cookie_name = "educate";
if ( isset( $_SESSION[ 'u_user' ] ) ) {
	$cookie_value = $_SESSION[ 'u_user' ];
	setcookie( $cookie_name, $cookie_value, time() + ( 3600 ), "/" ); // 1 Hora
	header( "Location: panel/index" );
}

if ( isset( $_SESSION[ 'u_admin' ] ) ) {
	$cookie_value = $_SESSION[ 'u_admin' ];
	setcookie( $cookie_name, $cookie_value, time() + ( 3600 ), "/" ); // 1 Hora
	header( "Location: panel/index" );
}

if ( isset( $_SESSION[ 'u_teacher' ] ) ) {
	$cookie_value = $_SESSION[ 'u_teacher' ];
	setcookie( $cookie_name, $cookie_value, time() + ( 3600 ), "/" ); // 1 Hora
	header( "Location: panel/index" );
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
	<?php 
		include_once("control/conexion.php");
		include_once("interfaz/head.php");
		?>

</head>

<body class="index-page">
	
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_ES/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=setup_tool
  page_id="1726546127381991"
  logged_in_greeting=" ¡Hola! como podemos ayudarte?"
  logged_out_greeting=" ¡Hola! como podemos ayudarte?">
</div>
	<?php 
		include_once("interfaz/nav.php");
		?>
	<div class="wrapper">

		<div class="header header-filter" style="background-image: url('assets/img/bg2.jpeg');">
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
						<div class="col-md-12 text-right" align="right">
							<div class="right">
								<div class="fb-like" data-href="https://www.facebook.com/asesoriasacademicaseducate/" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
							</div>
						</div>
					</div>
				</div>
				
				
				<!-- CONTENIDO DESPUES DE INICIAR EL PREICFES -->
				
				<div class="container">
					<div class="row">
						<center>
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<div class="title">
									<h3>Inicio Curso <strong>PreICFES Semestral</strong> (Febrero a Agosto) 2019</h3>
								</div>
								<div class="card card-nav-tabs">
									<div class="header header-danger">
										<div class="nav-tabs-navigation">
											<div class="nav-tabs-wrapper">
											
												<ul class="nav nav-tabs" data-tabs="tabs">
													<li class="active">
														<a href="#descripcion" data-toggle="tab">
																<i class="material-icons">face</i>
																Descripción
														</a>
													</li>
													<li>
														<a href="#contenido" data-toggle="tab">
																<i class="material-icons">chat</i>
																Contenido del Curso
															</a>
													

													</li>
													<li>
														<a href="#material" data-toggle="tab">
																<i class="material-icons">assignment_returned</i>
																Material y Elección
															</a>
													


													</li>
												</ul>
												
											</div>
										</div>
									</div>

									<div class="content" align="center">
										<div class="tab-content text-center">
											<div class="tab-pane active" id="descripcion">
												<p align="center" class="h3">
													<div class="alert alert-success">
														Inicio el <strong>Curso PreICFES</strong> Semestral 2019 en Florencia, Caquetá. con la vinculación de estudiantes del Municipio de La Montañita, San Vicente del Caguán, Florencia y Cartagena del Chairá.
													</div>
												</p>
												<a href="assets/img/intro/intro_page.jpg" target="_blank">
													<img src="assets/img/intro/intro_page.jpg" height="330" width="300">
													<br>
												</a>
												<br>
												
												<p> Nuestro PreICFES Semestral cuenta con un excelente material didáctico bastante completo, de alto nivel de exigencia, diseñado técnica y científicamente por nuestros docentes investigadores, que lo mejoran y perfeccionan cada semestre.</p>

												<p> El Curso Curso <strong>PreICFES</strong> Semestral 2019, es la oportunidad ideal para Obtener buenos resultados en el examen de Estado <strong>ICFES Saber 11°</strong>
												</p>

												<p>
													<ul align="justify">
														<li>Aprovecha Nuestros Descuentos Obtenga mejores Resultados en el Examen Saber 11°.</li>
														<li>Clases todos los Sábados de 08:00 A.M a 12:00 M.</li>
														<li>Incluimos material didactico actualizado al nuevo Examen ICFES Saber 11°.</li>
														<li>Trabajo colaborativo con profesionales en cada componente.</li>
														<li>Test Vocacional para gestionar tu proyecto de vida.</li>
														<li>Sesiones de resolución preguntas Universidad Nacional y Universidad de Antioquia.</li>
														<li>Retroalimentación con resultados de cada simulacro.</li>
													</ul>
												</p>
													<a href="registro" class="btn btn-success btn-lg">
														<i class="material-icons">dashboard</i> Inscríbete Ya!
													</a>
													
													<a href="https://blog.asesoriaseducate.com/" class="btn btn-danger btn-lg" target="_blank">
														<i class="material-icons">extension</i> NOTICIAS
													</a>
													
											</div>
											<div class="tab-pane" id="contenido">
												<p>
													<img src="assets/img/images/aviso-texto.png" height="150" width="260">
												</p>
												<p>
													Para Obtener <strong>Mejores Resultados</strong> el Curso <strong>PreICFES Semestral</strong> 2019, Incluye:
													<ul align="justify">
														<li>26 clases 100% presenciales.</li>
														<li>Capacitación y preparación con profesores profesionales en cada uno de los componentes evaluados por el examen Icfes saber 11º.</li>
														<li>7 <strong>SIMULACROS</strong>, 3 de ellos 100% presenciales con la misma duración de la prueba real y 4 simulacros totalmente virtuales de corta duración (2 horas), con retroalimentación de resultados y material impreso de alta calidad.</li>
														<li>Incluye guías tipo Saber 11º actualizadas al nuevo Examen ICFES.</li>
														<li>DVD con más de 600 preguntas tipo ICFES Saber 11°.</li>
														<li>Incluye hábitos y técnicas de estudio para el Examen ICFES Saber 11º.</li>
														<li>Talleres de lecturas matemáticas.</li>
														<li>Talleres de lectura rápida y eficaz.</li>
														<li>Talleres de desarrollo de habilidades numéricas.</li>
														<li>Talleres de desarrollo de habilidades de pensamiento.</li>
														<li>Talleres para el desarrollo de la inteligencia verbal.</li>
														<li>Temas motivacionales y de crecimiento personal.</li>
														<li>Talleres de obras literarias.</li>
														<li>Preparación enfocada en las áreas de competencias evaluadas por el ICFES.</li>
														<li>Incluye acceso a plataforma virtual para aprendizaje en línea con material didáctico, foros y evaluaciones.</li>
														<li>Tareas Virtuales y control de rendimiento en la plataforma web.</li>
														<li>Material impreso de las pruebas 100% actualizado al nuevo ICFES Saber 11º.</li>
														<li>Taller psico motivacional para el manejo del estrés y la ansiedad.</li>
														<li>Test de orientación profesional (para que escojas la carrera según tu vocación).</li>
														<li>Refrigerios en los 3 simulacros.</li>
														<li>Sesiones de estudio examen Universidad Nacional de Colombia y Universidad de Antioquia.</li>
														<li>Certificación digital al finalizar el curso.</li>
													</ul>
												</p>
												<div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4">
													<a href="registro" class="btn btn-success btn-lg">
														<i class="material-icons">dashboard</i> Inscríbete Ya!
													</a>
												

												</div>
											</div>
											<div class="tab-pane" id="material">
												<h3> ¿Por qué elegir <strong>Asesorías Académicas Edúcate</strong>?</h3>
												
												<p>Tal vez el estudiante o padre de familia cree las admisiones por puntaje ICFES en la Universidad pública del país o al Servicio Nacional de Aprendizaje SENA es difícil, pero NO es así, realmente es más simple de lo que te imaginas con nuestra metodología de estudio y la dedicación del estudiante. </p>
												
												<p>La especializada metodología de Asesorías Académicas Edúcate está pensada y diseñada para que los estudiantes desarrollen la capacidad intelectual necesaria para el examen de Estado ICFES Saber 11°, para que estudie inteligentemente con el máximo rendimiento.</p>
												
												<h3> Nuestro Material PreICFES esta diseñado para que obtengas <strong>Mejores Resultados</strong></h3>
												
												<p>Tendremos 3 simulacros totalmente presenciales dominicales, también se incluyen 4 simulacros virtuales en nuestra aula virtual, se entregará material impreso de alta calidad. </p>
												
												<h4>PreICFES de Asesorías Académicas Edúcate, un PreICFES de Alto Rendimiento!</h4>
												
												<div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4">
													<a href="registro" class="btn btn-success btn-lg">
															<i class="material-icons">dashboard</i> Inscríbete Ya!
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-2"></div>
						</center>
					</div>
				</div>
				
				<!-- AQUÍ VA EL CONTENIDO DE LA PÁGINA PRINCIPAL -->
				
				<!--
				<div class="container">
					<div class="row">
						<center>
							<div class="col-md-6">
								<div class="title">
									<h3>Curso <strong>PreICFES Semestral</strong> (Febrero a Agosto) 2019</h3>
								</div>
								<div class="card card-nav-tabs">
									<div class="header header-danger">
										<div class="nav-tabs-navigation">
											<div class="nav-tabs-wrapper">
												<ul class="nav nav-tabs" data-tabs="tabs">
													<li class="active">
														<a href="#descripcion" data-toggle="tab">
																<i class="material-icons">face</i>
																Descripción
															</a>
													

													</li>
													<li>
														<a href="#contenido" data-toggle="tab">
																<i class="material-icons">chat</i>
																Contenido
															</a>
													

													</li>
													<li>
														<a href="#material" data-toggle="tab">
																<i class="material-icons">assignment_returned</i>
																Material
															</a>
													


													</li>
												</ul>
											</div>
										</div>
									</div>

									<div class="content" align="center">
										<div class="tab-content text-center">
											<div class="tab-pane active" id="descripcion">
												<p align="center" class="h3">
													<div class="alert alert-success">
														Las Inscripciones para el Curso de <strong>PreICFES Semestral 2019</strong> estarán abiertas hasta el 09 de Febrero de 2019.
													</div>
												</p>
												<a href="assets/img/publicidad/01_volante_original.png" target="_blank"><img src="assets/img/publicidad/01_copia.jpg" height="300" width="220"></a>

												<a href="assets/img/publicidad/02_volante_original.png" target="_blank"><img src="assets/img/publicidad/02_copia.jpg" height="300" width="220"></a>

												<p> El Curso Curso <strong>PreICFES</strong> Semestral 2019, es la oportunidad ideal para Obtener buenos resultados en el examen de Estado <strong>Saber 11°</strong>
												</p>

												<p>
													<ul align="justify">
														<li>Aprovecha Nuestros Descuentos Obtenga mejores Resultados en el Examen Saber 11°.</li>
														<li>Clases todos los Sábados a partir del 02 de Febrero de 2019 de 08:00 A.M a 12:00 M.</li>
														<li>Incluimos material didactico actualizado al nuevo Examen ICFES Saber 11°.</li>
														<li>Trabajo colaborativo con profesionales en cada componente.</li>
														<li>Test Vocacional para gestionar tu proyecto de vida.</li>
														<li>Sesiones de resolución preguntas Universidad Nacional y Universidad de Antioquia.</li>
														<li>Retroalimentación con resultados de cada simulacro.</li>
													</ul>
												</p>

												<div class="col-xs-6 text-center">
													<a href="registro" class="btn btn-success btn-lg">
														<i class="material-icons">dashboard</i> Inscríbete Ya!
													</a>
												</div>
												
												<div class="col-xs-5 text-center">
													<a href="documentos/inscripcion2019.pdf" target="_blank" class="btn btn-danger btn-lg">
														<i class="material-icons">assignment</i> Formato Inscripción
													</a>
												</div>
											</div>
											<div class="tab-pane" id="contenido">
												<p>
													<img src="assets/img/images/aviso-texto.png" height="150" width="260">
												</p>
												<p>
													El Curso <strong>PreICFES Semestral</strong> 2019, Incluye:
													<ul align="justify">
														<li>26 clases 100% presenciales.</li>
														<li>Capacitación y preparación con profesores profesionales en cada uno de los componentes evaluados por el examen Icfes saber 11º.</li>
														<li>3 simulacros presenciales dominicales y 1 simulacro totalmente virtual con la misma intensidad horaria, con retroalimentación de resultados.</li>
														<li>Incluye guías tipo saber11º actualizadas al nuevo Examen ICFES.</li>
														<li>3 DVD’s interactivos con más de 600 preguntas tipo ICFES Saber 11°.</li>
														<li>Incluye hábitos y técnicas de estudio para el Examen ICFES Saber 11º.</li>
														<li>Preparación enfocada en las áreas de competencias evaluadas por el ICFES.</li>
														<li>Incluye acceso a plataforma virtual para aprendizaje en línea con material didáctico, foros y evaluaciones.</li>
														<li>Tareas Virtuales y control de rendimiento en la plataforma web.</li>
														<li>Material impreso de las pruebas 100% actualizado al nuevo ICFES Saber 11º.</li>
														<li>Taller psico motivacional para el manejo del estrés y la ansiedad.</li>
														<li>Refrigerios en los 3 simulacros.</li>
														<li>Sesiones de estudio examen Universidad Nacional de Colombia y Universidad de Antioquia.</li>
														<li>Certificación digital al finalizar el curso.</li>
													</ul>
												</p>
												<div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4">
													<a href="registro" class="btn btn-success btn-lg">
															<i class="material-icons">dashboard</i> Inscríbete Ya!
														</a>
												

												</div>
											</div>
											<div class="tab-pane" id="material">
												<p> Material de Descargas para el Estudio durante el Curso PreICFES Intensivo Vacacional, estará Disponible una vez de inicie el mismo</p>
												<div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4">
													<a href="registro" class="btn btn-success btn-lg">
															<i class="material-icons">dashboard</i> Inscríbete Ya!
														</a>
												

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</center>

						<center>
							<div class="col-md-6">
								<div class="title">
									<h3>Guía para Compra en Línea <strong>PreICFES Semestral</strong> 2019</h3>
								</div>
								<div class="card card-nav-tabs">
									<div class="header header-primary">
										<div class="nav-tabs-navigation">
											<div class="nav-tabs-wrapper">
												<ul class="nav nav-tabs" data-tabs="tabs">
													<li class="active">
														<a href="#descripcionse" data-toggle="tab">
																<i class="material-icons">face</i>
																Descripción
															</a>
													

													</li>
												</ul>
											</div>
										</div>
									</div>

									<div class="content" align="center">
										<div class="tab-content text-center">
											<div class="tab-pane active" id="descripcionse">
												<p align="center" class="h3">
													<div class="alert alert-info">
														Puedes adquirir un cupo por adelantado comprando el curso <strong>PreICFES Semestral 2019</strong> en nuestra <strong>Tienda Virtual</strong>
													</div>
													<a href="assets/img/publicidad/poster_original.png" target="_blank"><img src="assets/img/publicidad/porter_copia.jpg" height="300" width="250"></a>
												</p>

												<p align="center">
													Para comprar el curso da clic en el Botón "Comprar".
													<a href="https://tienda.asesoriaseducate.com/" target="_blank" class="btn btn-danger btn-lg">Comprar</a>
												</p>
												<p>
													Una vez ingreses a la <strong>Tienda Virtual</strong> sigue los pasos de compra y paga mediante transferencia  bancaría o consignación a:
													<ul align="justify">
														<li> Cuenta de Ahorro Bancolombia <strong>466-510327-17</strong>.</li>
														<li> Titular de la Cuenta: <strong>Ingerson Aldair Morales Cuéllar</strong>.</li>
														<li> Documento: <strong>1.117.535.254</strong> de Florencia, Caquetá.</li>
														<li> Teléfono: <strong>310 319 9146</strong>.</li>
													</ul>
												</p>

												<p align="center">
													<strong>Recuerde: </strong> Para habilitar en la tienda virtual el estado de pendiente a activo en la comprar, debe enviar el recibo de la transferencia o consignación bancaría al correo <strong>asesoriasacademicaseducate@gmail.com</strong> o 310 319 9146 - 320 375 7000 con los datos de registro del estudiante.
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</center>
					</div>
				</div>
				-->
				
				<!-- AQUÍ TERMINA EL CONTENIDO DE LA PÁGINA PRINCIPAL -->
				
			</div>
			<div class="section">
				<div class="container tim-container">
					<div id="images">
						<center>
							<div class="row" align="center">
								<div class="col-4"></div>
								<div class="col-4">
									<h2>¿Tienes Preguntas?</h2>
									<div style="text-align:center">
										<img src="assets/img/whatsapp.png" width="400" height="130">
									</div>
									<a href="https://api.whatsapp.com/send?phone=573203757000&text=Hola%2C%20deseo%20obtener%20el%20más%20información%20del%20PreICFES" class="btn btn-danger" target="_blank"><h2>320 375 7000</h2></a>
									
									<a href="https://api.whatsapp.com/send?phone=573103199146&text=Hola%2C%20deseo%20obtener%20el%20más%20información%20del%20PreICFES" class="btn btn-danger" target="_blank"><h2>310 319 9146</h2></a>
								</div>
							</div>

						</center>
					</div>
				</div>

			</div>


			<div class="section section-download">
				<?php 
					$consultar = "SELECT * FROM publicacion";
					$contador = 1;
					foreach ($conexion -> query($consultar) as $rs) {

						if ($rs['estado'] == 1) {
							if ($contador <= 100) {
								echo "<div class='container'>";
								echo "<p align='left'>Publicado: ".$rs['fecha']."</p>";
								echo "<div class='row text-center'>";
								echo "<div class='col-md-8 col-md-offset-2'>";
								$textoT = $rs['titulo'];
								$codificacionT = mb_detect_encoding($textoT, "UTF-8, ISO-8859-1");
								$textoT = iconv($codificacionT, 'UTF-8', $textoT);

								echo "<h2>".$textoT."</h2>";
        						//echo "<h2>".$rs['titulo']."</h2>";
        						//echo "<img src='".$rs['imagen']."' height='100' width='100'>";
								if ($rs['imagen'] != null || $rs['imagen'] != "") {
									echo "<a href='".$rs['imagen']."' target='_blank'><h2><img src='".$rs['imagen']."' width='400' height='130' ></h2></a>";
								}
								$parrafo1 = $rs['parrafo1'];
								$codificacion1 = mb_detect_encoding($parrafo1, "UTF-8, ISO-8859-1");
								$parrafo1 = iconv($codificacion1, 'UTF-8', $parrafo1);
								echo "<h4>".$parrafo1."</h4>";
								
								$parrafo2 = $rs['parrafo2'];
								$codificacion2 = mb_detect_encoding($parrafo2, "UTF-8, ISO-8859-1");
								$parrafo2 = iconv($codificacion2, 'UTF-8', $parrafo2);
								echo "<h4>".$parrafo2."</h4>";
								
								$parrafo3 = $rs['parrafo3'];
								$codificacion3 = mb_detect_encoding($parrafo3, "UTF-8, ISO-8859-1");
								$parrafo3 = iconv($codificacion3, 'UTF-8', $parrafo3);
								echo "<h4>".$parrafo3."</h4>";
								
								$parrafo4 = $rs['parrafo4'];
								$codificacion4 = mb_detect_encoding($parrafo4, "UTF-8, ISO-8859-1");
								$parrafo4 = iconv($codificacion4, 'UTF-8', $parrafo4);
								echo "<h4>".$parrafo4."</h4>";
								
								$parrafo5 = $rs['parrafo5'];
								$codificacion5 = mb_detect_encoding($parrafo5, "UTF-8, ISO-8859-1");
								$parrafo5 = iconv($codificacion5, 'UTF-8', $parrafo5);
								echo "<h4>".$parrafo5."</h4>";
								
								
        						//echo "<h4>".$rs['descripcion']."</h4>";
								echo "</div>";
								echo "</div>";
								echo "</div>";
							}
						}

						$contador++;
					}
					?>

			</div>

		</div>
		<?php 
			include_once("interfaz/footer.php");
			?>


	</div>

	<?php
	include_once( "interfaz/modals.php" );
	if ( !isset( $_COOKIE[ $cookie_name ] ) ) {
		//echo "Cookie '" . $cookie_name . "' No esta en Uso!";
	} else {
		//echo "Cookie '" . $cookie_name . "' Esta en Uso!<br>";
		//echo "Su Valor es: " . $_COOKIE[$cookie_name];
	}
	?>
	<div id="fb-root"></div>
	
</body>


<script>
	( function ( d, s, id ) {
		var js, fjs = d.getElementsByTagName( s )[ 0 ];
		if ( d.getElementById( id ) ) return;
		js = d.createElement( s );
		js.id = id;
		js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0';
		fjs.parentNode.insertBefore( js, fjs );
	}( document, 'script', 'facebook-jssdk' ) );
</script>

<?php 
	include_once("interfaz/scripts.php");
	//include_once("interfaz/video.php");
	?>

</html>