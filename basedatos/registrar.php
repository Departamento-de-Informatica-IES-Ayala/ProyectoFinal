<?php
require './basedatos/conexion.php';

$mes="";
if(!empty($_POST['nombreR']) && !empty($_POST['funcionR']) && !empty($_POST['dniR']) && !empty($_POST['emailR'])&& !empty($_POST['contraR']) && !empty($_POST['idEmpresaR'])){
    $sql="insert into users values (:nombre,:funcion,:dni,:email,:contra,:idEmpresa)";
    $prep= $conexion->prepare($sql);
    $prep->bindParam(':nombre',$_POST['nombreR']);
    $prep->bindParam(':funcion',$_POST['funcionR']);
    $prep->bindParam(':dni',$_POST['dniR']);
    $prep->bindParam(':email',$_POST['emailR']);
    $prep->bindParam(':idEmpresa',$_POST['idEmpresaR']);
    $contraseña=md5($_POST['contraR']);
    $prep->bindParam(':contra',$contraseña);

    if($prep->execute()){
        $mes="bien";

    }else{
        $mes='Id empresa no valido o usuario ya existente';
    }

}
?>