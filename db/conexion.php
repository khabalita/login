<?php
    //declaro variables para pasarle a mi nueva conexion
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db_name = "login";
    
    //creo una nueva conexion y le paso por parametro los valores declarados antes
    $conexion = new mysqli($server,$user,$pass,$db_name);

    //verifico si la conexion se efectua, que me muestre un mensaje
    if($conexion->connect_error){
        die("error en la conexion: " . $conexion->connect_error);
    }else{
        //echo "conexion exitosa";
    }
?>