<?php

function comprobar(){
    $fichero=$_POST["fichero"];
    setcookie("fichero",$fichero, time()+3600,"/");

    if (file_exists("../ficheros/$fichero")) {
        echo "El chichero existe, <a href='principal.php?introducir'>¿quieres introducir numeros?</a>";
    }else{
        echo "El fichero no existe,<a href='principal.php?crear'>¿quieres crearlo?</a>";
    }
}

function crearf(){
    $fichero=$_COOKIE["fichero"];

    $f1=fopen("../ficheros/$fichero","w+");
    echo "Se a creado el fichero $fichero, <a href='principal.php?introducir'>¿quieres introducir numeros?</a>";
    fclose($f1);
}

function introducir_b(){
    $fichero=$_COOKIE["fichero"];
    $num=$_POST['num'];

    $f1=fopen("../ficheros/$fichero","a+");
    fwrite($f1,"$num\r\n");
    header("Location:../formularios/formu_introducir.php");
}

function mostrar(){
$fichero=$_COOKIE["fichero"];
    $f1=fopen("../ficheros/$fichero","a+");
    $a=0;
    
    while (!feof($f1)){
        $vec[$a]=fgets($f1);
        $a++;
    }
    
    burbuja($vec);
    foreach ($vec as $key => $value) {
        echo "$value, ";
    }
}

function burbuja(&$vec)
{
    $numElem=count($vec);
    for($i=0;$i<$numElem-1;$i++)
    {
        for($j=$numElem-1;$j>=$i+1;$j--)
        {
            if($vec[$j]<$vec[$j-1]){
                $aux=$vec[$j];
                $vec[$j]=$vec[$j-1];
                $vec[$j-1]=$aux;
            }
        }
    }
}

function ejer5(){
    $fichero=$_POST["fichero"];
    setcookie("fichero",$fichero, time()+3600,"/");

    if (file_exists("../ficheros/$fichero")) {
        echo "El chichero existe, <a href='principal.php?contar_digitos'>¿quieres contar los digitos?</a>";
    }else{
        echo "El fichero no existe,<a href='principal.php?crear'>¿quieres crearlo?</a>";
    }

}

function contar_digitos(){
    $fichero=$_COOKIE["fichero"];
$a=0;

for ($i=0; $i < 10; $i++) { 
    $vec[$i]=0;
}
    $f1=fopen("../ficheros/$fichero", "r");
    while (!feof($f1)) {
        $c= (int)(fgets($f1));
        $vec[$c]++;
    }
    $vec[0]--;

    foreach ($vec as $key => $value) {
        $a=$a+$value;
    }
    echo "Hay $a digitos";
}

function ejer6(){
    $fichero=$_POST["fichero"];
    $a=0;
    if (file_exists("../ficheros/$fichero")) {
        $f1=fopen("../ficheros/$fichero","r");
        while (!feof($f1)) {
            $a++;
            $b=fgets($f1);
        }
    }else {
        
        $f1=fopen("../ficheros/$fichero","w+");
    }
    echo "El fichero tiene $a lineas";
}

function ejer7(){
    $fichero=$_POST["fichero"];
    $a=0;
    if (file_exists("../ficheros/$fichero")) {
        $f1=fopen("../ficheros/$fichero","r");
        $f2=fopen("../ficheros/par","w+");
        $f3=fopen("../ficheros/ipar","w+");
        
        while (!feof($f1)) {
            $a++;
            $b=fgets($f1);
            if ($a%2==0) {
                fwrite($f2, $b);
            }else {
                fwrite($f3,$b);
            }
        }
        fclose($f2);
        fclose($f3);
        echo "Lineas pares<br>";
        mostrarf("fpar");
        echo "Lineas impares<br>";
        mostrarf("fipar");
        
    }else {
        echo "El fichero esta vacio";
    }
    
}

function mostrarf($nombre){
    $f1=fopen("../ficheros/par","r");
    while (!feof($f1)) {
        $a=fgets($f1);
        echo "$a<br>";
    }
}


function ejer8(){
    $fichero=$_POST["fichero"];
    $a=0;

    if (file_exists("../ficheros/$fichero")) {
        $f1=fopen("../ficheros/$fichero","r");
        $a=0;
        $b=0;
        while (!feof($f1)) {
            $a++;
            $c=fgets($f1);
        }
        rewind($f1);
        while (!feof($f1)) {
            $c=fgetc($f1);
            if ($c==" ") {
                $b++;
            }
        }
        $total= $a+$b;
        echo "El fichero $fichero tiene $total palabras";
    }else {
        echo "El fichero no existe";
    }
    
}

