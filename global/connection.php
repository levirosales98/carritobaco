<?php

    try
    {
        $pdo=new PDO('mysql:host=localhost; dbname=carritobaco', 'root', '');
        echo "<script>alert('Conectado...')</script>";
    }
    catch(Exception $e)
    {
        echo "<script>alert('Conectado...')</script>";
    }
?>