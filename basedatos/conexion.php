
<?php
    $server='localhost';
    $username='paula';
    $password='abduscan';
    $database='proyecto';

    try{
        $conexion= new PDO("mysql:host=$server;dbname=$database;",$username, $password);

    }catch(PDOException $e){
        die('conexion fallida'.$e->getMessage());
    }
?>