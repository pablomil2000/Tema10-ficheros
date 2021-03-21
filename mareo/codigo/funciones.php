<?php

function palabra_1()
{
    fichero_1($f1, "Bien");
    fichero_1($f2, "Mal");

    gen_vec($f1, $vec_a);
    gen_vec($f2, $vec_b);

    numrand($vec_a, $num);

    palabras($vec_a, $vec_b, $num);
    formulario_palabra();
    setcookie("i", 3, time() + 3600, "/");
}

function letra()
{
    if (isset($_POST['letra']) && $_POST['letra'] != "") {
        $palabra_usu = strtoupper($_POST['letra']);

        if ($palabra_usu == $_COOKIE['Palabra_a']) {
            echo "HAS GANADO";
        } else {
            $a = $_COOKIE['i'] - 1;
            if ($a == -1) {
                echo "has perdido";
            } else {
                setcookie("i", $a, time() + 3600, "/");
                echo "Todavia no has ganado<br>";
                echo $_COOKIE['Palabra_b'] . "<br>";

                gen_vec2($palabra_usu, $palabra);

                compara_vec($palabra);
                formulario_palabra();
            }
        }
    } else {
        echo $_COOKIE['Palabra_b'];
        echo "El texto no es valido";
        formulario_palabra();
    }
}

function fichero_1(&$f1, $tipo)
{
    $f1 = fopen("../ficheros/Palabras" . $tipo . ".txt", "r");
}

function gen_vec($f1, &$vec)
{
    while (!feof(($f1))) {
        $vec[] = fgets($f1);
    }
}

function numrand($vec, &$num)
{
    $num = rand(0, count($vec) - 2);
}

function palabras($vec_a, $vec_b, $num)
{
    echo $vec_b[$num];
    $palabra_a = $vec_a[$num];
    $palabra_b = $vec_b[$num];
    fix_palabra($palabra_a, $palabra_a_f);
    fix_palabra($palabra_b, $palabra_b_f);

    huecos($palabra_a_f);

    setcookie("Palabra_a", $palabra_a_f, time() + 3600, "/");
    setcookie("Palabra_b", $palabra_b_f, time() + 3600, "/");
}

function fix_palabra(&$palabra, &$text)
{
    $palabra_aux = str_split($palabra);
    $text = "";
    for ($i = 0; $i < count($palabra_aux) - 2; $i++) {
        $text = $text . $palabra_aux[$i];
    }
}

function huecos($palabra)
{
    $palabra_aux = str_split($palabra);
    $text = "";
    for ($i = 0; $i < count($palabra_aux); $i++) {
        $text = $text . "_ ";
    }
    setcookie("aciertos", $i, time() + 3600, "/");
    setcookie("lineas", $text, time() + 3600, "/");
    echo "<br>$text<br>";
}

function gen_vec2($palabra_usu, &$palabra)
{
    $palabra = str_split($palabra_usu);
}

function compara_vec($palabra)
{
    $vec = str_split($_COOKIE['Palabra_a']);
    $lineas = str_split($_COOKIE['lineas']);
    $text = "";
    $a = 0;
    for ($i = 0; $i < count($vec); $i++) {
        if (isset($palabra[$i])) {
            if ($vec[$i] == $palabra[$i]) {
                $text = $text . $palabra[$i];
                $a++;
            } else {
                $text = $text . " " . $lineas[$i * 2];
            }
        }
    }
    echo $text;
}

function formulario_palabra()
{
?>
    <p>
    <form action="principal.php?letra" method="post">
        <input type="text" name="letra" id="" placeholder="Palabra" autofocus>
        <input type="submit" value="Palabra">
    </form>
    </p>
<?php
}

function registro()
{
    $nombre = $_POST["usuario"];
    $contra = $_POST["contra"];

    fichero_2($f1, "usuarios", "r+");

    buscar_usuario($nombre, $f1, $contra);
}

function fichero_2(&$f1, $nombre, $modo)
{
    $f1 = fopen("../ficheros/" . $nombre . ".txt", $modo);
}

function buscar_usuario($nombre, $f1, $contra)
{
    gen_vec3($f1, $usuario, $pass);
    usuario($usuario, $nombre, $user, $result);
    if ($result == 0) {
        echo "Se a creado el usuario";
        anadir($f1, $nombre, $contra);
    } else {
        echo "El usuario ya existe";
    }
}

function usuario($usuario, $nombre, &$user, &$result)
{
    for ($i = 0; $i < count($usuario) - 1; $i++) {
        if ($usuario[$i] == $nombre . "\r\n") {
            $user = $i;
        }
    }
    if (!isset($user)) {
        $result = 0;
    } else {
        $result = 1;
    }
}

function gen_vec3($f1, &$usuario, &$pass)
{
    while (!feof(($f1))) {
        $usuario[] = fgets($f1);
        $pass[] = fgets($f1);
    }
}


function anadir($f1, $nombre, $conta)
{
    fwrite($f1, "$nombre\r\n");
    fwrite($f1, "$conta\r\n");
}

function login()
{
    $nombre = $_POST["usuario"];
    $contra = $_POST["contra"];

    fichero_2($f1, "usuarios", "r+");
    gen_vec3($f1, $usuario, $pass);
    usuario($usuario, $nombre, $user, $result);

    if ($result == 1) {
        $_SESSION['usuario'] = $nombre;

        setcookie("w", 0, time() + 3600, "/");
        setcookie("l", 0, time() + 3600, "/");
        setcookie("i", 3, time() + 3600, "/");

        header("Location:../");
    } else {
        echo "Este usuario no existe";
    }
}

function menu()
{
    echo "Usuario: " . $_SESSION['usuario'] . "<br>";
    echo "Ganadas: " . $_COOKIE['w'] . "<br>";
    echo "Perdidas: " . $_COOKIE['l'] . "<br>";
    echo "Intentos: " . $_COOKIE['i'] . "<br>";
}
