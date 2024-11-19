<?php
session_start();
if ($_SESSION['role'] !== 'cliente') {
    header('Location: index.html');
    exit();
}

echo "Bienvenido, Cliente. Aquí están tus datos personales y la lista de libros consultados.";
?>