<?php
session_start();
  $idsess = $_SESSION['id'];

$id_producto =$_GET['id'];
if (isset($_REQUEST["mensaje"]))
    $mensaje = $_REQUEST["mensaje"];
else
    $mensaje = "";
include("../include/funciones.php");
include("cabecera.php");
include("../config/db.php");
if(!$_SESSION["usuario"]){
    header("Location: ../login.php");
}

if(isset($_SESSION["id"])){

}
else{
    $_SESSION["id"] = "";
}
$cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : '';
?>

<script type="text/javascript">
    $(document).ready(function() {
        $("a.btn").click(function() {
            var element = $(this);
            $.ajax({
                url: "eliminar_comentario" + element.attr("id"),
                dataType: 'json',
                success: function() {
                    element.parent().parent().parent().remove();
                }
            });
        });
    });
</script>

<p></p>
<div class="container-fluid product">
  <div class="container">
   <div class="row">
     <div class="col s12 m6">
        <div class="card">
          <div class="card-image">
            <?php


            $db = new Db();
            $sql = "SELECT * FROM productos WHERE id = ?";
            $resultado = $db->lanzar_consulta($sql,array($id));
            $fila = $resultado->fetch_assoc();
            ?>
            <img class="materialboxed" width="650" src="../img/<?= $fila["foto"] ?>" alt="">
          </div>
        </div>

     </div>

     <div class="col s12 m6">
       <form method="post">
       <h2><?= $fila["nombre"] ?></h2>
       <div class="divider"></div>
       <div class="stuff">
        <h5>Precio:</h5><h5><?= $fila["precio"] ?>€</h5>
        <p><h5>Descripción:  </h5><?= $fila["contenido"] ?></p>

       </div>
           <div class="form-group ">
               <h5>añadir al carrito:</h5>
               <input id="icon_prefix" type="number" placeholder="Cantidad" name="cantidad" min="1" class="validate" required>

           </div>
           <?php

           if (isset($_POST['buy'])) {
               $db= new Db();
               $sql = "INSERT INTO albaran(id_producto, cantidad, id_usuario) VALUES (?, ? ,?)";
               $db->lanzar_consulta($sql, array($id_producto, $cantidad, $_SESSION["id"]));

           }

           ?>

           <div class="center-align">
               <button type="submit" name="buy" class="btn btn-outline-primary">AÑADIR AL CARRITO</button>
           </div>
        </form>
     </div>
   </div>
      <p></p>
      <p></p>
      <?php
      if(isset($_SESSION["usuario"])) {

          ?>
          <form action="nuevo_comentario.php" method="post">
              <div class="form-row">
                  <div class="form-group col-md-12">
                      <textarea name="contenido" cols="10" rows="5" class="form-control" id="contenido" placeholder="Comenta tu opinión..." ></textarea>
                      <input type="hidden" name="id_producto" class="form-control" id="id_producto" value = "<?=$id_producto?>">
                  </div>
              </div>


              <button type="submit" class="btn btn-outline-primary">Enviar</button>
          </form>

          <?php
      }
      ?>
      <script>
          CKEDITOR.replace("comentario");
      </script>
      <div class = "alert alert-light" role="alert">COMENTARIOS</div>
      <hr>
      <?php
      $sql = "SELECT * FROM comentarios WHERE id_producto = ? order by fecha_publicacion DESC ";
      $resultado = $db->lanzar_consulta($sql,array($id));
      $sql1 = "SELECT usuario FROM usuarios WHERE id = ?";


      while ($fila = $resultado->fetch_assoc()) {

      $resultado1 = $db->lanzar_consulta($sql1,array($fila["id_usuario"]));
      $nombre = $resultado1->fetch_assoc();
      ?>
      <div class="alert" role="alert">
          <h5 class="alert-heading w3-animate-right"><i class="fas fa-user"></i>  <?=$nombre["usuario"]?></h5>
          <p><i class="fas fa-comment-dots"></i>   <?= $fila["contenido"] ?></p>
          <p class="text-muted"><i class="fas fa-calendar-week"></i>   <?= $fila["fecha_publicacion"] ?></p>
          <?php
          if(isset($_SESSION["usuario"])) {
              if ($_SESSION["usuario"] == $nombre["usuario"]) {

                  ?>
                  <a class="btn btn-outline-danger" href="eliminar_comentario.php?comentario=<?= $fila["id"] ?>"
                     onclick="return confirm('¿Estás seguro?');">Eliminar comentario</a>
                  <?php
              }
          }
          ?>

      </div>

      <?php
}

?>
  </div>
</div>
<?php
include("pie.php");

?>
