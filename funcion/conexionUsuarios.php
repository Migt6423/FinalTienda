<?php
class conexionUsuarios{
    function recuperarDatos(){
        $host_db = "localhost";
        $user_db = "root";
        $pass_db = "";
        $db_name = "php";
        $tbl_name = "usuario";
        
        $con = new mysqli($host_db, $user_db, $pass_db, $db_name);

        if ($con->connect_error) {
        die("La conexion falló: " . $con->connect_error);
        }

        $comentario = "SELECT usuario_nombre from usuario;";

        $resultado = $con->query($comentario);
        
        while ($fila = mysqli_fetch_array($resultado)){
            echo "<div class='col-1'>$fila[usuario_nombre]</div><br>";
            
        }
    }
}
?>