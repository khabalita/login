<?php

require_once '../db/conexion.php';
session_start();

if(isset($_POST['btnModificar'])){
    if(!empty($_POST['nombre']) &&
        !empty($_POST['descripcion']) &&
        !empty($_POST['costo']) &&
        !empty($_POST['precio'])){
        
        $id=$_POST['id_producto'];    
        $nombre=$_POST['nombre'];
        $descripcion=$_POST['descripcion'];
        $costo=$_POST['costo'];
        $precio=$_POST['precio'];

        $sql = $conexion->query("UPDATE productos SET nombre='$nombre',descripcion='$descripcion',costo='$costo',precio='$precio' WHERE id_producto='$id'");
        if($sql == 1){
            echo "<br>"."producto modificado correctamente";
            header("Location: ../model/modificar.php");
        }else{
            echo "error al modificar el producto";
            header("Location: ../model/modificar.php");
        }
    }else{
        echo "complete todos los campos";
    }
}

?>