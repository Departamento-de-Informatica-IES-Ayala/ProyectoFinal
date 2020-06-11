<?php
require '../basedatos/peticionesAgenda.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Css.css">
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="body-white">
    <div id="appcitas">
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-outline-info"><i class="fas fa-plus fa-2xs" data-toggle="modal" data-target="#exampleModalCenter"></i></button>
                </div>
            </div>
            <div class="row mt-4  mx-0 form-group" id="buscar">
                <input class="col-12" type="text" v-model="buscar" placeholder="Buscar dia(AÑO-MES-DIA)">
            </div>
            <div class="row my-2 justify-content-start">
                <div v-for="(cita,index) of ListaArray " :cita='cita' :index='index' class="col-12 col-lg-3   my-1 p-0">
                    <div class="">
                        <div class="card client align-self-center">
                            <div class="card-body ">
                                <h5 class="card-title" id='nombre'>{{cita.dia}}</h5>
                                <div>
                                    <button class="btn btn-outline-info" title="Eliminar" v-on:click="cargarcitas(cita.dia)" data-toggle="modal" data-target="#citas"><i class="far fa-calendar-alt"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal cita nueva-->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="horaC">hora:</label>
                                <div class="col-sm-10">
                                    <input type="time" class="form-control" placeholder="hora" name="horaC" id="horaC" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="dia">dia:</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" placeholder="dia" name="dia" id="dia" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="dni">dni:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="dni cliente" name="dni" id="dni" required pattern="[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-outline-success" v-on:click="agregar(citas.dni)">Registrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal citas dia-->
        <div class="modal fade" id="citas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="card-title " id="diaG"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Hora</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(citaD,indice) of citasdatos ">
                                    <td>{{citaD.nombre}}</td>
                                    <td>{{citaD.hora}}</td>

                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-danger" title="Eliminar" @click="borrarCita(indice)"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../javascript/gestionAgenda.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>