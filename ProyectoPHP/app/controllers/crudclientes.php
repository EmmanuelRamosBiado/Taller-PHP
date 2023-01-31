<?php

function crudBorrar($id)
{
    $db = AccesoDatos::getModelo();
    $tuser = $db->borrarCliente($id);
}

function crudTerminar()
{
    AccesoDatos::closeModelo();
    session_destroy();
}

function crudAlta()
{
    $cli = new Cliente();
    $orden = "Nuevo";
    include_once "app/views/formulario.php";
}

function crudDetalles($id)
{
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    include_once "app/views/detalles.php";
}

function crudDetallesSiguiente($id)
{
    $db = AccesoDatos::getModelo();
    $cli = $db->getClienteSiguiente($id);
    if ($cli) {
        include_once "app/views/detalles.php";
    } else {
        crudDetalles($id);
    }
}

function crudDetallesAnterior($id)
{
    $db = AccesoDatos::getModelo();
    $cli = $db->getClienteAnterior($id);
    if ($cli) {
        include_once "app/views/detalles.php";
    } else {
        crudDetalles($id);
    }
}


function crudModificar($id)
{
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    $orden = "Modificar";
    include_once "app/views/formulario.php";
}

function crudPostAlta()
{
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $cli = new Cliente();

    $todoOK = true;

    $cli->id            = $_POST['id'];
    $cli->first_name    = $_POST['first_name'];
    $cli->last_name     = $_POST['last_name'];
    $cli->last_name     = $_POST['last_name'];
    $cli->email         = $_POST['email'];
    $cli->gender        = $_POST['gender'];
    $cli->ip_address    = $_POST['ip_address'];
    $cli->telefono      = $_POST['telefono'];

    if (comprobarEmail($cli->email)) {
        $todoOK = false;
        echo "<p>El email ya existe</p>";
        $cli->email    = " ";
    }

    if (!comprobarIP($cli->ip_address)) {
        $todoOK = false;
        echo "<p>El IP tiene un informato incorrecto</p>";
        $cli->ip_address    = " ";
    }

    if (!comprobarTelefono($cli->telefono)) {
        $todoOK = false;
        echo "<p>El teléfono tiene un informato incorrecto</p>";
        $cli->telefono    = " ";
    }

    $db = AccesoDatos::getModelo();

    if ($todoOK) {
        $db->addCliente($cli);
    } else {
        echo "<script>alert('Se ha introducido valores erróneos');</script>";
        $orden = "Nuevo";
        include_once "app/views/formulario.php";
    }
}

function crudPostModificar()
{
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $cli = new Cliente();

    $cli->id            = $_POST['id'];
    $cli->first_name    = $_POST['first_name'];
    $cli->last_name     = $_POST['last_name'];
    $cli->email         = $_POST['email'];
    $cli->gender        = $_POST['gender'];
    $cli->ip_address    = $_POST['ip_address'];
    $cli->telefono      = $_POST['telefono'];

    $todoOK = true;

    if (comprobarEmail($cli->email)) {
        $todoOK = false;
        echo "<p>El email ya existe</p>";
        $cli->email    = " ";
    }

    if (!comprobarIP($cli->ip_address)) {
        $todoOK = false;
        echo "<p>El IP tiene un informato incorrecto</p>";
        $cli->ip_address    = " ";
    }

    if (!comprobarTelefono($cli->telefono)) {
        $todoOK = false;
        echo "<p>El teléfono tiene un informato incorrecto</p>";
        $cli->telefono    = " ";
    }

    $db = AccesoDatos::getModelo();

    if ($todoOK) {
        $db->modCliente($cli);
    } else {
        echo "<script>alert('Se ha introducido valores erróneos');</script>";
        $orden = "Modificar";
        include_once "app/views/formulario.php";
    }
}

function foto($id)
{

    $rutaFoto = 'app/uploads/0000000' . $id . '.jpg';
    if (file_exists($rutaFoto)) {

        return  "<img src='$rutaFoto' alt='Foto de la persona'>";
    } else {

        return  "<img src='https://robohash.org/ $id.png'  alt='Foto de la persona'>";
    }
}

// Esta funcion sirve para obtener el código del país usando la ip
function codigoPais($ip)
{
    if (isset($ip)) {
        $detalles = file_get_contents('http://ip-api.com/json/' . $ip);
        $json = json_decode($detalles);
        return $json->countryCode;
    } else {
        return 'IP is empty.';
    }
}

function latitud($ip)
{
    if (isset($ip)) {
        $detalles = file_get_contents('http://ip-api.com/json/' . $ip);
        $json = json_decode($detalles);
        return $json->lat;
    } else {
        return 'IP está vacío';
    }
}

function longitud($ip)
{
    if (isset($ip)) {
        $detalles = file_get_contents('http://ip-api.com/json/' . $ip);
        $json = json_decode($detalles);
        return $json->lon;
    } else {
        return 'IP está vacío.';
    }
}

function comprobarEmail($email)
{
    $db = AccesoDatos::getModelo();
    $cli = $db->buscarEmail($email);
    if ($cli) {
        return true;
    } else {
        return false;
    }
}

function comprobarIP($ip)
{
    $buenFormato = true;

    if (!filter_var($ip, FILTER_VALIDATE_IP)) {
        $buenFormato = false;
    }

    return $buenFormato;
}

function comprobarTelefono($tel)
{
    $buenFormato = true;
    $patronTelefono = "[0-9]{3}-[0-9]{3}-[0-9]{4}";

    if (!preg_match($patronTelefono, $tel)) {
        $buenFormato = false;
    }

    return $buenFormato;
}
