<?php

require 'conexion.php';

if(!empty($_POST['dniE']) && !empty($_POST['contraB']) && !empty($_POST['idEmpresaB'])){
 $consulta= $conexion->prepare("select * from users where dni=:dni and id_empresa=:id_empresa");
 $pass=$conexion->prepare("select * from empresas where id_empresa=:id_empresa");
 $consulta->bindParam(':dni',$_POST['dniE']);
 $consulta->bindParam(':id_empresa',$_POST['idEmpresaB']);
 $pass->bindParam(':id_empresa',$_POST['idEmpresaB']);
 $consulta->execute();
 $pass->execute();
 $resultados= $pass->fetch(PDO::FETCH_ASSOC);
 $numF=$consulta->rowCount();
 $error="";
 if( ($numF > 0) && password_verify($_POST['contraB'], $resultados['pass'])){
    $elimina=$conexion->prepare("delete from users where dni=:dni");
    $elimina->bindParam(':dni',$_POST['dniE']);
    $elimina->execute();
 }else{
    echo "<script type=\"text/javascript\">alert(\"El empleado no ha podido eliminarse\");</script>"; 
 }
}
?>