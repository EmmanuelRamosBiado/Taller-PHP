<?php

$dados = [1 => "&#9856;", 2 => "&#9857;", 3 => "&#9858;", 4 => "&#9859;", 5 => "&#9860;", 6 => "&#9861;"];
$suma1 = [];
$suma2 = [];

function generaAleatorio(&$tabla, &$operacion)
{


    for ($i = 1; $i < 6; $i++) {
        $num = random_int(1, 6);
        $operacion[$i] = $num;
        echo "$tabla[$num]";
    }
}

function suma($operacion)
{
    echo (array_sum($operacion) - min($operacion) - max($operacion));
}

function resultado($operacion1, $operacion2)
{
    if ((array_sum($operacion1) - min($operacion1) - max($operacion1)) > (array_sum($operacion2) - min($operacion2) - max($operacion2))) {
        echo "Ha ganado el jugador 1";
    } else if ((array_sum($operacion2) - min($operacion2) - max($operacion2)) > (array_sum($operacion1) - min($operacion1) - max($operacion1))) {
        echo "Ha ganado el jugador 2";
    } else if ((array_sum($operacion2) - min($operacion2) - max($operacion2)) == (array_sum($operacion1) - min($operacion1) - max($operacion1))) {
        echo "Empate";
    }
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <style>
        td {
            padding: 1rem;
        }

        .dados {
            font-size: 5rem;
        }

        td.jugador,
        td.suma {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Cinco dados</h1>

    <p>Actualice la página para mostrar una nueva tirada.</p>

    <table>
        <tr>
            <td class="jugador">Jugador 1</td>
            <td class="dados">
                <?php
                generaAleatorio($dados, $suma1);
                ?>
            </td>
            <td class="suma">
                <?php
                echo suma($suma1) . " puntos";
                ?>
            </td>
        </tr>

        <tr>
            <td class="jugador">Jugador 2</td>
            <td class="dados">
                <?php
                generaAleatorio($dados, $suma2);
                ?>
            </td>
            <td class="suma">
                <?php
                echo suma($suma2) . " puntos";
                ?>
            </td>
        </tr>
    </table>
    <p>
        Resultado:
        <?php
        resultado($suma1, $suma2);
        ?>
    </p>
</body>

</html>