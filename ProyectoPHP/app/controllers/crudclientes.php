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

    $cli->id            = $_POST['id'];
    $cli->first_name    = $_POST['first_name'];
    $cli->last_name     = $_POST['last_name'];
    $cli->last_name     = $_POST['last_name'];

    if (comprobarEmail($_POST['email'])) {
        $cli->email         = $_POST['email'];
    } else {
        die("Ese email ya existe");
    }

    $cli->gender        = $_POST['gender'];
    $cli->ip_address    = $_POST['ip_address'];
    $cli->telefono      = $_POST['telefono'];
    $db = AccesoDatos::getModelo();
    $db->addCliente($cli);
}

function crudPostModificar()
{
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $cli = new Cliente();

    $cli->id            = $_POST['id'];
    $cli->first_name    = $_POST['first_name'];
    $cli->last_name     = $_POST['last_name'];
    
    if (comprobarEmail($_POST['email'])) {
        $cli->email         = $_POST['email'];
    } else {
        echo("<script>alert('Ese correo ya está en uso'); history.go(-1);</script>");
    }
    
    $cli->gender        = $_POST['gender'];
    $cli->ip_address    = $_POST['ip_address'];
    $cli->telefono      = $_POST['telefono'];
    $db = AccesoDatos::getModelo();
    $db->modCliente($cli);
}

// Esta funcion sirve para obtener el código del país usando la ip
function codigoPais($ip)
{
    if (isset($ip)) {
        $detalles = file_get_contents('http://www.geoplugin.net/json.gp?ip=' . $ip);
        $json = json_decode($detalles);
        return $json->geoplugin_countryCode;
    } else {
        return 'IP is empty.';
    }
}

function latitud($ip){
    if (isset($ip)) {
        $detalles = file_get_contents('http://www.geoplugin.net/json.gp?ip=' . $ip);
        $json = json_decode($detalles);
        return $json->geoplugin_latitude;
    } else {
        return 'IP is empty.';
    }
}

function longitud($ip){
    if (isset($ip)) {
        $detalles = file_get_contents('http://www.geoplugin.net/json.gp?ip=' . $ip);
        $json = json_decode($detalles);
        return $json->geoplugin_longitude;
    } else {
        return 'IP is empty.';
    }
}

function comprobarEmail($email){
    $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWD,DATABASE);

    $query = "SELECT * FROM clientes WHERE email ='$email'";
    $compEmail = mysqli_query($conn, $query);

    if (mysqli_num_rows($compEmail) > 0) {
        return false;
    } else {
        return true;
    }
}
