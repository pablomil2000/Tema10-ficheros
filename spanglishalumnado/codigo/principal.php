<?php
session_start();

include("funciones.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>

  <title>Spanglish</title>
  <!--

DIGITAL TREND

https://templatemo.com/tm-538-digital-trend

-->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/aos.css">
  <link rel="stylesheet" href="../css/owl.carousel.min.css">
  <link rel="stylesheet" href="../css/owl.theme.default.min.css">

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="../css/templatemo-digital-trend.css">

</head>

<body>

  <!-- MENU BAR -->
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="../">
        <i class="fa fa-line-chart"></i>
        Spanglish
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="principal.php?inicio" class="nav-link smoothScroll">Iniciar Juego</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <?php

  if (isset($_GET['admin_login']) || isset($_GET['admin_alta']) || isset($_GET['admin_consulta']) || isset($_GET['admin_baja']) || isset($_GET['modificar']) || isset($_GET['cerrar'])|| isset($_GET['C_esp_A']) || isset($_GET['C_esp_D']) || isset($_GET['C_ing_A']) || isset($_GET['C_ing_D'])){

    if (isset($_GET['admin_login'])){
      admin_login();
      header("location:../"); 
    }elseif (isset($_GET['admin_alta'])) {
      admin_alta();
    }elseif (isset($_GET['admin_baja'])){
      admin_baja();
    }elseif (isset($_GET['cerrar'])){
      session_destroy();
      header("location:../");
    } elseif (isset($_GET['C_esp_A'])) {
      C_esp_A();
    } elseif (isset($_GET['C_esp_D'])) {
      C_esp_D();
    } elseif (isset($_GET['C_ing_A'])) {
      C_ing_A();
    } elseif (isset($_GET['C_ing_D'])) {
      C_ing_D();
    }

  }else{
      if (isset($_GET['inicio'])) {
      incio_juego();
      header("location:principal.php?iniciar");
    } elseif (isset($_GET['jugar'])) {
      jugar($texto);
    }
  ?>

  <!-- HERO -->
  <section class="hero hero-bg d-flex justify-content-center align-items-center">
    <div class="container-fluid">
      <h2>
        <div class="row">
          <div class="col-md-4">
            <div class="col-lg-6 mx-auto col-12">
              <button class="form-control" id="submit-button" name="submit"><?php
                                                                            if (isset($_COOKIE['palabra1'])) {
                                                                              echo $_COOKIE['palabra1'];
                                                                            } else {
                                                                              header("location:principal.php?inicio");
                                                                            }
                                                                            ?></button>
            </div>
          </div>
          <div class="col-md-4">
            <div class="col-lg-6 mx-auto col-12">
              <button class="form-control" id="submit-button" name="submit"><?php
                                                                            if (isset($_COOKIE['lineas'])) {
                                                                              echo $_COOKIE['lineas'];
                                                                            } else {
                                                                              header("location:principal.php?inicio");
                                                                            }
                                                                            ?></button>
            </div>
          </div>
          <div class="col-md-4">
            <form action="principal.php?jugar" method="post" class="contact-form" data-aos="fade-up" data-aos-delay="300" role="form">
              <div class="row">
                <div class="col-lg-6 col-12">
                  <input type="text" class="form-control" name="uingles" placeholder="Introduce palabra en inglés">
                </div>
                <div class="col-lg-6 col-12">
                </div>
                <div class="col-lg-5 mx-auto col-7">
                  <button type="submit" class="form-control" id="submit-button" name="submit">Jugar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4">
              <div class="col-lg-6 mx-auto col-12">
                <button class="form-control" id="submit-button" name="submit"><?php
                                                                              if (isset($_COOKIE['intentos'])) {
                                                                                echo $_COOKIE['intentos'];
                                                                              } else {
                                                                                header("location:principal.php?inicio");
                                                                              }
                ?></button>
              </div>


            </div>
            <div class="col-md-4">
              <th colspan="2"><br>
                <a class="img-fluid mb-5 d-block mx-auto"> <?php
                                                            if (isset($texto)) {
                                                              echo $texto;
                                                            } ?>
              </th>
            </div>
          </div>
        </div>
  </section>
  <?php
  }
  ?>

  <footer class="site-footer">
    <div class="container">
      <div class="col-lg-4 mx-lg-auto text-center col-md-8 col-12" data-aos="fade-up" data-aos-delay="200">
        <p class="copyright-text">Copyright &copy; DAW 20-21
          <br>

      </div>

    </div>
  </footer>


  <!-- SCRIPTS -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/smoothscroll.js"></script>
  <script src="../js/custom.js"></script>

</body>

</html>