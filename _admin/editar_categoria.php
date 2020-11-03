<?php
	$title = 'Actualizar Categoria';
?>
<body>
  <?php require_once('../inc/headerCMS.php'); ?>
  <?php
  if (!empty($_POST)){
    $alert='';

    if(empty($_POST['nombre'])){
      $alert='<p>Todos los campos son obligatorios.</p>';
    }else{

      $nombre = $_POST['nombre'];
      $idcategoria = $_GET['id'];

      $consulta = "SELECT *
                  FROM categoria
                  WHERE Nombre = '$nombre'";
      $resultado = $con->query($consulta);
      $count = $resultado->fetch(PDO::FETCH_NUM);

      if($count>0){
        $alert = '<p>La categoria ya existe</p>';
      }else{
        $sql_update = "UPDATE categoria
                       SET Nombre = '$nombre'
                       WHERE idCategoria = $idcategoria";

      $resultado2 = $con->query($sql_update);
        if($resultado2){
          $alert = '<p>Categoria actualizada correctamente</p>';
        }else{
          $alert = '<p>Error al actualizar la categoria</p>';
          }
        }
      }
    }

  //Mostrar datos
  if(empty($_GET['id'])){
    header('Location: lista_categoria.php');
  }
  $idcategoria = $_GET['id'];

  $query = "SELECT c.idCategoria, c.Nombre
            FROM categoria c
            WHERE idCategoria=$idcategoria";

  $resultado = $con->query($query);
  $count = $resultado->rowCount();
  if($count == 0){
    header('Location: lista_categoria.php');
  }else{

    $option = '';
    while($data = $resultado->fetch(PDO::FETCH_ASSOC)){
      $idcategoria = $data['idCategoria'];
      $nombre = $data['Nombre'];
  }
  }
  ?>
  <section>
    <div class="alert"><?php echo isset($alert) ? $alert :''; ?>
      <h1>Actualizar Categoria</h1>
      <hr>
      <div class="validate-input">
        <form action="" method="post">

          <input type="hidden" name="idCategoria" value="<?php echo $idcategoria; ?>">

					<label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>">
          </select>
          <input type="submit" value="Actualizar Categoria" class="">
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
