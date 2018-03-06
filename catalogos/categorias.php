<?php
  
    $host_db="localhost";
    $usuario_db="root";
    $pass_db="Bankai123";
    $db="saw";
  
    $conexion=new mysqli($host_db,$usuario_db, $pass_db);
    $conexion->set_charset("utf8");    
  
    mysqli_select_db($conexion, "saw");

    $valores = "SELECT COUNT(*) from categorias";
    $lector = mysqli_query($conexion, $valores);
    $row = mysqli_fetch_array($lector);
    $id = $row[0]+1;
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Categorías</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">
  </head>
  <body>
    <div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="SAW-Admin">
            <a href="#">Start Bootstrap</a>
        </li>
        <li>
            <a href="categorias.php">Categorías</a>
        </li>
        <li>
            <a href="#">Marcas</a>
        </li>
        <li>
            <a href="#">Overview</a>
        </li>
        <li>
            <a href="#">Events</a>
        </li>
        <li>
            <a href="#">About</a>
        </li>
        <li>
            <a href="#">Services</a>
        </li>
        <li>
            <a href="#">Contact</a>
        </li>
      </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-4">

            </div>
            <div class="col-4">
              <form action="categorias.php" method="post">
                <div class="form-group">
                
                  <label for="id">ID</label>
                  <?php
                  echo "<input class='input' type='text' placeholder='$id' readonly=''>";
                  ?>
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" placeholder="Nombre de la categoría..." name="nombre">
                </div>
                <input type="submit" class="btn btn-warning">
              </form>
            </div>
            <div class="col-4">
              
            </div>
          </div>         

            <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
        </div>
    </div>

    <?php     
      if (@$_POST['nombre']) {

        $nombre = $_POST['nombre'];
        echo $nombre;
        
        $consultaSQL="INSERT INTO `categorias`(`nombre`) VALUES('$nombre');";
        $resultados=mysqli_query($conexion,$consultaSQL);
      }
    ?>


    <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
  
  </body>
</html>