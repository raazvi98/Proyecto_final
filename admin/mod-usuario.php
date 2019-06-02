<?php
session_start();
if (!isset($_SESSION["usuario"]))
    header("location: ./login.php");

include("../config/db.php");
include("../include/funciones.php");
$id = $_REQUEST["id"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$email = $_POST["email"];
$usuario = $_POST["usuario"];
$direccion = $_POST["direccion"];


$db = new Db();
$sql = "UPDATE usuarios set nombre = ?, apellidos = ?,  email = ?, direccion = ?, usuario = ? where  id = ?";
$db->lanzar_consulta($sql, array($nombre, $apellidos, $email, $direccion, $usuario, $id));
$db->desconectar();
header("Location: ./clientes.php?id=inicio");

