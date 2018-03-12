<?php
  
    $host_db="localhost";
    $usuario_db="root";
    $pass_db="Bankai123";
    $db="saw";
  
    $conexion=new mysqli($host_db,$usuario_db, $pass_db);
    $conexion->set_charset("utf8");    
  
    mysqli_select_db($conexion, "saw");    

    if (@$_POST['nombre'] && $_POST['file'] && $_POST['precio'] && $_POST['existencia'] && $_POST['categoria'] && $_POST['brand']) {
      
      $nombre = $_POST['nombre'];
      $file = $_POST['file'];
      $precio = $_POST['precio'];
      $existencia = $_POST['existencia'];
      $categoria = $_POST['categoria'];
      $brand = $_POST['brand'];
      
      $consultaSQL="INSERT INTO `products`(`name`, `idBrand`, `idCategory`, `image`, `cost`, `stock`) VALUES('$nombre', $brand, $categoria, '$file', $precio, $existencia);";
      $resultados=mysqli_query($conexion,$consultaSQL);
      if ($resultados)
        echo "<script>alert('Insertado exitosamente');</script>";    
      else
        echo "<script>alert('Error');</script>";
    }
    $valores = "SELECT COUNT(*) from products";
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
            <a href="products.php">Productos</a>
        </li>
        
      </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-3 text-center" style="padding-top:40px"> 
                <h3>Registro de productos</h3>
                <i class="fas fa-shopping-basket fa-10x" style="color: orange"></i>
            </div>
            <div class="col-9 marginFormsTwo">
              <form action="products.php" method="post">
                <div class="row">
                  <div class="col-3">
                    <div class="form-group">        
                      <label for="id">ID</label><br>
                      <?php
                        echo "<input type='text' class='form-control' placeholder='$id' readonly=''>";
                      ?>
                    </div>
                  </div>
                  <div class="col-9">
                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" class="form-control" id="nombre" placeholder="Nombre del producto..." name="nombre">
                    </div>
                  </div>
                </div>                  

                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="precio">Precio</label>
                      <input type="text" class="form-control" id="precio" placeholder="Precio del producto..." name="precio">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="existencia">Existencia</label>
                      <input type="number" class="form-control" id="existencia" placeholder="Existencia del producto..." name="existencia">
                    </div>
                  </div>      
                </div>    

                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="categoria">Categoria</label>
                      <select class= "form-control" name="categoria">
                      <?php 
                        foreach ($conexion->query('SELECT * from `categorias`') as $row){
                          echo "<option value= '".$row['id']."'>";
                          echo $row['nombre'];
                          echo "</option>";
                        } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                    <label for="brand">Marca</label>
                    <select class= "form-control" name="brand">
                      <?php 
                        foreach ($conexion->query('SELECT * from `brands`') as $row){
                          echo "<option value= '".$row['id']."'>";
                          echo $row['name'];
                          echo "</option>";
                        } ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="btn-grabar">
                    <input type="file" name="file" id="file" class="inputfile" />                    
                  </div> 
                </div>
                
                <div class="form-group">
                  <input type="submit" class="btn btn-warning">
                </div>

              </form>
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