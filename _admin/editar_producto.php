<?php
	$title = 'Editar Producto';
?>
<body>
  <?php require_once('../inc/headerCMS.php'); ?>
  <?php
  if (!empty($_POST)){
    $alert='';

    if(empty($_POST['nombre'])){
      $alert='<p>Todos los campos son obligatorios.</p>';
    }else{

      $producto_nombre = $_POST['nombre'];
      $producto_marca = $_POST['marca'];
      $precio = $_POST['precio'];
      $descripcion = $_POST['descripcion'];
      $activo = $_POST['activo'];
      $destacado = $_POST['destacado'];
      $idproducto = $_GET['id'];

      $consulta = "SELECT m.idMarca, m.Nombre, p.idProducto, p.Marca_idMarca, p.Nombre, p.Precio, p.Imagen, p.Activo, p.Destacado
                   FROM producto p
                   INNER JOIN marca m
                   ON p.Marca_idMarca = m.idMarca
                   WHERE (p.Nombre = '$producto_nombre') AND (m.idMarca != '$producto_marca')";

      $resultado = $con->query($consulta);
      $count = $resultado->fetch(PDO::FETCH_NUM);

      if($count>0){
        $alert = '<p>El producto ya existe</p>';

      }else{
        $sql_update = "UPDATE producto
                       SET Marca_idMarca = '$producto_marca', Nombre = '$producto_nombre', Precio = '$precio', Imagen = '$descripcion',
                           Activo = '$activo', Destacado = '$destacado'
                       WHERE idProducto = $idproducto";

      $resultado2 = $con->query($sql_update);
        if($resultado2){
          $alert = '<p>Producto actualizado correctamente</p>';
        }else{
          $alert = '<p>Error al actualizar el producto</p>';
          }
        }
      }
    }

  //Mostrar datos
  if(empty($_GET['id'])){
    header('Location: lista_productos.php');
  }
  $iproducto = $_GET['id'];

  $query = "SELECT p.idProducto, p.Marca_idMarca, m.idMarca, m.Nombre, p.Nombre, p.Precio, p.Imagen, p.Activo, p.Destacado
            FROM producto p
            INNER JOIN marca m
            ON p.Marca_idMarca = m.idMarca
            WHERE p.idProducto = $iproducto";

  $resultado = $con->query($query);
  $count = $resultado->rowCount();
  if($count == 0){
    header('Location: lista_productos.php');
  }else{

    $option = '';
    while($data = $resultado->fetch(PDO::FETCH_NUM)){
      $idProducto = $data[0];
      $marca_nombre = $data[3];
      $producto_nombre = $data[4];
      $precio = $data[5];
      $descripcion = $data[6];
      $activo = $data[7];
      $destacado = $data[8];
  }
  }
  ?>
  <section>
    <div class="alert"><?php echo isset($alert) ? $alert :''; ?>
      <h1>Actualizar Producto</h1>
      <hr>
      <div class="validate-input">
        <form action="" method="post">

          <input type="hidden" name="idProducto" value="<?php echo $idProducto; ?>">

					<label for="nombre">Nombre Producto</label>
          <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $producto_nombre; ?>">

          <label for="marca">Marca</label>
          <?php
            $query_marca = "SELECT * FROM marca";
            $marcas = $con->query($query_marca);
           ?>
          <select name="marca" id="marca">
            <?php
              if (count($marcas) <> 0){
                while ($fila_marcas = $marcas->fetch(PDO::FETCH_NUM)){
            ?>DO
                  <option value="<?php echo $fila_marcas[0]; ?>"><?php echo $fila_marcas[1]; ?></option>
            <?php
                }
              }
            ?>
          </select>

          <label for="precio">Precio</label>
          <input type="number" name="precio" id="precio" placeholder="Precio" value="<?php $precio; ?>">
          <!--no pega el valor que viene de la base !-->

          <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion" value="<?php $descripcion; ?>">
            <!--no pega el valor que viene de la base !-->

          <label for="activo">Activo</label>
          <select class="activo" name="activo">
            <option value=0>Deshabilitado</option>
            <option value=1>Habilitado</option>
          </select>
          <!--no funciona si pongo deshabilitado !-->

          <label for="destacado">Destacado</label>
          <select class="destacado" name="destacado">
            <option value=0>No</option>
            <option value=1>Si</option>
          </select>
          <!--no funciona si pongo no !-->

          </select>
          <input type="submit" value="Actualizar Producto" class="">
        </form>
      </div>
    </div>
  </section>
  <?php include "../inc/footer.php" ?>
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/browser.min.js"></script>
  <script src="../assets/js/breakpoints.min.js"></script>
  <script src="../assets/js/util.js"></script>
  <script src="../assets/js/main.js"></script>
</body>
</html>
