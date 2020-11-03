<?php 
	$title = 'LA TIENDA';
	require_once('inc/header.php');
?>
		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h1>LA TIENDA</h1>
					<p>LA TIENDA - BUENOS AIRES</p>
				</div>
				<video autoplay loop muted playsinline src="images/banner.mp4"></video>
			</section>
		<!-- Highlights -->
			<section class="wrapper">
				<div class="inner">
					<header class="special">
						<h2 style="izq">Productos destacados</h2>
					</header>
					<div >
						<section>			
    					    <td>
						      <div class="content">
								<div class="row">
								<?php
                                include("funcion/conexionDestacado.php");
                                $con = new conexionDestacado();
                                $con-> recuperarDatos();
                                ?>
								</div>
							  </div>  
						    </td>
						</section>
					</div>
				</div>
			</section>
		<!-- CTA -->
			<section id="cta" class="wrapper">	
				<div class="inner">
					<h2>LA TIENDA tiene cuotas sin interes y envios gratis a todo el pais</h2>
					<p>Trabajamos con OCA y CORREO ARGENTINO para realizar tus envios de una forma confiable</p>
				</div>
			</section>
		<!-- Footer -->
		<?php include('inc/footer.php'); ?>
		<!-- Scripts -->
			
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			
	</body>
</html>