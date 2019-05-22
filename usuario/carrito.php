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
    <script type="text/javascript">
        $(document).ready(function() {
            $("a.btn").click(function() {
                var element = $(this);
                $.ajax({
                    url: "eliminaralbaran" + element.attr("id"),
                    dataType: 'json',
                    success: function() {
                        element.parent().parent().parent().remove();
                    }
                });
            });
        });
    </script>
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
    <?php
                $db = new Db();
                //get products
                $sqlcarrito = "SELECT productos.nombre as 'nombre',productos.id as 'id', productos.precio as 'precio',categorias.nombre as 'categoria', albaran.id_usuario,albaran.cantidad as 'cantidad'
                            FROM categorias, productos, albaran
                            WHERE albaran.id_producto = productos.id AND productos.id_categoria = categorias.id AND albaran.cantidad > 0 AND albaran.id_usuario='$id_usuario'";
                $resultado = $db->lanzar_consulta($sqlcarrito);
                if ($resultado->num_rows == 0){
        ?>

        <div class="alert alert-danger" style ="text-align: center;" role="alert">
            No tiene nada añadido al carrito
        </div>
                    <?php
                }else {


                            ?>
    <div class="container scroll info">
        <table class="table">

            <thead>
            <tr>
                <th data-field="name">Nombre Producto</th>
                <th data-field="category">Categoria</th>
                <th data-field="price">Precio</th>
                <th data-field="quantity">Unidades</th>
                <th data-field="total">Total</th>

            </tr>

            <tbody>
            <?php
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
                                    <td><?= $precio_producto * $cantidad_producto; ?> €</td>
                                    <td><a href="eliminaralbaran.php?id=<?= $id_productdb; ?>"><i
                                                    class="material-icons red-text">Eliminar</i></a>
                                    </td>
                                </tr>
                                </thead>

                                <?php
                            }
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
                }

?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="../css/mdb.min.css" rel="stylesheet">
<!-- Your custom styles (optional) -->
<link href="../css/style.css" rel="stylesheet">
<!-- libreria para usar los iconos de los menus y botones -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../js/mdb.min.js"></script>
