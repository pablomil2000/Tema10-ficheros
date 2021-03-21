<?php

function tmp(&$suma, &$total, &$mensaje){
    $suma="";
    $total="";
    $mensaje="";
}

function empezar(&$suma){
    dado($d1);
    dado($d2);
    mostrar($d1, $d2);
    puntos($d1, $d2, $suma);
    galletas($suma);
}

function dado(&$d){
    $d=rand(1,6);
}

function mostrar($d1, $d2){
    echo "<p><img src='../img/".$d1.".png' alt=''></p>";
    echo "<p><img src='../img/".$d2.".png' alt=''></p>";
}

function puntos(&$d1, &$d2, &$total){
    $total=$d1+$d2;
}

function galletas($total){
    setcookie("total", $total, time()+3600, "/");
}

function continuar(&$suma, &$total, &$mensaje){
    $mensaje="";
    dado($d1);
    dado($d2);
    mostrar($d1, $d2);
    suma($d1, $d2, $suma);
    puntos2($d1, $d2, $suma, $total);
    galletas($total);
    resultado($total, $mensaje);
}

function suma($d1, $d2, &$suma){
    $suma=$d1+$d2;
}

function puntos2($d1, $d2 ,$suma , &$total){
    $total=$_COOKIE['total'];
    $total=$total+$suma;
}

function resultado($total, &$texo){
    if ($total>=60) {
        $texo="perdiste";
    }elseif ($total>=50) {
        $texo="Ganaste";
    }
}

?>