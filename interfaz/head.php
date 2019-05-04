	<?php 
		include("control/conexion.php");

		$sistema = $conexion -> query("SELECT*FROM sistema WHERE idsistema='1'");
		$resultado = mysqli_fetch_assoc($sistema);
	?>
	
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="google-site-verification" content="2wLXaX7OPe0kRyIlHS_hJF-11t94GDxH_NzGjnakfw0" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<!--<title>EDÚCATE - Asesorías Académicas Edúcate | Edúcación - Capacitación y Tenacidad | Florencia, Caquetá (Colombia) | Servicios Educativos para el Examen de Estado ICFES Saber 11°</title> -->

	<title>Asesorías Académicas Edúcate | Servicios Educativos para el Examen de Estado ICFES Saber 11°</title>

  	<!--<meta name="description" content="Asesorías Académicas EDÚCATE presta servicios educativos con domicilio en la ciudad de Florencia, Caquetá, y su objeto social es ofrecer cursos presenciales de PreICFES en modalidad semestral e intensivo-vacacional a estudiantes de colegios en grado 11º en el departamento del Caquetá, con la finalidad de capacitarlos y prepararlos con altos estándares de calidad para la presentación del examen Icfes Saber 11º, logrando con ello al acceso a la educación superior y también a aspirar a lograr altos puntajes ICFES para ingresar a las Universidades Públicas, Privadas; acceder al programa del Ministerio de Educación e ICETEX “Ser Pilo Paga” y la distinción “Andrés Bello”. De la misma manera, EDÚCATE brinda asesoría en trabajos académicos de índole primaria, bachiller y universitario."> -->

  	<meta name="description" content="Asesorías Académicas EDÚCATE presta servicios educativos con domicilio en la ciudad de Florencia, Caquetá, y su objeto social es ofrecer cursos presenciales de PreICFES en modalidad semestral e intensivo-vacacional a estudiantes de colegios en grado 11° en el departamento del Caquetá, con la finalidad de capacitarlos y prepararlos con altos estándares de calidad para la presentación del examen ICFES Saber 11°.">
  	
  	<meta name="keywords" content="HTML, CSS, XML, JavaScript, PHP, BOOTSTRAP, AJAX, MYSQL">
  	<meta name="author" content="Aldair Morales Cuellar, Yeison Andres Morales">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	
	<link rel="stylesheet" href="assets/css/iconos.css" />

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<link rel="stylesheet" href="assets/fonts/fontawesome/css/all.min.css" />

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css" rel="stylesheet"/>
	<link href="assets/css/demo.css" rel="stylesheet" />
	