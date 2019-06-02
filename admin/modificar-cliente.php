<?php

include("cabecera.php");
include("pie.php");
if (!isset($_SESSION["usuario"]))
    header("location: ./login.php");




?>

<form  action="mod-usuario.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">

            <p></p>
            <p>.</p>
            <h2>Nueva publicación</h2>
            <div class="form-group">
                <label for="formGroupExampleInput">Nombre: </label>
                <input type="text" name="nombre"class="form-control" id="formGroupExampleInput" placeholder="Nombre" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Apellido: </label>
                <input type="text" name="apellido"class="form-control" id="formGroupExampleInput" placeholder="Apellido" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Email: </label>
                <input type="email" name="email"class="form-control" id="formGroupExampleInput" placeholder="Email" required>
                <input type = "hidden" name = "id" value="<?=$id?>">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Dirección: </label>
                <input type="text" name="direccion"class="form-control" id="formGroupExampleInput" placeholder="Dirección" required>

            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Ciudad: </label>
                <input type="text" name="ciudad"class="form-control" id="formGroupExampleInput" placeholder="Ciudad" required>
            </div>


            <button type="submit" class="btn btn-outline-dark">Enviar</button>
        </div>

</form>

