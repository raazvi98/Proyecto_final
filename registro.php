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
    <input type="text" id="defaultRegisterFormFirstName" name="usuario" class="form-control" placeholder="Usuario">
<p></p>
    <!-- E-mail -->
    <input type="email" id="defaultRegisterFormEmail" name="email" class="form-control mb-4" placeholder="E-mail">

    <!-- Password -->
    <input type="password" id="defaultRegisterFormPassword" name="contrasena" class="form-control" placeholder="Contraseña" aria-describedby="defaultRegisterFormPasswordHelpBlock">
    <p></p>
    <input type="password" id="defaultRegisterFormPassword" name="recontrasena" class="form-control" placeholder="Introduce la contraseña de nuevo" aria-describedby="defaultRegisterFormPasswordHelpBlock">






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