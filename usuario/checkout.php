<?php
session_start();
include("../include/funciones.php");
include("cabecera.php");
include("../config/db.php");
if(!$_SESSION["usuario"]){
    header("Location: ../login.php");
}
$idsesion=$_SESSION['id'];


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

            <tbody>
            <?php

            $db=new Db();
            //get products
            $sql = "SELECT usuario, direccion, email, pago FROM usuarios WHERE id='$idsesion'";
            $resultado = $db->lanzar_consulta($sql);
            $db->desconectar();
            if ($resultado->num_rows > 0) {
                // output data of each row
                while($fila = $resultado->fetch_assoc()) {
                    $usuario = $fila['usuario'];
                    $direccion = $fila['direccion'];
                    $email = $fila['email'];
                    $pago = $fila['pago'];
                    ?>
                    <div class="container">
                        <p></p>
                        <p></p>
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h1 class="title h1 my-4" align="center">
                                    Datos De envio
                                </h1>
                                <div class="article__content">
                                    <p class="nav-link"align="center"><i class="far fa-user-circle"></i>  usuario:   <?= $usuario; ?></p>
                                    <p class="nav-link" align="center"><i class="fas fa-signature"></i>   direccion:  <?= $direccion; ?></p>
                                    <p class="nav-link"  align="center"><i class="fas fa-envelope"></i>  email:  <?= $email; ?></p>
                                    <p class="nav-link" align="center"><i class="fas fa-city"></i>   pago:  <?= $pago; ?></p>
                                    <div class="center-align">
                                        <a type="submit" name="pagar" href="index.php?Pedido Realizado" class="btn btn-outline-primary">HACER EL PEDIDO</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php }}?>
            </tbody>
        </table>
        <?php
        if (isset($_POST['pagar'])) {


        header("Location: index.php?mensaje=Ya ha realizado su pedido");

        }

        ?>


    </div>
<?php
include("pie.php");
 ?>