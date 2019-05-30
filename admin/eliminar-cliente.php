<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
}
include("../config/db.php");
include("../include/funciones.php");

$cliente = $_REQUEST["cliente"];
$db = new Db();
$sql = "DELETE FROM usuarios WHERE id = ?";
$db->lanzar_consulta($sql, array($cliente));
$db->desconectar();

header("Location: clientes.php");