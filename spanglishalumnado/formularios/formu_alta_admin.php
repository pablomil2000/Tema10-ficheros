<?php
session_start();  //para el viernes

include("../codigo/funciones.php");
consultaindividual1($palabra1, $palabra2);

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



    ?>

    <!-- HERO -->
    <section class="hero hero-bg d-flex justify-content-center align-items-center">
        <div class="container-fluid">
            <h2>
                <div class="row">

                    <div class="col-md-4">

                        <div class="col-lg-6 mx-auto col-12"></div>

                    </div>
                    <div class="hero-unit">
                        <form id="newsletter" action="../codigo/principal.php?admin_alta" method="POST">
                            <input type="text" name="palabra1" placeholder="palabra español">
                            <input type="text" name="palabra2" placeholder="palabra ingles">
                            <br />
                            <br />
                            <input type="submit" id="newsletter_submit" value="Enviar">
                        </form>

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
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/aos.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/smoothscroll.js"></script>
    <script src="../js/custom.js"></script>

</body>

</html>