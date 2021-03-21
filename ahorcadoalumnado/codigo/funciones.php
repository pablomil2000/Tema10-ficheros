<?php

function palabra() {
    $f1=fopen("../ficheros/palabras.txt","r");  //abro palabras en lectura
    $f2=fopen("../ficheros/fallos.txt","w+");   //creo F de errores
    fclose($f2);                                //cierrro F errores
    $a=0;                                       //Contador de palabras en el F de palabras
    $texto="";
    while (!feof($f1)) {
        $adivinanza = strtolower(fgets($f1));   //Todas las palabras salen escritas en minusculas
        $vec[$a]=$adivinanza;
        $a++;
    }
    $a--;
    $num = rand(0,$a-1);
    $c = strlen($vec[$num])-2;  //tamaño de la palbra
    $vec2=str_split($vec[$num]);
    for ($i=0; $i < $c; $i++) { 
        echo " _ ";
        $texto=$texto.$vec2[$i];    //Muestro "_ " tantas veces como letras de la palabra, cada letra son dos espacios "_" y " "
    }
    //Creo cookies
    setcookie("solucion", $texto, time()+3600, "/");
    lineas($texto);
}

function solucion(){
    if (isset($_COOKIE['solucion'])) {
        echo $_COOKIE['solucion'];      //Muestro solucion
    }
    echo "<p>La siguiente palabra es: </p>";
    palabra();                      //Creo nueva solucion
}

function lineas($palabra){
    $texto="";
    for ($i=0; $i < strlen($palabra); $i++) { 
        $texto=$texto."_ ";            //Muestro "_ " tantas veces como letras de la palabra, cada letra son dos espacios "_" y " "
    }

    //reasignacion de cookies
    setcookie("lineas", $texto, time()+3600, "/");
    setcookie("total", strlen($palabra), time()+3600, "/");
    setcookie("fallos", "0", time()+3600, "/");
    setcookie("aciertos", "0", time()+3600, "/");
}

function letra(){
    $f1=fopen("../ficheros/fallos.txt", "r");
    $letra=strtolower($_POST['letra']); //letra del usuario modificada
    $texto="";
    $palabra=$_COOKIE['solucion'];      //Palabra correcta sin modificar
        $palabra=str_split($palabra);       //Palabra correcta modificada
    $lineas=$_COOKIE['lineas'];         //Huecos de la palabra correcta
        $lineas=str_split($lineas);         //Huecos de la palabra correcta en array
    $aciertos=$_COOKIE["aciertos"];     //numero de aciertos del usuario
    $fallos=$_COOKIE["fallos"];         //Numero total de fallos max6

    $a=0;
    foreach ($palabra as $key => $value) {
        if ($value==$letra) {
            $lineas[$key*2]=$letra;
            $aciertos++;    //modifico la cantidad de aciertos, si no es igual a la cookie significa acierto
        }
    }

    if ($aciertos==$_COOKIE["aciertos"]) {  //El valor de la variable se puede modificar si aciertas

        while (!feof($f1)) {
            $vec[] =fgetc($f1);
        }
        fclose($f1);
        foreach ($vec as $key => $value) {
            if (strtolower($value)==strtolower($letra)) {
                $a=1;
            }
            
        }

        if ($a!=1) {                       //Con este if si existe a==1 no se escribe el caracter en el fichero para evitar duplicados
            $f2=fopen("../ficheros/fallos.txt","a+");
            fwrite($f2, $letra);        
            $fallos++;                      //Aumento fallos para el muñeco
        }
    }

    foreach ($lineas as $key => $value) {
        $texto=$texto.$value;   //construllo cadena a mostrar
    }

    //reasignacion de cookies
    setcookie("fallos", $fallos, time()+3600, "/");
    setcookie("lineas", $texto, time()+3600, "/");
    setcookie("aciertos", $aciertos, time()+3600, "/");

    header("Location:letras.php");
}

function mensaje(){
    if ($_COOKIE['aciertos']==$_COOKIE['total']) {
        echo"Has Ganado";
    }else {
        if ($_COOKIE['fallos']>=6) {
            echo "Has perdido<br>";
        }
        readfile("../ficheros/fallos.txt");
    }
}

function admin_c(){
    $nombre=$_POST['nombre'];
    $contra=$_POST['contra'];

    if ($nombre=="Ahorcado" && $contra=="123") {
        $_SESSION['admin']=$nombre;
        header("Location:../");
    }else {
        echo "Los datos introducidos no son correcto,vuelve a intentarlo";
    }
}

function salir(){
    session_destroy();
    header("Location:../");
}

function palabra_n(){
    $f1=fopen("../ficheros/palabras.txt", "a+");
    $palabra=strtolower($_POST['palabra']);

    while (!feof($f1)) {
        $tmp=strtolower(fgets($f1));

        if ($tmp==$palabra."\r\n") {
            $aviso=1;
        }
    }

    if (!isset($aviso)) {
        echo "Palabra añadida";
        fwrite($f1, "$palabra\r\n");
    }else {
        echo "Esta palabra esta repetida";
    }
}

function baja_palabra(){
    $palabra=$_POST['palabra'];
    $f1=fopen("../ficheros/palabras.txt","r");
    $f2=fopen("../ficheros/palabras2.txt", "w+");
    $i=0;

    while (!feof($f1)) {
        $tmp=fgets($f1);
        if ($tmp!=$palabra) {
            fwrite($f2,$tmp);
        }
    }
    echo "Palabras eliminada";

    fclose($f1);
    fclose($f2);
    unlink("../ficheros/palabras.txt");
    rename("../ficheros/palabras2.txt", "../ficheros/palabras.txt");
}

function consulta(){
    $f1=fopen("../ficheros/palabras.txt", "r");
    while (!feof($f1)) {
        $palabras=fgets($f1);
        echo "<p>$palabras</p>";
    }
    fclose($f1);
}

function consultaindividual1(&$nombres){
    $f1=fopen("../ficheros/palabras.txt", "r");
    while (!feof($f1)) {
        $nombres[]=fgets($f1);
    }
    fclose($f1);
}

function cambiar_p(){
    $palabra=$_POST['palabra'];
    $palabra2=$_POST['palabra2'];
    $f1=fopen("../ficheros/palabras.txt","r");
    $f2=fopen("../ficheros/palabras2.txt", "w+");
    $i=0;

    while (!feof($f1)) {
        $tmp=fgets($f1);
        if ($tmp!=$palabra) {
            fwrite($f2,$tmp);
        }else {
            fwrite($f2, $palabra2."\r\n");
        }
    }
    echo "Palabras Cambiada";

    

    fclose($f1);
    fclose($f2);
    unlink("../ficheros/palabras.txt");
    rename("../ficheros/palabras2.txt", "../ficheros/palabras.txt");
}