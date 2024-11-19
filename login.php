<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['role'] = $user['user_type'];
        if ($user['user_type'] === 'administrador') {
            header('Location: admin.php');
        } else {
            header('Location: cliente.php');
        }
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>