<?php

function registro()
{
    $nombre = $_POST['usuario'];
    $contra = $_POST['contra'];

    if (file_exists("../ficheros/usuarios.txt")) {
        $f1 = fopen("../ficheros/usuarios.txt", "r+");
        usuarios($f1, $nombre, $contra, $res);
        if ($res == 0) {
            fwrite($f1, "$nombre\r\n");
            fwrite($f1, "$contra\r\n");
            fwrite($f1, "0\r\n");
            echo "usuario añadido";
        } else {
            echo "Este usuario ya existe";
        }
    } else {
        $f1 = fopen("../ficheros/usuarios.txt", "w");
        fwrite($f1, "$nombre\r\n");
        fwrite($f1, "$contra\r\n");
        fwrite($f1, "0\r\n");
        echo "usuario añadido";
    }
}

function usuarios($f1, $nombre, $contra, &$r)
{
    $r = 0;
    while (!feof($f1)) {
        $a = fgets($f1);
        $b = fgets($f1);
        $c = fgets($f1);

        if ($a == $nombre . "\r\n" || $b == $contra . "\r\n") {
            $r++;
        }
    }
}

function login()
{
    $nombre = $_POST['usuario'];
    $contra = $_POST['contra'];

    if (file_exists("../ficheros/usuarios.txt")) {
        $f1 = fopen("../ficheros/usuarios.txt", "r+");
        usuarios($f1, $nombre, $contra, $res);

        if ($res == 1) {
            echo "Uusario logeado";
            $_SESSION['usuario'] = $nombre;
        }
    } else {
        echo "Este usuario no existe";
    }
}

function menu()
{
    if (isset($_SESSION['usuario'])) {
?>
        <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="codigo/principal.php?empezar">Empezar</a>
        </li>
        <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="codigo/principal.php?salir">Salir</a>
        </li>
    <?php
    } else {
    ?>
        <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="formularios/formu_login.php">Login</a>
        </li>
        <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="formularios/formu_registro.php">Registro</a>
        </li>
    <?php
    }
}


function salir()
{
    if (isset($_SESSION['usuario'])) {
        $nombre = $_SESSION["usuario"];
        session_destroy();
        echo "$nombre a cerrado session";
    } else {
        header("Location:../");
    }
}

function empezar()
{
    $f1 = fopen("../ficheros/palabrasBien.txt", "r");
    $f2 = fopen("../ficheros/palabrasmal.txt", "r");
    aleatorio($f1, $f2, $vec, $vec2, $rand);
    echo "$vec2[$rand]<br>";
    lineas($vec, $rand);
    galleta($vec, $vec2, $rand);
    formulario_palas();
}

function aleatorio($f1, $f2, &$vec, &$vec2, &$num)
{
    $a = 0;
    while (!feof($f1)) {
        $a++;
        $vec[] = fgets($f1);
        $vec2[] = fgets($f2);
    }
    $num = rand(0, $a - 2);
}

function lineas($vec, $rand)
{

    $var = strlen($vec[$rand]) - 2;


    for ($i = 0; $i < $var; $i++) {
        echo "_";
    }
}

function galleta($vec, $vec2, $rand)
{
    setcookie("solucion", $vec[$rand], time() + 3600, "/");
    setcookie("solucion", $vec2[$rand], time() + 3600, "/");
}

function formulario_palas()
{
    ?>
    <p>
    <form action="principal.php?palabras" method="post">
        <input type="text" name="palabra" id="">
        <br>
        <br>
        <input type="submit" value="enviar">
    </form>
    </p>
<?php
}
