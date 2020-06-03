<?php
session_start();
require '../basedatos/conexion.php';

if (isset($_SESSION['user_id'])) {
    //para axios
    $_POST = json_decode(file_get_contents("php://input"), true);
    //variables que se reciben para realizar las query en caso de no existir las crea vacias;
    $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : "";
    $data='';
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
    $DNI = (isset($_POST['DNI'])) ? $_POST['DNI'] : "";
    $email = (isset($_POST['email'])) ? $_POST['email'] : "";
    $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "";
    $valoracion = (isset($_POST['valoracion'])) ? $_POST['valoracion'] : "";
    $DNIProf = $_SESSION['user_id'];
    switch ($opcion) {
        case 1: //select
            $consulta = $conexion->prepare("SELECT * from clientes where DNIProfesional='$DNIProf'");
            $consulta->execute();
            $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
            break;
        case 2: //insert
            $consulta = $conexion->prepare("insert into clientes values('$nombre','$DNI','$email','$telefono','$valoracion','$DNIProf')");
            $consulta->execute();
            break;
        case 3: //update
            $consulta = $conexion->prepare("update clientes set nombre='$nombre', email='$email' telefono=$telefono valoracion='$valoracion' where DNI=:dni and DNIProfesional=:DNIProf");
            $consulta->bindParam('DNIProf', $DNIProf);
            $consulta->bindParam('dni', $DNI);
            $consulta->execute();
            $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
            break;
        case 4: //delete
            $consulta = $conexion->prepare("delete fom clientes where where DNI=:dni and DNIProfesional=:DNIProf");
            $consulta->bindParam('DNIProf', $DNIProf);
            $consulta->bindParam('dni', $DNI);
            $consulta->execute();
            break;
    }
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    //se pasa a formato json el resultado de las consultas    
}
?>