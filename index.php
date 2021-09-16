<?php
    include "global/connection.php";
    include "carrito.php";
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title>Carrito</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="index.php">Carrito CEICT</a>
            <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="my-nav" class="collpase navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Carrito</a>
                    </li>
                </ul>
            </div>
        </nav>
        <br/>
        <br/>
        <div class="container"> <!--contenedor que maneja bootstrap para colocar todos los elementos-->
            <br>
            <!--mensaje en verde-->
            <div class="alert alert-success">
                <?php echo $mensaje;?>
                <a href="#" class="badge badge-success">Ver carrito</a>
            </div>
            <!--tarjetas para los productos-->
            <div class="row">

                <?php
                    $sentencia = $pdo->prepare("SELECT * FROM `productos`");
                    $sentencia->execute();
                    $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                    //print_r($listaProductos);
                ?>

                <?php foreach($listaProductos as $producto) {?>
                
                    <div class="col-3"> <!--tamaño de 3. => 3*4=12-->
                        <div class="card">

                            <img
                            title="<?php echo $producto['nombre'];?>"
                            alt="<?php echo $producto['nombre'];?>"
                            class="card-img-top"
                            src="<?php echo $producto['imagen'];?>"
                            data-toggle="popover"
                            data-trigger="hover"
                            data-content="<?php echo $producto['descripcion'];?>"
                            >

                            <div class="card-body">
                                <span><?php echo $producto['nombre'];?></span>
                                <h5 class="card-title">Q<?php echo $producto['precio'];?></h5>
                                <p class="card-text">Descripción del producto</p>

                                <form action="" method="post">
                                    <input type="text" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'], COD, KEY);?>">                                       
                                    <input type="text" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'], COD, KEY);?>">
                                    <input type="text" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'], COD, KEY);?>">
                                    <input type="text" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY);?>">
                                    <button
                                    class="btn btn-primary"
                                    name="btnAgregar"
                                    value="agregar"
                                    type="submit">Agregar al carrito
                                    </button>
                                </form>
                                
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script>
            $(function () {
            $('[data-toggle="popover"]').popover()
            })
        </script>
    </body>
</html>