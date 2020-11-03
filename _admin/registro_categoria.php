<?php
	$title = 'Registro Categoria';
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
      $activo = $_POST['activo'];

      $consulta = "SELECT * FROM categoria WHERE Nombre = '$nombre'";
      $resultado = $con->query($consulta);
      $count = $resultado->fetch(PDO::FETCH_NUM);

      if($count>0){
        $alert = '<p>La categoria ya existe</p>';
      }else{
        $query_insert_perfil = "INSERT INTO categoria(Nombre, Activo)
                          VALUES ('$nombre', '$activo')";
        $resultado2 = $con->query($query_insert_perfil);

        if($resultado2){
          $alert = '<p>Categoria creada correctamente</p>';
        }else{
          $alert = '<p>Error al crear la categoria</p>';
        }
      }
    }
  }
  ?>
  <section>
    <div class="alert"><?php echo isset($alert) ? $alert :''; ?>
    <br>
      <h1 style="text-align:center">Registro Categoria</h1>
      <hr>
      <div class="validate-input">
        <form action="" method="post">

					<label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" placeholder="Nombre">
<br>
          <label for="activo">Activo</label>
          <select class="activo" name="activo">
            <option value=0>Deshabilitado</option>
            <option value=1>Habilitado</option>
          </select>
<br>
          <input type="submit" value="Crear Categoria" class="">
        </form>
      </div>

      <div id="boton_derecha">
          <form action="lista_categoria.php">
          <input type="submit" value="Volver Atrás" />
          </form>
      </div>



    </div>
  </section>
  
  <?php include "inc/footer.php" ?>
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/browser.min.js"></script>
  <script src="../assets/js/breakpoints.min.js"></script>
  <script src="../assets/js/util.js"></script>
  <script src="../assets/js/main.js"></script>
</body>
</html>
