<hr>


<?php 

$curso='2DAW'; 
echo "<select name ='modulos'>"
if ( $curso == "1DAW") {
echo "<option value = 'Prog'> Programacion </option>";
echo "<option value = 'Bd'> Bases de datos </option>";
}
else  {
    ?>
echo "<option value = 'Dweb'>Despliegue </option>"
echo "<option value = 'Dint'>Interfaces web </option>"
}
echo ""

?>


<hr>