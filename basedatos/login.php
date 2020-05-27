<?php
session_start();

require 'conexion.php';

if(!empty($_POST['dni']) && !empty($_POST['contra'])){
 $consulta= $conexion->prepare("select * from users where dni=:dni");
 $consulta->bindParam(':dni',$_POST['dni']);
 $consulta->execute();
 $resultados= $consulta->fetch(PDO::FETCH_ASSOC);
 $numF=$consulta->rowCount();
 $error="";
 if( ($numF > 0) && password_verify($_POST['contra'], $resultados['password'])){
     $_SESSION['user_id']=$resultados['dni'];
     header('Location: /proyectoFinal/nav.html');
 }else{
     $error="usuario o contraseña incorrecto";
 }
}
?>