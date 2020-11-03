<?php
	$title = 'Actualizar Usuarios';
?>
<body>
  <?php require_once('../inc/headerCMS.php'); ?>
  <?php
  if (!empty($_POST)){
    $alert='';

    if(empty($_POST['usuario_nombre']) || empty($_POST['tipoUsuario']) || empty($_POST['nombre']) || empty($_POST['email'])){
      
      echo '<script language="javascript">alert(" Todos los campos son obligatorios ");</script>';
    }else{

      $idUsuario = $_POST['idUsuario'];
      $usuario_nombre = $_POST['usuario_nombre'];
      $password = md5($_POST['password']);
      $tipoUsuario = $_POST['tipoUsuario'];
			$nombre = $_POST['nombre'];
			$email = $_POST['email'];

      $consulta = "SELECT *
                  FROM usuario
                  WHERE (usuario_nombre = '$usuario_nombre' AND idUsuario != $idUsuario)
                  OR (email = '$email' AND idUsuario != $idUsuario)";
      $resultado = $con->query($consulta);
      $count = $resultado->fetch(PDO::FETCH_NUM);

      if($count>0){
        
        echo '<script language="javascript">alert(" El usuario o el correo ya existe ");</script>';
      }else{

        if(empty($_POST['password'])){
          $sql_update = "UPDATE usuario
                         SET nombre = '$nombre', email = '$email', usuario_nombre = '$usuario_nombre',password = '$password', tipoUsuario = '$tipoUsuario'
                         WHERE idUsuario = $idUsuario";
        }else{

          $sql_update = "UPDATE usuario
                         SET nombre = '$nombre', email = '$email', usuario_nombre = '$usuario_nombre', tipoUsuario = '$tipoUsuario'
                         WHERE idUsuario = $idUsuario";
        }

        $resultado2 = $con->query($sql_update);
        if($resultado2){
          
          echo '<script language="javascript">alert(" Usuario actualizado correctamente ");</script>';
        }else{
          
          echo '<script language="javascript">alert(" Error al actualizar el usuario ");</script>';
        }
      }
    }
  }

  //Mostrar datos
  if(empty($_GET['id'])){
    header('Location: lista_usuarios.php');
  }
  $iduser = $_GET['id'];

  $query = "SELECT u.idUsuario, u.usuario_nombre, u.nombre, u.email, (u.tipoUsuario) as idPerfil, (p.nombre) as perfil
            FROM usuario u
            INNER JOIN perfil p
            ON u.tipoUsuario = p.idPerfil
            WHERE idUsuario=$iduser";

  $resultado = $con->query($query);
  $count = $resultado->rowCount();
  if($count == 0){
    header('Location: lista_usuarios.php');
  }else{

    $option = '';
    while($data = $resultado->fetch(PDO::FETCH_ASSOC)){
      $iduser = $data['idUsuario'];
      $nombre = $data['nombre'];
      $email = $data['email'];
      $usuario = $data['usuario_nombre'];
      $idTipoUsuario = $data['idPerfil'];
      $tipoUsuario = $data['perfil'];

      if($idTipoUsuario == 1){
        $option = '<option value="'.$idTipoUsuario.'" select>'.$tipoUsuario.'</option>';
      }else if($idTipoUsuario == 2){
        $option = '<option value="'.$idTipoUsuario.'" select>'.$tipoUsuario.'</option>';
      }
    }
  }
  ?>
  <section>
    <div class="alert"><?php echo isset($alert) ? $alert :''; ?>
      <h1>Actualizar Usuario</h1>
      <hr>
      <div class="validate-input">
        <form action="" method="post">

          <input type="hidden" name="idUsuario" value="<?php echo $iduser; ?>">

					<label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>">
<br>
					<label for="email">Email</label>
          <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>">
<br>
          <label for="usuario_nombre">Usuario</label>
          <input type="text" name="usuario_nombre" id="usuario_nombre" placeholder="Usuario" value="<?php echo $usuario; ?>">
<br>
          <label for="password">Password</label>
          <input type="password" name="password" id="password" placeholder="Password">
<br>
          <label for="tipoUsuario">Tipo Usuario</label>

          <?php
            $query_perfil = "SELECT * FROM perfil";
            $perfiles = $con->query($query_perfil);
           ?>

          <select name="tipoUsuario" id="tipoUsuario" class="notItemOne">

            <?php
              echo $option;
              if (count($perfiles) <> 0){
                while ($fila_perfiles = $perfiles->fetch(PDO::FETCH_NUM)){
            ?>
                  <option value="<?php echo $fila_perfiles[0]; ?>"><?php echo $fila_perfiles[1]; ?></option>
            <?php
                }
              }
            ?>
          </select>
          <br>
          <input type="submit" value="Actualizar Usuario" class="">  

        </form> 
      </div>
      <div class="float">
          <form action="lista_usuarios.php">
          <input type="submit" value="Volver Atrás" />
          </form>
      </div>
      
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
