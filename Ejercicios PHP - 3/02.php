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

        <?php
            foreach($medios as $clave => $valor){
                echo "<li><a href='$valor'>$clave</a></li>";
            }
        ?>

        </ul>
    </body>
</html>