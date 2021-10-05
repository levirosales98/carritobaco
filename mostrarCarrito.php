<?php
    include "global/connection.php";
    include "carrito.php";
    include "templates/cabecera.php";
?>
    
    <br>
    <h3>Lista del carrito</h3>

    <?php
        if(!empty($_SESSION['CARRITO'])) //si hay datos
        {
    ?>

        <table class="table table-light table-bordered">
            <tbody>
                <tr>
                    <th widht="30%">Nombre</th>
                    <th class="text-center" widht="20%">Cantidad</th>
                    <th class="text-center" widht="20%">Precio</th>
                    <th class="text-center" widht="20%">Sub total</th>
                    <th class="text-center" widht="10%">Acción</th>
                </tr>

                <?php
                    $total = 0;
                    foreach($_SESSION['CARRITO'] as $indice=>$producto) //se toma en cuenta el indice del vector de la sesión
                    {
                ?>
                
                <tr>
                    <td widht="30%"><?php echo $producto['NOMBRE'];?></td>
                    <td class="text-center" widht="20%"><?php echo $producto['CANTIDAD'];?></td>
                    <td class="text-center" widht="20%">Q<?php echo $producto['PRECIO'];?></td>
                    <td class="text-center" widht="20%">Q<?php echo number_format($producto['CANTIDAD'] * $producto['PRECIO'], 2);?></td>
                    <td widht="10%">
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY);?>">
                            <button
                                class="btn btn-danger type"
                                type="submit"
                                name="btnAccion"
                                value="eliminar"
                                >Eliminar
                            </button>
                        </form>
                        
                    </td>
                </tr>
                    
                <?php
                    $total = $total + ($producto['CANTIDAD'] * $producto['PRECIO']);
                    }
                ?>

                <tr>
                    <td colspan="3" align="right"><h3>Total</h3></td>
                    <td align="right"><h3>Q<?php echo number_format($total, 2);?></h3></td>
                    <td></td>
                </tr>
                
                <tr>
                    <td colspan="5">
                        <form action="pagar.php" method="post">
                            <div class="alert alert-success">
                                <div class="form-group">
                                    <label for="my-input">Correo de contacto:</label>
                                    <input id="email" name="email"
                                    class="form-control"
                                    type="email"
                                    placeholder="Ingresa tu correo" required
                                    >
                                    <small id="emailHelp"
                                    class="form-text text-muted"
                                    >Los productos se enviarán a este correo</small>
                                    <button
                                        class="btn btn-primary btn-lg btn-block"
                                        type="submit"
                                        name="btnAccion"
                                        value="procesar"
                                    >Procesar</button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>

            </tbody>
        </table>

    <?php
        }
        else
        {
    ?>

        <div class="alert alert-sucess">
            No hay productos en el carrito
        </div>

    <?php
        }
    ?>

<?php
    include "templates/pie.php";
?>