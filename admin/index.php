<?php
session_start();
include("../include/funciones.php");
include("cabecera.php");
include("../config/db.php");
if(!$_SESSION["usuario"]){
    header("Location: ../login.php");
}

 if($_SESSION["usuario"] != 'admin'){
    header('Location: ../login.php');

}
?>

<body>

<script type="text/javascript">
    $(document).ready(function() {
        $("a.btn").click(function() {
            var element = $(this);
            $.ajax({
                url: "eliminar_producto" + element.attr("id"),
                dataType: 'json',
                success: function() {
                    element.parent().parent().remove();
                }
            });
        });
    });
</script>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="nuevo-producto.php">
                            Nuevo producto
                        </a>
                    </li>

                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

            <h2>Productos</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Marca</th>
                        <th>Precio</th>
                        <th>Fecha de Publicación</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $db = new Db();
                    $sql = "SELECT * FROM productos WHERE idUsuario = ?";
                    $resultado = $db->lanzar_consulta($sql, array($_SESSION["id"]));
                    $db->desconectar();

                    while ($fila = $resultado->fetch_assoc()) {

                        ?>
                        <tr>
                            <td><?= $fila["id"]?></td>
                            <td><?= $fila["nombre"]?></td>
                            <td><?= $fila["precio"]?> €</td>
                            <td><?= $fila["fecha_publicacion"]?></td>
                            <td><a class="btn btn-warning btn-sm" href="nuevo-producto.php?modificar=true&id_producto=<?= $fila["id"] ?>">Modificar</a></td>
                            <td><a class="btn btn-danger btn-sm" data-toggle="modal" href="eliminar-producto.php?producto=<?= $fila["id"]?>"
                                   onclick="return confirm('¿Estás seguro?');">Eliminar</a></td>
                        </tr>
                        <?php
                    }

                    ?>

                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>


