<?php

include("../config/db.php");
include("../include/funciones.php");

$comentario = $_REQUEST["comentario"];
$db = new Db();
$sql = "DELETE FROM comentarios WHERE id = ?";
$db->lanzar_consulta($sql, array($comentario));
$db->desconectar();

header("Location: index.php?id=inicio");