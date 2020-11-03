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
      <h1 style="text-align: center">Lista de Usuarios </h1> 
      <div class="mx-3">
      <a href="registro_usuario.php" class="btn btn-success" role="button">Crear Usuario</a>
      </div>
      
     
      <br>

    <!--  <form class="form_search" action="buscar_usuario.php" method="get">
        <input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
        <input type="submit" class="btn_search" value="Buscar">
      </form>                                                           ************* para en un futuro poner un search************
    -->
<div class="col-lg-12">
      <table>
        <tr>
          <th>ID</th>
          <th>Usuario</th>
          <th>Correo</th>
          <th>Perfil</th>
          <th>Acciones</th>
        </tr>

        <?php

        $query = "SELECT idUsuario, usuario.usuario_nombre, usuario.email, perfil.nombre
                  FROM usuario 
                  INNER JOIN perfil ON usuario.tipoUsuario = perfil.idPerfil 
                  ORDER BY idUsuario ASC";

        $usuarios = $con->query($query);
        $count = $usuarios->rowCount();
        if($count <> 0){
          while ($data = $usuarios->fetch(PDO::FETCH_NUM)) {?>
            <tr>
              <td><?php echo $data[0]; ?></td>
              <td><?php echo $data[1]; ?></td>
              <td><?php echo $data[2]; ?></td>
              <td><?php echo $data[3]; ?></td> <!--ACA ESTA FALLANDO, HAY QUE EDITAR ESTO-->
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
</div>
    </section>
    
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/browser.min.js"></script>
    <script src="../assets/js/breakpoints.min.js"></script>
    <script src="../assets/js/util.js"></script>
    <script src="../assets/js/main.js"></script>
  </body>

 

  <?php include "inc/footer.php" ?>
 
</html>
