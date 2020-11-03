<?php

  if(!empty($_POST)){
    if($_POST['idusuario'] == 1){
      header("location: lista_usuarios.php");
      exit;
    }
    require_once('../inc/headerCMS.php');

    $idusuario = $_POST['idusuario'];

    //$query_delete = "DELETE FROM  usuario WHERE idUsuario = $idusuario";
    $query_delete = "DELETE FROM  usuario WHERE idUsuario = $idusuario";

    $result_delete = $con->query($query_delete);

    if ($result_delete){

      echo '<script language="javascript">alert(" Usuario eliminado correctamente ");</script>';
      
      
    }else{
      
      echo '<script language="javascript">alert(" Error al eliminar ");</script>';
    }
  }

  if(empty($_REQUEST['id']) || $_REQUEST['id']==1){
    header ("location: lista_usuarios.php");
  }else{

    require_once('../inc/headerCMS.php');

    $idusuario = $_REQUEST['id'];

    $query = "SELECT u.nombre, u.usuario_nombre, u.tipoUsuario, p.nombre, p.idPerfil
              FROM usuario u
              INNER JOIN perfil p
              ON u.tipoUsuario = p.idPerfil
              WHERE u.idUsuario = $idusuario";

    $result = $con->query($query);
    $count = $result->rowCount();

    if($count > 0){
      while ($data = $result->fetch(PDO::FETCH_NUM)){
        $nombre = $data[0];
        $usuario = $data[1];
        $perfil = $data[3];
      }
    }
    else{
      echo '<script language="javascript">alert(" Usuario eliminado correctamente ");</script>';
    }
  }

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    
    <title>Eliminar Usuario</title>
  </head>
  <body>
    <?php include "../inc/headerCMS.php" ?>
    <section id="">
      <div class="data_delete">
        <h1>¿Está seguro de eliminar el siguiente registro?</h1>
        <p>Nombre: <span><?php echo $nombre; ?></span></p>
        <p>Usuario: <span><?php echo $usuario; ?></span></p>
        <p>Tipo Usuario: <span><?php echo $perfil; ?></span></p>

        <form method="post" action="">
                   
          <button type="submit" class="btn btn-primary">Aceptar</button>
          
          <a href="lista_usuarios.php" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Cancelar</a>
          

        </form>

      </div>
    </section>
    
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/browser.min.js"></script>
    <script src="../assets/js/breakpoints.min.js"></script>
    <script src="../assets/js/util.js"></script>
    <script src="../assets/js/main.js"></script>
  </body>
</html>
<?php include "inc/footer.php" ?>