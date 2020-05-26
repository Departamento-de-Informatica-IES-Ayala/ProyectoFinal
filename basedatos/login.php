<?php
session_start();
if(isset($_SESSION['user_id'])){
    header('Location: /proyectoFinal/nav.html');
}
require 'conexion.php';

if(!empty($_POST['dni']) && $_POST['contra']){
 $contra=$_POST['contra'];
 $consulta= $conexion->prepare("select * from users where dni=:dni");
 $consulta->bindParam(':dni',$_POST['dni']);
 $consulta->execute();
 $resultados= $consulta->fetch(PDO::FETCH_ASSOC);
 $error="";
 print_r(password_verify($_POST['contra'], $resultados['password']));
 if(count($resultados)>0 && password_verify($_POST['contra'], $resultados['password'])){
     $_SESSION['user_id']=$resultados['dni'];
     header('Location: /proyectoFinal/nav.html');
 }else{
     $error="usuario o contraseña incorrecto";
 }
}
?>