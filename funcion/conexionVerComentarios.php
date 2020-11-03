<?php
class conexionVerComentarios{
    function recuperarDatos(){
        $host_db = "localhost";
        $user_db = "root";
        $pass_db = "";
        $db_name = "php";
        $tbl_name = "comentarios";
        
        $con = new mysqli($host_db, $user_db, $pass_db, $db_name);

        if ($con->connect_error) {
        die("La conexion falló: " . $con->connect_error);
        }

        $comentario = "SELECT idComentarios, Comentario from Comentarios;";

        $resultado = $con->query($comentario);
        
        while ($fila = mysqli_fetch_array($resultado)){
            echo "$fila[idComentarios]<br>";
			echo "$fila[Comentario]<br><br>";
    }
}
}
?>