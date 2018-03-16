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
      
      $consultaSQL="INSERT INTO `administrator`(`username`, `password`) VALUES('$nombre', '$contrasenia');";
      $resultados=mysqli_query($conexion,$consultaSQL);
      
    }

    $valores = "SELECT COUNT(*) from administrator";
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

    <title>Administradores</title>

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
          <a href="../index.html" class="logo">
            <img src="../images/project/letras.png" alt="LOGO" class="sizeImage">
          </a>
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
            <div class="col-4 text-center" style="padding-top:40px">
                <h3>Registro de administradores</h3>
                <i class="fab fa-adn fa-10x" style="color: orange"></i>
            </div>
            <div class="col-8 marginFormsTwo">
              <form action="administrators.php" method="post">
                <div class="form-group">
                  <label for="id">ID</label>
                  <div class="row">
                    <div class="col-md-4">
                      <?php
                        echo "<input class='form-control' type='text' placeholder='$id' readonly=''>";
                      ?>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" placeholder="Nombre del administrador..." name="nombre">
                </div>
                <div class="form-group">
                <div id="passwordForm">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="nombre">Contraseña</label>
                      <input type="password" class="form-control" id="password" placeholder="Contraseña..." name="contra" required>
                    </div>
                    <div class="col-md-6">
                      <label for="nombre">Verificar contraseña</label>
                      <input type="password" class="form-control" id="confirm_password" placeholder="Verificar contraseña..." required>
                    </div>
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
      <h2>Consulta general de administradores</h2>
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
            foreach ($conexion->query('SELECT * from `administrator`') as $row){ ?> 
              <tr>
	              <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['username'] ?></td>
              </tr>
            <?php } ?>
          
          </tbody>
      </table>
    </div>
  </div>


    <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

      <script>
        var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
          if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("La contraseña no coincide");
          } else {
            confirm_password.setCustomValidity('');
          }
        }
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
        
      </script>
    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
  
  </body>
</html>