<?php
// COOKIE Edad
if (isset($_COOKIE["edad"])) {
    $edad = $_COOKIE["edad"];
}

if (isset($_POST["guardar"])) {
    if (isset($_POST["edad"])) {
        $edad = $_POST["edad"];
        setcookie("edad", $edad, time() + 7 * 24 * 3600);
    }

    if (isset($_POST["genero"])) {
        $genero = $_POST["genero"];
        setcookie("genero", $genero, time() + 7 * 24 * 3600);
    }

    if (isset($_POST["deportes"])) {
        
    }
}

// Borrado de COOKIES
if (isset($_POST["borrar"])) {
    setcookie("edad", NULL, time() - 60);

    setcookie("genero", NULL, time() - 60);

    setcookie("deportes", NULL, time() - 60);

    header("Refresh:0");
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <link href="default.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="container" style="width: 380px;">
        <div id="header">
            <h1>SUS DATOS ALMACENADOS</h1>
        </div>

        <div id="content">
            <fieldset>
                <form method="POST">
                    <label>Edad</label> <input type="number" name="edad" value="<?php echo "$edad" ?>"><br>
                    Género :<br>
                    <label> Mujer </label>
                    <input type="radio" name="genero" value="Mujer">
                    <label> Hombre</label>
                    <input type="radio" name="genero" value="Hombre">
                    <br>
                    <label>Deportes</label><br>
                    <select name="deportes[]" multiple="multiple" size="3">
                        <option value="Futbol">Futbol</option>
                        <option value="Tenis">Tenis</option>
                        <option value="Ciclismo">Ciclismo</option>
                        <option value="Otro">Otro</option>
                    </select>
                    <br>
                    <button name="guardar" value="Confirmar"> Almacenar valores </button>
                    <button name="borrar" value="Eliminar"> Eliminar valores </button>
                </form>
            </fieldset>
        </div>
    </div>
</body>

</html>