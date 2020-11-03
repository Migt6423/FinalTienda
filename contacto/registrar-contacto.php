<?php
	require_once '../inc/mysql-login.php';
	try {        
        	$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
            print "¡Conexión exitosa!";
        }
    catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage();
        die();
    }
    
    $sql = "INSERT INTO contacto (Nombre, Email, Area, Comentario)
           VALUES ('$_POST[nombre]', '$_POST[email]', '$_POST[area]', '$_POST[comen]')";

    $count = $con->exec($sql);
	if($count > 0 ){
		print($count."¡Consulta enviada correctamente!");
		header('Location: ../index.php'); 
	}	
	else{
		print('ERROR');
	}
?>