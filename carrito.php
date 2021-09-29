<?php
    session_start(); //permite trabajar con variables de sesión
    $mensaje="";
    if(isset($_POST['btnAccion']))
    {
        switch($_POST['btnAccion'])
        {
            case 'agregar':
                if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))) //si puedes desencriptar
                {
                    $ID = openssl_decrypt($_POST['id'],COD,KEY);
                }

                if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))) //si puedes desencriptar
                {
                    $NOMBRE = openssl_decrypt($_POST['nombre'],COD,KEY);
                }

                if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))) //si puedes desencriptar
                {
                    $PRECIO = openssl_decrypt($_POST['precio'],COD,KEY);
                }

                if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))) //si puedes desencriptar
                {
                    $CANTIDAD = openssl_decrypt($_POST['cantidad'],COD,KEY);
                }

                if(!isset($_SESSION['CARRITO'])) //SI NO HAY DATOS
                {
                    $producto = array(
                        'ID' => $ID,
                        'NOMBRE' => $NOMBRE,
                        'PRECIO' => $PRECIO,
                        'CANTIDAD' => $CANTIDAD
                    );
                    $_SESSION['CARRITO'][0] = $producto;
                    $mensaje = "Producto agregado al carrito ";
                }
                else //SI YA HAY DATOS
                {
                    $idProductos = array_column($_SESSION['CARRITO'], "ID"); //deposita todos los ID del carrito en idProductos
                    if(in_array($ID, $idProductos)) //si el ID que está mandando el usuario ya está dentro de idProductos no podrá ingresarlo
                    {
                        echo "<script>alert('El producto ya está en la lista')</script>";
                    }
                    else
                    {
                        $numeroProductos = count($_SESSION['CARRITO']); //contador para los productos
                        $producto = array(
                            'ID' => $ID,
                            'NOMBRE' => $NOMBRE,
                            'PRECIO' => $PRECIO,
                            'CANTIDAD' => $CANTIDAD
                        );
                        $_SESSION['CARRITO'][$numeroProductos] = $producto;
                        $mensaje = "Producto agregado al carrito ";
                    }
                    
                }
                //$mensaje = print_r($_SESSION,true);
                
                break;

            case 'eliminar':
                if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY)))
                {
                    $ID = openssl_decrypt($_POST['id'],COD,KEY);
                    foreach($_SESSION['CARRITO'] as $indice=>$producto)
                    {
                        if($producto['ID'] == $ID) //si hay algun ID en el vector igual al que trae el botón de eliminar
                        {
                            unset($_SESSION['CARRITO'][$indice]); //elimina el índice del vector del carrito
                            echo "<script>alert('Producto eliminado')</script>";
                        }
                    }
                }
                break;
        }
    }
?>