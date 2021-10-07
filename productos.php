<?php
    include 'global/connection.php';
    include 'carrito.php';
    include 'templates/cabecera.php';
?>

<div class="jumbotron text-center">
        <h1 class="display-4">¡Todo listo!</h1>
        <h2 class="display-6">Descarga tus archivos</h2>
        <hr class="my-4">
        <div class="row">
            <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){?>
                <div class="col-2">
                    <div class="card">
                        <img class="card-img-top" src="<?php echo $producto['IMAGEN'];?>">
                        <div class="card-body" height="317px">
                            <p class="card-text"><?php echo $producto['NOMBRE'];?></p>
                            <form action="descargas.php" method="post">
                                <input type="hidden" name="id" id="id" value="<?php echo $producto['ID'];?>">
                                <button class="btn btn-success" type="submit">Descargar</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
        <br><br>
            <strong>Correo de contacto: info@ceict.edu.gt</strong>
        </p>
    </div>



    

<?php
    include 'templates/pie.php';
?>