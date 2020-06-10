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
    $email = (isset($_POST['email'])) ? $_POST['email'] : "";
    $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "";
    $valoracion = (isset($_POST['valoracion'])) ? $_POST['valoracion'] : "";
    $idcita = (isset($_POST['idcita'])) ? $_POST['idcita'] : '';
    $hora = (isset($_POST['hora'])) ? $_POST['hora'] : "";
    $dia = (isset($_POST['dia'])) ? $_POST['dia'] : "";
    $hoy = date("Y-m-d"); 
    $DNIProf = $_SESSION['user_id'];
    switch ($opcion) {
        case 1: //select
            $consulta = $conexion->prepare("SELECT * from citas,clientes where dni_Prof='$DNIProf' and citas.id_cliente=clientes.id_cliente and dia='$hoy' order by citas.hora");
            $consulta->execute();
            $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
            break;
        case 2: //insert
            $consultaid=$conexion->prepare("SELECT id_cliente from clientes where dni='$dni' and DNIProf='$DNIProf'");
            $consultaid->execute();
            $numF = $consultaid->rowCount();
            if ($numF>0) {
                $id=  $consultaid->fetch(PDO::FETCH_LAZY);
                $consulta = $conexion->prepare("insert into citas(hora,dia,dni_Prof,id_cliente) values('$hora','$hoy','$DNIProf','$id[0]')");
                $consulta->execute();
            } else {
                $data='cliente no registrado';
            }
            break;
        case 3: //borrar
            $consulta = $conexion->prepare("delete from citas where id_citas='$idcita'");
            $consulta->execute();
            $data=$consulta;
        break;
    }
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    //se pasa a formato json el resultado de las consultas    
}
?>