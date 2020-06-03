<?php
require '../basedatos/peticionesClientes.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Css.css">
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="appclientes">
        <div class="container">
            <div class="row">
                <div class="col">
                    <button class="btn btn-outline-info"><i class="fas fa-plus fa-2xs" data-toggle="modal" data-target="#exampleModalCenter"></i></button>
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
                            <div>
                                <button @:click="eliminar(cliente.dni)" class="btn btn-outline-secondary"><i class="far fa-trash-alt"></i></button>
                                <button  class="btn btn-outline-secondary"><i class="far fa-pencil-alt" data-toggle="modal" data-target="#editar"></i></button>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-dark">
                            <small id="info" class="form-text text-muted">Tratamientos</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal registro cliente-->
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
                                <label class="control-label col-sm-4" for="nombreR">Nombre:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nombre" name="nombreR" id="nombreR" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="dniR">dni:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="dni" name="dniR" id="dniR" required pattern="[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="emailR">Email:</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" placeholder="email" name="emailR" id="emailR" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="observacionesR">Observaciones:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="Observaciones" name="observacionesR" id="observacionesR"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-outline-success" @click="add">Registrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal editar cliente-->
        <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" >
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="nombreM">Nombre:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nombre" name="nombreM" id="nombreM" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="emailM">Email:</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" placeholder="email" name="emailM" id="emailM" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="telefonoM">Telefono:</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" placeholder="Telefono" name="telefonoM" id="telefonoM" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="observacionesM">Observaciones:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="Observaciones" name="observacionesM" id="observacionesM"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-outline-success" @:click="editar(cliente.dni)">Guardar cambios</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="../javascript/gestion.js"></script>
    <!-- Bootstrap, JQuery -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- VUE -->
    <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</body>

</html>