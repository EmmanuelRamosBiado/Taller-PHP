<?php
include_once "prodatos.php";

$nom = "";
$eda = "";
$dep = "";

if (isset($_SESSION['nombre'])) {
    $nom = $_SESSION['nombre'];
}

if (isset($_SESSION['edad'])) {
    $eda = $_SESSION['edad'];
}

if (isset($_SESSION['deportes'])) {
    foreach ($_SESSION['deportes'] as $clave => $valor) {
        $dep .= $valor . ", ";
    }
}

if (!isset($_GET['elegir'])) {
    echo "<h1>Sus datos han sido almacenados</h1>";
} else {
    if ($_GET['elegir'] == 'Consultar valores') {
        if (isset($_SESSION['nombre']) && isset($_SESSION['edad']) && isset($_SESSION['deportes'])) {

            echo '<h1>Sus datos son</h1> <br>';
            echo 'Nombre: ' . $nom;
            echo '<br> Edad: ' . $eda;
            echo '<br> Deportes: ' . $dep;
            echo '<br><a href="clubformulario.html">Volver a introducir sus datos</a>';
        } else {
            echo "<h1>No hay datos almacenados</h1>";
            echo '<a href="clubformulario.html">Volver a introducir sus datos</a>';
        }
    }
    if ($_GET['elegir'] == 'Anular valores') {
        session_destroy();

        echo "<h1>Sus datos han sido eliminados</h1> <br>";
        echo '<a href="clubformulario.html">Volver a introducir sus datos</a>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="submit" name="elegir" value="Consultar valores">
        <input type="submit" name="elegir" value="Anular valores">
    </form>
</body>

</html>