<?php
        $host_db="localhost";
        $usuario_db="root";
        $pass_db="Bankai123";
        $db="saw";

        $conexion=new mysqli($host_db,$usuario_db, $pass_db);
        $conexion->set_charset("utf8");    
  
        mysqli_select_db($conexion, "saw");
        if(@$_POST['nombre']){
            $nombre = $_POST['nombre'];
            $contrasenia = $_POST['contra'];   
            
            $consultaSQL= "SELECT * FROM `administrator` WHERE username ='".$nombre."' AND password = '".$contrasenia."';";
            $resultados=mysqli_query($conexion, $consultaSQL);
            $row = mysqli_fetch_array($resultados);
            if($row['username'] == $nombre){
                echo "<script>alert('usuario regristrado')</script>";
                echo "<script>window.history.pushState('', '', 'index.html');</script>";
                echo "<script>location.reload();</script>";
                //session_start(); //Star session
            }
            else{
                echo "<script>alert('usuario no regristrado');</script>";
               
            }
            
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login administradores</title>

     <!-- Bootstrap core CSS -->
     <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>
<body>
    <div class="form-login">
        <form action="login.php" method="POST">
            <div class="row">
                <div class="offset-md-5">
                    <i class="fa fa-user fa-10x" aria-hidden="true"></i>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contra</label>
                        <input type="password" name="contra" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary mb-2">Confirm identity</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>