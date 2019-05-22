<?php
session_start();
include("../include/funciones.php");
include("cabecera.php");
include("../config/db.php");
if(!$_SESSION["usuario"]){
    header("Location: ../login.php");
}
$id_categoria = isset($_GET['id']) ? $_GET['id'] : '';
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

        <ul class="nav justify-content-center grey lighten-4 py-4">
            <?php

            //get categories
            $db= new Db();
            $sql = "SELECT id, nombre, icono FROM categorias";
            $total = $db->lanzar_consulta($sql);
            $db->desconectar();
            if ($total->num_rows > 0) {
            // output data of each row
            while($filacategoria = $total->fetch_assoc()) {
            $id_categoriadb = $filacategoria['id'];
            $nonmbre_categoria = $filacategoria['nombre'];
            $icono = $filacategoria['icono'];
            ?>
            <li class="nav-item">
                <a class="nav-link active" href="categoria.php?id=<?= $id_categoriadb; ?>!">      <?php if($id_categoriadb == $id_categoria)  ?>       <?= $nonmbre_categoria; ?>        <br></a>
            </li>
            <?php }} ?>
        </ul>

     <div class="container-fluid category-page">
        <div class="row">
          <div class="col s12 m10 ">
            <div class="container content">
            <div class="row">
                  <?php
                  //get products

                  //pages links

                  $db=new Db();
                  $sql = "SELECT  id, nombre, precio, foto FROM productos WHERE id_categoria = '{$id_categoria}' ORDER BY id DESC ";
                  $result = $db->lanzar_consulta($sql);
                  $db->desconectar();
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($filaproducto = $result->fetch_assoc()) {
                      $id_producto = $filaproducto['id'];
                      $nombre = $filaproducto['nombre'];
                      $precio = $filaproducto['precio'];
                      $foto = $filaproducto['foto'];

                    ?>
                    <div class="card m-5" style="width: 22rem;">
                        <!-- Card image -->
                        <div class="view overlay">
                            <img class="card-img-top" src="../img/<?= $foto; ?>" alt="Card image cap">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!-- Card content -->
                        <div class="card-body">
                            <h4 class="card-title"><?= $nombre; ?></h4>
                            <hr>
                            <!-- Text -->
                            <p class="card-text"><?= $precio; ?> €</p>
                            <!-- Link -->
                            <a href="producto.php?id=<?= $id_producto; ?>" class="black-text d-flex justify-content-end"><h5>Ver más <i class="fas fa-angle-right"></i></i></h5></a>
                        </div>
                    </div>
                  <?php
                        }
                    }
                    ?>
                  </div>
              </div>
          </div>
        </div>
    </div>
  <?php
  include("pie.php");
 ?>
