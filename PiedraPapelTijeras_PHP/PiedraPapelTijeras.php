<?php
define('PIEDRA1',  "&#x1F91C;");
define('PIEDRA2',  "&#x1F91B;");
define('TIJERAS',  "&#x1F596;");
define('PAPEL',    "&#x1F91A;");

function calcularGanador($jugador1, $jugador2)
{

    if (($jugador1 == 1 && $jugador2 == 1) || ($jugador1 == 2 && $jugador2 == 2) || ($jugador1 == 3 && $jugador2 == 3)) {
        echo "Empate";
    }

    if (($jugador1 == 1 && $jugador2 == 2) || ($jugador1 == 2 && $jugador2 == 3) || ($jugador1 == 3 && $jugador2 == 1)) {
        echo "Gana el jugador 1";
    }

    if (($jugador1 == 1 && $jugador2 == 3) || ($jugador1 == 2 && $jugador2 == 1) || ($jugador1 == 3 && $jugador2 == 2)) {
        echo "Gana el jugador 2";
    }
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <style>
        th {
            text-align: center;
        }

        td {
            font-size: 7em;
            text-align: center;
        }
    </style>
</head>

<body>

    <h1>¡Piedra, papel o tijeras!</h1>

    <p>Actualice la página para mostrar otra partida.</p>

    <?php

    $valor1 = random_int(1, 3);
    $valor2 = random_int(1, 3);

    ?>

    <table>
        <tr>
            <th>Jugador 1</th>
            <th>Jugador 2</th>
        </tr>

        <tr>
            <td>
                <?php
                switch ($valor1) {
                    case 1:
                        echo "&#x1F91C;";
                        break;
                    case 2:
                        echo "&#x1F596;";
                        break;
                    case 3:
                        echo "&#x1F91A;";
                }
                ?>
            </td>

            <td>
                <?php
                switch ($valor2) {
                    case 1:
                        echo "&#x1F91C;";
                        break;
                    case 2:
                        echo "&#x1F596;";
                        break;
                    case 3:
                        echo "&#x1F91A;";
                }
                ?>
            </td>
        </tr>
    </table>

    <?php
    calcularGanador($valor1, $valor2);
    ?>
</body>

</html>