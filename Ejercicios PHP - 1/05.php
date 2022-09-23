<html>

<head>
<style>
    table, td, th {
        border: 1px solid black;
        width: 20em;
    }
    table {
    border-collapse:collapse;
    }

    th{
    color:blue;
    background-color: grey;
    }

    .operacion {
        text-align: left;
    }

    .resultado{
        text-align: right;
    }
</style>
</head>

<body>
    <h1>Ejercicio 5</h1>
    <?php

    $primero = random_int(1, 10);
    $segundo = random_int(1, 10);

    echo "1º Número: ", $primero, "<br>";
    echo "2º Número: ", $segundo, "<br>";

    echo "<br>";

    echo "<table>";
    echo "<tr>";
    echo "<th class='operacion'> Operación </th>";
    echo '<th class="resultado"> Resultado </th>';
    echo "</tr>";

    echo "<tr>";
    echo "<td>";
    echo "$primero + $segundo";
    echo "</td>";
    echo '<td class="resultado">';
    echo $primero + $segundo;
    echo "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>";
    echo "$primero - $segundo";
    echo "</td>";
    echo '<td class="resultado">';
    echo $primero - $segundo;
    echo "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>";
    echo "$primero * $segundo";
    echo "</td>";
    echo '<td class="resultado">';
    echo $primero * $segundo;
    echo "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>";
    echo "$primero / $segundo";
    echo "</td>";
    echo '<td class="resultado">';
    echo $primero / $segundo;
    echo "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>";
    echo "$primero % $segundo";
    echo "</td>";
    echo '<td class="resultado">';
    echo $primero % $segundo;
    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td>";
    echo "$primero ** $segundo";
    echo "</td>";
    echo '<td class="resultado">';
    echo $primero ** $segundo;
    echo "</td>";
    echo "</tr>";

    ?>

</body>

</html>