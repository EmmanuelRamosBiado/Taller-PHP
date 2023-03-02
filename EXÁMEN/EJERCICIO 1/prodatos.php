<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    if (!isset($_POST['nombre']) || !isset($_POST['edad']) || !isset($_POST['deportes'])) {
        echo "Faltan datos";
    } else {

        if (!isset($_SESSION['nombre'])) {
            $_SESSION['nombre'] = $_POST['nombre'];
        }
        if (!isset($_SESSION['edad'])) {
            $_SESSION['edad'] = $_POST['edad'];
        }
        if (!isset($_SESSION['deportes'])) {
            $_SESSION['deportes'] = $_POST['deportes'];
        }

        header("Location:verdatos.php");
    }
}
