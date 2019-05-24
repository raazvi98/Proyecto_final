<?php

include("config/db.php");
include("include/funciones.php");

$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$email = $_POST["email"];
$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];
$recontrasena = $_POST ["recontrasena"];
$direccion = $_POST["direccion"];
$ciudad = $_POST["ciudad"];
$pago = "";

if(isset($_POST["credito"])){
    $pago = "credito";
}

else if(isset($_POST["debito"])){
    $pago = "debito";

}

else if(isset($_POST["bitcoin"])){
    $pago = "bitcoin";

}

else if(isset($_POST["paypal"])){
    $pago = "paypal";
}


$db = new Db();

$sql = "SELECT id,email,usuario,contrasena FROM usuarios";
$resultado = $db->lanzar_consulta($sql);
$fila = $resultado->fetch_assoc();
$comprobacionusuario = $fila["usuario"];
$comprobacionemail = $fila["email"];



if ($contrasena != $recontrasena) {
    // No coinciden
    header('Location: registro.php?mensaje=La contraseña no coincide');
    exit();
}

if($comprobacionusuario == $usuario){
    header('Location: registro.php?mensaje=El usuario introducido ya existe');
    exit();
}

if($comprobacionemail == $email){
    header('Location: registro.php?mensaje=El email introducido ya existe');
    exit();
}

$sql = "INSERT INTO usuarios (nombre,apellidos,usuario,contrasena,email,pago,direccion,ciudad) VALUES (?,?,?,SHA(?),?,?,?,?)";
$db->lanzar_consulta($sql, array($nombre,$apellidos,$usuario,$contrasena,$email,$pago,$direccion,$ciudad));

session_start();
$_SESSION["usuario"] = $usuario;
$_SESSION["id"] = $db->ultimo_id();

$db->desconectar();

header("Location: index.php");


