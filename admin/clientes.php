<?php
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
                url: "eliminar-producto" + element.attr("id"),
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
                        <a class="nav-link active" href="index.php">
                            Productos
                        </a>
                    </li>

                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

            <h2>Usuarios</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Usuario</th>
                        <th>E-mail</th>
                        <th>Dirección</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $db = new Db();
                    $sql = "SELECT * FROM usuarios WHERE usuario != 'admin'";
                    $resultado = $db->lanzar_consulta($sql);
                    $db->desconectar();

                    while ($fila = $resultado->fetch_assoc()) {

                        ?>
                        <tr>
                            <td><?= $fila["id"]?></td>
                            <td><?= $fila["nombre"]?></td>
                            <td><?= $fila["apellidos"]?></td>
                            <td><?= $fila["usuario"]?></td>
                            <td><?= $fila["email"]?></td>
                            <td><?= $fila["direccion"]?></td>
                            <td><a class="btn btn-warning btn-sm" href="nuevo-producto.php?modificar=true&id_producto=<?= $fila["id"] ?>">Modificar</a></td>
                            <td><a class="btn btn-danger btn-sm" data-toggle="modal" href="eliminar-cliente.php?cliente=<?= $fila["id"]?>"
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
