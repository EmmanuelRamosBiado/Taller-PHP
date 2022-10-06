<?php

$dados = [1 => "&#9856;", 2 => "&#9857;", 3 => "&#9858;", 4 => "&#9859;", 5 => "&#9860;", 6 => "&#9861;"];
$suma1 = [];
$suma2 = [];

function generaAleatorio(&$tabla, &$operacion)
{
    // En este bucle for se genera un número aleatorio, se introduce en la tabla de $sumaX para luego hacer la suma y se dibuja el emoji del dado.
    for ($i = 1; $i < 6; $i++) {
        $num = random_int(1, 6);
        $operacion[$i] = $num;
        echo "$tabla[$num]";
    }
}

// Se suman todos los valores del array y se le resta el valor mínimo y el valor máximo del array.
function suma($operacion)
{
    echo (array_sum($operacion) - min($operacion) - max($operacion));
}

// Aquí se comparan las sumas de los array e indica quien ha ganado o si han empatado.
function resultado($operacion1, $operacion2)
{
    if ((array_sum($operacion1) - min($operacion1) - max($operacion1)) > (array_sum($operacion2) - min($operacion2) - max($operacion2))) {
        // Gana el jugador 1
        echo "Ha ganado el jugador 1";
    } else if ((array_sum($operacion2) - min($operacion2) - max($operacion2)) > (array_sum($operacion1) - min($operacion1) - max($operacion1))) {
        // Gana el jugador 2
        echo "Ha ganado el jugador 2";
    } else if ((array_sum($operacion2) - min($operacion2) - max($operacion2)) == (array_sum($operacion1) - min($operacion1) - max($operacion1))) {
        // Empate
        echo "Empate";
    }
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <!-- Estilos -->
    <style>
        table {
            border-collapse: collapse;
        }

        table,
        td {
            border: 1px solid black;
        }

        .jugador1 {
            background-color: greenyellow;
        }

        .jugador2 {
            background-color: cyan;
        }

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
        <tr class="jugador1">
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

        <tr class="jugador2">
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
        <b> Resultado: </b>
        <?php
        resultado($suma1, $suma2);
        ?>
    </p>
</body>

</html>