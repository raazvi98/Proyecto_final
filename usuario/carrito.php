<?php
session_start();
$id_usuario= $_SESSION['id'];
include("../include/funciones.php");
include("cabecera.php");
include("../config/db.php");
if(!$_SESSION["usuario"]) {
    header("Location: ../login.php");
}
    ?>
    <div class="container-fluid product-page">
        <div class="container current-page">
            <nav>
                <div class="nav-wrapper">
                    <div class="col s12">

                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="container scroll info">
        <table class="highlight">
            <thead>
            <tr>
                <th data-field="name">Nombre Producto</th>
                <th data-field="category">Categoria</th>
                <th data-field="price">Precio</th>
                <th data-field="quantity">Unidades</th>
                <th data-field="total">Total</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $db = new Db();
            //get products
            $sqlcarrito = "SELECT productos.nombre as 'nombre',
          productos.id as 'id', productos.precio as 'precio',
          categorias.nombre as 'categoria', albaran.id_usuario,
          albaran.cantidad as 'cantidad'
FROM categorias, productos, albaran
WHERE albaran.id_producto = productos.id AND productos.id_categoria = categorias.id AND albaran.cantidad > 0 AND albaran.id_usuario='$id_usuario'";
            $resultado = $db->lanzar_consulta($sqlcarrito);
            if ($resultado->num_rows > 0) {
                // output data of each row
                while ($filaproducto = $resultado->fetch_assoc()) {
                    $id_productdb = $filaproducto['id'];
                    $nombre_producto = $filaproducto['nombre'];
                    $categoria_producto = $filaproducto['categoria'];
                    $cantidad_producto = $filaproducto['cantidad'];
                    $precio_producto = $filaproducto['precio'];
                    ?>
                    <tr>
                        <td><?= $nombre_producto; ?></td>
                        <td><?= $categoria_producto; ?></td>
                        <td><?= $precio_producto; ?></td>
                        <td><?= $cantidad_producto; ?></td>
                        <td><?= $precio_producto * $cantidad_producto; ?></td>
                        <td><a href="eliminaralbaran.php?id=<?= $id_productdb; ?>"><i class="material-icons red-text">close</i></a>
                        </td>
                    </tr>
                <?php }
            }
            ?>
            </tbody>
        </table>
        <div class="right-align">
            <a href="checkout.php"
               class='btn-large button-rounded waves-effect waves-light'>
                FINALIZAR COMPRA <i class="material-icons right"></i></a>
        </div>
    </div>
    <?php
?>