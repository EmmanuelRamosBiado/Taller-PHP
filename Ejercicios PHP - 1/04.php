<html>

<head>

</head>

<body>
    <h1>Ejercicio 4</h1>
    <?php

    $contador = 0;
    $cont6 = 0;

    do {
        $numero = random_int(1, 10);
        $contador++;

        if ($numero == 6) {
            $cont6++;
        } else {
            $cont6 = 0;
        }
    } while ($cont6 < 3);

    echo "<br>";

    echo "Han salido tres 6 seguidos tras generar " . $contador . " números en " . microtime(true);

    ?>
</body>

</html>