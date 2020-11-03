<?php
	$title = 'Actualizar Marca';
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
      $idmarca = $_GET['id'];

      $consulta = "SELECT *
                  FROM marca
                  WHERE nombre = '$nombre'";
      $resultado = $con->query($consulta);
      $count = $resultado->fetch(PDO::FETCH_NUM);

      if($count>0){
        $alert = '<p>La marca ya existe</p>';
      }else{
        $sql_update = "UPDATE marca
                       SET Nombre = '$nombre'
                       WHERE idMarca = $idmarca";

      $resultado2 = $con->query($sql_update);
        if($resultado2){
          $alert = '<p>Marca actualizada correctamente</p>';
        }else{
          $alert = '<p>Error al actualizar la marca</p>';
          }
        }
      }
    }

  //Mostrar datos
  if(empty($_GET['id'])){
    header('Location: lista_marca.php');
  }
  $idmarca = $_GET['id'];

  $query = "SELECT m.idMarca, m.Nombre
            FROM marca m
            WHERE idMarca=$idmarca";

  $resultado = $con->query($query);
  $count = $resultado->rowCount();
  if($count == 0){
    header('Location: lista_marca.php');
  }else{

    $option = '';
    while($data = $resultado->fetch(PDO::FETCH_ASSOC)){
      $iduser = $data['idMarca'];
      $nombre = $data['Nombre'];
  }
  }
  ?>
  <section>
    <div class="alert"><?php echo isset($alert) ? $alert :''; ?>
      <h1>Actualizar Marca</h1>
      <hr>
      <div class="validate-input">
        <form action="" method="post">

          <input type="hidden" name="idMarca" value="<?php echo $idmarca; ?>">

					<label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>">
          </select>
          <input type="submit" value="Actualizar Marca" class="">
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
