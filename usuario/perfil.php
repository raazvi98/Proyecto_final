<?php
session_start();
$id_usuario=$_SESSION['id'];

include("../config/db.php");
include("cabecera.php");
include("../include/funciones.php");
$idU = $_SESSION["id"];
$db = new Db();
$sql = "SELECT usuario, nombre, apellidos, email, direccion, ciudad FROM usuarios WHERE id = ?";
$resultado = $db->lanzar_consulta($sql ,array($idU));
$db->desconectar();

$fila = $resultado->fetch_assoc();
$nombreU =$fila["usuario"];
$nombre =$fila["nombre"];
$apellido = $fila["apellidos"];
$email = $fila["email"];
$direccion = $fila["direccion"];
$ciudad = $fila["ciudad"];
?>



          <div class="container">
              <p></p>
              <p></p>
              <div class="jumbotron jumbotron-fluid">
                  <div class="container">
                      <h1 class="title h1 my-4" align="center">
                      Tu Perfil
                      </h1>
                      <div class="article__content">
                          <p class="nav-link"align="center"><i class="far fa-user-circle"></i>  Nombre:   <?= $nombre; ?></p>
                          <p class="nav-link" align="center"><i class="fas fa-signature"></i>   Apellido:  <?= $apellido; ?></p>
                          <p class="nav-link"  align="center"><i class="fas fa-envelope"></i>  Email:  <?= $email; ?></p>
                          <p class="nav-link" align="center"><i class="fas fa-compass"></i>   Dirección:  <?= $direccion; ?></p>
                          <p class="nav-link" align="center"><i class="fas fa-city"></i>   Ciudad:  <?= $ciudad; ?></p>
                      </div>
                  </div>
              </div>

          </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
  </body>
</html>
<?php
include("pie.php");
?>
