<html>

<head>
    <style>
        body {
            width: 20%;
            font-family:Arial, Helvetica, sans-serif;
        }

        h1 {
            background-color: blue;
            color: white;
            text-align: center;
            text-shadow: 2px 2px 2px black;
        }

        table,
        td,
        th {
            border: 1px solid black;
            color: grey;
        }

        table {
            border-collapse: collapse;
        }

        .resultado {
            text-align: right;
        }
    </style>
</head>

<body>


    <?php
    echo "<h1>TABLA DE <br> MULTIPLICAR</h1>";
    $numero = random_int(1, 10);

    echo "<br>";

    echo "<table>";
    echo "<tr>";
    echo "<th class='operacion'> Tabla del ", $numero, "</th>";
    echo '<th class="resultado"> </th>';
    echo "</tr>";

    for ($i = 1; $i <= 10; $i++) {
        echo "<tr>";
        echo "<td>";
        echo "$numero X $i = ";
        echo "</td>";
        echo '<td class="resultado">';
        echo $numero * $i;
        echo "</td>";
        echo "</tr>";
    }

    ?>
</body>

</html>