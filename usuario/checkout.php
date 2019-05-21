<?php
session_start();
include("../include/funciones.php");
include("cabecera.php");
include("../config/db.php");
if(!$_SESSION["usuario"]){
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
                <th data-field="name">Usuario</th>
                <th data-field="category">Direccion</th>
                <th data-field="price">Email</th>
                <th data-field="quantity">Forma de Pago</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $db=new Db();
            //get products
            $sqlcarrito = "SELECT usuarios.usuario as 'usuario', usuarios.direccion as 'direccion', usuarios.email as 'email', usuarios.forma_pago as 'forma_pago'
FROM usuarios, producto WHERE usuarios.id='$idsesion'";
            $resultado = $db->lanzar_consulta($sqlcarrito);
            if ($resultado->num_rows > 0) {
                // output data of each row
                while($filaproducto = $resultado->fetch_assoc()) {
                    $usuario = $filaproducto['usuario'];
                    $direccion = $filaproducto['direccion'];
                    $email = $filaproducto['email'];
                    $formapago = $filaproducto['forma_pago'];
                    ?>
                    <tr>
                        <td><?= $usuario; ?></td>
                        <td><?= $direccion; ?></td>
                        <td><?= $email; ?></td>
                        <td><?= $formapago; ?></td>
                    </tr>
                <?php }}?>
            </tbody>
        </table>
        <?php
        if (isset($_POST['pagar'])) {


        header("Location: index.php?mensaje=Ya ha realizado su pedido");

        }

        ?>

        <div class="center-align">
            <a type="submit" name="pagar" href="index.php?Pedido Realizado" class="btn-large meh button-rounded waves-effect waves-light ">HACER EL PEDIDO</a>
        </div>
    </div>
<?php
include("pie.php");
 ?>