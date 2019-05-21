<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
}
include("../config/db.php");
include("../include/funciones.php");

$publicacion = $_REQUEST["publicacion"];
$db = new Db();
$sql = "DELETE FROM productos WHERE id = ?";
$db->lanzar_consulta($sql, array($publicacion));
$db->desconectar();

header("Location: index.php?id=inicio");
