<?php
 
    require_once '../db/conexion.php';     
    session_start();                    

    if(isset($_POST['ingresar'])){
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            $sql = "SELECT * FROM usuarios WHERE usuario = ?";            
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                $fila = $result->fetch_assoc();
                $passwordHash = $fila['password'];
                $nombre = $fila['nombre'];
                if(password_verify($password, $passwordHash)){
                    $_SESSION['logueado'] = true;
                    $_SESSION['nombre'] = $nombre;               
                    header("Location: ../model/profile.php");
                }else{
                    $_SESSION['logueado'] = false;
                    header ("Location: ../login.php");
                }
            }else{                                            
                $_SESSION['logueado'] = false;
                header("Location: ../login.html");     
            }            
        }   
    }
?>