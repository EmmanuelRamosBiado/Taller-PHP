<?php

require_once("funciones.php");
$tabla = cargarbicis();

if (isset($_GET['coordy']) && isset($_GET['coordx'])) {
    $bicirecomendada = bicimascercana($tabla, $_GET['coordx'], $_get['coordy']);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bicicletas eléctricas</title>
</head>

<body>
    <h1>LISTADO DE BICICLETAS OPERATIVAS</h1>
    <?= mostrartablabicis($tabla); ?>

    <?= isset($bicirecomendada) ? $bicirecomendada : "" ?>

    <p>Indique su posición: </p>

    <form action="">
        Coord X: <input type="number" name="coordx"><br>
        Coord Y: <input type="number" name="coordy"><br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>