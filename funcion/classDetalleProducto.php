<?php
class sqlDetalleProducto{
    var $con;

    function sqlDetalleProducto($con){
        $this->con = $con;
    }

    function getDetalleProducto($idProductos){
        $sql = "SELECT * FROM producto where idProducto = ".$idProductos;
        return $this -> con -> query($sql, PDO::FETCH_ASSOC);
    }

    

}
?>