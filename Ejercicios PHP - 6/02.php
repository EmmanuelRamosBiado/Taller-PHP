<?php
session_start();

if (!isset($_SESSION['numeroOculto'])) {
    $_SESSION['numeroOculto'] = random_int(1, 20);
    $_SESSION['intentos'] = 5;
    echo "<h1> !! BIENVENIDO !! </h1>";
    echo "Oportinudades restantes: " . $_SESSION['intentos'] . "<br><br>";
} else {
    if ($_SESSION['numeroOculto'] == $_REQUEST['numeroUsuario']) {
        echo "<h1> Enhorabunea, has acertado </h1> <br><br>";
        session_destroy();
        header("Refresh:5");
    } else {
        echo "No has acertado<br><br>";

        if ($_SESSION['numeroOculto'] > $_REQUEST['numeroUsuario']) {
            echo "El número es más grande <br><br>";
        } else {
            echo "El número es más pequeño <br><br>";
        }

        echo ("Oportinudades restantes: " . $_SESSION['intentos']);
    }

    if ($_SESSION['intentos'] == 0) {
        echo "<h1> Se acabaron tus intentos, has perdido. </h1>";
        session_destroy();
        header("Refresh:5");
    }
}
?>

<form method="get">
    Introduce un numero: <input type="text" name="numeroUsuario">
    <?php $_SESSION['intentos']--; ?>
</form>