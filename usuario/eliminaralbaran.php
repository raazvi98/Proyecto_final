<?php
session_start();

include("../config/db.php");
include("../include/funciones.php");


   $id=$_GET['id'];
    $db=new Db();
   $eliminar = "DELETE FROM albaran WHERE  id_producto = '$id'";
   $resultado = $db->lanzar_consulta($eliminar);
$db->desconectar();


   header("Location: carrito.php");

?>
