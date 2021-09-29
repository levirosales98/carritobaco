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
                        <a class="nav-link" href="mostrarCarrito.php">Carrito: 

                            <?php
                                echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
                                //si la sesión está vacia muestra un 0 de lo contrario cuenta la cantidad
                            ?>

                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <br/>
        <br/>
        <div class="container"> <!--contenedor que maneja bootstrap para colocar todos los elementos (SE CIERRA EN EL ARCHIVO "pie.php")-->