<?php
function alta(&$text) {
    if (file_exists("../ficheros/usuarios.txt")) {
        $nombre=$_POST['nombre'];
        $nota=$_POST['nota'];
        buscar($result, $nombre);
        
        if ($result==1) {
            $text = "Este usuario ya existe";
        }else {
            $f1=fopen("../ficheros/usuarios.txt", "a+");
            $text ="Usuario creado";
            fwrite($f1, "\r\n$nombre\r\n$nota");
        }
    }else {
        $f1=fopen("../ficheros/usuarios.txt","w+");
        $nombre=$_POST['nombre'];
        $nota=$_POST['nota'];
        fwrite($f1, "$nombre\r\n$nota");
        $text="Usuario creado";
    }
}

function buscar(&$result, $nombre) {
    $f1=fopen("../ficheros/usuarios.txt", "r");
    $result=0;
    while (!feof($f1)) {
        $usuarioF=fgets($f1);
        $notaf=fgets($f1);
        if ($usuarioF=="$nombre\r\n") {
            $result=1;
        }
    }
    fclose($f1);
}

function login(&$texto){
    $nombre=$_POST['nombre'];
    $result=0;
    $usuario=$_POST['nombre'];
    if (file_exists("../ficheros/usuarios.txt")) {
        buscar($result, $nombre);
        if ($result==1) {
            $texto = "Usuario logeado";
            $_SESSION['usuario']=$nombre;
        }else {
            $texto ="Este usuario no existe";
        }
    }else {
        $texto= "Este usuario no existe";
        
    }
    
}

function cerrarsesion(&$texto){
    $texto="Sesion cerrada";
    session_destroy();
}

function consultaindividual1(&$nombres){
    $f1=fopen("../ficheros/usuarios.txt", "r");
    $i=0;
    while (!feof($f1)) {
        $nombres[$i]=fgets($f1);
        $nota=fgets($f1);
        $i++;
    }
    
    fclose($f1);
}

function baja(&$texto){
    $nombre=$_POST['nombre'];
    
    $f1=fopen("../ficheros/usuarios.txt","r");
    $f2=fopen("../ficheros/usuarios2.txt", "w+");

    $i=0;
    while (!feof($f1)) {
        $vec[$i]=fgets($f1);
        $nota[$i]=fgets($f1);
        $i++;
    }
    $cont=count($vec);
    
    for ($i=0; $i < $cont; $i++) { 
        if ($vec[$i]!=$nombre) {
            fwrite($f2 , $vec[$i]);
            fwrite($f2, $nota[$i]);
        }
    }
    $texto="Usuario eliminado"; 
    fclose($f1);
    fclose($f2);
    unlink("../ficheros/usuarios.txt");
    rename("../ficheros/usuarios2.txt", "../ficheros/usuarios.txt");
}

function consultaindividual2(&$texto){
    $f1=fopen("../ficheros/usuarios.txt", "r");
    $nombre=$_POST['nombre'];
    while(!feof($f1)){
        $nombreF=fgets($f1);
        $notaF=fgets($f1);
        if ($nombreF==$nombreF) {
            $texto="La nota de $nombreF es $notaF";
        }
    }
}

function C_nombre_A(&$texto){
    $f1=fopen("../ficheros/usuarios.txt", "r");
    $i=0;
    while (!feof($f1)) {
        $nombre[$i]=fgets($f1);
        $nota[$i]=fgets($f1);
        $i++;
    }
    $texto="";
    
    burbuja($nombre, $nota);

    for ($i=0; $i <= count($nombre)-1; $i++) { 
        $texto=$texto . "$nombre[$i] - $nota[$i]<br>";
    }
}

function C_nombre_D(&$texto){
    $f1=fopen("../ficheros/usuarios.txt", "r");
    $i=0;
    while (!feof($f1)) {
        $nombre[$i]=fgets($f1);
        $nota[$i]=fgets($f1);
        $i++;
    }
    $texto="";
    
    burbuja2($nombre, $nota);

    for ($i=0; $i <= count($nombre)-1; $i++) { 
        $texto=$texto . "$nombre[$i] - $nota[$i]<br>";
    }
}

function burbuja(&$vector1,&$vector2){
    $numElem=count($vector1);
    for($i=0;$i<$numElem-1;$i++){
        for($j=$numElem-1;$j>=$i+1;$j--){
            if($vector1[$j]<$vector1[$j-1]){
                $aux=$vector1[$j];
                $vector1[$j]=$vector1[$j-1];
                $vector1[$j-1]=$aux;
                $aux=$vector2[$j];
                $vector2[$j]=$vector2[$j-1];
                $vector2[$j-1]=$aux;
            }
        }
    }
}

function burbuja2(&$vector1,&$vector2){
    $numElem=count($vector1);
    for($i=0;$i<$numElem-1;$i++){
        for($j=$numElem-1;$j>=$i+1;$j--){
            if($vector1[$j] > $vector1[$j-1]){
                $aux=$vector1[$j];
                $vector1[$j]=$vector1[$j-1];
                $vector1[$j-1]=$aux;
                $aux=$vector2[$j];
                $vector2[$j]=$vector2[$j-1];
                $vector2[$j-1]=$aux;
            }
        }
    }
}

function C_nota_A(&$texto){
    $f1=fopen("../ficheros/usuarios.txt", "r");
    $i=0;
    while (!feof($f1)) {
        $nombre[$i]=fgets($f1);
        $nota[$i]=fgets($f1);
        $i++;
    }
    $texto="";
    
    burbuja($nota, $nombre);

    for ($i=0; $i <= count($nombre)-1; $i++) { 
        $texto=$texto . "$nombre[$i] - $nota[$i]<br>";
    }
}

function C_nota_D(&$texto){
    $f1=fopen("../ficheros/usuarios.txt", "r");
    $i=0;
    while (!feof($f1)) {
        $nombre[$i]=fgets($f1);
        $nota[$i]=fgets($f1);
        $i++;
    }
    $texto="";
    
    burbuja2($nota, $nombre);

    for ($i=0; $i <= count($nombre)-1; $i++) { 
        $texto=$texto . "$nombre[$i] - $nota[$i]<br>";
    }
}