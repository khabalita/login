<?php

require_once '../db/conexion.php';
session_start();

if(!empty($_GET['id_producto'])){
    $id = $_GET['id_producto'];
    $sql = $conexion->query("DELETE FROM productos WHERE id_producto='$id'");
    if($sql==1){
        echo '<div>producto eliminado con exito</div>';
        header("Location: ../model/admin.php");
    }else{
        echo '<div>Ha ocurrido un error al intentar eliminar</div>';
        header("Location: ../model/admin.php");
    }
    header("Location: ../model/admin.php");

}

?>