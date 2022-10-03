<?php
$deportes = ["Futbol" => "/img/futbol.jpg", "Baloncesto" => "/img/baloncesto.jpg", "Tennis" => "/img/tennis.jpg", "Boxeo" => "/img/boxeo.jpg", "Atletismo" => "/img/atletismo.png"];
?>

<html>

<head>
    <meta charset="UTF-8">
    <style>
        img {
            max-height: 75px;
        }

        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }

    </style>
</head>

<body>
    <h1>Ejercicio 4</h1>

    <table>
        <tr>
            <th>Deporte</th>
            <th>Logo</th>
        </tr>

        <?php
        foreach ($deportes as $nombre => $imagen) {
            echo "<tr>";
            echo "<td>$nombre</td>";
            echo "<td><img src='$imagen'></td>";
            echo "</tr>";
        }
        ?>

    </table>
</body>

</html>