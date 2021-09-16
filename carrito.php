<?php
    session_start(); //permite trabajar con variables de sesión
    $mensaje="";
    if(isset($_POST['btnAgregar']))
    {
        switch($_POST['btnAgregar'])
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
                }
                else{ //SI YA HAY DATOS
                    $numeroProductos = count($_SESSION['CARRITO']); //contador para los productos
                    $producto = array(
                        'ID' => $ID,
                        'NOMBRE' => $NOMBRE,
                        'PRECIO' => $PRECIO,
                        'CANTIDAD' => $CANTIDAD
                    );
                    $_SESSION['CARRITO'][$numeroProductos] = $producto;
                }
                $mensaje = print_r($_SESSION,true);
                break;
        }
    }
?>