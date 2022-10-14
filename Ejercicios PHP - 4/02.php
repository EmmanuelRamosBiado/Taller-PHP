<html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 02</title>
</head>

<body>
    <h1>Calculadora</h1>
    <form action="" method="POST">
        1º número: <input type="number" name="num1">
        <br>
        2º número: <input type="number" name="num2">
        <p>Tipo de operación:</p>
        <input type="button" value="+">
        <input type="button" value="-">
        <input type="button" value="x">
        <input type="button" value="/">
        <p>Cómo quieres que se muestre el resultado:</p>
        <input type="radio" name="tipoResul" id="decimal" value="decimal" checked>
        <label for="decimal"> Decimal</label>
        <input type="radio" name="tipoResul" id="binario" value="binario">
        <label for="binario">Binario</label>
        <input type="radio" name="tipoResul" id="hexadecimal" value="hexadecimal">
        <label for="hexadecimal">Hexadecimal</label>
        <br><br>
        <input type="submit" value="Calcular">
    </form>
</body>

</html>