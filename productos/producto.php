<?php
$title = 'LA TIENDA - PRODUCTOS';
require_once('../inc/header.php');
include("../funcion/classCategoria.php");
include("../funcion/classProducto.php");
include("../funcion/classMarca.php");
?>


<nav class="navbar navbar-expand-md navbar-dark " style="background-color: #640A08;">	
    <ul class="navbar-nav col-lg-3 col-sm-12" style="margin:auto">
		<?php $cat = new sqlCategoria($con);
			foreach ($cat->getCategoria() as $row)
			{
		?>		
		<li class="nav-item dropdown">			
			<a class="nav-link dropdown-toggle" href="producto.php?cat=<?php echo $row['idCategoria']?>" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #ffffff;">
				<?php echo $row['Nombre'];?>
			</a>

			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<?php
							foreach ($cat ->getCategoria($row['idCategoria']) as $row2)
							{
						?>
							<a class="dropdown-item" href="producto.php?cat=<?php echo $row2['idCategoria']?>">
								<?php echo $row2['Nombre'];?>
							</a>
						<?php
							};
						?>

			</div>			
			<?php
			};
			?> 	
				
		</li>
							

     	<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #ffffff;">
					Marca
				</a>		
       				 <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				  		<?php $marca = new sqlMarcas($con);
                        foreach ($marca->getMarcas() as $row){
						?>
                        	<a class="dropdown-item" href="producto.php?marca=<?php echo $row['idMarca']?>">
								<?php echo $row['Nombre'];?>
							</a>
						<?php 
						};
						?>          
        			</div>
      	</li>
    </ul>  
</nav>

<section style="margin: 3em 2em 5em;">					
								<td>
								  	<div class="content col-12">
										<div class="row d-flex justify-content-center">
		
											<?php

																				
											$producto = new sqlProducto($con);
											foreach($producto->getProductosPorMarca(1) as $row2){?>   <!-- elegimos 1 para probar, la idea seria que el numero sea el idMarca-->
											
											<div class="col-lg-3 col-sm-12" style="margin-top: 2em; margin-right: 0.5em;">
														<div class="col-lg-9 col-sm-4" style="float:left; padding: 0px;">
															<?php echo $row2['Nombre'];?>
														</div>

														<div class="" style="float:right;">
															$ <?php echo $row2['Precio'];?>
														</div>
														<br>

														<div class="">
															<img class="img-fluid rounded mx-auto d-block" src="images/<?php echo $row2['Nombre'];?>.jpg"/>
														</div>
														<br>

														<div class="" style="text-align:center">
															
															<a href="detalleproducto.php"> Ver Detalle </a>
														
														</div>
											</div>
												<?php }; ?>
										</div>
									</div>  
								</td>
</section>

<!--
			<section>
				<div>
					<div>				
												
									<?php $cat = new sqlCategoria($con);
                                	foreach ($cat->getCategoria() as $row){?>
										<li><a href="www.google.com.ar"><?php echo $row['Nombre'];?></a></li>
									
									<form method="post">
										<select name="proveedor" id="search_proveedor">
										<?php 
                                		foreach ($cat->getCategoria($row ['idCategoria']) as $row2){?>
										<option value=""><?php echo $row2['Nombre'];?></option>
										<?php };?>
										</select>	
										</form>
									<?php };?>
						
			</section>
-->

<!--	no tomar en cuenta
	<section>
			<li><a href="www.google.com.ar"> Marca </a></li>
				<form method="post">
                                <select name="proveedor" id="search_proveedor">
                                    <?php $marca = new sqlMarcas($con);
                                    foreach ($marca->getMarcas() as $row){?>
                                        <option value=""><?php echo $row['Nombre'];?></option>
                                    <?php };?>
                                </select>
                </form>
		</section>
-->	
			



		<!-- Footer -->
		<?php include('../inc/footer.php'); ?>
		<!-- Scripts -->
		
	
    

			<script src="/latienda/assets/js/jquery.min.js"></script>	
			<script src="/latienda/assets/js/popper.min.js"></script>	
			<script src="/latienda/assets/js/bootstrap.min.js"></script>
			<script src="/latienda/assets/js/browser.min.js"></script>
			<script src="/latienda/assets/js/breakpoints.min.js"></script>
			<script src="/latienda/assets/js/util.js"></script>
			<script src="/latienda/assets/js/main.js"></script>
			
	</body>
</html>