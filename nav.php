<?php
require './basedatos/sesion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Css.css">
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
</head>
<body>
<div id="app">
<nav class="navbar navbar-light bg-light  sticky-top d-flex justify-content-">
  <span class="navbar-brand mb-0 h1"><?=$usuario['nombre'] ?></span>
  <a  href= "./basedatos/logout.php" class="btn btn-outline-danger">Cerrar sesion</a>
</nav>
<!-- Nav -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top d-flex justify-content-center">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
      <div class="navbar-nav" id="menu">
        <router-link  class="dropdown-item btn btn-outline-info" to="/clientes">Clientes</router-link>
        <router-link  class="dropdown-item btn btn-outline-info" to="/citas">Citas</router-link> 
        <router-link class="dropdown-item btn btn-outline-info" to="/agenda">Agenda</router-link>
    </div>

    </div>
</nav>
<router-view></router-view>
</div>
<script src="javascript/main.js"></script>
<!-- Bootstrap, JQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- VUE -->
<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>    
</body>
</html> 