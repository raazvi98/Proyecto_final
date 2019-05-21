<?php
session_start();
if (!isset($_SESSION["usuario"]))
    header("location: ./login.php");

include("../config/db.php");
include("../include/funciones.php");

$nombre = $_POST["nombre"];
$foto = $_FILES["foto"]["name"];
$precio = $_POST["precio"];
$contenido = $_POST["contenido"];
$tmp_foto = $_FILES["foto"]["tmp_name"];
$id_categoria = $_POST["id_categoria"];


$modificar = $_REQUEST["modificar"];
$id_producto = $_REQUEST["id_producto"];


$ruta_foto = "../img/" . $foto;
move_uploaded_file($tmp_foto, $ruta_foto);

$db = new Db();
if(!$modificar) {
    $sql = "INSERT INTO productos (nombre, foto, precio, fecha_publicacion, contenido, idUsuario, id_categoria) VALUES (?, ?, ?, now(), ?, ?, ?)";
    $db->lanzar_consulta($sql, array($nombre, $foto, $precio, $contenido, $_SESSION["id"], $id_categoria));
}
else{

    $sql = "UPDATE productos set nombre = ?, foto = ?,  precio = ?, contenido = ?, fecha_publicacion = now() where idUsuario = ? and id = ?";
    $db->lanzar_consulta($sql, array($nombre, $foto, $precio, $contenido, $_SESSION["id"], $id_producto));
}

$db->desconectar();

header("Location: ./index.php?id=inicio");
