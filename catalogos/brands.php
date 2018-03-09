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
      
      $consultaSQL="INSERT INTO `brands`(`name`) VALUES('$nombre');";
      $resultados=mysqli_query($conexion,$consultaSQL);
      if ($resultados)
        echo "<script>alert('Insertado exitosamente');</script>";    
      else
        echo "<script>alert('Error');</script>";
    }
    $valores = "SELECT COUNT(*) from brands";
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

    <title>Marcas</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
            <a href="products.php">Productos</a>
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
            <div class="col-4 marginForms">
              <form action="brands.php" method="post">
                <div class="form-group">
                
                  <label for="id">ID</label><br>
                  <?php
                    echo "<input type='text' class='form-control' placeholder='$id' readonly=''>";
                  ?>
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" placeholder="Nombre de la marca..." name="nombre">
                </div>
                <input type="submit" class="btn btn-warning">
              </form>
            </div>
            <div class="col-4">
              
            </div>
          </div> 

          <hr>

          <div class="container">

            <div class="col-md-8 offset-md-2" style="text-align: center">
              <h2>Consulta general de marcas</h2>
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
                  foreach ($conexion->query('SELECT * from `brands`') as $row){ ?> 
                    <tr>
                      <td><?php echo $row['id'] ?></td>
                      <td><?php echo $row['name'] ?></td>
                    </tr>
                <?php } ?>              
                </tbody>
              </table>
            </div>
          </div>  
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