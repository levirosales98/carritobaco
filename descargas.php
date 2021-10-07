<?php
    include "global/connection.php";
    include "carrito.php";

    if($_POST)
    
    {
        echo $nombreArchivo = $_POST['id'].".pdf";
        header("Content-Transfer-Encoding: binary");
        header("Content-type: application/force-download");
        header("Content-Disposition: attachment; filename=$nombreArchivo");
        readfile("$nombreArchivo");
        header('Location: productos.php');
    }
    
?>