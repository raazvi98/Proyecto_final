<?php
session_start();
include("include/funciones.php");
include("cabecera.php");
include("config/db.php");







$db = new Db();
$sql = "SELECT * FROM productos WHERE id = ?";
$resultado = $db->lanzar_consulta($sql,array($id));
$fila = $resultado->fetch_assoc();



?>




<!-- Card -->


    <!-- Card image -->
<div class="d-flex justify-content-center">
    <div class="view overlay zoom">

        <img src="img/<?= $fila["foto"] ?>" class="img-fluid"  style="width: 500px; height: 500px" alt="">
        <div class="mask flex-center waves-effect waves-light">

        </div>
        </div>
</div>


    <!-- Card content -->
    <div class="card-body card-body-cascade text-center">

        <!-- Title -->
        <h4 class="card-title"><strong><?= $fila["nombre"] ?></strong></h4>
        <!-- Subtitle -->
        <h6 class="font-weight-bold indigo-text py-2"><?= $fila["precio"] ?>€</h6>
        <!-- Text -->
        <h6 class="card-text" style="text-align: center"><?= $fila["contenido"] ?>
        </h6>



    </div>


        <div class = "alert alert-light" role="alert">COMENTARIOS</div>
    <hr>
<?php
$sql = "SELECT * FROM comentarios WHERE id_producto = ? order by fecha_publicacion DESC ";
$resultado = $db->lanzar_consulta($sql,array($id));
$sql1 = "SELECT usuario FROM usuarios WHERE id = ?";


while ($fila = $resultado->fetch_assoc()) {

    $resultado1 = $db->lanzar_consulta($sql1,array($fila["id_usuario"]));
    $nombre = $resultado1->fetch_assoc();
    ?>
    <div class="alert" role="alert">
        <h5 class="alert-heading w3-animate-right"> <i class="fas fa-user"></i>   <?=$nombre["usuario"]?></h5>
        <p><i class="fas fa-comment-dots"></i>   <?= $fila["contenido"] ?></p>
        <p class="text-muted"><i class="fas fa-calendar-week"></i>    <?= $fila["fecha_publicacion"] ?></p>
        <?php
        if(isset($_SESSION["usuario"])) {
            if ($_SESSION["usuario"] == $nombre["usuario"]) {

                ?>
                <a class="btn btn-outline-danger" href="eliminar_comentario.php?comentario=<?= $fila["id"] ?>"
                   onclick="return confirm('¿Estás seguro?');">Eliminar comentario</a>
                <?php
            }
        }
        ?>

    </div>
    <?php

}
include("pie.php");

?>

