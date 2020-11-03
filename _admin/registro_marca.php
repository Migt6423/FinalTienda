<?php
	$title = 'Registro Marca';
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

      $consulta = "SELECT * FROM marca WHERE Nombre = '$nombre'";
      $resultado = $con->query($consulta);
      $count = $resultado->fetch(PDO::FETCH_NUM);

      if($count>0){
        $alert = '<p>La marca ya existe</p>';
      }else{
        $query_insert = "INSERT INTO marca(Nombre)
                          VALUES ('$nombre')";
        $resultado2 = $con->query($query_insert);
        if($resultado2){
          $alert = '<p>Marca creada correctamente</p>';
        }else{
          $alert = '<p>Error al crear la marca</p>';
        }
      }
    }
  }
  ?>
  <section>
    <div class="alert"><?php echo isset($alert) ? $alert :''; ?>
    <br>
      <h1 style="text-align:center">Registro Marcas</h1>
      <hr>
      <div class="validate-input">
        <form action="" method="post">
					<label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" placeholder="Nombre de la Marca">
          <br>
          <input type="submit" value="Crear Marca" class="">
        </form>
      </div>

      <div id="boton_derecha">
          <form action="lista_marca.php">
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
