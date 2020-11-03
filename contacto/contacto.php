<?php
$title = 'LA TIENDA - CONTACTO';
require_once('../inc/header.php');
?>
		
		<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
		<link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
		<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
		<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
		<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
		<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
		<link rel="stylesheet" type="text/css" href="../css/util.css">
		<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===========================================================================================-->
	</head>
	<body class="is-preload">

		<!-- Header -->
		<?php include('../inc/header.php'); ?>

       <div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('../images/bg-01.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-59">
						Enviar Formulario
					</span>

					<div class="wrap-input100 validate-input" data-validate="El nombre es requerido">
						<span class="label-input100">Nombre</span>
						<input class="input100" type="text" name="nombre" placeholder="Nombre...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="El apellido es requerido">
						<span class="label-input100">Apellido</span>
						<input class="input100" type="text" name="apellido" placeholder="Apellido...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Un email valido es requerido: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Email...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="El usuario es requerido">
						<span class="label-input100">Area</span>
						<input class="input100" type="text" name="area" placeholder="Area...">
						<span class="focus-input100"></span>
					</div>

					<span class="label-input100">Comentario</span>
					<textarea name="comen" rows="10" cols="40" placeholder="Escribe aquí tus comentarios"></textarea>

					<div class="container-login100-form-btn">
						<a href="registrar-contacto.php" class="dis-block hov1 p-r-30 p-t-10 p-b-10 p-l-30" method="post" enctype="multipart/form-data">
							Enviar formulario
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>
	<?php include('../inc/footer.php'); ?>
		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/browser.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>

	</body>
</html>