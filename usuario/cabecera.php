
<?php

if (isset($_REQUEST["id"]))
    $id = $_REQUEST["id"];
else
    $id = "index";
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="../favicon.ico">
    <title>PCMaster</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../css/style.css" rel="stylesheet">
    <!-- libreria para usar los iconos de los menus y botones -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<nav class="navbar navbar-expand-lg navbar-dark elegant-color sticky-top">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="index.php">
        <img src="../img/master.png" height="30" alt="mdb logo">
        PCMaster</a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
            aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="carrito.php"><i class="fas fa-shopping-cart"></i></i>Carrito</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="perfil.php"><i class="fas fa-user-circle"></i></i>Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>Cerrar sesión</a>
            </li>




        </ul>
        <!-- Links -->
        <form class="form-inline" action="busqueda.php" method="get">

            <div class="md-form my-0">
                <input class="form-control mr-sm-2" name="texto"type="text" placeholder="Search" aria-label="Search">

                <input type="hidden" name="id" value="busqueda"/>
            </div>

        </form>
    </div>
    <!-- Collapsible content -->

</nav>

<!--/.Navbar-->
