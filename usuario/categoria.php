<?php
session_start();
include("../include/funciones.php");
include("cabecera.php");
include("../config/db.php");
if(!$_SESSION["usuario"]){
    header("Location: ../login.php");
}
$id_categoria =$_GET['id'];
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

 <div class="container-fluid category-page">
    <div class="row">

      <div class="col s12 m2 center-align cat">
        <div class="collection card">
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
         <a href="categoria.php?id=<?= $id_categoriadb; ?>" class='collection-item <?php if($id_categoriadb == $id_categoria) {echo"active";} ?>' ><?= $nonmbre_categoria; ?></a>
       <?php }} ?>
       </div>
      </div>

      <div class="col s12 m10 ">
        <div class="container content">
          <div class="center-align">
            Productos
          </div>
        <div class="row">
          <?php
          //get products

          //pages links
          $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
          $perpage = isset($_GET['per-page']) && $_GET['per-page'] <= 16 ? (int)$_GET['per-page'] : 16;

          $start = ($page > 1) ? ($page * $perpage) - $perpage : 0;
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

                <div class="col s12 m4">
                  <div class="card hoverable animated slideInUp wow">
                    <div class="card-image">
                        <a href="producto.php?id=<?= $id_producto; ?>">
                          <img src="../img/<?= $foto; ?>"></a>
                        <span  class="card-title grey-text"><?= $nombre; ?></span>
                        <a href="producto.php?id=<?= $id_producto; ?>" class="btn-floating halfway-fab waves-effect waves-light right"><i class="material-icons">add</i></a>
                      </div>
                      <div class="card-action">
                        <div class="container-fluid">
                          <h5 class="white-text"><?= $precio; ?> $</h5>
                        </div>
                      </div>
                  </div>
                </div>
              <?php }} ?>

              </div>
                <div class="center-align animated slideInUp wow">
                  <ul class="pagination <?php if($total<15){echo "hide";} ?>">
                  <li class="<?php if($page == 1){echo 'hide';} ?>"><a href="?page=<?php echo $page-1; ?>&per-page=15"><i class="material-icons">chevron_left</i></a></li>
                  <?php for ($x=1; $x <= $page; $x++) : $y = $x;?>


                      <li class="waves-effect pagina  <?php if($page === $x){echo 'active';} elseif($page <  ($x +1) OR $page > ($x +1)){echo'hide';} ?>"><a href="?page=<?php echo $x; ?>&per-page=15" ><?php echo $x; ?></a></li>



                  <?php endfor; ?>
                  <li class="<?php if($page == $y){echo 'hide';} ?>"><a href="?page=<?php echo $page+1; ?>&per-page=15"><i class="material-icons">chevron_right</i></a></li>
                </ul>
                </div>
          </div>
      </div>

    </div>
</div>

  <?php
  include("pie.php");
 ?>
