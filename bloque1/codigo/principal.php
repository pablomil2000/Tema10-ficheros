<?php
include("funciones.php");
if (isset($_GET['ejer1'])) {
    comprobar();
}elseif (isset($_GET['crear'])) {
    crearf();
}elseif (isset($_GET['introducir'])) {
    header("Location:../formularios/formu_introducir.php");
}elseif (isset($_GET['introducir_b'])){
    introducir_b();
}elseif (isset($_GET['ejer5'])){
    ejer5();
}elseif (isset($_GET['contar_digitos'])){
    contar_digitos();
}elseif (isset($_GET['ejer6'])){
    ejer6();
}elseif (isset($_GET['ejer7'])){
    ejer7();
}elseif (isset($_GET['ejer8'])){
    ejer8();
}elseif (isset($_GET['ejer9'])){
    ejer9();
}elseif (isset($_GET['ejer10'])){
    ejer10();
}elseif (isset($_GET['ejer11'])){
    ejer11();
}elseif (isset($_GET['ejer12'])){
    ejer12();
}elseif (isset($_GET['ejer13'])){
    ejer13();
}elseif (isset($_GET['ejer14'])){
    ejer14();
}elseif (isset($_GET['ejer15'])){
    ejer15();
}

?>
<br />
<p><a href="../">Volver</a></p>