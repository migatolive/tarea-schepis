<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $user_type = $_POST['user_type'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $birthdate = $_POST['birthdate'];
    $profile_picture = $_FILES['profile_picture'];

    if ($password !== $confirm_password) {
        echo "Las contraseñas no coinciden.";
        exit();
    }

    echo "Usuario registrado exitosamente.";
}
?>