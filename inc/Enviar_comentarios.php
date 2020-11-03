<?php
// datos de conexión
$hostname = 'localhost';
$database = 'php';
$username = 'root';
$password = '';
$port     = '3306';

//Conexión
	try { 

        $conn = new mysqli($hostname, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
       // $conn = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
      //  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $comentario = $_POST['Comentario'] ; 
       
    
        $sql="INSERT INTO comentarioproducto (texto) VALUES ('$comentario')";
        mysqli_query($conn, $sql); //$conn->query($sql)// $conn->exec($sql);
        header('Location:/latienda_prefinal/latienda/productos/detalleproducto.php');
        
    }
	catch (PDOException $e) {
    	print "¡Error!: " . $e->getMessage();
    	die();
    }

?>