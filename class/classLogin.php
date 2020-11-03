<?php
class Login{

    var $con;

    function __construct($con){
        $this->con=$con;   
    }
    
    function validateUsuario ($usuario, $password){  
        $user="SELECT email, password FROM usuario WHERE email ='$usuario'"; 
        $contacta = $this->con->prepare($user);

        $contacta->execute();

        $row = $contacta->fetch(PDO::FETCH_ASSOC);
        
        if ($usuario ==$row['email'] && $password==$row['password']){
            return true;
        }
    }
}