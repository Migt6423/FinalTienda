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
      <h1 style="text-align:center">Lista de Categorias</h1>
      <div class="mx-3">      
      <a href="registro_categoria.php" class="btn btn-success" role="button">Crear Marca</a>
      </div>

      <br>

<div class="col-lg-12">
      <table>
        <tr>
          <th>ID</th>
          <th>Marca</th>
          <th>Nombre Producto</th>
          <th>Nombre Categoria</th>
          <th>Activo</th>
          <th>Acciones</th>
        </tr>

        <?php

        $query = "SELECT c.idCategoria, c.Producto_Marca_idMarca, c.Producto_idProducto, c.Nombre, c.Activo, m.idMarca, p.idProducto,
                         m.Nombre, p.Nombre
                  FROM categoria c
                  INNER JOIN marca m ON c.Producto_Marca_idMarca = m.idMarca
                  INNER JOIN producto p ON c.Producto_idProducto = p.idProducto
                  ORDER BY c.idCategoria ASC";

        $categorias = $con->query($query);
        $count = $categorias->rowCount();

        if($count <> 0){
          while ($data = $categorias->fetch(PDO::FETCH_NUM)) {?>
            <tr>
              <td><?php echo $data[0]; ?></td>
              <td><?php echo $data[7]; ?></td>
              <td><?php echo $data[8]; ?></td>
              <td><?php echo $data[3]; ?></td>
              <?php if ($data[4] == 1){
                $activo = "Activo";
              }else{
                $activo = "No Activo";
              }  ?>
              <td><?php echo $activo; ?></td>
              <td>
                <a class="link_edit" href="editar_categoria.php?id=<?php echo $data[0]; ?>">Editar</a>
                |
                <a class="link_delete" href="habilitar_confirmar_categoria.php?id=<?php echo $data[0]; ?>">Activar</a>
                |
                <a class="link_delete" href="eliminar_confirmar_categoria.php?id=<?php echo $data[0]; ?>">Deshabilitar</a>
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
