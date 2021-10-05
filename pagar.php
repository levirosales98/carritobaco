<?php
    include 'global/connection.php';
    include 'carrito.php';
    include 'templates/cabecera.php';
?>

    <?php
        if($_POST)
        {
            $total = 0;
            $SID = session_id(); //la función me devuelve un número que se almacena en la variable
            $Correo = $_POST['email'];
            foreach($_SESSION['CARRITO'] as $indice=>$producto)
            {
                $total = $total + ($producto['CANTIDAD'] * $producto['PRECIO']);
            }

            $sentencia = $pdo -> prepare("INSERT INTO `ventas` (`ID`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `Status`)
            VALUES (NULL, :ClaveTransaccion, '', NOW(), :Correo, :Total, 'pendiente');");
            
            $sentencia -> bindParam(":ClaveTransaccion", $SID);
            $sentencia -> bindParam(":Correo", $Correo);
            $sentencia -> bindParam(":Total", $total);
            $sentencia -> execute();
            $idVenta = $pdo -> lastInsertId(); //recuperamos el último ID insertado en la base de datos
            //para crear una relación de la venta y el detalle

            foreach($_SESSION['CARRITO'] as $indice=>$producto)
            {
                $sentencia = $pdo -> prepare("INSERT INTO `detalleventa` (`ID`, `IDVenta`, `IDProducto`, `PrecioUnitario`, `Cantidad`, `Descargado`)
                VALUES (NULL, :IDVenta, :IDProducto, :PrecioUnitario, :Cantidad, '0');");
                
                $sentencia -> bindParam(":IDVenta", $idVenta); //último ID de la tabla ventas
                $sentencia -> bindParam(":IDProducto", $producto['ID']); //compuesto por el vector del carrito
                $sentencia -> bindParam(":PrecioUnitario", $producto['PRECIO']); //compuesto por el vector del carrito
                $sentencia -> bindParam(":Cantidad", $producto['CANTIDAD']); //compuesto por el vector del carrito
                $sentencia -> execute();
            }
        }
        
    ?>
    <br>

    <div class="jumbotron text-center">
        <h1 class="display-4">¡Paso final!</h1>
        <hr class="my-4">
        <p class="lead">Estas a punto de pagar la cantidad de
            <h4>Q<?php echo number_format($total, 2);?></h4>
        </p>
        <button
            class="btn btn-success btn-lg btn-block"
            type="button"
            name="btnAccion"
            value="pagar"
            >Pagar
        </button>
        <br>
        <p>Los productos podrán ser descargados cuando se procese el pago. <br><br>
            <strong>Correo de contacto: info@ceict.edu.gt</strong>
        </p>
    </div>

<?php
    include 'templates/pie.php';
?>