<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>LA TIENDA - CMS</title>
  </head>
  <body>
    <?php require_once('../inc/headerCMS.php'); ?>
    <section id="container">

      <br>
      <h1 style="text-align: center">Lista de Perfiles</h1> 
        <div class="mx-3">
          <a href="registro_perfil.php" class="btn btn-success" role="button">Crear Perfil</a>
        </div>

<br>
    <div class="col-lg-12">
      <table>
        
        <tr>
          <th>ID</th>
          <th>Tipo de Perfil</th>
        </tr>

        <?php

        $query = "SELECT p.idPerfil, p.nombre
                  FROM perfil p";

        $perfiles = $con->query($query);
        $count = $perfiles->rowCount();
        if($count <> 0){
          while ($data = $perfiles->fetch(PDO::FETCH_NUM)) {?>
            <tr>
              <td><?php echo $data[0]; ?></td>
              <td><?php echo $data[1]; ?></td>
                <?php } ?>
            </tr>
            <?php
          }
         ?>
      </table>
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
