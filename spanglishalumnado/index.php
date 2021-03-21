<?php
session_start();
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

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="css/templatemo-digital-trend.css">

</head>

<body>

  <!-- MENU BAR -->
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <i class="fa fa-line-chart"></i>
        Spanglish
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <?php
          if (isset($_SESSION["ususario"])) {
          ?>
            <li class="nav-item">
              <a href="formularios/formu_alta_admin.php" class="nav-link smoothScroll">alta</a>
            </li>
            <li class="nav-item">
              <a href="formularios/formu_baja_admin.php" class="nav-link smoothScroll">baja</a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Consultas<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="codigo/principal.php?C_esp_A">Español asc</a></li>
                <li><a href="codigo/principal.php?C_esp_D">Español desc</a></li>
                <li><a href="codigo/principal.php?C_ing_A">Ing asc</a></li>
                <li><a href="codigo/principal.php?C_ing_D">Ing desc</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="codigo/principal.php?cerrar" class="nav-link smoothScroll">Cerrar admin</a>
            </li>
          <?php
          } else {
          ?>
            <li class="nav-item">
              <a href="formularios/formu_login_Admin.php" class="nav-link smoothScroll">Administracion</a>
            </li>
          <?php
          }
          ?>

          <li class="nav-item">
            <a href="codigo/principal.php?inicio" class="nav-link smoothScroll">Iniciar Juego</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- HERO -->
  <section class="hero hero-bg d-flex justify-content-center align-items-center">
    <div class="container">
      <div class="row">

        <div class="col-lg-6 col-md-10 col-12 d-flex flex-column justify-content-center align-items-center">
          <div class="hero-text">

            <h1 class="text-white" data-aos="fade-up">Aprende inglés de forma divertida</h1>

            <a href="codigo/principal.php?inicio" class="custom-btn btn-bg btn mt-3" data-aos="fade-up" data-aos-delay="100">A Practicar!</a>

          </div>
        </div>

        <div class="col-lg-6 col-12">
          <div class="hero-image" data-aos="fade-up" data-aos-delay="300">

            <img src="images/spanglish.jpg" class="img-fluid" alt="working girl">
          </div>
        </div>

      </div>
    </div>
  </section>

  <footer class="site-footer">
    <div class="container">
      <div class="col-lg-4 mx-lg-auto text-center col-md-8 col-12" data-aos="fade-up" data-aos-delay="200">
        <p class="copyright-text">Copyright &copy; DAW 20-21
          <br>

      </div>

    </div>
  </footer>


  <!-- SCRIPTS -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/smoothscroll.js"></script>
  <script src="js/custom.js"></script>

</body>

</html>