<?php
require_once("../config/config.php");

include_once("../class/classLogin.php");
include_once("../inc/mysql-login.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);

$loggerin=new Login($con);

if(empty($_POST["usuario"]) || empty($_POST["password"])):
    echo '<script language="javascript">alert(" Usuario y Pass requeridos ");</script>';
    
    header("Refresh: 0; URL= ../_admin/login.php");
    die();
endif;

$user = $_POST["usuario"];
$password = $_POST["password"];

$isValid = $loggerin->validateUsuario($user, $password);

    if(!$isValid){
        $_SESSION["estado"] = "error";
        $_SESSION["mensaje"] = "Los datos ingresados son incorrectos";

        header("Location:../_admin/login.php");
        die();
    }else{
        $_SESSION["usuario"] = [
            "email" => $usuario
        ];
}


/*ingreso correcto*/
header("Location:../_admin/index.php");

