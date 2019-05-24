<?php
session_start();
include("../include/funciones.php");
include("cabecera.php");
include("../config/db.php");
if(!$_SESSION["usuario"]){
    header("Location: ../login.php");
}

if (isset($_REQUEST["id"]))
    $id = $_REQUEST["id"];

else
    $id = "inicio";

$params = Array();

if (isset($_REQUEST["tipo"])) {
    $carga = " and tipo = ? ";
    array_push($params, $_REQUEST["tipo"]);
}

else {
    $carga = "";
}
if (isset($_REQUEST["pagina"]))
    $pagina = $_REQUEST["pagina"];
else
    $pagina = 0;

?>



<div class="card card-image rgba-stylish-strong" style="background-image: url(../img/pc.jpg);">
    <div class="text-white text-center rgba-stylish-strong py-5 px-4">
        <div class="py-5">

            <!-- Content -->
            <?php if (isset($_SESSION["usuario"])) {
                ?>
                <h2 class="card-title h2 my-4 py-2"> Bienvenid@ <?= ucfirst($_SESSION["usuario"]) ?>!</h2>
                <?php
            }
            ?>
            <h class="mb-4 pb-2 px-md-5 mx-md-5">Has iniciado sesión</h>



        </div>
    </div>
</div>
<div class="row">

    <?php

    $db = new Db();

    $sql = "SELECT COUNT(*) AS cantidad FROM productos" . $carga;
    $resultado = $db->lanzar_consulta($sql, $params);
    $fila = $resultado->fetch_assoc();
    $entradas = $fila["cantidad"];

    $paginas = $entradas / TAMANO_PAGINA;


    $sql = "SELECT id,nombre,foto,precio FROM productos ORDER BY fecha_publicacion DESC" . $carga .  " LIMIT " . $pagina * TAMANO_PAGINA . "," . TAMANO_PAGINA;
    $resultado = $db->lanzar_consulta($sql, $params);
    while ($fila = $resultado->fetch_assoc()) {


        ?>
    <div class="card m-5" style="width: 22rem;">

        <!-- Card image -->
        <div class="view overlay">
            <img class="card-img-top" src="../img/<?= $fila["foto"] ?>" alt="Card image cap">
            <a>
                <div class="mask rgba-white-slight"></div>
            </a>
        </div>

        <!-- Card content -->
        <div class="card-body">

            <h4 class="card-title"><?= $fila["nombre"] ?></h4>
            <hr>
            <!-- Text -->
            <p class="card-text"><?= $fila["precio"]?> €</p>
            <!-- Link -->
            <a href="producto.php?id=<?= $fila["id"] ?>" class="black-text d-flex justify-content-end"><h5>Ver más <i class="fas fa-angle-right"></i></i></h5></a>

        </div>

    </div>
    <!-- Card Light -->
        <?php
    }
    $sql = "SELECT COUNT(*) AS cantidad FROM productos" . $carga;
    $resultado = $db->lanzar_consulta($sql, $params);
    $fila = $resultado->fetch_assoc();
    $entradas = $fila["cantidad"];

    $paginas = $entradas / TAMANO_PAGINA;
    ?>




</div>

    <nav class="blog-pagination"  style="align-content: center">
        <ul class="pagination pg-blue justify-content-center pagination-lg">
            <?php
            if (isset($_REQUEST["tipo"])) {

                for ($i = 0; $i < $paginas; $i++) {
                    ?>
                    <li class="page-item"><a class="page-link" href="?id=productos&tipo=<?= $_REQUEST["tipo"] ?>&pagina=<?= $i ?>"><?= $i + 1 ?></a></li>
                    <?php
                }
            }
            else {
                for ($i = 0; $i < $paginas; $i++) {
                    ?>
                    <li class="page-item cosas"><a class="page-link" href="?id=productos&pagina=<?= $i ?>"><?= $i + 1 ?></a></li>
                    <?php
                }
            }
            ?>
        </ul>
    </nav>









<?php

include("pie.php");

?>