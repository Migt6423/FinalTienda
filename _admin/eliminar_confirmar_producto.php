<?php

  if(!empty($_POST)){

    require_once('../inc/headerCMS.php');

    $idproducto = $_POST['idproducto'];

    $query_delete = "UPDATE producto SET Activo = 0 WHERE idproducto = $idproducto";

    $result_delete = $con->query($query_delete);

    if ($result_delete){
      header("location: lista_productos.php");
    }else{
      echo "Error al eliminar el producto";
    }
  }

  if(empty($_REQUEST['id'])){
    header("location: lista_productos.php");
  }else{

    require_once('../inc/headerCMS.php');

    $idproducto = $_REQUEST['id'];

    $query = "SELECT idProducto, Nombre
              FROM producto
              WHERE idProducto = $idproducto";

    $result = $con->query($query);
    $count = $result->rowCount();

    if($count > 0){
      while ($data = $result->fetch(PDO::FETCH_NUM)){
        $nombre = $data[1];
      }
    }
    else{
        header("location: lista_productos.php");
    }
  }

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Eliminar Producto</title>
  </head>
  <body>
    <?php include "../inc/headerCMS.php" ?>
    <section id="">
      <div class="data_delete">
        <h2>¿Está seguro de eliminar el siguiente registro?</h2>
        <p>Nombre: <span><?php echo $nombre; ?></span></p>

        <form method="post" action="">
          <input type="hidden" name="idproducto" value="<?php echo $idproducto; ?>">
          <a href="lista_productos.php" class="btn_ok">Cancelar</a>
          <input type="submit" class="btn_ok" value="Aceptar">
        </form>

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
