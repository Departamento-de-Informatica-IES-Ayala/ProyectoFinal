<?php
require "./basedatos/registrar.php";
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
            <?php if (!empty($mes)) : ?>

                <h4><?= $mes ?></h4>
            <?php endif; ?>
            <h4 class="text-center">Inicio de sesion</h4>
        </div>
        <div class="card-body mx-5">

            <form>
                <input type="text" class="email my-2 rounded" placeholder="email">
                <br />
                <input type="password" class="pwd my-2 rounded" placeholder="password">
                <br />
                <input type="text" class="pwd my-2 rounded" placeholder="IDempresa">
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
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="index.php" method="post">
                                <input type="text" name='nombreR' class="my-2 rounded" placeholder="nombre" required>
                                <br />
                                <input type="text" name='funcionR' class="my-2 rounded" placeholder="funcion" required>
                                <br />
                                <input type="text" name='dniR' class="my-2 rounded" placeholder="dni" required>
                                <br />
                                <input type="text" name='emailR' class="my-2 rounded" placeholder="email" required>
                                <br />
                                <input type="password" name='contraR' class="my-2 rounded" placeholder="contraseña" required>
                                <br />
                                <input type="password" name='contra2R' class="my-2 rounded" placeholder="confirmar contraseña" required>
                                <br />
                                <input type="text" name='idEmpresaR' class=" my-2 rounded" placeholder="IDempresa" required>
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bootstrap, JQuery -->
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            <!-- VUE -->
            <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</body>

</html>