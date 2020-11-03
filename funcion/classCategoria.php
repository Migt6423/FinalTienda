<?php

class sqlCategoria{
	var $con;

	function sqlCategoria($con){
		$this->con = $con;
	}

    function getCategoria($idPadre = 0){
        //selecciono de la tabla marca solo los activos y los muestro en forma de option value
        $sql = "SELECT * FROM categoria where id_padre = ".$idPadre;
        return $this -> con -> query($sql, PDO::FETCH_ASSOC);
    }

    function setCateoria($datos){ 
    }

    function getCateoria($datos){ 
    }

    function delCateoria($datos){ 
    }

}
?>



