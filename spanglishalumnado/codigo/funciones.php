<?php

// INICIO JUEGO

function incio_juego(){
    fichero_r($f1, "espanish.txt");
    fichero_r($f2, "ingles.txt");
    sacar_palabra($f1, $f2, $p1, $p2);
    fix_palabra($p1, $pf1);
    fix_palabra($p2, $pf2);
    lineas($pf2, $texto);
    galleta($pf1, "palabra1");
    galleta($texto, "lineas");
    galleta($pf2, "palabra2");
    galleta_borrar("resultado");
    galleta("3", "intentos");
}

function fichero_r(&$f1, $fichero)
{
    $f1 = fopen("../ficheros/$fichero", "r");
}

function fichero_w(&$f1, $fichero)
{
    $f1 = fopen("../ficheros/$fichero", "w");
}

function fichero_a(&$f1, $fichero){
    $f1 = fopen("../ficheros/$fichero", "a+");
}

function sacar_palabra($f1,$f2, &$p1, &$p2){
    while(!feof($f1)){
        $a[]=fgets($f1);
        $b[]=fgets($f2);
    }
    $num=rand(0,count($a)-1);   //el ficherp tiene 1 saltos

    $p1=$a[$num];
    $p2=$b[$num];
}

function fix_palabra($p1, &$t){
    $a=str_split($p1);
    $t="";

    for ($i=0; $i < count($a)-2; $i++) { 
        $t=$t.$a[$i];
    }
}

function lineas($palabra, &$t){
    $long= strlen($palabra);
    $t="";
    for ($i=0; $i < $long; $i++) { 
        $t=$t."_";
    }
}

function galleta($p1, $nombre){
    setcookie($nombre, $p1, time()+3600, "/");
}

function galleta_borrar($nombre){
    setcookie($nombre, "0", time()+0, "/");
}

// JUEGO


function jugar(&$r){
    $palabra = strtoupper($_POST['uingles']);
    $intentos=$_COOKIE['intentos'];
    if ($intentos!=0) {
        comparar($r, $palabra, $intentos);
        if ($r == "Has ganado, la solucion era,". $_COOKIE['palabra2']) {
            galleta("W", "resultado");
        }
    }else {
        $r= "Has perdio, No te quedan intentos";    //pierdo todos los puntos
        galleta("L", "resultado");
    }
}

function comparar(&$resultado, $palabra, &$intentos){
    if ($palabra == $_COOKIE['palabra2'] || isset($_COOKIE['resultado'])) {
        $resultado = "Has ganado, la solucion era, " . $_COOKIE['palabra2'];  //acierta en cualquier momento
    }else {
        $intentos--;
        galleta($intentos,"intentos");  
        $resultado = "Has fallado, te quedan $intentos intentos";   //falla con puntos
    }
}

// Admin

function admin_login(){
        $nombre = $_POST['usuario'];
        $contra = $_POST['contra'];
        
        if ($nombre == "Administrador" && $contra == "123") {
            $_SESSION['ususario']="1";
        
        }
    header("location:../");
}


function consultaindividual1(&$p1, &$p2)
{
    fichero_r($f1, "espanish.txt");
    fichero_r($f2, "ingles.txt");

    while (!feof($f1)) {
        $p1[] = fgets($f1);
        $p2[] = fgets($f2);
    }

    fclose($f1);
    fclose($f2);
}

function admin_baja(){
    $palabra=$_POST['palabra'];
    fichero_r($f1, "espanish.txt");
    fichero_r($f2, "ingles.txt");
    fichero_w($f3, "espanish2.txt");
    fichero_w($f4, "ingles2.txt");
    
    while (!feof($f1)) {
        $p1 = fgets($f1);
        $p2 = fgets($f2);

        if ($p1!=$palabra) {
            fwrite($f3, $p1);
            fwrite($f4, $p2);
        }
    }

    fclose($f1);
    fclose($f2);
    unlink("../ficheros/espanish.txt");
    unlink("../ficheros/ingles.txt");
    
    rename("../ficheros/espanish2.txt", "../ficheros/espanish.txt");
    rename("../ficheros/ingles2.txt", "../ficheros/ingles.txt");

    echo "palabra eliminada";
}

function admin_alta(){

    $palabra1 = strtoupper($_POST['palabra1']);
    $palabra2 = strtoupper($_POST['palabra1']);
    fichero_a($f1, "espanish.txt");
    fichero_a($f2, "ingles.txt");

    fwrite($f1, $palabra1 . "\r\n");
    fwrite($f2, $palabra2 . "\r\n");
    echo "palabra añadida";
}

function cerrar(){
    session_destroy();
}

function C_esp_A()
{
    fichero_r($f1, "espanish.txt");
    fichero_r($f2, "ingles.txt");

    while (!feof($f1)) {
        $p1[] = fgets($f1);
        $p2[] = fgets($f2);
    }

    burbuja($p1, $p2);

    for ($i = 0; $i < count($p1) - 1; $i++) {
        echo "$p1[$i] -- $p2[$i]<br>";
    }
}
function C_ing_A()
{
    fichero_r($f1, "espanish.txt");
    fichero_r($f2, "ingles.txt");

    while (!feof($f1)) {
        $p1[] = fgets($f1);
        $p2[] = fgets($f2);
    }

    burbuja($p1, $p2);

    for ($i = 0; $i < count($p1) - 1; $i++) {
        echo "$p1[$i] -- $p2[$i]<br>";
    }
}

function C_esp_D()
{
    fichero_r($f1, "espanish.txt");
    fichero_r($f2, "ingles.txt");

    while (!feof($f1)) {
        $p1[] = fgets($f1);
        $p2[] = fgets($f2);
    }

    burbuja2($p1, $p2);

    for ($i = 0; $i < count($p1) - 1; $i++) {
        echo "$p1[$i] -- $p2[$i]<br>";
    }
}
function C_ing_D()
{
    fichero_r($f1, "espanish.txt");
    fichero_r($f2, "ingles.txt");

    while (!feof($f1)) {
        $p1[] = fgets($f1);
        $p2[] = fgets($f2);
    }

    burbuja2($p1, $p2);

    for ($i = 0; $i < count($p1) - 1; $i++) {
        echo "$p1[$i] -- $p2[$i]<br>";
    }
}

function burbuja(&$vector1, &$vector2)
{
    $numElem = count($vector1)-1;
    for ($i = 0; $i < $numElem - 1; $i++) {
        for ($j = $numElem - 1; $j >= $i + 1; $j--) {
            if ($vector1[$j] < $vector1[$j - 1]) {
                $aux = $vector1[$j];
                $vector1[$j] = $vector1[$j - 1];
                $vector1[$j - 1] = $aux;
                $aux = $vector2[$j];
                $vector2[$j] = $vector2[$j - 1];
                $vector2[$j - 1] = $aux;
            }
        }
    }
}

function burbuja2(&$vector1, &$vector2)
{
    $numElem = count($vector1) - 1;
    for ($i = 0; $i < $numElem - 1; $i++) {
        for ($j = $numElem - 1; $j >= $i + 1; $j--) {
            if ($vector1[$j] >   $vector1[$j - 1]) {
                $aux = $vector1[$j];
                $vector1[$j] = $vector1[$j - 1];
                $vector1[$j - 1] = $aux;
                $aux = $vector2[$j];
                $vector2[$j] = $vector2[$j - 1];
                $vector2[$j - 1] = $aux;
            }
        }
    }
}