<?php

  if(!empty($_POST)){

    require_once('../inc/headerCMS.php');

    $idmarca = $_POST['idmarca'];

    $query_delete = "UPDATE marca SET activo = 1 WHERE idmarca = $idmarca";

    $result_delete = $con->query($query_delete);

    if ($result_delete){
      header("location: lista_marca.php");
    }else{
      echo "Error al activar marca";
    }
  }

  if(empty($_REQUEST['id'])){
    header("location: lista_marca.php");
  }else{

    require_once('../inc/headerCMS.php');

    $idmarca = $_REQUEST['id'];

    $query = "SELECT idMarca, Nombre
              FROM marca
              WHERE idMarca = $idmarca";

    $result = $con->query($query);
    $count = $result->rowCount();

    if($count > 0){
      while ($data = $result->fetch(PDO::FETCH_NUM)){
        $nombre = $data[1];
      }
    }
    else{
        header("location: lista_marca.php");
    }
  }

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Habilitar Marca</title>
  </head>
  <body>
    <?php include "../inc/headerCMS.php" ?>
    <section id="">
      <div class="data_active">
        <h2>¿Está seguro de activar el siguiente registro?</h2>
        <p>Nombre: <span><?php echo $nombre; ?></span></p>

        <form method="post" action="">
          <input type="hidden" name="idmarca" value="<?php echo $idmarca; ?>">
          <a href="lista_marca.php" class="btn_ok">Cancelar</a>
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
