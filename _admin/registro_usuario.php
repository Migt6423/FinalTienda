<?php
	$title = 'Registro Usuarios';
?>
<body>
  <?php require_once('../inc/headerCMS.php'); ?>
  <?php
  if (!empty($_POST)){
    $alert='';

    if(empty($_POST['usuario_nombre']) || empty($_POST['password']) || empty($_POST['tipoUsuario']) || empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['email'])){
      echo '<script language="javascript">alert(" Todos los campos son obligatorios. ");</script>';
    }else{

      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
			$email = $_POST['email'];
      $usuario_nombre = $_POST['usuario_nombre'];
      $password = md5($_POST['password']);
      $tipoUsuario = $_POST['tipoUsuario'];

      $consulta = "SELECT * FROM usuario WHERE usuario_nombre = '$usuario_nombre'";
      $resultado = $con->query($consulta);
      $count = $resultado->fetch(PDO::FETCH_NUM);

      if($count>0){
        
        echo '<script language="javascript">alert(" El usuario ya existe. ");</script>';
      }else{
        $query_insert = "INSERT INTO usuario (`nombre`, `apellido`, `email`, `usuario_nombre`, `password`, `tipoUsuario`) 
                          VALUES ('$nombre', '$apellido', '$email', '$usuario_nombre', '$password', '$tipoUsuario')";
        $resultado2 = $con->query($query_insert);
        if($resultado2){
          
          echo '<script language="javascript">alert(" Usuario creado correctamente ");</script>';
        }else{
          
          echo '<script language="javascript">alert(" Error al crear el usuario ");</script>';
        }
      }
    }
  }
  ?>
  <section>
    <div class="alert"><?php echo isset($alert) ? $alert :''; ?>
    <br>
      <h1 style="text-align: center">Registro usuarios</h1>
      <hr>
      <div class="validate-input">
        <form action="" method="post">
					<label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" placeholder="Nombre">
<br>
					<label for="apellido">Apellido</label>
          <input type="text" name="apellido" id="apellido" placeholder="Apellido">
<br>
					<label for="email">Email</label>
          <input type="email" name="email" id="email" placeholder="Email">
<br>
          <label for="usuario_nombre">Usuario</label>
          <input type="text" name="usuario_nombre" id="usuario_nombre" placeholder="Usuario">
<br>
          <label for="password">Password</label>
          <input type="password" name="password" id="password" placeholder="Password">
<br>
          <label for="tipoUsuario">Tipo Usuario</label>

          <?php
            $query_perfil = "SELECT * FROM perfil";
            $perfiles = $con->query($query_perfil);
           ?>

          <select name="tipoUsuario" id="tipoUsuario">

            <?php
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
          <input type="submit" value="Crear Usuario" class="">
        </form>
      </div>




     <!-- para poner a la deracha el boton atras
       <style>
      #boton_derecha{
        margin-left: 10%;
        margin-top: -4.9%;
       
      }
      </style>

      --> 
      <div id="boton_derecha">
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
