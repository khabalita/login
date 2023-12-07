<?php
    require_once '../db/conexion.php';
    session_start();

    if(isset($_POST['btnAgregar'])){
        if(!empty($_POST['nombre']) &&
            !empty($_POST['descripcion']) &&
            !empty($_POST['costo']) &&
            !empty($_POST['precio'])){
            
            $nombre=$_POST['nombre'];
            $descripcion=$_POST['descripcion'];
            $costo=$_POST['costo'];
            $precio=$_POST['precio'];

            $sql = $conexion->query("INSERT INTO productos(nombre, descripcion, costo, precio) VALUES('$nombre','$descripcion','$costo','$precio')");
            if($sql == 1){
                echo "<br>"."producto agregado correctamente";
                header("Location: ../model/admin.php");
            }else{
                echo "error al registrar el producto";
                header("Location: ../model/admin.php");
            }
        }else{
            echo "complete todos los campos";
        }
    }
?>