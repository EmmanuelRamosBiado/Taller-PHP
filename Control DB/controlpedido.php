<?php

use phpDocumentor\Reflection\DocBlock\Tags\Var_;

include_once "AccesoDatos.php";
include_once "Cliente.php";
include_once "Pedido.php";

// Comprobar si no se han introducido datos
if(empty($_GET["nombre"]) || empty($_GET["clave"])){
    $msg = "Introduzca un nombre de usuario y contraseña";
    include_once "vistaerror.php";
    exit();
}

$nombre = $_GET["nombre"];
$clave = $_GET["clave"];

$db = AccesoDatos::getModelo();

$user = $db->chequearUsuario($nombre, $clave);

if (!$user){
    $msg = "ERROR: El valor de nombre y contraseña son incorrectos";
    include_once "vistaerror.php";
    exit();
}

$tpedidos = $db->obtenerListaPedidos($user->cod_cliente);
var_dump($tpedidos);
// include_once "vistapedidos.php";
