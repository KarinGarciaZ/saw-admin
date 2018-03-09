<?php
  
    $host_db="localhost";
    $usuario_db="root";
    $pass_db="Bankai123";
    $db="saw";
  
    $conexion=new mysqli($host_db,$usuario_db, $pass_db);
    $conexion->set_charset("utf8");    
  
    mysqli_select_db($conexion, "saw");

    if (@$_POST['nombre']) {
      
      $nombre = $_POST['nombre'];
      $contrasenia = $_POST['contra'];        
      
      $consultaSQL="INSERT INTO `delivery_man`(`name`, `password`) VALUES('$nombre', '$contrasenia');";
      $resultados=mysqli_query($conexion,$consultaSQL);
    }

    $valores = "SELECT COUNT(*) from delivery_man";
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

    <title>Repartidores</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>



    <!-- Custom styles for this template -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">
  </head>
  <body>
    <div id="wrapper" class="toggled">

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
          <a href="brands.php">Marcas</a>
        </li>
        <li>
            <a href="administrators.php">Administradores</a>
        </li>
        <li>
            <a href="delivery_man.php">Repartidores</a>
        </li>
        <li>
            <a href="#">Services</a>
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
            <div class="col-4 text-center" style="padding-top:40px">
              <h3>Registro de repartidores</h3>
              <i class="fas fa-address-card fa-10x" style="color: orange"></i>
            </div>
            <div class="col-8 marginFormsTwo">
              
              <form action="delivery_man.php" method="post">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="id">ID</label>
                      <?php
                        echo "<input class='form-control' type='text' placeholder='$id' readonly=''>";
                      ?>
                    </div>
                  </div>                  
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" placeholder="Nombre de repartidor..." name="nombre">
                </div>
                <div class="form-group">
                  <div class="row">
                      <div class="col-md-6">
                        <label for="nombre">Contraseña</label>
                        <input type="password" class="form-control" id="nombre" placeholder="Contraseña de repartidor..." name="contra">
                      </div> 

                      <div class="col-md-6">
                        <label for="nombre">Verificar contrasenia</label>
                        <input type="password" class="form-control" id="nombre" placeholder="Verificar contraseña...">
                      </div>  
                  
                  </div>

                </div>
                <div class="container">
                  <div style="text-align: center">
                    <input type="submit" class="btn btn-warning">
                  </div>
                </div>
                
              </form>
            </div>            
          </div>       
        </div>
    </div>

    <hr>

    <div class="container">
    <div class="col-md-8 offset-md-2" style="text-align: center">
      <h2>Consulta general de repartidores</h2>
      <hr>
      <table class="table">
          <thead class="thead-inverse">
            <tr class="bg-warning">
              <th>ID</th>
              <th>Nombre</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            foreach ($conexion->query('SELECT * from `delivery_man`') as $row){ ?> 
              <tr>
	              <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['name'] ?></td>
              </tr>
            <?php } ?>
          
          </tbody>
      </table>
    </div>
  </div>

    <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  
  </body>
</html>