<?php

  if(!empty($_POST)){

    require_once('../inc/headerCMS.php');

    $idcategoria = $_POST['idcategoria'];

    $query_delete = "UPDATE categoria SET Activo = 0 WHERE idCategoria = $idcategoria";

    $result_delete = $con->query($query_delete);

    if ($result_delete){
      header("location: lista_categoria.php");
    }else{
      echo "Error al eliminar la categoria";
    }
  }

  if(empty($_REQUEST['id'])){
    header("location: lista_categoria.php");
  }else{

    require_once('../inc/headerCMS.php');

    $idcategoria = $_REQUEST['id'];

    $query = "SELECT idCategoria, Nombre
              FROM categoria
              WHERE idCategoria = $idcategoria";

    $result = $con->query($query);
    $count = $result->rowCount();

    if($count > 0){
      while ($data = $result->fetch(PDO::FETCH_NUM)){
        $nombre = $data[1];
      }
    }
    else{
        header("location: lista_categoria.php");
    }
  }

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Eliminar Categoria</title>
  </head>
  <body>
    <?php include "../inc/headerCMS.php" ?>
    <section id="">
      <div class="data_delete">
        <h2>¿Está seguro de eliminar el siguiente registro?</h2>
        <p>Nombre: <span><?php echo $nombre; ?></span></p>

        <form method="post" action="">
          <input type="hidden" name="idcategoria" value="<?php echo $idcategoria; ?>">
          <a href="lista_categoria.php" class="btn_ok">Cancelar</a>
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
