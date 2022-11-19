<?php

require_once('BiciElectrica.php');

// Leer el fichero CSV y devuelve una tabla de bicicletas
function cargarbicis(): array
{
    $tabla = [];

    $fichero = @fopen('Bicis.csv', 'r');

    if ($fichero == false) {
        die("Error al abrir el fichero");
    }

    while ($linea = fgetcsv($fichero)) {
        // Se crea una nueva bici
        $bici = new BiciElectrica();

        // Se le introducen los valores del CSV en los atributos de la bici
        $bici->id = $linea[0];
        $bici->coordx = $linea[1];
        $bici->coordy = $linea[2];
        $bici->bateria = $linea[3];
        $bici->operativa = $linea[4];

        // Se mete la nueva bici en la tabla
        $tabla[] = $bici;
    }

    fclose($fichero);

    return $tabla;
}

// Devuelve una cadena con la tabla HTML de bicis operativas
function mostrartablabicis($tabla)
{
    $cadena = "<table><tr><th>ID</th><th>COORD X</th><th>COORD Y</th><th>BATERIA</th></tr>";

    foreach ($tabla as $bici) {
        // Si la bici está operativa
        if ($bici->operativa == 1) {
            $cadena .= "<tr><td>" . $bici->id . "</td>";
            $cadena .= "<td>" . $bici->coordx . "</td>";
            $cadena .= "<td>" . $bici->coordy . "</td>";
            $cadena .= "<td>" . $bici->bateria . "</td></tr>";
        }
    }

    $cadena.="</table>";

    return $cadena;
}

// Devuelve la bici con menor distancia a las coordenadas del usuario
function bicimascercana($tabla, $x, $y)
{
    $biciCerca = null;
    $distanciamin = PHP_INT_MAX;

    foreach ($tabla as $bici) {
        if ($bici->operativa == 1) {
            $longitud = $bici->distancia($x, $y);
            if ($longitud < $distanciamin) {
                $biciCerca = $bici;
            }
        }
    }

    return $biciCerca;
}
