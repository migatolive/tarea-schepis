<?php
session_start();
if ($_SESSION['role'] !== 'administrador') {
    header('Location: index.html');
    exit();
}

echo "Bienvenido, Administrador. Aquí está la lista de libros.";
?>