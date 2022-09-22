<html>

<head>

</head>

<body>
    <?php

    $numeroAleatorio = random_int(1, 9);

    for ($i = 1; $i <= $numeroAleatorio; $i++) {
        for ($espacios = 1; $espacios <= ($numeroAleatorio - $i); $espacios++) {
            echo "-";
        }

        for ($estrellas = 1; $estrellas <= ($i * 2) - 1; $estrellas++) {
            echo "*";
        }

        echo "<br>";
    }

    ?>
</body>

</html>