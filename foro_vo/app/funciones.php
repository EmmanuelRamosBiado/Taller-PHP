<?php
function usuarioOk($usuario, $contraseña): bool
{
   $valor = false;

   if ((strlen($usuario) >= 8) && ($contraseña == strrev($usuario))) {
      $valor = true;
   }
   
   return $valor;
}

function letraRepetidas($frase)
{
   $tvaloresyfrecuencias = array_count_values(str_split($frase));
   arsort($tvaloresyfrecuencias);
   echo array_keys($tvaloresyfrecuencias)[0];
}

function palabrasRepetidas($frase)
{
   $array = explode(" ", $frase);
   $tvaloresyfrecuencias = array_count_values($array);
   $moda = array_search(max($tvaloresyfrecuencias), $tvaloresyfrecuencias);
   echo "$moda";
}
