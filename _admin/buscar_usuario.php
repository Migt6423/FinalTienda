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
          header("location: lista_usuarios.php");
        }

      ?>

      <h1>Lista de Usuarios</h1>
      <a href="registro_usuario.php" class="btn_new">Crear Usuario</a>

      <form class="form_search" action="buscar_usuario.php" method="get">
        <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
        <input type="submit" class="btn_search" value="Buscar">
      </form>

      <table>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Usuario</th>
          <th>Perfil</th>
          <th>Acciones</th>
        </tr>

        <?php

        $query = "SELECT u.idUsuario, u.nombre, u.email, u.usuario_nombre, p.nombre
                  FROM usuario u
                  INNER JOIN perfil p
                  ON u.tipoUsuario = p.idPerfil
                  WHERE (u.idUsuario LIKE '%$busqueda%' OR
                         u.nombre LIKE '%$busqueda%' OR
                         u.email LIKE '%$busqueda%' OR
                         u.usuario_nombre LIKE '%$busqueda%' OR
                         p.nombre LIKE '%$busqueda%') 
                  AND
                  activo = 1
                  ORDER BY idUsuario ASC";

        $usuarios = $con->query($query);
        $count = $usuarios->rowCount();
        if($count <> 0){
          while ($data = $usuarios->fetch(PDO::FETCH_NUM)) {?>
            <tr>
              <td><?php echo $data[0]; ?></td>
              <td><?php echo $data[1]; ?></td>
              <td><?php echo $data[2]; ?></td>
              <td><?php echo $data[3]; ?></td>
              <td><?php echo $data[4]; ?></td>
              <td>
                <a class="link_edit" href="editar_usuario.php?id=<?php echo $data[0]; ?>">Editar</a>

                <?php
                  if($data[0] != 1){
                 ?>
                |
                <a class="link_delete" href="eliminar_confirmar_usuario.php?id=<?php echo $data[0]; ?>">Eliminar</a>

                <?php } ?>
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
