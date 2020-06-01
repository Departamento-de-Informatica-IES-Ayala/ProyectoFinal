<?php
require "./basedatos/registrar.php";
require "./basedatos/login.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Index</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Css.css">
</head>

<body class="vh-100  d-flex align-items-center justify-content-center inicio ">
    <!-- Card -->
    <div class="card login ">
        <div class="card-title mx-5 mt-5">
            <h4 class="text-center">Inicio de sesion</h4>
        <?php if (!empty($error)) :?>
            <p><?= $error ?></p>
        <?php endif;?>
        </div>
        <div class="card-body mx-5">

            <form action="index.php" method="post">
                <input type="text" class="my-2 rounded" placeholder="dni" name="dni">
                <br />
                <input type="password" class="my-2 rounded" placeholder="password" name="contra">
                <br />
                <button type="submit" class="btn btn-outline-success">Entrar</button>
            </form>

        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-outline-info register mx-2" data-toggle="modal" data-target="#exampleModalCenter">
                    <span>register</span>
                </button>
                <button type="button" class="btn btn-outline-primary acceso mx-2">
                    <span>sign in</span>
                </button>
            </div>
            <br />
            <a href="#" class="link d-flex justify-content-center">
                registrar empresa
            </a>
            <br />
            <a href="#" class="link d-flex justify-content-center">
                forgot your password ?
            </a>
        </div>
        <div>
            <!-- Modal registro empleado-->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" action="index.php" method="post">
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="nombreR">Nombre:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Nombre" name="nombreR" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="funcionR">funcion:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="funcion" name="funcionR" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="dniR">dni:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="dni" name="dniR" required pattern="[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="emailR">Email:</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" placeholder="email" name="emailR" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="contraR">contraseña:</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" placeholder="contraseña" name="contraR" minlength="6" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="idEmpresaR">IDempresa:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="IDempresa" name="idEmpresaR" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-outline-success">Registrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal registro emrpesa -->
            <!-- script recarga -->
           <script>
                if (window.history.replaceState) { 
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>
            <!-- Bootstrap, JQuery -->
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            <!-- VUE -->
            <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</body>

</html>