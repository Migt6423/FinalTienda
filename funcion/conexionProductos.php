<?php
class conexionProductos{
    function recuperarDatos(){
        include ("inc/mysql-login.php");
        //selecciono de la tabla productos solo los que estan activos y los ordeno de forma que se muestren primero los destacados
        $producto = "SELECT UPPER(Nombre),Precio,Imagen FROM producto where Activo = 1 ORDER BY Destacado DESC";

        $resultado = $con->query($producto);
        
        while ($fila = $resultado->fetch(PDO::FETCH_NUM)){
            echo "<div class='col-3'>$fila[0]<br>";
            echo "$fila[1]<br>";
            echo '<img src="images/' . $fila['0'] . '.jpg"/>';
			echo "$fila[2]<br></div>"; 
        }
    }
}
?>