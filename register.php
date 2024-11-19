<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $user_type = $_POST['user_type'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $birthdate = $_POST['birthdate'];
    $profile_picture = $_FILES['profile_picture']['name'];
    $terms = isset($_POST['terms']) ? 1 : 0;

    if ($_POST['password'] !== $_POST['confirm_password']) {
        echo "Las contraseñas no coinciden.";
        exit();
    }

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($profile_picture);
    move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file);

    $sql = "INSERT INTO users (full_name, email, password, user_type, address, phone, birthdate, profile_picture, terms) 
            VALUES (:full_name, :email, :password, :user_type, :address, :phone, :birthdate, :profile_picture, :terms)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':full_name' => $full_name,
        ':email' => $email,
        ':password' => $password,
        ':user_type' => $user_type,
        ':address' => $address,
        ':phone' => $phone,
        ':birthdate' => $birthdate,
        ':profile_picture' => $profile_picture,
        ':terms' => $terms
    ]);

    echo "Usuario registrado exitosamente.";
}
?>