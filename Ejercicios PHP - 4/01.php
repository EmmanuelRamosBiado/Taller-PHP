<?php
$tabla = ["Juan" => "contraseña1", "Ana" => "contraseña2", "Lucas" => "contraseña3"];

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (empty($_REQUEST['nombre']) || empty($_REQUEST['contraseña'])) {
        echo "Error, faltan valores.";
    } else {
        $nombre = $_REQUEST['nombre'];
        $contraseña = $_REQUEST['contraseña'];

        if (array_key_exists($nombre, $tabla) && $tabla[$nombre] == $contraseña) {
            echo "Bienvenido " . $nombre. " al sistema";
        } else {
            echo "Error";
        }
    }
}
