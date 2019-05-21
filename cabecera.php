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

<nav class="navbar navbar-expand-lg navbar-dark elegant-color ">
    <a class="navbar-brand" href="index.php">
        <img src="img/master.png" height="30" alt="mdb logo">
        PCMaster</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
            aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="productos.php">
                    <i class="fas fa-laptop"></i></i>Productos

                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sobre-nosotros.php">
                    <i class="fas fa-users"></i>
                    </i> Sobre nosotros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">
                    <i class="fas fa-user"></i> Iniciar Sesión </a>

            </li>

            <li class="nav-item">
                <a class="nav-link" href="registro.php">
                    <i class="fas fa-user-plus"></i></i> Registrarse</a>

            </li>
            </li>
        </ul>

            <form class="form-inline my-2 my-lg-0 ml-auto" action="busqueda.php" method="get">
                <input class="form-control mr-1" name="texto" type="text" placeholder="" aria-label="Search">
                <input type="hidden" name="id" value="busqueda"/>
                <button class="btn btn-outline-white btn-md my-2 my-sm-0 ml-3" type="submit">Search</button>

        </nav>
    </div>
    </div>
</nav>
<!--/.Navbar -->

<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
</html>