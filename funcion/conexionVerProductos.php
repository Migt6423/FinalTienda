<?php
class conexionVerProductos{
    function recuperarDatos(){
        $host_db = "localhost";
        $user_db = "root";
        $pass_db = "";
        $db_name = "php";
        $tbl_name = "producto";
        
        $con = new mysqli($host_db, $user_db, $pass_db, $db_name);

        if ($con->connect_error) {
        die("La conexion falló: " . $con->connect_error);
        }

        $comentario = "SELECT Nombre,Precio from producto;";

        $resultado = $con->query($comentario);
        
        while ($fila = mysqli_fetch_array($resultado)){
            echo "<div class='col-2'>$fila[Nombre]<br>";
            echo "$fila[Precio]<br>";
			 
            echo '<img style="width:30%; style="height:30%; src="../productos/images/' . $fila['Nombre'] . '.jpg"/><br><br><br></div>';
    }
}
}
?>