function ejer9(){
    $palabras = $_POST["palabra"];
    $f1=fopen("../ficheros/palabras.txt", "a+");
    
    fwrite($f1,"$palabras\r\n");
    header("Location:../formularios/formu_ejer9.php");
}

function ejer10(){
    $f1=fopen("../ficheros/palabras.txt", "r+");

    while (!feof($f1)) {
        $a=fgets($f1);
        $b = strtoupper($a);
        echo $b;
    }
}

function ejer11(){
    $fichero = $_POST["fichero"];
    if (file_exists("../ficheros/$fichero")) {
        $f1=fopen("../ficheros/$fichero", "r");
        $vec["a"]=0;
        $vec["e"]=0;
        $vec["i"]=0;
        $vec["o"]=0;
        $vec["u"]=0;
        while (!feof($f1)){
            $c=fgetc($f1);
            $vec[$c]=1;
        }
        if ($vec["a"]==1 && $vec["e"]==1 && $vec["i"]==1 && $vec["o"]==1 && $vec["u"]==1) {
            echo "Este fichero tiene todas las vocales";
        }else {
            echo "Este fichero no tine todas las vocales";
        }
    }else {
        echo "El fichero no existe";
    }
}

function ejer12() {
    $fichero1=$_POST["f1"];
    $fichero2=$_POST["f2"];

    if (file_exists("../ficheros/$fichero1") && file_exists("../ficheros/$fichero2")) {
        $f1=fopen("../ficheros/$fichero1", "r");
        $f2=fopen("../ficheros/$fichero2", "r");
        if ($fichero1 == $fichero2) {
            echo "Los ficheros son iguales";
        }else {
            while (!feof($f1) || !feof($f2)) {
                $a = fgets($f1);
                $b = fgets($f2);
                if ($a != $b) {
                    $a=1;
                }
            }
            if (!feof($f1) || !feof($f2)) {
                $a=1;
            }
            if ($a==1) {
                echo "los fichers son distinos";
            }else{
                echo "Los fichers son iguales";
            }
        }
    }else {
        echo "Los ficheros no existen";
    }
}

function ejer13(){
    $fichero1=$_POST["f1"];
    $fichero2=$_POST["f2"];

    if (file_exists("../ficheros/$fichero1") && file_exists("../ficheros/$fichero2")) {
        $f1=fopen("../ficheros/$fichero1", "r");
        $f2=fopen("../ficheros/$fichero2", "r");
        if ($fichero1 == $fichero2) {
            echo "Los ficheros son iguales";
        }else {
            while (!feof($f1) || !feof($f2)) {
                $a = fgets($f1);
                $b = fgets($f2);
                if ($a != $b) {
                    echo "$a = $b<br>";
                }
            }
        }
    }else {
        echo "Los ficheros no existen";
    }
}

function ejer14(){
    $fichero=$_POST["f1"];

    if (file_exists("../ficheros/$fichero")) {
        $f1=fopen("../ficheros/$fichero","r");
        
        $cont=0;
        
        while (!feof($f1)) {
            $c=fgetc($f1);
            $c=strtolower($c);
            $cont++;
            if (isset($vec[$c])) {
                $vec[$c]++;
            }else {
                $vec[$c]=1;
            }
        }
        foreach($vec as $key => $value){
            $porcen=$value/$cont*100;
            $porcen=round($porcen,2);
            echo "$key - $porcen%<br>";
        }
    }else {
        echo "El fichero no existe";
    }
}

function ejer15(){
    $fichero=$_POST["f1"];

    if (file_exists("../ficheros/$fichero")) {
        $f1=fopen("../ficheros/$fichero","r");
        $cont=0;
        $b=0;
        while (!feof($f1)) {
            $c=fgets($f1);
            $c=strtolower($c);
            $cont++;
            
            $c=strtolower($c);
            $a=str_split ( $c ,1 );
            if ($a[0]=="a") {
                $b++;
            }
        }
        
        
        echo "Hay $cont lienas<br>";
        echo "$b lineas empiezan con 'A'";
    }else {
        echo "El fichero no existe";
    }
}