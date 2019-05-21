<?php
session_start();
$id_producto = $_POST["id_producto"];

include("../config/db.php");
include("../include/funciones.php");

$contenido = $_POST["contenido"];



$db = new Db();
$sql = "INSERT INTO comentarios (contenido,fecha_publicacion,id_producto,id_usuario) VALUES (?, now(), ?, ?)";
$db->lanzar_consulta($sql, array($contenido,  $id_producto,$_SESSION["id"]));

$db->desconectar();
header("Location: index.php?id=producto&id_producto=$id_producto");
