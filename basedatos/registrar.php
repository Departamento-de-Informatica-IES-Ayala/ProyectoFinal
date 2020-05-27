<?php
require './basedatos/conexion.php';
if(!empty($_POST['nombreR']) && !empty($_POST['funcionR']) && !empty($_POST['dniR']) && !empty($_POST['emailR'])&& !empty($_POST['contraR']) && !empty($_POST['idEmpresaR'])){
    $sql="insert into users values (:nombre,:funcion,:dni,:email,:contra,:idEmpresa)";
    $prep= $conexion->prepare($sql);
    $prep->bindParam(':nombre',$_POST['nombreR']);
    $prep->bindParam(':funcion',$_POST['funcionR']);
    $prep->bindParam(':dni',$_POST['dniR']);
    $prep->bindParam(':email',$_POST['emailR']);
    $prep->bindParam(':idEmpresa',$_POST['idEmpresaR']);
    $contraseña= password_hash($_POST['contraR'], PASSWORD_BCRYPT);
    $prep->bindParam(':contra',$contraseña);

    if($prep->execute()){
        echo "<script type=\"text/javascript\">alert(\"Registro completado\");</script>"; 


    }else{
        echo "<script type=\"text/javascript\">alert(\"Usuario ya creado o id de empresa no identificado\");</script>"; 

    }

}
?>