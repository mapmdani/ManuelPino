<?php
require_once "controladores/usuarios.controlador.php";
require_once "modelos/usuarios.modelo.php";
session_start();


?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="css/style.css">

  <title>Test Cobro Digital</title>
</head>

<body>

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Login to <strong>Test Cobro Digital</strong></h3>

            <form method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="User" name="ingUsuario" required id="username">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="ingPassword" required id="password">
              </div>

              <div class="d-flex mb-5 align-items-center">
              </div>

              <button type="submit" class="btn btn-primary btn-block">Login</button>

              <?php

              $login = new ControladorUsuarios();
              $login->ctrIngresoUsuario();

              ?>

            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  <script src="js/plantilla.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>