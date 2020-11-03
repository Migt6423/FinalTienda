<?php

class sqlMarcas{
	var $con;

	function sqlMarcas($con){
		$this->con = $con;
	}

    function getMarcas($activo = 1){
        //selecciono de la tabla marca solo los activos y los muestro en forma de option value
        $sql = "SELECT * FROM marca where Activo = ".$activo;
        return $this -> con -> query($sql, PDO::FETCH_ASSOC);
    }






}
?>