<?php
$medios = ["El Pais" => "https://elpais.com/", "El Mundo" => "https://www.elmundo.es/", "ABC" => "https://www.abc.es/", "La Vanguardia" => "https://www.lavanguardia.com/", "Marca" => "https://www.marca.com/"];
$nombrePeriodico = array_rand($medios, 1);
?>

<html>
    <head>
        <meta charset="UTF-8">
    </head>

    <body>
        <h1>Ejercicio 3</h1>
        
        <p>El Medio recomendado es: <a href="<?php echo $medios[$nombrePeriodico] ?>"><?php echo $nombrePeriodico ?></a></p>
    </body>
</html>