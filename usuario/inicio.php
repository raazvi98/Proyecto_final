<?php

include '../db.php';
include '../funciones.php';
session_start();
$idU = $_SESSION["id"];
$db = new Db();
$sql = "SELECT usuario, nombre, apellidos, telefono, direccion, ciudad, pais, email, fecha_nacimiento FROM usuarios WHERE id = ?";
$resultado = $db->lanzar_consulta($sql ,array($idU));
$db->desconectar();

$fila = $resultado->fetch_assoc();
$nombreU =$fila["usuario"];
$nombre =$fila["nombre"];
$apellido = $fila["apellidos"];
$telefono = $fila["telefono"];
$direccion = $fila["direccion"];
$ciudad = $fila["ciudad"];
$pais = $fila["pais"];
$email = $fila["email"];
$fecha = $fila["fecha_nacimiento"];
?>




<div class="container">
    <ul class="list-group col-md-6">

        <li class="list-group-item">
            Nombre de Usuario: <?= $nombreU ?>
        </li>
        <li class="list-group-item">
            Nombre y Apellidos: <?= $nombre . $apellido ?>
        </li>
        <li class="list-group-item">
            Teléfono: <?= $telefono ?>
        </li>
        <li class="list-group-item">
            Dirección: <?= $direccion ?>
        </li>
        <li class="list-group-item">
            Ciudad: <?= $ciudad ?>
        </li>
        <li class="list-group-item">
            Email: <?= $email ?>
        </li>
    </ul></div>