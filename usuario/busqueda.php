<?php
include("../config/db.php");
include("../include/funciones.php");
include("cabecera.php");
?>
<div class="row">
    <?php
    $texto = $_REQUEST["texto"];
    $db = new Db();
    $sql = 'SELECT id, nombre, foto, precio, idUsuario FROM productos WHERE nombre like CONCAT("%", ?, "%")';
    $resultado = $db->lanzar_consulta($sql, array($texto));



    if ($resultado->num_rows == 0){
        ?>

        <div class="alert alert-danger" style ="text-align: center;" role="alert">
            No hemos encontrado nada con la palabra ' <?=$texto ?> '
        </div>
        <?php
    }

    if ($texto == ""){
        ?>


        <div class="alert alert-danger" style="text-align: center;" role="alert">
            No has introducido nada :(
        </div>

        <?php
    }



    else{

        while($fila = $resultado->fetch_assoc()){
            ?>

            <div class="card m-5" style="width: 22rem;">

                <!-- Card image -->
                <div class="view overlay">
                    <img class="card-img-top"  src="../img/<?= $fila["foto"] ?>" alt="Card image cap">
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
    }
    ?>
</div>
