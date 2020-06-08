<!-- Registro de la empresa -->
<?php
require './basedatos/conexion.php';
if(!empty($_POST['email'])&& !empty($_POST['contra']) && !empty($_POST['idEmpresa'])){
    $sql="insert into empresas values (:idEmpresa,:contra,:email)";
    $prep= $conexion->prepare($sql);
    $prep->bindParam(':email',$_POST['email']);
    $prep->bindParam(':idEmpresa',$_POST['idEmpresa']);
    $contraseña= password_hash($_POST['contra'], PASSWORD_BCRYPT);
    $prep->bindParam(':contra',$contraseña);

    if($prep->execute()){
        echo "<script type=\"text/javascript\">alert(\"Registro completado\");</script>"; 


    }else{
        echo "<script type=\"text/javascript\">alert(\"ID de empresa ya existente\");</script>"; 

    }

}
?>