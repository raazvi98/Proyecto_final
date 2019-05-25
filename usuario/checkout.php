<?php
session_start();
$id_usuario= $_SESSION['id'];
include("../include/funciones.php");
include("cabecera.php");
include("../config/db.php");
$idsesion=$_SESSION['id'];
if(!$_SESSION["usuario"]){
    header("Location: ../login.php");
}


?>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script src="jspdf/dist/jspdf.min.js"></script>
    <script src="jspdf/dist/jspdf.plugin.autotable.min.js"></script>



<?php
$con  = new mysqli("localhost","root","","ecommerce");
//get products
$sqlcarrito = "SELECT productos.nombre,productos.id, productos.precio , albaran.id_usuario,albaran.cantidad
                            FROM categorias, productos, albaran
                            WHERE albaran.id_producto = productos.id AND productos.id_categoria = categorias.id AND albaran.cantidad > 0 AND albaran.id_usuario='$id_usuario'";
$resultado = $con->query($sqlcarrito);
$data = array();
while($r=$resultado->fetch_object()){
    $data[]=$r; //$n++;
}


    ?>
<p></p>
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
                                <div class="text-center">
                                    <button id="generarpdf" class="btn btn-default  btn-lg" >Generar PDF</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            <?php }}?>
        </tbody>
    </table>

<p></p>

    <script>
        $("#generarpdf").click(function(){
            var pdf = new jsPDF();
            var imgData  =  'data:image/jpeg;base64,/img/race.jpg';
            pdf.addImage(imgData, 'JPEG', 10, 10, 50, 70);
            pdf.text(20,20,"Factura");

            var columns = ["Id", "Nombre", "Precio", "Cantidad", "Total"];
            var data = [
                <?php foreach($data as $d):?>
                [<?php echo $d->id; ?>,  "<?php echo $d->nombre; ?>", "<?php echo $d->precio; ?>", "<?php echo $d->cantidad; ?>",  "<?php echo $d->precio * $d->cantidad; ?>"],
                <?php endforeach; ?>
            ];

            pdf.autoTable(columns,data,
                { margin:{ top: 25  }}
            );

            pdf.save('MiFactura.pdf');

        });


</script>

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