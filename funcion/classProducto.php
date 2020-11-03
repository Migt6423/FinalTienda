<?php

class sqlProducto{
	var $con;

	function sqlProducto($con){
		$this->con = $con;
	}

    function getProductosPorMarca($idMarca){
        $sql = "SELECT * FROM producto where Marca_idMarca =".$idMarca;
        return $this -> con -> query($sql, PDO::FETCH_ASSOC);
    }    
}

?>
