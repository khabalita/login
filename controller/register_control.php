<?php

require_once '../db/conexion.php';
session_start();

//primer validacion
//if para corroborar que los campos del formulario existen
if (isset($_POST['username']) &&
    isset($_POST['password']) &&
    isset($_POST['email']) &&
    isset($_POST['nombre']) &&
    isset($_POST['apellido'])
    ){
    //asigna los POST a variables y escapamos los datos del formulario con msqli_real_escape_string
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $username = mysqli_real_escape_string($conexion, $_POST['username']);
    $password = mysqli_real_escape_string($conexion, $_POST['password']);
    
    ;

    //segunda validacion
    //si alguno de los campos esta vacio, recarga la pagina de registro y envia un msj por URL (campos vacios)
    if (empty($nombre) || empty($apellido) || empty($email) || empty($username) || empty($password)) {
        echo '<p style="color: red;">complete todos los campos</p>';
        header("Location: ../model/register.php");
    }

    //enviamos la consulta
    $sql = "SELECT * FROM usuarios WHERE usuario = '$username'";
    $result = $conexion->query($sql);

    //tercera validacion
    //si el nombre de usuario existe
    if ($result->num_rows > 0) {
        echo '<p style="color: red;">el usuario ya existe</p>';
        header("Location: ../model/register.php");
    }

    //asigno una variable passwordHash para hashear la contraseña
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    //enviamos la consulta
    $sql = "INSERT INTO usuarios (nombre, apellido, email, usuario, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssss", $username, $passwordHash, $email, $nombre, $apellido);
    $stmt->execute();
    $stmt->close();

    //redirijo al login
    header("Location: ../login.html");
    } else {
        echo '<p style="color: red;">campos perdidos</p>';
        header("Location: ../model/register.php");
    }
?>