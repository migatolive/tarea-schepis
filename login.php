<?php
session_start();

$users = [
    ['email' => 'admin@example.com', 'password' => 'adminpass', 'role' => 'administrador'],
    ['email' => 'cliente@example.com', 'password' => 'clientepass', 'role' => 'cliente']
];

$email = $_POST['email'];
$password = $_POST['password'];

foreach ($users as $user) {
    if ($user['email'] === $email && $user['password'] === $password) {
        $_SESSION['role'] = $user['role'];
        if ($user['role'] === 'administrador') {
            header('Location: admin.php');
        } else {
            header('Location: cliente.php');
        }
        exit();
    }
}

echo "Usuario o contraseña incorrectos.";
?>