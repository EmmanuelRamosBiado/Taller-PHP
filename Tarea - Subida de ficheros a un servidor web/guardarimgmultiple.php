<?php

$numArchivos = count(($_FILES['archivos']['name']));
$comprobacion = true;
for ($i = 0; $i <= $numArchivos; $i++) {

    $nombreDirectorio = "./imgusers/" . $_FILES['archivos']['name'][$i];
    $nombre = $_FILES['archivos']['name'][$i];
    $tipo = $_FILES['archivos']['type'][$i];
    $tamaño = $_FILES['archivos']['size'][$i];
    $tempNombre = $_FILES['archivos']['tmp_name'][$i];
    $error = $_FILES['archivos']['error'][$i];

    $codigosErrorSubida = [
        0 => 'Subida correcta',
        1 => 'El tamaño del archivo excede el admitido por el servidor',
        2 => 'El tamaño del archivo excede el admitido por el cliente',
        3 => 'El archivo no se pudo subir completamente',
        4 => 'No se seleccionó ningún archivo para ser subido',
        6 => 'No existe un directorio temporal donde subir el archivo',
        7 => 'No se pudo guardar el archivo en disco',
        8 => 'Una extensión PHP evito la subida del archivo',
        9 => 'Ese archivo ya existe',
        10 => 'Ese tipo de archivo no es aceptado'
    ];

    

    // Lo mío
    if (is_file($nombreDirectorio)) {
        $comprobacion = false;
        echo ($codigosErrorSubida[9]);
    } else {
        $comprobacion = true;
    }

    if ($tipo == "image/png" || $tipo == "image/jpeg") {
        $comprobacion = true;
    } else {
        $comprobacion = false;
        echo ($codigosErrorSubida[10]);
    }

    if ($tamaño <= 200000) {
        $comprobacion = true;
    } else {
        $comprobacion = false;
        echo ($codigosErrorSubida[1]);
    }

    if ($comprobacion) {
        move_uploaded_file($tempNombre, $nombreDirectorio);
        echo ($codigosErrorSubida[0]);
    } else {
        echo ($codigosErrorSubida[3]);
    }
}
