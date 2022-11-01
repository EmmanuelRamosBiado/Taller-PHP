<?php
session_start();
?>

<html>

<head>
    <meta charset="UTF-8">
</head>

<body>

    <h1>La Frutería del siglo XXI</h1>

    <?php

    if (!isset($_SESSION["nombre"])) {
        $_SESSION["nombre"] = $_REQUEST["nombre"];
    }

    if (!isset($_REQUEST['nombre'])) {
        echo "<h2> BIENVENIDO A NUESTRA FRUTERÍA DEL SIGLO XXI </h2>";
        echo "Introduzca su nombre de cliente";
        echo "<form method='GET'><input type='text' name='nombre'></form>";
    } else {
        echo "<h2>Realice su compra " . $_SESSION["nombre"] . "</h2>";
        echo '<form method="POST">';
        echo 'Seleccione la fruta: <select name="frutas" id="frutas"><option value="Naranja">Naranja</option><option value="Limón">Limón</option><option value="Plátano">Plátano</option><option value="Manzanas">Manzanas</option></select></form>';
        echo 'Cantidad: <input type="number" name="cantidad"> &nbsp';
        echo '<input type="submit" value="Anotar"> &nbsp';
        echo '<input type="button" value="Terminar">';
        echo '</form>';
    }

    ?>

    

</body>

</html>