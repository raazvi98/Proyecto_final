<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
}
include("../config/db.php");
include("../include/funciones.php");

$producto = $_REQUEST["producto"];
$db = new Db();
$sql = "DELETE FROM productos WHERE id = ?";
$db->lanzar_consulta($sql, array($producto));
$db->desconectar();

header("Location: index.php");
