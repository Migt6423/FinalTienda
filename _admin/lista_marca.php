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
      <h1 style="text-align:center">Lista de Marcas</h1>

      <div class="mx-3">
      <a href="registro_marca.php" class="btn btn-success" role="button">Crear Marca</a>
      </div>
<br>
<div class="col-lg-12">
      <table>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Activo</th>
          <th>Acciones</th>
        </tr>

        <?php

        $query = "SELECT *
                  FROM marca";

        $usuarios = $con->query($query);
        $count = $usuarios->rowCount();
        if($count <> 0){
          while ($data = $usuarios->fetch(PDO::FETCH_NUM)) {?>
            <tr>
              <td><?php echo $data[0]; ?></td>
              <td><?php echo $data[1]; ?></td>
              <?php if ($data[2] == 1){
                $activo = "Activo";
              }else{
                $activo = "No Activo";
              } ?>
              <td><?php echo $activo; ?></td>
              <td>
                <a class="link_edit" href="editar_marca.php?id=<?php echo $data[0]; ?>">Editar</a>
                |
                <a class="link_delete" href="eliminar_confirmar_marca.php?id=<?php echo $data[0]; ?>">Deshabilitar</a>
                |
                <a class="link_delete" href="habilitar_confirmar_marca.php?id=<?php echo $data[0]; ?>">Habilitar</a>
              </td>
            </tr>
            <?php
          }
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
