<?php
$codigo=$_POST['cod_cli'];
$clave=$_POST['clave'];
$localidad=$_POST['localidad'];
$mensaje="";

$db = AccesoDatos::getModelo();
$cliente = $db->getCliente($codigo, $clave);
$vehiculo = $db->getVehiculo($localidad);

if ($cliente == null) {
    $mensaje = "Los valores de código de cliente y contraseña no son válidos";
    echo $mensaje;
    return;
}


// Caso 3: El codigo del cliente y la contraseña son correctas pero no hay
// vehiculos disponibles en esa localidad

if ($vehiculo == null) {
    $mensaje = "Actualmente no hay vehículos disponibles en  " + $localidad;
    echo $mensaje;
    return;
}

// Caso 2: El codigo del cliente y la contraseña son correctas y hay vehiculos
// disponibles en esa localidad

if ($cliente->cod_car != 0) {
    $mensaje = "¡Ya tiene reservado el vehículo " + $cliente->cod_car + " !";
    
    echo $mensaje;
    return;
}

// Caso 1: El codigo del cliente y la contraseña son correctas y hay vehiculos
// disponibles en esa localidad


$mensaje = "Dispone en " + $localidad + " del vehículo " + $vehiculo->cod_car;
echo $mensaje;

$db->anotarVehiculoACliente($vehiculo, $cliente);

return;
