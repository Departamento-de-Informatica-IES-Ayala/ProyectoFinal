
<?php
session_start();
require '../basedatos/conexion.php';

if (isset($_SESSION['user_id'])) {
    //para axios
    $_POST = json_decode(file_get_contents("php://input"), true);
    //variables que se reciben para realizar las query en caso de no existir las crea vacias;

    $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : "";
    $data = '';
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
    $dni = (isset($_POST['dni'])) ? $_POST['dni'] : "";
    $id_tratamiento = (isset($_POST['id_tratamiento'])) ? $_POST['id_tratamiento'] : '';
    $email = (isset($_POST['email'])) ? $_POST['email'] : "";
    $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "";
    $valoracion = (isset($_POST['valoracion'])) ? $_POST['valoracion'] : "";
    $tratamiento = (isset($_POST['tratamiento'])) ? $_POST['tratamiento'] : "";
    $precio = (isset($_POST['precio'])) ? $_POST['precio'] : "";
    $importe=(isset($_POST['importe'])) ? $_POST['importe'] : "";
    $DNIProf = $_SESSION['user_id'];
    switch ($opcion) {
        case 1: //select
            $consulta = $conexion->prepare("SELECT * from clientes where DNIProf='$DNIProf'");
            $consulta->execute();
            $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
            break;
        case 2: //insert
            if(!empty($_POST['nombre']) && !empty($_POST['dni']) && !empty($_POST['email']) && !empty($_POST['telefono'])){
            $comprobar = $conexion->prepare("SELECT * from clientes where DNIProf='$DNIProf' and dni='$dni'");
            $comprobar->execute();
            $numF = $comprobar->rowCount();
            if ($numF>0) {
                $data='cliente ya registrado';
            } else {
                $consulta = $conexion->prepare("insert into clientes(nombre,dni,email,telefono,valoracion,DNIProf) values('$nombre','$dni','$email','$telefono','$valoracion','$DNIProf')");
                $consulta->execute();
            }
        }
            break;
        case 3: //update
            if(!empty($_POST['nombre']) && !empty($_POST['dni']) && !empty($_POST['email']) && !empty($_POST['telefono'])){
            $consulta = $conexion->prepare("update clientes set nombre='$nombre', email='$email', telefono='$telefono', valoracion='$valoracion' where dni='$dni' and DNIProf='$DNIProf'");
            $consulta->execute();
            $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
            }
            break;
        case 4: //delete
            $consulta = $conexion->prepare("delete from clientes where dni='$dni' and DNIProf='$DNIProf'");
            $consulta->execute();
            $data=$consulta;
            break;
        case 5://tratamientos listar
            $consulta=$conexion->prepare("SELECT * from tratamientos where dni_cliente=(SELECT id_cliente from clientes where dni='$dni' and DNIProf='$DNIProf')");
            $consulta->execute();
            $data = $consulta->fetchAll(PDO::FETCH_ASSOC);

        break;
        case 6://insertar tratamientos
            if(!empty($_POST['tratamiento']) && !empty($_POST['dni']) && !empty($_POST['precio']) && !empty($_POST['importe'])){
            $consultaid=$conexion->prepare("SELECT id_cliente from clientes where dni='$dni'");
            $consultaid->execute();
            $id=  $consultaid->fetch(PDO::FETCH_LAZY);
            $consulta=$conexion->prepare("INSERT into tratamientos(tratamiento,precio,importe_pagado,dni_cliente) VALUES('$tratamiento','$precio','$importe','$id[0]')");
            $consulta->execute();
            $data=$id;
            }
        break;
        case 7: //borrar tratamientos
            $consulta = $conexion->prepare("delete from tratamientos where id_tratamiento='$id_tratamiento'");
            $consulta->execute();
            $data=$consulta;
        break;
        case 8: //editar tratamientos
            // if(!empty($_POST['importe'])){
            $consulta = $conexion->prepare("update tratamientos set importe_pagado='$importe' where id_tratamiento='$id_tratamiento'");
            $consulta->execute();
            $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
            // }else{
            //     $data='error';
            // }
        break;
    }
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    //se pasa a formato json el resultado de las consultas    
}
?>