<?php

include("cabecera.php");
include("pie.php");
if (!isset($_SESSION["usuario"]))
    header("location: ./login.php");



if (isset($_REQUEST["modificar"]))
    $modificar = $_REQUEST["modificar"];
else
    $modificar = "";

if (isset($_REQUEST["id_producto"]))
    $id_producto = $_REQUEST["id_producto"];
else
    $id_producto = 0;



?>

<form  action="alta-producto.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">

            <p></p>
            <p>.</p>
            <h2>Nueva publicación</h2>
            <div class="form-group">
                <label for="formGroupExampleInput">Marca: </label>
                <input type="text" name="nombre"class="form-control" id="formGroupExampleInput" placeholder="Marca y modelo del producto" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Precio: </label>
                <input type="number" name="precio"class="form-control" id="formGroupExampleInput" placeholder="Precio" required>
                <input type = "hidden" name = "modificar" value="<?=$modificar?>">
                <input type = "hidden" name = "id_producto" value="<?=$id_producto?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripción: </label>
                <textarea class="form-control" name="contenido"id="exampleFormControlTextarea1" placeholder="Descripción" rows="7" required></textarea>
            </div>
            <form>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Subir imagen</label>
                    <input type="file" name="foto"class="form-control-file" id="exampleFormControlFile1">
                </div>
            </form>
            <div class="form-group">
                <label for="formGroupExampleInput">ID Categoria: </label>
                <input type="text" name="id_categoria"class="form-control" id="formGroupExampleInput" placeholder="1moviles 2tv 3pc 4auriculares 5consolas 6altavoces" required>
            </div>

            <button type="submit" class="btn btn-outline-dark">Enviar</button>
        </div>

</form>
