<html>

<head>

</head>

<body>
    <h1>Ejercicio 2</h1>
    <?php

    $numero = random_int(1, 9);

    echo "Número generado: ", $numero, "<br>";

    for ($escalera = 1; $escalera <= $numero; $escalera++) {
        for ($otro = 1; $otro <= $escalera; $otro++) {
            if ($escalera % 2 == 0) {
                echo '<span style="color: blue;">' . $escalera . '<span>';
            } else {
                echo '<span style="color: red;">' . $escalera . '<span>';
            }
        }
        echo "<br>";
    }

    ?>
</body>

</html>