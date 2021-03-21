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
    arrelgar_palabra($vec, $rand, $p1);
    arrelgar_palabra($vec2, $rand, $p2);
    lineas($p1);
    galleta($p1, $p2);
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

function lineas($vec)
{
    for ($i = 0; $i < strlen($vec); $i++) {
        echo "_ ";
    }
}

function arrelgar_palabra($vec, $num, &$p1)
{
    $p1 = $vec[$num];
    $p1v = str_split($p1);
    $p1 = "";
    for ($i = 0; $i < count($p1v) - 2; $i++) {
        $p1 = $p1 . $p1v[$i];
    }
}

function galleta($p1, $p2)
{
    setcookie("palabra", $p2, time() + 3600, "/");
    setcookie("solucion", $p1, time() + 3600, "/");
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


function palabras()
{
    $palabra = strtoupper($_POST['palabra']);

    if ($palabra == $_COOKIE['solucion']) {
        // funcion ganado
        echo "has ganado";
        victoria();
    } else {
        // Funciones perdido
        echo $_COOKIE['palabra']. "<br><br>";
        lineas2($palabra);
    }
}

function lineas2($palabra)
{
    $palabrac = $_COOKIE['solucion'];

    $p1 = str_split($palabrac);
    $p2 = str_split($palabra);
    $t=count($p1);
    $text ="";
    for ($i = 0; $i < $t; $i++) {

        if (isset($p1[$i]) && isset($p2[$i])) {
            if ($p1[$i] == $p2[$i]) {
                $text=$text."$p1[$i] ";
            } else {
                $text = $text . "_ ";
            }
        }
    }
    $final= str_pad($text, $t*2, "_ ");
    echo $final;
}

function victoria(){
    $usuario=$_SESSION["usuario"];

    $f1=fopen("../ficheros/usuarios.txt", "r");
    $f2=fopen("../ficheros/usuarios2.txt","w+");
    $a=0;
    while (!feof($f1)) {
        $nombre = fgets($f1);
        $contra = fgets($f1);
        $puntos = (int)fgets($f1);
        if ($nombre == $usuario . "\r\n") {
            $puntos++;
        }
        if ($a==0) {
            $a++;
            fwrite($f2, $nombre);
            fwrite($f2, $contra);
            fwrite($f2, $puntos);
        }else {
            fwrite($f2, "\r\n" . $nombre);
            fwrite($f2, $contra);
            fwrite($f2, $puntos);
        }
        
        
        
    }
}