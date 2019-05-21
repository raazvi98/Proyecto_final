<?php
session_start();
include("include/funciones.php");
include("cabecera.php");
include("config/db.php");
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

    <div class="card card-image" style="background-image: url(img/pc.jpg);">
        <div class="text-white text-center rgba-stylish-strong py-5 px-4">
            <div class="py-5">

                <!-- Content -->

                <h2 class="card-title h2 my-4 py-2">Tu tienda de componentes de informática</h2>
                <p class="mb-4 pb-2 px-md-5 mx-md-5">Bienvenido!</p>


            </div>
        </div>
    </div>

</div>
<p></p>
<p></p>
<h1 align="center">Productos con mejores precios</h1>
<div class="row">.
    <?php
    $db = new Db();
    $sql = "SELECT id,nombre,foto,precio FROM productos order by precio LIMIT 6";
    $resultado = $db->lanzar_consulta($sql);

    $sql = "SELECT id,nombre,foto,precio FROM productos ORDER BY precio " . $carga .  " LIMIT " . $pagina * TAMANO_PAGINA . "," . TAMANO_PAGINA;
    $resultado = $db->lanzar_consulta($sql, $params);
    while ($fila = $resultado->fetch_assoc()) {


        ?>
        <div class="card m-5" style="width: 22rem;">

            <!-- Card image -->
            <div class="view overlay">
                <img class="card-img-top" src="img/<?= $fila["foto"] ?>" alt="Card image cap">
                <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>

            <!-- Card content -->
            <div class="card-body">

                <!-- Title -->
                <h4 class="card-title"><?= $fila["nombre"] ?></h4>
                <!-- Text -->
                <p class="card-text">Precio: <?= $fila["precio"] ?> €</p>
                <!-- Button -->
                <a href="producto.php?id=<?= $fila["id"] ?>" class="btn btn-outline-dark waves-effect">Ver más</a>

            </div>


        </div>



        <?php
    }
    $sql = "SELECT COUNT(*) AS cantidad FROM productos" . $carga;
    $resultado = $db->lanzar_consulta($sql, $params);
    $fila = $resultado->fetch_assoc();
    $entradas = $fila["cantidad"];

    $paginas = $entradas / TAMANO_PAGINA;
    ?>

</div>
<br>
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
