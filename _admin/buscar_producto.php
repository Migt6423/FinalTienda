<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>LA TIENDA - CMS</title>
  </head>
  <body>
    <?php require_once('../inc/headerCMS.php'); ?>
    <section id="container">

      <?php

        $busqueda = strtolower($_REQUEST['busqueda']);
        if(empty($busqueda)){
          header("location: lista_productos.php");
        }

      ?>

      <h1>Lista de Productos</h1>
      <a href="registro_producto.php" class="btn_new">Crear Producto</a>

      <form class="form_search" action="buscar_producto.php" method="get">
        <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
        <input type="submit" class="btn_search" value="Buscar">
      </form>

      <table>
        <tr>
          <th>ID</th>
          <th>Marca</th>
          <th>Nombre Producto</th>
          <th>Precio</th>
          <th>Descripción</th>
          <th>Activo</th>
          <th>Destacado</th>
          <th>Acciones</th>
        </tr>

        <?php

        $query = "SELECT p.idProducto, p.Marca_idMarca, m.idMarca, m.Nombre, p.Nombre,  p.Precio, p.Imagen, p.Activo, p.Destacado
                  FROM producto p
                  INNER JOIN marca m
                  ON p.Marca_idMarca = m.idMarca
                  WHERE (m.Nombre LIKE '%$busqueda%' OR
                         p.Nombre LIKE '%$busqueda%' OR
                         p.Imagen LIKE '%$busqueda%' OR
                         p.Activo LIKE '%$busqueda%' OR
                        p.Destacado LIKE '%$busqueda%')
                  ORDER BY p.idProducto ASC";

        $productos = $con->query($query);
        $count = $productos->rowCount();
        if($count <> 0){
          while ($data = $productos->fetch(PDO::FETCH_NUM)) {?>
            <tr>
              <td><?php echo $data[0]; ?></td>
              <td><?php echo $data[3]; ?></td>
              <td><?php echo $data[4]; ?></td>
              <td><?php echo $data[5]; ?></td>
              <td><?php echo $data[6]; ?></td>
              <?php if ($data[7] == 1){
                $activo = "TRUE";
              }else{
                $activo = "FALSE";
              }  ?>
              <td><?php echo $activo; ?></td>
              <?php if ($data[8] == 1){
                $destacado = "TRUE";
              }else{
                $destacado = "FALSE";
              } ?>
              <td><?php echo $destacado; ?></td>
              <td>
                <a class="link_edit" href="editar_producto.php?id=<?php echo $data[0]; ?>">Editar</a>
                |
                <a class="link_delete" href="habilitar_confirmar_producto.php?id=<?php echo $data[0]; ?>">Activar</a>
                |
                <a class="link_delete" href="eliminar_confirmar_producto.php?id=<?php echo $data[0]; ?>">Deshabilitar</a>
              </td>
            </tr>
            <?php
          }
        }
         ?>

      </table>

    </section>
    <?php include "../inc/footer.php" ?>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/browser.min.js"></script>
    <script src="../assets/js/breakpoints.min.js"></script>
    <script src="../assets/js/util.js"></script>
    <script src="../assets/js/main.js"></script>
  </body>
</html>
