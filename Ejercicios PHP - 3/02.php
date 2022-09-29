<?php
$medios = ["El Pais" => "https://elpais.com/", "El Mundo" => "https://www.elmundo.es/", "ABC" => "https://www.abc.es/", "La Vanguardia" => "https://www.lavanguardia.com/", "Marca" => "https://www.marca.com/"];
?>

<html>
    <head>
        <meta charset="UTF-8">
    </head>

    <body>
        <h1>Ejercicio 2</h1>
        
        <ul>
            <li><a href="<?php echo $medios["El Pais"] ?>">El País</a></li>
            <li><a href="<?php echo $medios["El Mundo"] ?>">El Mundo</a></li>
            <li><a href="<?php echo $medios["ABC"] ?>">ABC</a></li>
            <li><a href="<?php echo $medios["La Vanguardia"] ?>">La Vanguardia</a></li>
            <li><a href="<?php echo $medios["Marca"] ?>">Marca</a></li>
        </ul>
    </body>
</html>