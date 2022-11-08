<?php
session_start();

function elegirPalabra()
{
    static $tpalabras = ["Madrid", "Sevilla", "Murcia", "Málaga", "Mallorca", "Menorca"];
    // COMPLETAR
    $num = random_int(0, (count($tpalabras) - 1));
    return $tpalabras[$num]; // Devuelve una palabra al azar    
}

function comprobarLetra($letra, $cadena)
{
    // COMPLETAR ///////
    return (str_contains($cadena, $letra)); // Devuelve true o false si la letra esta en la cadena  
}


/*
 * Devuelve una cadena donde aparecen las letras de la cadenapalabra en su posición    si cada letra se encuentra en la cadenaletras
 * 
 * Ej  generaPalabraconHuecos("aeiou"     ,"hola pepe") -->"-o-a--e-e"
 *     generaPalabraconHuecos("abcdefghi ","hola pepe") -->"h--a -e-e"
 * 
 */
function generaPalabraconHuecos($cadenaletras, $cadenapalabra)
{
    // Genero una cadena resultado inicialmente con todas las posiciones con -
    $resu = $cadenapalabra;
    for ($i = 0; $i < strlen($resu); $i++) {
        $resu[$i] = '-';
    }
    // COMPLETAR rellenado la cadena resu


    return $resu;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    if (!isset($_SESSION['palabrasecreta'])) {
        $_SESSION['palabrasecreta'] = elegirPalabra();
        $_SESSION['letrasusuario'] = ""; // Inicialmente no tiene ninguna letra  
        $_SESSION['fallos'] = 0; // Inicialmente no hay ningún fallo
    } else {
        echo "Palabra: " . generaPalabraconHuecos($_SESSION['letrausuario'], $_SESSION['paalabrasecreta']);
        echo "Has cometido " . $_SESSION['fallos'] . " fallos";
        echo "Introduzaca una letra ";
    }

    if ($_SESSION['fallos'] == 5) {
        echo "Superado el máximo número de fallos. Has perdido";

        session_destroy();
    }

    ?>


</body>

</html>