<?php

$nombreDirectorio = "./imgusers/";
$nombre = $_FILES['archivos']['name'];
$tipo = $_FILES['archivo']['type'];
$tamaño = $_FILES['archivos']['size'];
$tempNombre = $_FILES['archivos']['tmp_name'];
$error = $_files['archivos']['error'];

if(!empty($_FILES['archivos'])){
    if($_FILES['archivos']['type'] == "png" || $_FILES['archivos']['type'] == "jpeg"){
        
    }
} 