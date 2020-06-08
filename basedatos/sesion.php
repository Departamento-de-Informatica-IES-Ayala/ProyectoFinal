<!-- Datos del profesional al iniciar sesion -->
<?php
session_start();
require './basedatos/conexion.php';
if(isset($_SESSION['user_id'])){
    $datos= $conexion->prepare('select * from users where dni= :id');
    $datos->bindParam('id', $_SESSION['user_id']);
    $datos->execute();
    $result = $datos->fetch(PDO::FETCH_ASSOC);
    $numF=$datos->rowCount();
    $usuario=null;
    if($numF>0){
        $usuario=$result; }
}else{
    header('Location: index.php');
    die();   
}
?>