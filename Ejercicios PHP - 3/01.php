<html>

<head>
    <meta charset="UTF-8">
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            text-align: center;
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>

<body>

    <h1>Ejercicio 1</h1>

    <?php
    $numeros = [];

    for ($i = 0; $i <= 19; $i++) {
        $numeros[$i] = random_int(1, 10);
    }
    ?>

    <table>
        <tr>
            <th>Números</th>
            <th>Máximo</th>
            <th>Mínimo</th>
            <th>El que más se repite</th>
        </tr>

        <tr>
            <td>
                <?php
                foreach ($numeros as $valor) {
                    echo "$valor" . "     ";
                }
                ?>
            </td>
            <td>
                <?php
                echo max($numeros);
                ?>
            </td>
            <td>
                <?php
                echo min($numeros);
                ?>
            </td>
            <td>
                <?php
                echo print_r(array_count_values($numeros));
                ?>
            </td>
        </tr>
    </table>

</body>

</html>