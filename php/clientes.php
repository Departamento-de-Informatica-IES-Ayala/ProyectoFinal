<?php
session_start();
require '../basedatos/conexion.php';

$_POST= json_decode(file_get_contents("php://input"),true);

// if(isset($_SESSION['user_id'])){
//     $cliente=$conexion->prepare('select * from ')
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Css.css">
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="appclientes">
        <div class="container">
            <div class="row">
                <div class="col">
                    <button @click="btnAlta" class="btn btn-outline-info"><i class="fas fa-plus fa-2xs"></i></button>
                </div>
                <div class="col text-right">
                    <h5> Total clientes {{totalClientes}}</h5>
                </div>
            </div>
            <div v-for="(cliente,index) of clientes">
                    <div class="col-12">
                        <div class="card border-dark mb-3 text-left">
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <h4 class="card-title " name="">{{cliente.nombre}}</h4>
                                </div>
                                <button @:click="eliminar(cliente)" class="btn btn-outline-secondary"><i class="far fa-trash-alt"></i></button>
                            </div>
                            <div class="card-footer bg-transparent border-dark">
                                <small id="info" class="form-text text-muted">Tratamientos</small>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- Scripts -->
        <script src="main.js"></script>
        <!-- Bootstrap, JQuery -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <!-- VUE -->
        <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</body>

</html>