<?php
    define("KEY","walterlevi"); //llave de incriptacion
    define("COD","AES-128-ECB"); //método de incriptacion
    try
    {
        $pdo=new PDO('mysql:host=localhost; dbname=carritobaco', 'root', '');
        //echo "<script>alert('Conectado...')</script>";
    }
    catch(Exception $e)
    {
        //echo "<script>alert('No conectado...')</script>";
    }
?>