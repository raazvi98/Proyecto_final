<?php
if (isset($_REQUEST["mensaje"]))
    $mensaje = $_REQUEST["mensaje"];
else
    $mensaje = "";
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="favicon.ico">
    <title>PCMaster</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <!-- libreria para usar los iconos de los menus y botones -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>


<form class="text-center border border-light p-5" action="insert-registro.php" method="post">

    <p class="h4 mb-4">Registro </p>

    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <input type="text" id="defaultRegisterFormFirstName" name="nombre" class="form-control" placeholder="Nombres">
        </div>
        <div class="col">
            <!-- Last name -->
            <input type="text" id="defaultRegisterFormLastName" name="apellidos" class="form-control" placeholder="Apellidos">
        </div>
    </div>
    <input type="text" id="defaultRegisterFormLastName" name="direccion" class="form-control" placeholder="Direccion">
    <p></p>
    <input type="text" id="defaultRegisterFormLastName" name="ciudad" class="form-control" placeholder="Ciudad">
    <p></p>
    <input type="text" id="defaultRegisterFormFirstName" name="usuario" class="form-control" placeholder="Usuario">
<p></p>
    <!-- E-mail -->
    <input type="email" id="defaultRegisterFormEmail" name="email" class="form-control mb-4" placeholder="E-mail">

    <!-- Password -->
    <input type="password" id="defaultRegisterFormPassword" name="contrasena" class="form-control" placeholder="Contraseña" aria-describedby="defaultRegisterFormPasswordHelpBlock">
    <p></p>
    <input type="password" id="defaultRegisterFormPassword" name="recontrasena" class="form-control" placeholder="Introduce la contraseña de nuevo" aria-describedby="defaultRegisterFormPasswordHelpBlock">
    <p></p>
    <h5>metodo de pago</h5>
    <!-- Group of default radios - option 1 -->
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="credito" id="inlineRadio1" value="option1">
        <label class="form-check-label" for="inlineRadio1">Credito</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="debito" id="inlineRadio2" value="option2">
        <label class="form-check-label" for="inlineRadio2">Debito</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="bitcoin" id="inlineRadio3" value="option3">
        <label class="form-check-label" for="inlineRadio3">Bitcoin</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="paypal" id="inlineRadio4" value="option3">
        <label class="form-check-label" for="inlineRadio4" >Paypal</label>
    </div>










    <!-- Sign up button -->
    <button class="btn btn-outline-black my-4 btn-block" type="submit">Sign in</button>

    <!-- Social register -->


    <!-- Terms of service -->


</form>
<?php
if ($mensaje != "") {
    ?>
    <div class="alert alert-danger" style ="text-align: center;" role="alert">
        <?= $mensaje ?>
    </div>
    <?php
}
?>
<!-- Default form register -->
<h6 align="center">PCMaster©  2019</h6>


<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>