<?php
	$title = 'Registro Producto';
?>
<body>
  <?php require_once('../inc/headerCMS.php'); ?>
  <?php
  if (!empty($_POST)){
    $alert='';

    if(empty($_POST['marca']) || empty($_POST['nombre']) || empty($_POST['precio']) || empty($_POST['descripcion']) || empty($_POST['activo'])){
      $alert='<p>Todos los campos son obligatorios.</p>';
    }else{

      $marca = $_POST['marca'];
      $nombre = ($_POST['nombre']);
      $precio = $_POST['precio'];
			$descripcion = $_POST['descripcion'];
			$activo = $_POST['activo'];
			$destacado = $_POST['destacado'];

      $consulta = "SELECT m.idMarca, m.Nombre, p.idProducto, p.Marca_idMarca, p.Nombre, p.Precio, p.Imagen, p.Activo, p.Destacado
                   FROM producto p
                   INNER JOIN marca m
                   ON p.Marca_idMarca = m.idMarca
                   WHERE (p.Nombre = '$nombre') AND (m.idMarca = '$marca')";

      $resultado = $con->query($consulta);
      $count = $resultado->fetch(PDO::FETCH_NUM);

      if($count>0){
        $alert = '<p>El producto ya existe</p>';
      }else{

        $query_insert = "INSERT INTO producto(Marca_idMarca, Nombre, Precio, Imagen, Activo, Destacado)
                          VALUES ('$marca', '$nombre', '$precio', '$descripcion', '$activo', '$destacado')";
        $resultado2 = $con->query($query_insert);
        if($resultado2){
          $alert = '<p>Producto creado correctamente</p>';
        }else{
          $alert = '<p>Error al crear el producto</p>';
        }
      }
    }
  }
  ?>
  <section>
    <div class="alert"><?php echo isset($alert) ? $alert :''; ?>
    <br>
      <h1 style="text-align: center">Registro de producto</h1>
      <hr>
      <div class="validate-input">
        <form action="" method="post">

					<label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" placeholder="Nombre">
<br>
          <label for="marca">Marca</label>
          <?php
            $query_marca = "SELECT * FROM marca";
            $marcas = $con->query($query_marca);
           ?>
          <select name="marca" id="marca">
            <?php
              if (count($marcas) <> 0){
                while ($fila_marcas = $marcas->fetch(PDO::FETCH_NUM)){
            ?>
                  <option value="<?php echo $fila_marcas[0]; ?>"><?php echo $fila_marcas[1]; ?></option>
            <?php
                }
              }
            ?>
          </select>
<br>
          <label for="precio">Precio $</label><br>
          <input type="number" name="precio" id="precio" placeholder="Precio">
<br>
<br>
          <label for="descripcion">Descripción</label>
          <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion">
<br>
          <label for="activo">Activo</label>
          <select class="activo" name="activo">
            <option value=0>Deshabilitado</option>
            <option value=1>Habilitado</option>
          </select>
          <!--no funciona si pongo deshabilitado !-->
<br>
          <label for="destacado">Destacado</label>
          <select class="destacado" name="destacado">
            <option value=0>No</option>
            <option value=1>Si</option>
          </select>
          <!--no funciona si pongo no !-->
<br>
          <input type="submit" value="Crear Producto" class="">
        </form>
      </div>
      <div id="boton_derecha">
          <form action="lista_productos.php">
          <input type="submit" value="Volver Atrás" />
          </form>
      </div>



    </div>
  </section>

  

  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/browser.min.js"></script>
  <script src="../assets/js/breakpoints.min.js"></script>
  <script src="../assets/js/util.js"></script>
  <script src="../assets/js/main.js"></script>
</body>

<?php include "inc/footer.php" ?>
</html>
