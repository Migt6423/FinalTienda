<?php
$title = 'LA TIENDA - PRODUCTOS';
require_once('../inc/header.php');
include("../funcion/classCategoria.php");
include("../funcion/classProducto.php");
include("../funcion/classMarca.php");
include("../funcion/classDetalleProducto.php")
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
											$producto = new sqlDetalleProducto($con);
											foreach($producto->getDetalleProducto(1) as $row){?>  <!-- elegimos 1 para probar, la idea seria que el numero sea el idProducto-->
											
											<div class="col-lg-3 col-sm-12" style="margin-top: 2em; margin-right: 0.5em;">
												<div class="col-lg-9 col-sm-4" style="float:left; padding: 0px;"><?php echo $row['Nombre'];?>
												</div>
														<div class="" style="float:right;">
															$ <?php echo $row['Precio'];?>
														</div>
														<br>

														<div class="">
															<img class="img-fluid rounded mx-auto d-block" src="images/<?php echo $row['Nombre'];?>.jpg"/>
														</div>
														<br>

														<div class="" style="text-align:justify">
															<?php echo $row['Imagen'];?>
														</div>
											</div>
												<?php }; ?>
										</div>
									</div>  
								</td>
								<div style="text-align:center;justify-content:center"> 
								
<?php
$hostname = 'localhost';
$database = 'php';
$username = 'root';
$password = '';
$port     = '3306';

$conexion = mysqli_connect($hostname, $username, $password);
$db = mysqli_select_db( $conexion, $database) or die ("ERROR!");  
////Obteniendo registros de la base de datos a traves de una consulta SQL
$consulta="SELECT cp.texto, u.usuario_nombre as usuario
FROM comentarioproducto cp, usuario u
WHERE cp.id_usuario = u.idUsuario";
$datos = mysqli_query($conexion, $consulta);
?>
    <div style="justify-content: center; align-center: center;">
    <div> <h1>COMENTARIOS</h1> </div>
<?php       
    while ($rows = mysqli_fetch_array($datos)){
		
        ?>
		<br>
    <div> Usuario: <?php echo$rows['usuario']?> <br>
            Comentario: <?php echo$rows['texto']?>
            <hr>
			<br>
			





	</div>
	<?php
}
?>
    </div>

								</div>
								<?php if(!empty($_SESSION["usuario"])){
?>
								<div style="text-align:center;justify-content:center"> 
								<form action="../inc/Enviar_comentarios.php" method="post">
								<label for=" Comentarios"> Comentarios: </label>
								<input type="text" name="Comentario" id="Comentario">
								<button type= "submit" class="btn" >Enviar</button>
								</form>

								</div>
								<?php

								}
								?>

</section>


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