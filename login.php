<?php
if (isset($_REQUEST["mensaje"]))
    $mensaje = $_REQUEST["mensaje"];
else
    $mensaje = "";
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="css/blog.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">



</head>

<body  class>

<div class="container">

    <form class="form-signin " action="checkLogin.php" method="post">
        <p class="h4 mb-4">Iniciar Sesión</p>

        <!-- Email -->
        <input type="text" id="defaultLoginFormEmail" name="usuario" class="form-control mb-4" placeholder="Usuario">

        <!-- Password -->
        <input type="password" id="defaultLoginFormPassword" name="contrasena" class="form-control mb-4" placeholder="Contraseña">


        <!-- Sign in button -->
        <button class="btn btn-outline-secondary my-4 btn-block" type="submit">Iniciar Sesión</button>
        <a class="btn btn-outline-secondary my-4 btn-block"  href="registro.php">Registrarte</a>
        <!-- Register -->
    </form>
    <?php
    if ($mensaje != "") {
        ?>
        <div class="alert alert-danger" role="alert">
            <?= $mensaje ?>
        </div>
        <?php
    }
    ?>
</div> <!-- /container -->

</body>
</html>




<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Material form login -->
