<?php
class conexionDestacado{
    function recuperarDatos(){
        include ("inc/mysql-login.php");
        //selecciono de la tabla productos solo los que estan activos y sean destacados, los muestro random y con un limite de 6 productos.
        $producto = "SELECT UPPER(Nombre),Precio,Imagen,Destacado FROM producto where Activo = 1 && Destacado = 1 ORDER BY RAND() LIMIT 6";

        $resultado = $con->query($producto);
        
        while ($fila = $resultado->fetch(PDO::FETCH_NUM)){
			
            echo "<div  class='col-4'>$fila[0]<br>";
            
            echo '<img src="productos/images/' . $fila['0'] . '.jpg"/><br><br></div>';
        }
    }
}
?>